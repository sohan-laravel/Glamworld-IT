<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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

        $category = new Category();

        $category->name = $request->name;

        $category->save();

        Toastr::success('Category Successfully Created', 'Success');

        return redirect()->route('admin.category.index');
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
        $category = Category::find($id);

        return view('backend.category.edit', compact('category'));
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

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        Toastr::success('Category Successfully Updated', 'Success');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!is_null($category)) {

            $category->delete();
        }

        Toastr::success('Category Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status;

        // if ($category->status === 0) {
        //     return 0;
        // }

        $category->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
