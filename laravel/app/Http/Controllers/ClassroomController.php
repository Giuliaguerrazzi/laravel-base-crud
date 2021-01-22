<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource (archivio).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    get data from db
        $classrooms = Classroom::all();

          return view('classrooms.index', compact('classrooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();

        // validazione
        $request->validate([
            'name'=>'required|unique:classrooms|max:10',
            'description'=> 'required'
        ]);

        // salvare i dati
        $classroom = new Classroom();
        // name è il nome dell'input
        $classroom->name = $data['name'];
        $classroom->description = $data['description'];

        $saved = $classroom->save();

        if($saved) {
            return redirect()->route('classrooms.show', $classroom->id);
        }
    }

    /**
     * Display the specified resource.
     * pagina di dettaglio
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //$classroom = Classroom::find($id);

        return view('classrooms.show', compact('classroom') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
