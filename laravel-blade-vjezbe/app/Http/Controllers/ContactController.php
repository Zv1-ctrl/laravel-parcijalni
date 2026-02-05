<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create() {
        return view('contact-create');
    }

    public function store(Request $request) {
        // Validacija podataka
        $validated = $request->validate([
            'naslov' => 'required|string|min:5',
            'email'  => 'required|email',
            'poruka' => 'required|string|min:10',
        ]);

        // Prosljeđujemo podatke u view za prikaz
        return view('contact-saved', ['podaci' => $validated]);
    }
}