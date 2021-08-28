<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\About;
use App\Model\cta;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CtaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cta = Cta::orderBy('id', 'desc')->get();
        return view('backend.cta.index', compact('cta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cta.create');
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
        ]);

        $cta = new Cta();

        $cta->name = $request->name;
        $cta->description = $request->description;

        $cta->save();

        Toastr::success('CTA Successfully Created', 'Success');

        return redirect()->route('admin.cta.index');
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
        $cta = Cta::find($id);

        return view('backend.cta.edit', compact('cta'));
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
        ]);

        $cta = Cta::find($id);

        $cta->name = $request->name;
        $cta->description = $request->description;

        $cta->save();

        Toastr::success('CTA Successfully Updated', 'Success');

        return redirect()->route('admin.cta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cta = Cta::find($id);

        if (!is_null($cta)) {

            $cta->delete();
        }

        Toastr::success('CTA Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $cta = Cta::findOrFail($request->id);
        $cta->status = $request->status;

        // if ($cta->status === 0) {
        //     return 0;
        // }

        $cta->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
