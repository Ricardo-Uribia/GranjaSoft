<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vacuna;
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
            $vacunas = Vacuna::where('vacuna_id', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vacunas = Vacuna::latest()->paginate($perPage);
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
        
        Vacuna::create($requestData);

        return redirect('vacunas')->with('flash_message', 'Vacuna added!');
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
        $vacuna = Vacuna::findOrFail($id);

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
        $vacuna = Vacuna::findOrFail($id);

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
        
        $vacuna = Vacuna::findOrFail($id);
        $vacuna->update($requestData);

        return redirect('vacunas')->with('flash_message', 'Vacuna updated!');
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
        Vacuna::destroy($id);

        return redirect('vacunas')->with('flash_message', 'Vacuna deleted!');
    }
}
