<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Footer;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::orderBy('id', 'desc')->get();
        return view('backend.footer.index', compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.footer.create');
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

            'address'  => 'required',
            'email'  => 'required',
            'phone'  => 'required|numeric|digits:11',
        ]);

        $footer = new Footer();

        $footer->address = $request->address;
        $footer->email = $request->email;
        $footer->phone = $request->phone;
        $footer->phone2 = $request->phone2;

        $footer->save();

        Toastr::success('Footer Successfully Created', 'Success');

        return redirect()->route('admin.footer.index');
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
        $footer = Footer::find($id);

        return view('backend.footer.edit', compact('footer'));
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

            'address'  => 'required',
            'email'  => 'required',
            'phone'  => 'required|numeric|digits:11',
        ]);

        $footer = Footer::find($id);

        $footer->address = $request->address;
        $footer->email = $request->email;
        $footer->phone = $request->phone;
        $footer->phone2 = $request->phone2;

        $footer->save();

        Toastr::success('Footer Successfully Updated', 'Success');

        return redirect()->route('admin.footer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::find($id);

        if (!is_null($footer)) {

            $footer->delete();
        }

        Toastr::success('Footer Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $footer = Footer::findOrFail($request->id);
        $footer->status = $request->status;

        // if ($footer->status === 0) {
        //     return 0;
        // }

        $footer->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
