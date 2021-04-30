<?php

namespace App\Http\Controllers;

use App\Models\Atendimentos;
use Illuminate\Http\Request;
use App\Models\Maquinas;

class AtendimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = Atendimentos::withCasts([
                        'data_fechamento' => 'datetime',
                        'data_abertura' => 'datetime',
                    ])
                    ->orderBy("data_abertura", 'desc')
                    ->get();

        return view('atendimentos.index', compact('atendimentos'));
    
        
    }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create(Request $request)
    {
        $id = $request->id;
        
        return view('atendimentos.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function store(Request $request)
    {


        $atendimento = new Atendimentos([
            'descricao_problema' => $request->get('descricao_problema'),
            'descricao_fechamento' => $request->get('descricao_fechamento'),
            'data_abertura' => $request->get('data_abertura'),
            'data_fechamento' => $request->get('data_fechamento'),
            'status' => $request->get('status'),
            'id_maquina' => $request->get('id_maquina')
        ]);
        $atendimento->save();
        return redirect()->route('maquinas.show',$request->get('id_maquina'))->with('success', 'Atendimento saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {  
        $atendimento = Atendimentos::find($id);
        return view('atendimentos.show', compact('atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atendimento = Atendimentos::find($id);
        return view('atendimentos.edit', compact('atendimento'));
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao_problema'=> 'required',
            'data_abertura'=> 'required',
            'status' => 'required',
            'id_maquina' => 'required'
        ]);

        $atendimento = Atendimentos:: find($id);
            $atendimento-> descricao_problema = $request->get('descricao_problema');
            $atendimento-> descricao_fechamento = $request->get('descricao_fechamento');
            $atendimento-> data_abertura = $request->get('data_abertura');
            $atendimento-> data_fechamento = $request->get('data_fechamento');
            $atendimento-> status = $request->get('status');
            $atendimento-> id_maquina = $request->get('id_maquina');
            $atendimento-> save();

            return redirect()->route('maquinas.show',$request->get('id_maquina'))->with('success', 'Atendimento saved!');
            
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atendimentos = Atendimentos::find($id);
        $atendimentos->delete();

        return redirect('atendimentos')->with('success', 'Atendimento deletado!');
    }
}
