@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success: </strong>{{Session::get('success')}}
	</div>
@endif

@if(Session::has('fails'))
	<div class="alert alert-danger alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error: </strong>{{Session::get('fails')}}
	</div>
@endif

@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error: </strong>{{Session::get('error')}}
	</div>
@endif

@if(count($errors)>0)
	<div class="alert alert-danger alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</div>
@endif

