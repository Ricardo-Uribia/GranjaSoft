<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vacunas;
use Illuminate\Http\Request;

class VacunasController extends Controller
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
            $vacunas = Vacunas::where('vacuna_id', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('caducidad', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vacunas = Vacunas::latest()->paginate($perPage);
        }

        return view('vacunas.index', compact('vacunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vacunas.create');
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
			'nombre' => 'required|min:5|max:20',
			'tipo' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        Vacunas::create($requestData);

        return redirect('vacunas')->with('flash_message', 'Vacunas added!');
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
        $vacuna = Vacunas::findOrFail($id);

        return view('vacunas.show', compact('vacuna'));
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
        $vacuna = Vacunas::findOrFail($id);

        return view('vacunas.edit', compact('vacuna'));
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
			'nombre' => 'required|min:5|max:20',
			'tipo' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        $vacuna = Vacunas::findOrFail($id);
        $vacuna->update($requestData);

        return redirect('vacunas')->with('flash_message', 'Vacunas updated!');
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
        Vacunas::destroy($id);

        return redirect('vacunas')->with('flash_message', 'Vacunas deleted!');
    }
}
