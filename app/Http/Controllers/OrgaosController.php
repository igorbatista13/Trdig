<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Orgaos;


class OrgaosController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:orgaos-list|orgaos-create|orgaos-edit|orgaos-delete', ['only' => ['index','show']]);
         $this->middleware('permission:orgaos-create', ['only' => ['create','store']]);
         $this->middleware('permission:orgaos-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:orgaos-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgao = Orgaos::all();

        $search = request('search');

        if($search) {
            $orgao = Orgaos::where([['Nome', 'like', '%'.$search. '%' ]])->get();

             } else {
                $orgao = Orgaos::all();
            }
        return view('orgaos.index',compact('orgao','search'));
       
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidade = Cidade::all();
        $orgao = Orgaos::all();
        return view('orgaos.create',compact('orgao','cidade'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Orgaos::create($request->all());

        toast('Produto criado com sucesso!','success');

        return redirect('/orgaos')->with('success','Órgão criado com sucesso!');
        
    }

    public function show(Orgaos $orgao)
    {
        return view('orgaos.show');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Orgaos $orgao)
    {
        $cidade = Cidade::all();
        return view('orgaos.edit',compact('orgao','cidade'));
    
    }
    
    public function update(Request $request, Orgaos $orgao) {
        
        
        $orgao->update($request->all());

     
        return redirect('/orgaos')->with('edit','Órgão editado com sucesso!');
    }

    public function destroy(Orgaos $orgao)
    {
        $orgao->delete();
    
        return redirect()->route('orgaos.index')
                        ->with('delete','Órgão deletado com sucesso!');
    }

}


