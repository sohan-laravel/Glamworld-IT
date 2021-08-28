<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->get();
        return view('backend.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.product.create', compact('categories'));
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

            'image_one'  => 'required|image',
            'image_two'  => 'required|image',
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->link = $request->link;

        if ($request->hasFile('image_one')) {
            //insert that image
            $productImage = $request->file('image_one');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $productImage->getClientOriginalExtension();
            $location = public_path('frontend/images/productImage/' . $imgName);
            Image::make($productImage)->save($location);


            $product->image_one = $imgName;
        }
        if ($request->hasFile('image_two')) {
            //insert that image
            $productImage = $request->file('image_two');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $productImage->getClientOriginalExtension();
            $location = public_path('frontend/images/productLinkImage/' . $imgName);
            Image::make($productImage)->save($location);


            $product->image_two = $imgName;
        }

        $product->save();

        Toastr::success('Product Successfully Created', 'Success');

        return redirect()->route('admin.product.index');
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
        $categories = Category::get();
        $product = Product::find($id);

        return view('backend.product.edit', compact('product', 'categories'));
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
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->link = $request->link;


        if ($request->image_one > 0) {

            if (file_exists(public_path('frontend/images/productImage/' . $product->image_one))) {
                unlink(public_path('frontend/images/productImage/' . $product->image_one));
            }

            //insert that image
            $productImage = $request->file('image_one');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $productImage->getClientOriginalExtension();
            $location = public_path('frontend/images/productImage/' . $imgName);
            Image::make($productImage)->save($location);


            $product->image_one = $imgName;
        }
        if ($request->image_two > 0) {

            if (file_exists(public_path('frontend/images/productLinkImage/' . $product->image_two))) {
                unlink(public_path('frontend/images/productLinkImage/' . $product->image_two));
            }

            //insert that image
            $productImage = $request->file('image_two');
            $imgName = rand(1111, 9999) . date('.d-m-y.') . '.' . $productImage->getClientOriginalExtension();
            $location = public_path('frontend/images/productLinkImage/' . $imgName);
            Image::make($productImage)->save($location);


            $product->image_two = $imgName;
        }

        $product->save();

        Toastr::success('Product Successfully Updated', 'Success');

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!is_null($product)) {

            if (file_exists(public_path('frontend/images/productImage/' . $product->image_one))) {
                unlink(public_path('frontend/images/productImage/' . $product->image_one));
            }
            if (file_exists(public_path('frontend/images/productLinkImage/' . $product->image_two))) {
                unlink(public_path('frontend/images/productLinkImage/' . $product->image_two));
            }

            $product->delete();
        }

        Toastr::success('Product Successfully Deleted', 'Success');

        return back();
    }

    public function inactive(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status;

        // if ($product->status === 0) {
        //     return 0;
        // }

        $product->save();
        //Toastr::success('Status Successfully Changed', 'Success');
        return 1;
    }
}
