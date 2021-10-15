@extends('layouts.default')

@section('content')
<!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin Users</h1>
    <a href="{{url('admin/admin-users/add')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Create New</a>
    
</div>

<!-- Content Row -->

    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List</h6>
                        </div>
                        <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Sr.no</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Sr.no</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $key=>$obj)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$obj->email}}</td>
                    <td>{{$obj->created_at}}</td>
                    <td><a href="{{url('admin/admin-users/edit/'.$obj->id)}}" class="btn btn-danger btn-circle">
                        <i class="fas fa-pencil-alt"></i>
                    </a></td>
                    <td><a href="{{url('admin/admin-users/delete/'.$obj->id)}}" onclick="return confirm('Are you sure to delete this record?')" class="btn btn-danger btn-circle">
                        <i class="fas fa-trash"></i>
                    </a></td>
                   
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
                     
</div>
</div>

<!-- Content Row -->


<!-- Content Row -->

@stop

@section('javascript')
<!-- Page level plugins -->
<script src="{{url('/public/admin-theme')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/public/admin-theme')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{url('/public/admin-theme')}}/js/demo/datatables-demo.js"></script>
@stop