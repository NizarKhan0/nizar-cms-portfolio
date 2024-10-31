<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $validate = $request->validate([
            'number_phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image_path');
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
        $extension = $image->getClientOriginalExtension(); // Get the file extension
        $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
        $image->move(public_path('storage/uploads/contacts'), $imageName);

        // Create the new contact
        $contact = Contact::create([
            'number_phone' => $request->number_phone,
            'email' => $request->email,
            'address' => $request->address,
            'image_path' => $imageName
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact created successfully.');
    }

    public function update(Request $request, Contact $contact)
    {
        $validate = $request->validate([
            'number_phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new image has been uploaded
        if ($request->hasFile('image_path')) {
            // Delete the old image if it exists
            if ($contact->image_path) {
                $oldImagePath = public_path('storage/uploads/contacts/' . $contact->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            // Upload the new image
            $image = $request->file('image_path');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
            $image->move(public_path('storage/uploads/contacts'), $imageName); // Save the new image

            // Update the image path in the database
            $contact->image_path = $imageName;
        }

        // Update the contact
        $contact->number_phone = $request->number_phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->update();

        // dd($contact);

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
    }
}
