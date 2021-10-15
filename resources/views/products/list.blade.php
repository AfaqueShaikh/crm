@extends('layouts.default')
@section('content')
	<style type="text/css">
		.product-item .input-group.bootstrap-touchspin {
		    display: none;
		}
	</style>
	{{-- <section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Shop</h1>
						<ol class="breadcrumb">
							<li><a href="index.html">Home</a></li>
							<li class="active">shop</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

	<section class="products section">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="widget">
						<h4 class="widget-title">Short By</h4>
						<form method="post" action="#">
							<div class="form-group">
								<select class="form-control" id="brand" onchange="getModel(this)">
								   <option>Select Manufacturer</option>
								   @foreach($brandData as $brand)
								   <option value="{{$brand->id}}" @if($requestData['brand'] == $brand->id) selected @endif>{{ucwords($brand->brand_name)}}</option>
								   @endforeach
								</select>
							</div>

							<div class="form-group">
								<select class="form-control" id="model"  onchange="getYear(this)">
								   <option value="">Select Model</option>
								</select>
								</div>
						  
								<div class="form-group">
								<select class="form-control" id="year" onchange="getFuel(this)">
								   <option>Select Year</option>
								</select>
								</div>
						  
								<div class="form-group">
								<select class="form-control" id="fuel" onchange="getVariant(this)">
								   <option>Select Fuel Engine</option>
								   <option>2000</option>
								</select>
								</div>
						  
								<div class="form-group">
								<select class="form-control" id="variant" onchange="searchProduct()" >
								   <option>Select Variant</option>
								   
								</select>
								</div>
	                    </form>
		            </div>
					<div class="widget product-category">
						<h4 class="widget-title">Categories</h4>
						<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
							@foreach($categoryData as $category)
						  	<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="heading{{$category->id}}">
							      	<h4 class="panel-title">
							        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapse{{$category->id}}">
											{{$category->name}}
							        	</a>
							      	</h4>
							    </div>
						    <div id="collapse{{$category->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$category->id}}">
								<div class="panel-body">
									<ul>

										@foreach($category->subCategories as $subCategory)
										<li><a href="#!">{{$subCategory->name}}</a> <input class="sub-category" style="float:right" type="checkbox" value="{{$subCategory->id}}" ></li>
										@endforeach

									</ul>
								</div>
						    </div>
						  </div>
						  @endforeach
						  
						</div>
						
					</div>
				</div>
				<div class="col-md-9">
					<div class="row" id="result">
						@include('partials._messages')
						@if(count($variantProductData) > 0)
							@foreach($variantProductData as $prod)
								<div class="col-md-4">
									<div class="product-item">
										<div class="product-thumb">
											{{-- <span class="bage">Sale</span> --}}
											<img class="img-responsive" src="{{ url('/public/images/logo.png') }}" alt="product-img" />
											<div class="preview-meta">
												<ul>
													{{-- <li>
														<span  data-toggle="modal" data-target="#product-modal">
															<i class="tf-ion-ios-search-strong"></i>
														</span>
													</li>
													<li>
								                        <a href="#!" ><i class="tf-ion-ios-heart"></i></a>
													</li> --}}
													<li>
														<form method="post" method="post" action="{{ url('add-to-cart') }}">
															{{ csrf_field() }}
															<input type="hidden" name="product_id" value="{{ $prod->product->id }}">

															<input type="hidden" value="1" name="product-quantity">
															<button type="submit"><i class="tf-ion-android-cart"></i></button>
															{{-- <input type="submit" class="btn btn-main mt-20" value="Add To Cart"> --}}
														</form>
														{{-- <a href="#!"><i class="tf-ion-android-cart"></i></a> --}}
													</li>
												</ul>
					                      	</div>
										</div>
										<div class="product-content">
											<h4><a href="{{ url('/products/') }}/{{$prod->product->id}}">{{ $prod->product->product_name.' - '.$prod->product->make->name }}</a></h4>
											<p class="mb-0">{{ $prod->product->product_no }}</p>
											<p class="price">{{ $prod->product->mrp }}</p>
										</div>
									</div>
								</div>
							@endforeach
						@endif
						</div>		
							<!-- Modal -->
							<div class="modal product-modal fade" id="product-modal">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<i class="tf-ion-close"></i>
								</button>
								  <div class="modal-dialog " role="document">
									<div class="modal-content">
										  <div class="modal-body">
											<div class="row">
												<div class="col-md-8 col-sm-6 col-xs-12">
													<div class="modal-image">
														<img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
													</div>
												</div>
												<div class="col-md-4 col-sm-6 col-xs-12">
													<div class="product-short-details">
														<h2 class="product-title">GM Pendant, Basalt Grey</h2>
														<p class="product-price">$200</p>
														<p class="product-short-description">
															Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
														</p>
														<a href="cart.html" class="btn btn-main">Add To Cart</a>
														<a href="product-single.html" class="btn btn-transparent">View Product Details</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								  </div>
							</div><!-- /.modal -->		
				</div>
			
			</div>
		</div>
	</section>
@stop

@section('footer')
<script>

	var page_no = 1;
	function getModel(ele)
	{
 
	   var url = base_url+"/get-models"
	   $.ajax({
		  url: url,
		  data:{brand_id:$("#brand").val()},
		  success: function(result){
			 var str="<option>Select Model</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.model_name + '</option>'
				   });
				   console.log(str);
				   $('#model').html(str);
 
				   var str="<option>Select Year</option>";
				   $('#year').html(str);
 
				   var str="<option>Select Fuel Engine</option>";
				   $('#fuel').html(str);
				   
				   var str="<option>Select Variant</option>";
				   $('#variant').html(str);
	   }
	});
	}
 
	function getYear(ele)
	{
 
	   var url = base_url+"/get-years"
	   $.ajax({
		  url: url,
		  data:{
			 brand_id:$("#brand").val(),
			 model_id:$("#model").val()
		  },
		  success: function(result){
			 var str="<option>Select Year</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.year_name + '</option>'
				   });
				   console.log(str);
				   $('#year').html(str);
 
				   var str="<option>Select Fuel Engine</option>";
				   $('#fuel').html(str);
				   
				   var str="<option>Select Variant</option>";
				   $('#variant').html(str);
	   }
	});
	}
 
	function getFuel(ele)
	{
 
	   var url = base_url+"/get-fuels"
	   $.ajax({
		  url: url,
		  data:{
			 brand_id:$("#brand").val(),
			 model_id:$("#model").val(),
			 year_id:$("#year").val()
		  },
		  success: function(result){
			 var str="<option>Select Fuel Engine</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.fuel_name + '</option>'
				   });
				   console.log(str);
				   $('#fuel').html(str);
 
 
				   var str="<option>Select Variant</option>";
				   $('#variant').html(str);
	   }
	});
	}
 
	function getVariant(ele)
	{
 
	   var url = base_url+"/get-variants"
	   $.ajax({
		  url: url,
		  data:{
			 brand_id:$("#brand").val(),
			 model_id:$("#model").val(),
			 year_id:$("#year").val(),
			 fuel_id:$("#fuel").val()
		  },
		  success: function(result){
			 var str="<option>Select Variant</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.variant_name + '</option>'
				   });
				   
				   $('#variant').html(str);
	   }
	});
	}

	function searchProduct(){
		page_no = 0;
		var sub_categories = [];
	   var sub_categories_elements = $(".sub-category:checked");

	if(sub_categories_elements.length>0)
	{
		$(".sub-category:checked").each(function(i, obj){
			sub_categories.push($(obj).val())
		})
	   
	}
		var url = base_url+"/search-product"
	   $.ajax({
		  url: url,
		  data:{
			variant_id: $("#variant").val(),
			sub_categories:sub_categories,
			page_no: page_no
		  },
		  success: function(result){
				   $('#result').html(result);
	   }
	});

	}

	function loadData()
	{
		loadModel();
	}

	function loadModel(ele)
	{
 
	   var url = base_url+"/get-models"
	   $.ajax({
		  url: url,
		  data:{brand_id:$("#brand").val()},
		  success: function(result){
			 var str="<option>Select Model</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.model_name + '</option>'
				   });
				   console.log(str);
				   $('#model').html(str);
 
				   $("#model").val("{{$requestData['model']}}")
				   var str="<option>Select Year</option>";
				   $('#year').html(str);
 
				   var str="<option>Select Fuel Engine</option>";
				   $('#fuel').html(str);
				   
				   var str="<option>Select Variant</option>";
				   $('#variant').html(str);

				   loadYear();
	   }
	});
	}

	function loadYear(ele)
	{
 
	   var url = base_url+"/get-years"
	   $.ajax({
		  url: url,
		  data:{
			 brand_id:$("#brand").val(),
			 model_id:$("#model").val()
		  },
		  success: function(result){
			 var str="<option>Select Year</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.year_name + '</option>'
				   });
				   console.log(str);
				   $('#year').html(str);
 
				   var str="<option>Select Fuel Engine</option>";
				   $('#fuel').html(str);
				   
				   var str="<option>Select Variant</option>";
				   $('#variant').html(str);

				   $("#year").val("{{$requestData['year']}}")
				   loadFuel();
			
				   
	   }
	});
	}

	function loadFuel(ele)
	{
 
	   var url = base_url+"/get-fuels"
	   $.ajax({
		  url: url,
		  data:{
			 brand_id:$("#brand").val(),
			 model_id:$("#model").val(),
			 year_id:$("#year").val()
		  },
		  success: function(result){
			 var str="<option>Select Fuel Engine</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.fuel_name + '</option>'
				   });
				   console.log(str);
				   $('#fuel').html(str);
 
 
				   var str="<option>Select Variant</option>";
				   $('#variant').html(str);

				   $("#fuel").val("{{$requestData['fuel']}}")
				   loadVariant();
				   
	   }
	});
	}

	function loadVariant(ele)
	{
 
	   var url = base_url+"/get-variants"

	

	   $.ajax({
		  url: url,
		  data:{
			 brand_id:$("#brand").val(),
			 model_id:$("#model").val(),
			 year_id:$("#year").val(),
			 fuel_id:$("#fuel").val(),
			
		  },
		  success: function(result){
			 var str="<option>Select Variant</option>";
			 $.each(result.data, function (index, value) {
					 // APPEND OR INSERT DATA TO SELECT ELEMENT.
				   str+=    '<option value="' + value.id + '">' + value.variant_name + '</option>'
				   });
				   
				   $('#variant').html(str);

				   $("#variant").val("{{$requestData['variant']}}")
	   }
	});
	}


	function loadMoreProduct(page_no ){

var sub_categories = [];
var sub_categories_elements = $(".sub-category:checked");

if(sub_categories_elements.length>0)
{
$(".sub-category:checked").each(function(i, obj){
	sub_categories.push($(obj).val())
})

}
var url = base_url+"/search-product"
$.ajax({
  url: url,
  data:{
	variant_id: $("#variant").val(),
	sub_categories:sub_categories,
	page_no: page_no
  },
  success: function(result){
		   $('#result').append(result);
}
});

}
	$(function(){
		loadData();

		$(".sub-category").click(function(){
			
			searchProduct();
		});

		$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
			page_no++;
		   loadMoreProduct(page_no);
    }
});
	})
 </script>
 @stop