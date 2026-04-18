<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUser;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        $subscriber = NewsletterSubscriber::create([
            'email' => $request->email,
        ]);

        // Send welcome email
        Mail::to($subscriber->email)->send(new WelcomeUser($subscriber));

        return back()->with('success', 'Subscribed successfully!')->with('title', 'Subscribed');
    }
}
