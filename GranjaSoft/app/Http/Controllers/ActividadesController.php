<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Actividad;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $actividades = Actividad::where('empleado_id', 'LIKE', "%$keyword%")
                ->orWhere('tipo_de_tarea', 'LIKE', "%$keyword%")
                ->orWhere('fecha_de_inicio', 'LIKE', "%$keyword%")
                ->orWhere('fecha_de_finalizacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $actividades = Actividad::latest()->paginate($perPage);
        }

        return view('actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('actividades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'tipo_de_tarea' => 'required|min:1|max:50'
		]);
        $requestData = $request->all();
        
        Actividad::create($requestData);

        return redirect('actividades')->with('flash_message', 'Actividad added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $actividade = Actividad::findOrFail($id);

        return view('actividades.show', compact('actividade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $actividade = Actividad::findOrFail($id);

        return view('actividades.edit', compact('actividade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'tipo_de_tarea' => 'required|min:1|max:50'
		]);
        $requestData = $request->all();
        
        $actividade = Actividad::findOrFail($id);
        $actividade->update($requestData);

        return redirect('actividades')->with('flash_message', 'Actividad updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Actividad::destroy($id);

        return redirect('actividades')->with('flash_message', 'Actividad deleted!');
    }
}
