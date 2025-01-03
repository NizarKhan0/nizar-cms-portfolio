<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Contact';
        $contact = Contact::all();

        return view('backend.contact.index', [
            'title' => $title,
            'contacts' => $contact
        ]);
    }

    public function store(ContactRequest $request)
    {
        $request->validated();

        $image = $request->file('contact_logo');
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
        $extension = $image->getClientOriginalExtension(); // Get the file extension
        $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
        $image->move(public_path('storage/uploads/contacts'), $imageName);

        // Create the new contact
        $contact = new Contact();
        $contact->number_phone = $request->number_phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->contact_logo = $imageName;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact created successfully.');
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $request->validated();

        // Check if a new image has been uploaded
        if ($request->hasFile('contact_logo')) {
            // Delete the old image if it exists
            if ($contact->contact_logo) {
                $oldImagePath = public_path('storage/uploads/contacts/' . $contact->contact_logo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            // Upload the new image
            $image = $request->file('contact_logo');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
            $image->move(public_path('storage/uploads/contacts'), $imageName); // Save the new image

            // Update the image path in the database
            $contact->contact_logo = $imageName;
        }

        // Update the contact
        $contact->number_phone = $request->number_phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->save();

        // dd($contact);

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
    }
}
