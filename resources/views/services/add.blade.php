@extends('layouts.default')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Service</h1>
        <a href="{{ url('admin/services/list') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> List</a>

    </div>

    <!-- Content Row -->

    <div class="row">
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Service</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type_name">Vehicle Type:</label>

                            <select id="vehicle_type" class="form-control" name="vehicle_type" required>
                                <option value="">Select Vehicle Type</option>
                                @foreach ($vehicleTypes as $obj)
                                    <option value="{{ $obj->id }}">{{ $obj->type_name }} </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="type_name">Vehicle Model Type:</label>

                            <select id="vehicle_model_type" class="form-control" name="vehicle_model_type" required>
                                <option value="">Select Vehicle Model Type</option>
                                @foreach ($vehicleModelType as $obj)
                                    <option value="{{ $obj->id }}">{{ $obj->model_type }} </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type_name">Vehicle Model:</label>

                            <select id="vehicle_model" class="form-control" name="vehicle_model" required>
                                <option value="">Select Vehicle Model</option>
                                @foreach ($vehicleModel as $obj)
                                    <option value="{{ $obj->id }}">{{ $obj->model_name }} </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type_name">Category:</label>
                            <input id="category" placeholder="Please enter category" class="form-control" name="category"
                                required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type_name">Charge per km:</label>
                            <input id="charge_per_km" placeholder="Please enter charge per km" class="form-control" name="charge_per_km"
                                required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type_name">GST % :</label>
                            <input id="gst" placeholder="Please enter gst" class="form-control" name="gst"
                                required />
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ">
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
    <script src="{{ url('/public/admin-theme') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/public/admin-theme') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('/public/admin-theme') }}/js/demo/datatables-demo.js"></script>
@stop
