<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json(Contact::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validatedData);
        return response()->json($contact, 201);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            return response()->json($contact, 200);
        }
        return response()->json(['error' => 'Contact not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return response()->json($contact, 200);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(null, 204);
    }
}
