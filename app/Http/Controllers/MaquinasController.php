<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquinas;
use App\Models\Atendimentos;
use App\Models\Locais;

class MaquinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   

        $maquinas = Maquinas::join('locais', 'maquinas.lotacao', '=', 'locais.id')
                    ->select('maquinas.*','locais.setor')
                    ->orderBy("id", 'desc')->get();
                    // ->paginate(10);
            


        return view('maquinas.index', compact('maquinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $locais = Locais::get();

        return view('maquinas.create', compact('locais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patrimonio'=> 'required',
            'descricao'=> 'required',
            'lotacao' => 'required',
            'sistema' => 'required'
        ]);

        $maquina = new Maquinas([
            'patrimonio' => $request->get('patrimonio'),
            'descricao' => $request->get('descricao'),
            'lotacao' => $request->get('lotacao'),
            'sistema' => $request->get('sistema'),
        ]);

        $maquina->save();
        return redirect('maquinas')->with('success', 'Máquina salva!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $atendimentos = Atendimentos::where('id_maquina', $id)->withCasts([
            'data_fechamento' => 'datetime',
            'data_abertura' => 'datetime',
        ])->get();
        $maquina = Maquinas::find($id);
        $maquina->lotacao=Locais::find($maquina->lotacao,'setor');
        $maquina->lotacao=$maquina->lotacao->setor;
        return view('maquinas.show', compact('maquina', 'atendimentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locais = Locais::get();
        $maquina = Maquinas::find($id);
        return view('maquinas.edit', compact('maquina', 'locais'));
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
            'patrimonio'=> 'required',
            'descricao'=> 'required',
            'lotacao' => 'required',
            'sistema' => 'required',
        ]);

        $maquina = Maquinas:: find($id);
            $maquina-> patrimonio = $request->get('patrimonio');
            $maquina-> descricao = $request->get('descricao');
            $maquina-> lotacao = $request->get('lotacao');
            $maquina-> sistema = $request->get('sistema');
            $maquina-> save();

            return redirect()->route('maquinas.show',$request->get('id'))->with('success', 'Maquina atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maquinas = Maquinas::where('id', $id)->delete();

        return redirect('maquinas')->with('success', 'Máquina deletada!');
    }

   
}
