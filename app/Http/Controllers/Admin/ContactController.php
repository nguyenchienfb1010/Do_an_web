<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $title = "List Contacts";
       $contacts = Contact::all();
       return view('admin.contact.index',compact('contacts','title'));
    }
    public function delete($id) {
        Contact::find($id)->delete();
        return  redirect()->back()->with('success','Deleted contact successfull');
    }
}
