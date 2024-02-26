<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\CommentPosted;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('groceries.contact'); // Asegúrate de que el nombre de la vista corresponda con el archivo de la vista en tu directorio de recursos/views.
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'fullname' => 'required',
                'email' => 'required|email|max:50',
                'message' => 'required',
            ], [
                'fullname.required' => 'Proporciona nombre completo.',
                'email.max' => 'Email con máximo 50 caracteres.',
                'message.required' => 'Favor de escribir el mensaje.',
                'email.required' => 'Ingrese un Email para continuar.',
            ]);

            $contact = new Contact([
                'fullname'=> $request->input('fullname'),
                'email' => $request->input('email'),
                'content' => $request->input('message'),
            ]);
            $contact->save();

            Mail::to('20031003@itcelaya.edu.mx')
            ->send(new CommentPosted($contact));

            return redirect()->route('contact.index')->with('success', 'Your message has been sent.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
