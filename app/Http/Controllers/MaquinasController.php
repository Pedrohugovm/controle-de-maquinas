<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Maquinas;

class MaquinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $maquinas = Maquinas::where([
            ['patrimonio', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {                    
                    $query->orWhere('patrimonio', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("id")
        ->paginate(10);

        $maquinas = Maquinas::where([
            ['lotacao', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {                    
                    $query->orWhere('lotacao', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy("id")
        ->paginate(10);

        return view('maquinas.index', compact('maquinas'));
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maquinas.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maquina = Maquinas::find($id);
        return view('maquinas.edit', compact('maquina'));
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

            return redirect('maquinas')->with('success', 'Maquina atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maquinas = Maquinas::find($id);
        $maquinas->delete();

        return redirect('maquinas')->with('success', 'Máquina deletada!');
    }

}
