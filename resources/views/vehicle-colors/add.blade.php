@extends('layouts.default')

@section('content')
<!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Vehicle Color</h1>
    <a href="{{url('admin/vehicle-colors/list')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> List</a>
    
</div>

<!-- Content Row -->

<div class="row">
</div>
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List</h6>
                        </div>
                        <div class="card-body">
                            <form class="user" method="post"
                            >
                                <div class="row">
                                    <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Vehicle Color:</label>
                                    <input color="text" class="form-control" name="name"
                                        id="name" 
                                        placeholder="Enter Vehicle Color"
                                        required
                                        >
                                    </div>
                                    </div>
                                    </div>
                                        
                               
                               
                                <button type="submit"  class="btn btn-primary ">
                                    Add
                                </button>
                                
                             
                            </form>
                     
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