<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
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
            $empleados = Empleado::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('edad', 'LIKE', "%$keyword%")
                ->orWhere('puesto', 'LIKE', "%$keyword%")
                ->orWhere('granja_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $empleados = Empleado::latest()->paginate($perPage);
        }

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('empleados.create');
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
			'nombre' => 'required|min:4|max:20',
			'puesto' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        Empleado::create($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado added!');
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
        $empleado = Empleado::findOrFail($id);

        return view('empleados.show', compact('empleado'));
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
        $empleado = Empleado::findOrFail($id);

        return view('empleados.edit', compact('empleado'));
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
			'nombre' => 'required|min:4|max:20',
			'puesto' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        $empleado = Empleado::findOrFail($id);
        $empleado->update($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado updated!');
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
        Empleado::destroy($id);

        return redirect('empleados')->with('flash_message', 'Empleado deleted!');
    }
}
