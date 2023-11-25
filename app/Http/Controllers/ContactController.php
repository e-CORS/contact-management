<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function editPage()
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

    public function createPage()
    {
        return Inertia::render('Contacts/Create');
    }

    public function createContact()
    {
        $newContact = request()->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|email:rfc',
            'phone' => 'required|string',
            'address' => 'required|string',
            'profilePicture' => 'required|string'
        ]);
        $newContact['user_id'] = Auth::id();
        Contact::create($newContact);
        return Inertia::render('Contacts/Details', [
            'contact' => $newContact
        ]);
    }
}
