<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', ['contacts' => $contacts]);
    }

    public function edit()
    {
        return view('contacts.edit');
    }

    public function store(Request $request)
    {
        $isString = 'required|string';
        $data = $request->validate([
            'name' => $isString,
            'title' => $isString,
            'email' => 'required|email:rfc',
            'phone' => 'required|numeric|digits:9',
            'address' => $isString,
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $image = base64_encode(file_get_contents($file->path()));
            $data['profilePicture'] = $image;
        }
        Contact::create($data);
        return redirect(route('contact.index'));
    }
}
