<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Models\Services;
use App\Http\Requests\StoreServicesRequest;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('index', [
            'notice' => Maintenance::with('services')->latest('id')->first(),
        ]);
    }

    public function index()
    {
        return view('admin.index', [
            'active' => 'active',
        ]);
    }

    public function list()
    {
        return view('admin.notice.list', [
            'active' => 'active',
            'notices' => Maintenance::with('user', 'services')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.add', [
            'active' => 'active',
            'services' => Services::all(),
        ]);
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
            'service_id' => 'required',
            'mulaPenyelenggaraan' => 'required',
            'tamatPenyelenggaraan' => 'required',
        ]);

        if ($request['defaultIntro'] != 1) {
            $validateData['defaultIntro'] = 0;
        } else {
            $validateData['defaultIntro'] = 1;
        }
        if ($request['defaultOutro'] != 1) {
            $validateData['defaultOutro'] = 0;
        } else {
            $validateData['defaultOutro'] = 1;
        }
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
    public function show(Maintenance $maintenance)
    {
        return view('admin.notice.edit', [
            'notice' => $maintenance,
            'services' => Services::all(),
        ]);
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
        $rules = [
            'tajukPenyelenggaraan' => 'required',
            'service_id' => 'required',
            'mulaPenyelenggaraan' => 'required',
            'tamatPenyelenggaraan' => 'required',
        ];

        $validateData = $request->validate($rules);

        if ($request['defaultIntro'] != 1) {
            $validateData['defaultIntro'] = 0;
        } else {
            $validateData['defaultIntro'] = 1;
        }
        if ($request['defaultOutro'] != 1) {
            $validateData['defaultOutro'] = 0;
        } else {
            $validateData['defaultOutro'] = 1;
        }

        $validateData['kataAluan'] = $request['kataAluan'];
        $validateData['kataAkhiran'] = $request['kataAkhiran'];
        $validateData['user_id'] = auth()->user()->id;

        Maintenance::where('id', $maintenance->id)->update($validateData);

        return redirect('admin/notice/list')->with('success', 'A maintenance notice has been updated');
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
        $notice = Maintenance::with('services')->where('id', $id)->first();

        return view('admin.notice.view', [
            'tajuk' => $notice->tajukPenyelenggaraan,
            'aplikasi' => $notice->services->serviceName,
            'default' => $notice->tersedia,
            'intro' => $notice->kataAluan,
            'outro' => $notice->kataAkhiran,
        ]);
    }

    public function addServices()
    {
        return view('admin.service.add');
    }

    public function storeServices(StoreServicesRequest $request)
    {
        $validateData = $request->validate([
            'serviceName' => 'required|unique:services',
        ]);

        Services::create($validateData);

        return redirect('/admin/service/add')->with(
            'success',
            '<b>' . $validateData['serviceName'] . '</b> has been added to the database.'
        );
    }
}
