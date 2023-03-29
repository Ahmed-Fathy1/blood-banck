<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Governorate::get();
        return view('dash.governorates.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required'
          ];
        $this->validate($request, $rules);

        $record = Governorate::create($request->all());

        flash()->success('تم الاضافة بنجاح');

        return redirect(route('governorates.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model2 = Governorate::findOrFail($id);

        return view('dash.governorates.edit', compact('model2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = Governorate::findOrFail($id);

        $record->update($request->all());

        flash()->success("تم التعديل بنجاح");

        return redirect(route('governorates.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Governorate::findOrFail($id);
        $record->delete();
        flash()->success("تم الحذف بنجاح");
        return back();
    }
}
