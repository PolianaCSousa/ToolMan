<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Produto;
use Illuminate\Http\Request;


class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cadastros.vendas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dados['funcionarios'] = Funcionario::select('id', 'nome')->orderby('nome')->get();
        $dados['produtos'] = Produto::select('id', 'nome')->orderby('nome')->get();
        return view('cadastros.vendas.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
