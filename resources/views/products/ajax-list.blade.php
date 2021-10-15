@if(count($products) > 0)
@foreach($products as $prod)
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
								<input type="hidden" name="product_id" value="{{ $prod->id }}">

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
				<h4><a href="{{ url('/products/') }}/{{$prod->id}}">{{ $prod->product_name.' - '.$prod->make->name }}</a></h4>
				<p class="mb-0">{{ $prod->product_no }}</p>
				<p class="price">{{ $prod->mrp }}</p>
			</div>
		</div>
	</div>
@endforeach
@endif