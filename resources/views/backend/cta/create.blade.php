@extends('backend.layouts.app')

@section('title')
    CTA Create
@endsection

@section('css')
   
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">CTA Add</h3>

            <div class="container">
                <a href="{{ route('admin.cta.index') }}" class="btn btn-outline-info btn-sm float-right">
                   <i class="fas fa-plus-circle fa-w-20"></i><span> Back</span>
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <form action="{{ route('admin.cta.store') }}" method="post">

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
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