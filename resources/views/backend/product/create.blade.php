@extends('backend.layouts.app')

@section('title')
    product Create
@endsection

@section('css')
   
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">product Add</h3>

            <div class="container">
                <a href="{{ route('admin.product.index') }}" class="btn btn-outline-info btn-sm float-right">
                   <i class="fas fa-plus-circle fa-w-20"></i><span> Back</span>
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="image">Product Category Name</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Catgeory Name</option>
                        @foreach ($categories as $category)
        
                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="image">Thumbnail Image</label>
                    <input type="file" class="form-control" name="image_one">
                </div>

                <div class="form-group">
                    <label for="image">Link Image</label>
                    <input type="file" class="form-control" name="image_two">
                </div>

                <div class="form-group">
                    <label for="link">Site Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Enter Site Link https://.........">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="mytextarea" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Submit</button>
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