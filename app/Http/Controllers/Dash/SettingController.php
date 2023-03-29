<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model2 = Setting::first();

        return redirect(route('settings.edit', $model2));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $model2 = Setting::findOrFail($id);

        return view('dash.settings.edit', compact('model2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'notification_setting_text' => 'required',
            'about_app' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twiter' => 'required',
            'whats_up' => 'required',
          ];
        $this->validate($request, $rules);
      $record = Setting::findOrFail($id);
      $record->update($request->all());
      flash()->success("تم التعديل بنجاح");
      return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
