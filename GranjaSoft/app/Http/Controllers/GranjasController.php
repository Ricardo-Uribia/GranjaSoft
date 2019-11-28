<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Granja;
use Illuminate\Http\Request;

class GranjasController extends Controller
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
            $granjas = Granja::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $granjas = Granja::latest()->paginate($perPage);
        }

        return view('granjas.index', compact('granjas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('granjas.create');
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
			'nombre' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        Granja::create($requestData);

        return redirect('granjas')->with('flash_message', 'Granja added!');
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
        $granja = Granja::findOrFail($id);

        return view('granjas.show', compact('granja'));
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
        $granja = Granja::findOrFail($id);

        return view('granjas.edit', compact('granja'));
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
			'nombre' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        $granja = Granja::findOrFail($id);
        $granja->update($requestData);

        return redirect('granjas')->with('flash_message', 'Granja updated!');
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
        Granja::destroy($id);

        return redirect('granjas')->with('flash_message', 'Granja deleted!');
    }
}
