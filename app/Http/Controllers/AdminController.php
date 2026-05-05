<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Registration;
use App\Models\Media;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalInscriptions = Registration::count();
        $todayInscriptions = Registration::whereDate('created_at', \Carbon\Carbon::today())->count();
        $totalServices = Service::count();
        $totalMedia = Media::count();
        
        $recentInscriptions = Registration::with('service')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalInscriptions', 
            'todayInscriptions', 
            'totalServices', 
            'totalMedia',
            'recentInscriptions'
        ));
    }

    public function inscriptions(Request $request)
    {
        $query = Registration::with('service')->latest();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        $registrations = $query->paginate(10);
        return view('admin.inscriptions', compact('registrations'));
    }

    public function exportRegistrations()
    {
        $registrations = Registration::with('service')->get();
        $csvFileName = 'inscriptions_kbglobal_' . date('d-m-Y') . '.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['ID', 'Nom', 'Prenom', 'Email', 'Telephone', 'Service', 'Date'];

        $callback = function() use($registrations, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($registrations as $reg) {
                fputcsv($file, [
                    $reg->id,
                    $reg->last_name,
                    $reg->first_name,
                    $reg->email,
                    $reg->phone,
                    $reg->service->title ?? 'N/A',
                    $reg->created_at->format('d/m/Y')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroyRegistration(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.inscriptions')->with('success', 'Inscription supprimée avec succès');
    }

    public function services()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Service::create($data);
        return redirect()->route('admin.services')->with('success', 'Service créé avec succès');
    }

    public function editService(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, Service $service)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $service->update($data);
        return redirect()->route('admin.services')->with('success', 'Service mis à jour');
    }

    public function destroyService(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'Service supprimé');
    }

    public function medias()
    {
        $images = Media::where('type', 'image')->latest()->get();
        $videos = Media::where('type', 'video')->latest()->get();
        return view('admin.medias.index', compact('images', 'videos'));
    }

    public function storeMedia(Request $request)
    {
        $request->validate(['file' => 'required|image']);

        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('images'), $imageName);

        Media::create([
            'filename' => $imageName,
            'type' => 'image'
        ]);

        return redirect()->route('admin.medias')->with('success', 'Média ajouté');
    }

    public function destroyMedia(Media $media)
    {
        $media->delete();
        return redirect()->route('admin.medias')->with('success', 'Média supprimé');
    }

    public function contents()
    {
        $contents = Content::pluck('value', 'key')->toArray();
        return view('admin.contents.index', compact('contents'));
    }

    public function updateContents(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Content::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return redirect()->back()->with('success', 'Contenus mis à jour');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.users')->with('success', 'Administrateur ajouté');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('admin.users')->with('success', 'Administrateur mis à jour');
    }

    public function destroyUser(User $user)
    {
        if (User::count() <= 1) {
            return redirect()->back()->with('error', 'Impossible de supprimer le dernier administrateur');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Administrateur supprimé');
    }

    public function testimonials()
    {
        $testimonials = \App\Models\Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        \App\Models\Testimonial::create($request->all());
        return redirect()->back()->with('success', 'Témoignage ajouté avec succès');
    }

    public function destroyTestimonial(\App\Models\Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back()->with('success', 'Témoignage supprimé');
    }

    public function subscribers()
    {
        $subscribers = \App\Models\Subscriber::latest()->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function destroySubscriber(\App\Models\Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->back()->with('success', 'Abonné supprimé');
    }

    public function settings()
    {
        $contents = Content::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('contents'));
    }
}
