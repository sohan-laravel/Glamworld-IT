<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\About;
use App\Model\Service;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id', 'desc')->get();
        return view('backend.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $this->validate($request, [

            'name'  => 'required',
            'description'  => 'required',
        ]);

        $service = new Service();

        $service->name = $request->name;
        $service->description = $request->description;

        $service->save();

        Toastr::success('Service Successfully Created', 'Success');

        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        return view('backend.service.edit', compact('service'));
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
        $this->validate($request, [

            'name'  => 'required',
            'description'  => 'required',
        ]);

        $service = Service::find($id);

        $service->name = $request->name;
        $service->description = $request->description;

        $service->save();

        Toastr::success('Service Successfully Updated', 'Success');

        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if (!is_null($service)) {

            $service->delete();
        }

        Toastr::success('Service Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $service = Service::findOrFail($request->id);
        $service->status = $request->status;

        // if ($service->status === 0) {
        //     return 0;
        // }

        $service->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
