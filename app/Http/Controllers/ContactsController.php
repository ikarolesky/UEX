<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Actions\ViaCep;
use App\Http\Actions\GoogleApi;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::user()->id)->get();
        return view('contatos.index', compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {   
        //Dados validados
        $dados = $request->validated();

        //Viacep Api call[
        $viacep = new ViaCep;
        $endereco = $viacep->getAddress($dados['cep']);

        //Google Maps Api call
        $google = new GoogleApi;
        $latlon =  $google->getCoordinates($dados['endereco']);

        $contact = Contact::create([
            'nome' => $dados['nome'],
            'sobrenome' => $dados['sobrenome'],
            'rua' => $latlon['endereco'],
            'cidade' => $endereco['cidade'],
            'uf' => $endereco['uf'],
            'cep' => $dados['cep'],
            'cpf' => $dados['cpf'],
            'telefone' => $dados['telefone'],
            'user_id' => Auth::user()->id,
            'latitude' => $latlon['lat'],
            'longitude' => $latlon['lon']
        ]);
        return Redirect::route('contatos.index')->with('status', 'contact-created');
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
        $contact = Contact::where('id', $id)->get();
        return view('contatos.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, string $id)
    {   
        Contact::fill($request->validated())->save();
        return Redirect::route('contatos.edit')->with('status', 'contact-updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::destroy($id);
        return Redirect::route('contatos.index')->with('status', 'contact-deleted');
    }
}
