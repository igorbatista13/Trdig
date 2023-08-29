<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:biblioteca-list|biblioteca-create|biblioteca-edit|biblioteca-delete', ['only' => ['index','show']]);
         $this->middleware('permission:biblioteca-create', ['only' => ['create','store']]);
         $this->middleware('permission:biblioteca-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:biblioteca-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biblioteca = Biblioteca::all();

        $search = request('search');

        if($search) {
            $biblioteca = Biblioteca::where([['Nome', 'like', '%'.$search. '%' ]])->get();

             } else {
                $biblioteca = Biblioteca::all();
            }
        return view('biblioteca.index',compact('biblioteca','search'));
       
    }
    public function biblioteca()
    {
        $biblioteca = Biblioteca::all();

        $search = request('search');

        if($search) {
            $biblioteca = Biblioteca::where([['Nome', 'like', '%'.$search. '%' ]])->get();

             } else {
                $biblioteca = Biblioteca::all();
            }
        return view('biblioteca.biblioteca',compact('biblioteca','search'));
       
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $biblioteca = Biblioteca::all();
        return view('biblioteca.create',compact('biblioteca'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $biblioteca = [
            'Nome' => $request->Nome,
            'Descricao' => $request->Descricao,
            'Status' => $request->Status,
            'Link' => $request->Link,
            'Tipo' => $request->Tipo,
        ];

        if ($request->hasFile('Anexo')) {
            $biblioteca['Anexo'] = $request->file('Anexo')->store('pdfs/biblioteca', 'public');
        }
     //   dd($biblioteca);
            Biblioteca::create($biblioteca);

      
        // Biblioteca::create($request->all());

        toast('Produto criado com sucesso!','success');

        return redirect('/biblioteca')->with('success','Contéudo criado com sucesso!');
        
    }

    public function show(Biblioteca $biblioteca)
    {
        return view('biblioteca.show');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Biblioteca $biblioteca)
    {
        return view('biblioteca.edit',compact('biblioteca'));
    
    }
    
    public function update(Request $request, Biblioteca $biblioteca) {
        
        $biblioteca->update([
            'Nome' => $request->Nome,
            'Descricao' => $request->Descricao,
            'Status' => $request->Status,
            'Link' => $request->Link,
            'Tipo' => $request->Tipo,
        ]);
    
        if ($request->hasFile('Anexo')) {
            $biblioteca->update([
                'Anexo' => $request->file('Anexo')->store('pdfs/biblioteca', 'public')
            ]);
        }
     
        return redirect('/biblioteca')->with('edit','Conteúdo editado com sucesso!');
    }

    public function destroy(Biblioteca $biblioteca)
    {
        $biblioteca->delete();
    
        return redirect()->route('biblioteca.index')
                        ->with('delete','Conteúdo deletado com sucesso!');
    }

}


