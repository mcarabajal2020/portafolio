<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function form(): View
    {
        Visit::record('contacto');

        return view('contact.form');
    }

    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Mail::to(env('CONTACT_EMAIL', 'alejandrom.carabajal@gmail.com'))->send(new ContactForm($data));

        return redirect()
            ->route('contact.form')
            ->with('success', 'Mensaje enviado correctamente. Te responderemos a la brevedad.');
    }
}
