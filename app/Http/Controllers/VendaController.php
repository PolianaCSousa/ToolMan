<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\Venda;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dados['vendas'] = Venda::select('');

        dd($dados['vendas']);

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
        //validação

        //dd($request->all());

        try{
            DB::beginTransaction();

            $venda = new Venda();
            $venda->funcionario_id = $request->funcionario_id;
            $venda->produto_id = $request->produto_id;
            $venda->quantidade = $request->quantidade;
            $venda->data = $request->data;
            $venda->save();

            DB::commit();

            return redirect()->route('venda.index');

        }catch(Exception $e){
            DB::rollBack();
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
