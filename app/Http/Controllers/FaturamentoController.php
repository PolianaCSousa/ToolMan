<?php

namespace App\Http\Controllers;

use App\Models\Faturamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaturamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cadastros.faturamento.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dados['funcionarios'] = Funcionario::select('nome', 'id')->orderBy('nome')->get();
        return view('cadastros.faturamento.create', $dados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        try{
            DB::beginTransaction();

            $faturamento = new Faturamento();
            $faturamento->funcionario_id = $request->funcionario_id;
            $faturamento->data           = $request->data;
            $faturamento->valor          = $request->valor;
            $faturamento->observacoes    = $request->observacoes;
            $faturamento->save();

            DB::commit();
            return redirect()->route('faturamento.index');

        }catch(Exception $e){
            DB::rollback();
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
