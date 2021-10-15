@extends('layouts.default')

@section('content')
<!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Vehicle Model Types</h1>
    <a href="{{url('admin/vehicle-model-types/list')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                                    <label for="type_name">Vehicle Model Type:</label>
                                    <input type="text" class="form-control" name="model_type"
                                        id="name" 
                                        placeholder="Enter Vehicle Model Type"
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