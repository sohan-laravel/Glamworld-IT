@extends('backend.layouts.app')

@section('title')
    order
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">order</h3>

            <div class="container">
                
            </div>
        </div>

        <div class="card-body">
    <table id="orderTable" class="display" style="width:100%">
        <thead>
            <tr>
               <th>SL NO</th>
                <th>Name</th>          
                <th>Email</th>    
                <th>Subject</th>    
                <th>Message</th>    
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($order as $row)

           <tr>
               <td>{{ $loop->index + 1 }}</td>
               <td>{{ $row->name }}</td>
               <td>{{ $row->email }}</td>
               <td>{{ $row->subject }}</td>
               <td>{{ $row->message }}</td>
               
               <td>

                    <form action="{{ route('admin.index.destroy', $row->id) }}" id="delete_form" method="POST">
                        @csrf

                        @method('DELETE')

                        <button type="submit" id="delete_order" class="btn btn-outline-danger btn-sm mt-2"><i class="fas fa-trash"></i></button>
                    </form>

               </td>
           </tr>

           @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>SL NO</th>
                <th>Name</th>          
                <th>Email</th>    
                <th>Subject</th>    
                <th>Message</th>    
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

        </div>
    </div>
</div>
   
@endsection

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    

    <script>

        // Datatable 

        $(document).ready(function() {
            $('#orderTable').DataTable();
        });

        // Delete function

            $(document).on('click', '#delete_order', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            $('#delete_form').attr('action', url);
            swal.fire({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#delete_form').submit();
                }else{
                    swal.fire('Your File is Safe!');
                }
            });
        });


        //

        

    </script>

@endsection