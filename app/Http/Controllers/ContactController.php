<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index',compact('contacts'));
    }
}
