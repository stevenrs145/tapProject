<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Depto;
use Illuminate\Http\Request;

class DeptoController extends Controller
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
            $depto = Depto::where('id', 'LIKE', "%$keyword%")
                ->orWhere('pais_id', 'LIKE', "%$keyword%")
                ->orWhere('nomDepto', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $depto = Depto::latest()->paginate($perPage);
        }

        return view('depto.index', compact('depto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('depto.create');
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
        
        $requestData = $request->all();
        
        Depto::create($requestData);

        return redirect('depto')->with('flash_message', 'Depto added!');
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
        $depto = Depto::findOrFail($id);

        return view('depto.show', compact('depto'));
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
        $depto = Depto::findOrFail($id);

        return view('depto.edit', compact('depto'));
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
        
        $requestData = $request->all();
        
        $depto = Depto::findOrFail($id);
        $depto->update($requestData);

        return redirect('depto')->with('flash_message', 'Depto updated!');
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
        Depto::destroy($id);

        return redirect('depto')->with('flash_message', 'Depto deleted!');
    }
}
