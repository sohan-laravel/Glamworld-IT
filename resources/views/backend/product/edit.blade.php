@extends('backend.layouts.app')

@section('title')
    product Edit
@endsection

@section('css')
   
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">product Edit</h3>

            <div class="container">
                <a href="{{ route('admin.product.index') }}" class="btn btn-outline-info btn-sm float-right">
                   <i class="fas fa-plus-circle fa-w-20"></i><span> Back</span>
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">

                @method('PUT')
                @csrf

                 <div class="form-group">
                    <label for="image">Product Category Name</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
        
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : ''  }}>{{ $category->name }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Enter Name">
                </div>

                <div class="form-group">
					<label for="image">Thumbnail Image</label> <br>
				
					<img src="{{  asset('frontend/images/productImage/' .$product->image_one) }}" width="200" class="img-fluid mt-2" alt="{{ $product->name }}" >
									
					<label class="col-md-12 col-from-label mt-5">New Thumbnail Image<span class="text-danger">*</span></label>
					<div class="col-md-12">
						<input type="file" class="form-control" name="image_one">
					</div>
				</div>

                <div class="form-group">
					<label for="image">Link Image</label> <br>
				
					<img src="{{  asset('frontend/images/productLinkImage/' .$product->image_two) }}" width="200" class="img-fluid mt-2" alt="{{ $product->name }}" >
									
					<label class="col-md-12 col-from-label mt-5">New Link Image<span class="text-danger">*</span></label>
					<div class="col-md-12">
						<input type="file" class="form-control" name="image_two">
					</div>
				</div>

                <div class="form-group">
                    <label for="link">Image Link</label>
                    <input type="text" class="form-control" name="link" value="{{ $product->link }}" placeholder="Enter Video Link Link https://.........">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="mytextarea" cols="30" rows="10">{{ $product->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Update</button>
            </form>

        </div>
    </div>
</div>
   
@endsection

@section('js')
{{-- tinymce editor --}}

    <script src="https://cdn.tiny.cloud/1/bm9h9r85nvmh9qbraq9wm4ttz6k1bngsfcs3txiq3ud8x0sk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    tinymce.init({
      selector: '#mytextarea',
   });
  </script>
@endsection