@extends('layouts.header')
@section('title','Wishlist')
@section('body')
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="{{asset('themes/images/ico-cart.png')}}" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		  <div class="thumbnail">
			<img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> Wishlist</li>
    </ul>
	<h3> Wishlist <a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>		
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				  <th colspan="4">Price</th>

				</tr>
              </thead>
              <tbody>
			@foreach($products as $product)
			
			
				<div>
				<input type="hidden" id="productCount" value="{{ $product['products']['count']}}">
				<input type="hidden" id="productId" value="{{ $product['products_id']}}">
					<tr class="tr">
					<td> <img width="60" src="{{asset('themes/images/products/'. $product['products']['photos'][0]['photo'])}}" alt=""/></td>
					<td> {{ $product['products']['name']}}<br/> {{ $product['products']['description']}}</td>
					<td>
						<div class="input-append">
							<button class="btn btn-warning moveToCart" type="button"  data-id="{{ $product['products']['id']}}">Move to<i class="icon-shopping-cart"></i></button>
							<button class="btn btn-danger deleteWishlist" type="button"  data-id="{{ $product['products']['id']}}"><i class="icon-remove icon-white"></i></button>
						</div>
						
					</td>
					<td colspan="4"> {{ $product['products']['price']}}</td>
					</tr>
				</div>
				@endforeach	

				</tbody>
            </table>		
	<a href="{{'all'}}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
@endsection