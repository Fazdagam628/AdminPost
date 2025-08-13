<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // Logic for displaying the contact page
        return view('contact.index');
    }

    public function store(Request $request) {
        $validate=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'subject'=>'required|string|max:255',
            'message'=>'required|string',
        ]);

        Contact::create($validate);

        return back()->with('success','Thank you for contacting us');
    }
}
