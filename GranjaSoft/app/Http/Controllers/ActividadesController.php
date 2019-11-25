<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Actividade;
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
            $actividades = Actividade::where('activida_id', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('empleado', 'LIKE', "%$keyword%")
                ->orWhere('actividad', 'LIKE', "%$keyword%")
                ->orWhere('dia', 'LIKE', "%$keyword%")
                ->orWhere('hora_inicio', 'LIKE', "%$keyword%")
                ->orWhere('hora_finaliza', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $actividades = Actividade::latest()->paginate($perPage);
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
			'empleado' => 'required|min:5|max:20',
			'actividad' => 'required|min:5|max:50'
		]);
        $requestData = $request->all();
        
        Actividade::create($requestData);

        return redirect('actividades')->with('flash_message', 'Actividade added!');
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
        $actividade = Actividade::findOrFail($id);

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
        $actividade = Actividade::findOrFail($id);

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
			'empleado' => 'required|min:5|max:20',
			'actividad' => 'required|min:5|max:50'
		]);
        $requestData = $request->all();
        
        $actividade = Actividade::findOrFail($id);
        $actividade->update($requestData);

        return redirect('actividades')->with('flash_message', 'Actividade updated!');
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
        Actividade::destroy($id);

        return redirect('actividades')->with('flash_message', 'Actividade deleted!');
    }
}
