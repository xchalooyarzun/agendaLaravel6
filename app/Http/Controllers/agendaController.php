<?php
//Controladoragenda  CRUD
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//instancia del modelo agenda en agendaController para guardar información en la BD
use App\Agenda;

class agendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Funcion index que muestra los datos en una tabla en la vista principal
    public function index()
    {
        $Agenda = Agenda::paginate(5); //<-Instancia Variable $Agenda Agenda::paginate<- me trae los 5 primeros registros de la tabla agenda
      //return dd($Agenda);//<- me muestra todo los valores guardados de la tabla agenda(sirve para ver contenido de variables)
        return view('agenda.index', compact('Agenda')); //retorna a la vista agenda.index y con compact devolvemos los datos de agenda
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //funcion create
    public function create()
    {
        return view('agenda.create'); //retorna a la vista agenda.create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // funcion para guardar contactos en la tabla agendas de la BD
    public function store(Request $request)
    {
        $Agenda = new Agenda; //<-crea variable $Agenda igual a una nueva instancia del modelo Agenda(clase)
        $Agenda->nombres = $request->nombres;
        $Agenda->apellidos = $request->apellidos;
        $Agenda->telefono = $request->telefono;
        $Agenda->celular = $request->celular;
        $Agenda->sexo = $request->sexo;
        $Agenda->email = $request->email;
        $Agenda->posicion = $request->posicion;
        $Agenda->departamento = $request->departamento;
        $Agenda->salario = $request->salario;
        $Agenda->fechadenacimiento = $request->fechadenacimiento; //<-$request captura el dato que viene desde la vista y lo guarda en la bd
        $Agenda->save();
        return redirect()->route('agenda.index')->with('datos', 'Registro guardado con exito!');

        //return 'guardado con exito!';

       // return dd($request);
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
    //Funcion para editar los registros y retornar a la vista de edit
    public function edit($id)
    {
        $Agenda= Agenda::findOrFail($id);
        return view('agenda.edit', compact('Agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Funcion para actualizar los datos de la tabla
    public function update(Request $request, $id)
    {
        $Agenda= Agenda::findOrFail($id);
        $Agenda->nombres = $request->nombres;
        $Agenda->apellidos = $request->apellidos;
        $Agenda->telefono = $request->telefono;
        $Agenda->celular = $request->celular;
        $Agenda->sexo = $request->sexo;
        $Agenda->email = $request->email;
        $Agenda->posicion = $request->posicion;
        $Agenda->departamento = $request->departamento;
        $Agenda->salario = $request->salario;
        $Agenda->fechadenacimiento = $request->fechadenacimiento; //<-$request captura el dato que viene desde la vista y lo guarda en la bd
        $Agenda->save();
        return redirect()->route('agenda.index')->with('datos', 'Registro actualizado con exito!');
        //dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Funcion para eliminar registros
    public function destroy($id)
    {
        $Agenda = Agenda::findOrFail($id);
        $Agenda->delete();
        return redirect()->route('agenda.index')->with('datos', 'Registro Elimindo con exito!');
    }

 //Funcion que me confirma la eliminación
    public function confirm($id)
    {
        $Agenda = Agenda::findOrFail($id);
        return view('agenda.confirm', compact('Agenda'));
    }
}
