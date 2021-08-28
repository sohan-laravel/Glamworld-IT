@extends('backend.layouts.app')

@section('title')
    service Edit
@endsection

@section('css')
   
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">service Edit</h3>

            <div class="container">
                <a href="{{ route('admin.service.index') }}" class="btn btn-outline-info btn-sm float-right">
                   <i class="fas fa-plus-circle fa-w-20"></i><span> Back</span>
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <form action="{{ route('admin.service.update', $service->id) }}" method="post">

                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $service->name }}" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="mytextarea" cols="30" rows="10">{{ $service->description }}</textarea>
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