<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Hero;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Image;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hero = Hero::orderBy('id', 'desc')->get();
        return view('backend.hero.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hero.create');
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

            'image'  => 'required|image',
        ]);

        $hero = new Hero();

        $hero->name = $request->name;
        $hero->link = $request->link;
        $hero->description = $request->description;
        $hero->slug = Str::slug($request->name, '-');


        if ($request->hasFile('image')) {
            //insert that image
            $heroImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $heroImage->getClientOriginalExtension();
            $location = public_path('frontend/images/heroImage/' . $imgName);
            Image::make($heroImage)->save($location);


            $hero->image = $imgName;
        }

        $hero->save();

        Toastr::success('Hero Successfully Created', 'Success');

        return redirect()->route('admin.hero.index');
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
        $hero = Hero::find($id);

        return view('backend.hero.edit', compact('hero'));
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
        $hero = Hero::find($id);

        $hero->name = $request->name;
        $hero->link = $request->link;
        $hero->description = $request->description;
        $hero->slug = Str::slug($request->name, '-');


        if ($request->image > 0) {

            if (file_exists(public_path('frontend/images/heroImage/' . $hero->image))) {
                unlink(public_path('frontend/images/heroImage/' . $hero->image));
            }

            //insert that image
            $heroImage = $request->file('image');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $heroImage->getClientOriginalExtension();
            $location = public_path('frontend/images/heroImage/' . $imgName);
            Image::make($heroImage)->save($location);


            $hero->image = $imgName;
        }

        $hero->save();

        Toastr::success('Hero Successfully Updated', 'Success');

        return redirect()->route('admin.hero.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Hero::find($id);

        if (!is_null($hero)) {

            if (file_exists(public_path('frontend/images/heroImage/' . $hero->image))) {
                unlink(public_path('frontend/images/heroImage/' . $hero->image));
            }

            $hero->delete();
        }

        Toastr::success('Hero Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $hero = Hero::findOrFail($request->id);
        $hero->status = $request->status;

        // if ($hero->status === 0) {
        //     return 0;
        // }

        $hero->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
