<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Exception;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index() {
        return view('pages.contact');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        try {
            Message::create($request->all());
            return redirect()->back()->with('success', 'Message sent!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to send the message!');
        }
    }
}
