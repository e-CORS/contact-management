<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $loggedUser = Auth::user();
        $contacts = $loggedUser->contact;
        if (!$contacts) {
            $contacts = [];
        }
        return Inertia::render('Contacts/Index', [
            'contacts' => $contacts
        ]);
    }

    public function edit()
    {
        $contactId = request()->route('contactId');
        $contact = Contact::find($contactId);
        return Inertia::render('Contacts/Edit', [
            'contact' => $contact
        ]);
    }
    public function editContact()
    {
        $contactId = request()->route('contactId');
        $newContact = request()->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|email:rfc',
            'phone' => 'required|string',
            'address' => 'required|string',
            'profilePicture' => 'required|string'
        ]);
        Contact::where('id', $contactId)->update($newContact);
        $contact = Contact::find($contactId);
        return Inertia::render('Contacts/Edit', [
            'contact' => $contact
        ]);
    }

    public function getContact()
    {
        $contactId = request()->route('contactId');
        $contact = Contact::find($contactId);
        return Inertia::render('Contacts/Details', [
            'contact' => $contact
        ]);
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
