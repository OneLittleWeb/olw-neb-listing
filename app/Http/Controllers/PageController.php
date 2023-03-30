<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        $cities = City::all();
        $city = null;
        return view('about-us', compact('cities', 'city'));
    }

    public function privacy()
    {
        $cities = City::all();
        $city = null;
        return view('privacy', compact('cities', 'city'));
    }

    public function contactUs()
    {
        $cities = City::all();
        $city = null;
        return view('contact', compact('cities', 'city'));
    }

    public function contactStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        alert()->success('success', 'Your message has been sent successfully.');

        return redirect()->back();
    }
}
