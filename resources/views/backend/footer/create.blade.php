@extends('backend.layouts.app')

@section('title')
    footer Create
@endsection

@section('css')
   
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">footer Add</h3>

            <div class="container">
                <a href="{{ route('admin.footer.index') }}" class="btn btn-outline-info btn-sm float-right">
                   <i class="fas fa-plus-circle fa-w-20"></i><span> Back</span>
                </a>
            </div>
        </div>

        <div class="card-body">
    
            <form action="{{ route('admin.footer.store') }}" method="post">

                @csrf

                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter address">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                </div>

                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" name="phone2" placeholder="Enter phone 2">
                </div>

                <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Submit</button>
            </form>

        </div>
    </div>
</div>
   
@endsection

@section('js')


@endsection