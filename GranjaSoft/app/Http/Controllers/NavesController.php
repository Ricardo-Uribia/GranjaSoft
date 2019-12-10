<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nave;
use Illuminate\Http\Request;

class NavesController extends Controller
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
            $naves = Nave::where('nave_id', 'LIKE', "%$keyword%")
                ->orWhere('secciones', 'LIKE', "%$keyword%")
                ->orWhere('tipo_de_nave', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $naves = Nave::latest()->paginate($perPage);
        }

        return view('naves.index', compact('naves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('naves.create');
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
			'secciones' => 'required|min:1'
		]);
        $requestData = $request->all();
        
        Nave::create($requestData);

        return redirect('naves')->with('flash_message', 'Nave added!');
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
        $nafe = Nave::findOrFail($id);

        return view('naves.show', compact('nafe'));
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
        $nafe = Nave::findOrFail($id);

        return view('naves.edit', compact('nafe'));
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
			'secciones' => 'required|min:1'
		]);
        $requestData = $request->all();
        
        $nafe = Nave::findOrFail($id);
        $nafe->update($requestData);

        return redirect('naves')->with('flash_message', 'Nave updated!');
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
        Nave::destroy($id);

        return redirect('naves')->with('flash_message', 'Nave deleted!');
    }
}
