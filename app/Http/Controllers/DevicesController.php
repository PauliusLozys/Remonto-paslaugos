<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allDevices = Device::all();
        return view('device.index')->with('devices', $allDevices);
    }

    // Retrieves a window for reparimen of devices that are not yet assigned to anyone
    public function notRepaired()
    {
        $allDevices = Device::all()->whereNull('repairman_id');
        return view('device.index')->with('devices', $allDevices);
    }

    // Retrieves the window where a client can look up if his device is repaired or not.
    public function indexFind() {
        return view('device.find');
    }

    public function findDevice(Request $request) {
        $device = Device::all()->where('public_access', $request->searchBar)->first();
        $foundDevice = false;
        return view('device.find')->with([
            'device' => $device,
            'foundDevice' => $foundDevice
        ]);
    }

    public function search() {
        return view('device.search');
    }

    public function searchDevice(Request $request) {
        $device = Device::all()->where('public_access', $request->searchBar)->first();
        $foundDevice = false;
        return view('device.search')->with([
            'device' => $device,
            'foundDevice' => $foundDevice
        ]);
    }


    public function searchUpdate($id) {

        $device = Device::findOrFail($id);
        $device->is_withdrawn = true;
        $device->save();

        return Redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('device.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device;
        $device->is_repaired = false;
        $device->is_withdrawn = false;
        $public_access_key = substr(Hash::make(rand()), 7, 6);
        $device->public_access = $public_access_key;
        $device->save();
        return view('device.add')->with('public_access_key', $public_access_key);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit page';
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
        $device = Device::findOrFail($id);

        $device->repairman_id = Auth::id();
        $device->is_repaired = true;
        $device->save();

        return Redirect()->route('device.notRepaired');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
