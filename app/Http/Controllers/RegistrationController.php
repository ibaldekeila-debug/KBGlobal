<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::all();
        return view('registration.index', compact('services'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
        ]);

        \App\Models\Registration::create($validated);

        return redirect()->route('registration.success');
    }

    public function success()
    {
        return view('registration.success');
    }
}
