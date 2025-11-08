<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {
        return view('web.content.contact');
    }

    public function submit(Request $request)
    {
        // 1️⃣ Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // 2️⃣ Save to database
        Contact::create($validated);

        // 3️⃣ Redirect back with success message
        return back()->with('success', 'Your message has been sent and stored successfully!');
    }
}
