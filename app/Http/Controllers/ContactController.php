<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactForm;
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
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }

    public function AdminUpdateContact(Request $request, $id){
        Contact::find($id)->Update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Data is updated successfully');

    }

    public function ContactForm( Request $request) {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('contact')->with('success', 'Message sent successfully');
    }

    public function AdminContactMessage () {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function AdminDeleteMessage($id) {
        $message = ContactForm::find($id);
        

        ContactForm::find($id)->delete();
        return Redirect()->back()->with('success', 'Contact deleted successfully');
    }
}
