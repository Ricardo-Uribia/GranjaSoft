<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Animal;
use Illuminate\Http\Request;

class AnimalesController extends Controller
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
            $animales = Animal::where('raza', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('animal_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $animales = Animal::latest()->paginate($perPage);
        }

        return view('animales.index', compact('animales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('animales.create');
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
			'raza' => 'required|min:5|max:20',
			'tipo' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        Animal::create($requestData);

        return redirect('animales')->with('flash_message', 'Animal added!');
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
        $animale = Animal::findOrFail($id);

        return view('animales.show', compact('animale'));
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
        $animale = Animal::findOrFail($id);

        return view('animales.edit', compact('animale'));
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
			'raza' => 'required|min:5|max:20',
			'tipo' => 'required|min:5|max:20'
		]);
        $requestData = $request->all();
        
        $animale = Animal::findOrFail($id);
        $animale->update($requestData);

        return redirect('animales')->with('flash_message', 'Animal updated!');
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
        Animal::destroy($id);

        return redirect('animales')->with('flash_message', 'Animal deleted!');
    }
}
