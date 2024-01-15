<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados['produtos'] = Produto::select('id', 'nome', 'descricao', 'preco')->orderBy('nome')->get();

        return view('cadastros.produtos.index', $dados);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastros.produtos.create');
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

            $produto = new Produto();
            $produto->nome        = $request->nome;
            $produto->descricao   = $request->descricao;
            $produto->estoque     = $request->estoque;
            $produto->estoque_max = $request->estoque_max;
            $produto->estoque_min = $request->estoque_min;
            $produto->preco       = $request->preco;
           //dd($produto);
            $produto->save();

            

            DB::commit();

            return redirect()->route('produto.index');

        }catch(Exception $e){
            DB::rollBack();
            //dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $dados['produto'] = Produto::findOrFail($id);
        //dd($dados['produto']);

        return view('cadastros.produtos.show', $dados);
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            DB::beginTransaction();
            $produto = Produto::findOrFail($id);
            
            $produto->nome        = $request->nome;
            $produto->descricao   = $request->descricao;
            $produto->estoque     = $request->estoque;
            $produto->estoque_max = $request->estoque_max;
            $produto->estoque_min = $request->estoque_min;
            $produto->preco       = $request->preco;
            $produto->save();
            //dd($produto);
            DB::commit();

            return redirect()->route('produto.index');

        }catch(Exception $e){

            DB::rollBack();
            dd($e->getMessage());
        
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
