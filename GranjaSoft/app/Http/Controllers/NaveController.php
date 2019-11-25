<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nave;
use Illuminate\Http\Request;

class NaveController extends Controller
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
            $nave = Nave::where('nave_id', 'LIKE', "%$keyword%")
                ->orWhere('secciones', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $nave = Nave::latest()->paginate($perPage);
        }

        return view('nave.index', compact('nave'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('nave.create');
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

        return redirect('nave')->with('flash_message', 'Nave added!');
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
        $nave = Nave::findOrFail($id);

        return view('nave.show', compact('nave'));
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
        $nave = Nave::findOrFail($id);

        return view('nave.edit', compact('nave'));
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
        
        $nave = Nave::findOrFail($id);
        $nave->update($requestData);

        return redirect('nave')->with('flash_message', 'Nave updated!');
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

        return redirect('nave')->with('flash_message', 'Nave deleted!');
    }
}
