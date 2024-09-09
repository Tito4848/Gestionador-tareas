<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Requests\TareaRequest;

/**
 * Class TareaController
 * @package App\Http\Controllers
 */
class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::paginate();

        return view('tarea.index', compact('tareas'))
            ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tarea = new Tarea();
        return view('tarea.create', compact('tarea'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TareaRequest $request)
    {
        //Recojemos toda la data del formulario
        $requestData = $request->all();
        // Verificamos si el usuario subio una imagen o lo dejo vacio
        if($request->file('imageURL') != null){
            $tiempo = time();
            //Creamos el nombre de la imagen con el tiempo y el nombre original del cliente
            $fileName = $tiempo.$request->file('imageURL')->getClientOriginalName();
            //Creamos la ubicacion/path de la imagen y ademas la almacenamos en la carpeta de nuestro servidor /storage/images/
            // storeAs( carpeta_destino, nombre_del_archivo, disco_destino)
            $path = $request->file('imageURL')->storeAs('images',$fileName,'public');
            // cambiamos el campo imageURL de nuestra data y la cambiamos por /storage/images/nombre_del_archivo.ext
            $requestData["imageURL"] = '/storage/'.$path;
            Tarea::create($requestData);
        }else{
            Tarea::create($requestData);
        }
        

        

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);

        return view('tarea.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);

        return view('tarea.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TareaRequest $request, Tarea $tarea)
    {
        $requestData = $request->all();
        if($request->file('imageURL') != null){
            $fileName = time().$request->file('imageURL')->getClientOriginalName();
            $path = $request->file('imageURL')->storeAs('images',$fileName,'public');
            $requestData["imageURL"] = '/storage/'.$path;
        }
        $tarea->update($requestData);

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea updated successfully');
    }

    public function destroy($id)
    {
        Tarea::find($id)->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea deleted successfully');
    }
}
