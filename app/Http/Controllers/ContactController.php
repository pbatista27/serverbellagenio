<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactoForm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contactos = Contact::all();
      return response()->json(['contactos'=>$contactos],200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(ContactoForm $request)
     {
         $contactos = new Contact();
         $contactos->nombre = $request->input('nombre');
         $contactos->correo = $request->input('correo');
         $contactos->asunto = $request->input('asunto');
         $contactos->mensaje = $request->input('mensaje');

         $contactos->save();
         return response()->json(['mensaje'=>'contacto guardado con exito'],201);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
