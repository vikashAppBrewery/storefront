<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact() {
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request) {
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Data is inserted successfully');
    }


    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }


    public function AdminDeleteContact($id) {
        $contact = Contact::find($id);
        

        Contact::find($id)->delete();
        return Redirect()->back()->with('success', 'Contact deleted successfully');
    }


    public function AdminEditContact($id) {
        $contacts = Contact::find($id)->get();
        return view('admin.contact.edit', compact('contacts'));
    }
}
