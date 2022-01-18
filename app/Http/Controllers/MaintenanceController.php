<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'notices' => Maintenance::with('user')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMaintenanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaintenanceRequest $request)
    {
        $validateData = $request->validate([
            'tajukPenyelenggaraan' => 'required',
            'aplikasiPenyelenggaraan' => 'required',
            'mulaPenyelenggaraan' => 'required',
            'tamatPenyelenggaraan' => 'required',
        ]);

        $validateData['tersedia'] = $request['tersedia'];
        $validateData['kataAluan'] = $request['kataAluan'];
        $validateData['kataAkhiran'] = $request['kataAkhiran'];
        $validateData['user_id'] = auth()->user()->id;

        Maintenance::create($validateData);

        return redirect('admin')->with('success', 'A new maintenance notice has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaintenanceRequest  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $id)
    {
        $deleted = Maintenance::where('id', $id)->delete();

        if ($deleted) {
            return view('admin.index')->with('success', 'A maintenance notice has been deleted');
        }
        return view('admin.index')->with('error', 'Something fucked');
    }

    public function notice($id)
    {
        $notice = Maintenance::where('id', $id)->first();

        return view('admin.notice.view', [
            'tajuk' => $notice->tajukPenyelenggaraan,
            'aplikasi' => $notice->aplikasiPenyelenggaraan,
            'default' => $notice->tersedia,
            'intro' => $notice->kataAluan,
            'outro' => $notice->kataAkhiran,
        ]);
    }
}
