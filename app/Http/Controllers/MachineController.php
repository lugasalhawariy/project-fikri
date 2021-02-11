<?php

namespace App\Http\Controllers;

//file tambahan
use App\Models\Machine;
use App\Models\Gallery;
use App\Models\History;
use App\Models\Employee;
use App\Http\Requests\MachineRequest;

use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->get('search');

        if($request->input('search')){
            $data = Machine::where('name', 'like', '%'.$cari.'%')
                ->orWhere('merk', 'like', '%'.$cari.'%')
                ->orWhere('tag', 'like', '%'.$cari.'%')
                ->orderBy('created_at', 'desc')->get();
        }else{
            $data = Machine::orderBy('created_at', 'desc')->get();
        }

        return view('pages.machine.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.machine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MachineRequest $request)
    {
        $items = $request->all();
        Machine::create($items);
        return redirect()->route('machine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Machine::with(['history.employee', 'gallery'])->findOrFail($id);
        $employees = Employee::all();

        return view('pages.machine.show')->with([
            'item' => $item,
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Machine::findOrFail($id);
        $item->delete();
        Gallery::where('machines_id', $id)->delete();
        History::where('machines_id', $id)->delete();
        

        return back();
    }
}
