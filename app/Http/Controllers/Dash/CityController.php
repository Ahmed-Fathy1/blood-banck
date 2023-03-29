<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = City::all();
        return view('dash.cities.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates = Governorate::pluck('name', 'id');
        return view ('dash.cities.create',compact('selectedID', 'governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'governorate_id' =>'required',
          ];
          $this->validate($request, $rules);
          $record = City::create($request->all());
          flash()->success("تم إضافة مدينة بنجاح");
          return redirect(route('cities.index'));
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
      $model2 = City::findOrFail($id);
      $governorates = Governorate::pluck('name', 'id');
      return view('dash.cities.edit', compact('model2','governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = City::findOrFail($id);
        $record->update($request->all());
        flash()->success("تم التعديل بنجاح");
        return redirect(route('cities.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = City::findOrFail($id);
        $record->delete();
        flash()->success("تم الحذف بنجاح");
        return back();
    }
}
