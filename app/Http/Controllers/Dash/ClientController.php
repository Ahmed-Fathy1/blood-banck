<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Client::all();
        return view('dash.clients.index',compact('records'));

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $record = Client::findOrFail($id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }


    public function activate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_activated' => 1]);
        flash()->success('تم التفعيل');
        return back();
    }
    public function deactivate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_activated' => 0]);
        flash()->success('تم إلغاء التفعيل');
        return back();
    }
}
