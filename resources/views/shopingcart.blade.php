@extends('layouts.header')
@section('title','SHOPPING CART')
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
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART <a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
	<table class="table table-bordered">
		<tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Username">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>		
			
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
			  <input type="hidden" class="products" value="{{$products}}">
			@foreach($products as $product)
			
				<div>
				<input type="hidden" class="productId" value="{{ $product['products_id']}}">
					<tr class="tr">
					<td> <img width="60" src="{{asset('themes/images/products/'. $product['products']['photos'][0]['photo'])}}" alt=""/></td>
					<td> {{ $product['products']['name']}}<br/> {{ $product['products']['description']}}</td>
					<td>
						<div class="input-append">
							
						<input type="hidden" class="productCount" value="{{ $product['products']['count']}}">
							<h6 class="span1">Count:<span id="{{ $product['products']['id']}}" class="count">{{ $product['products']['carts']->count}}</span></h6>
							<button class="btn minus" type="button" data-count="{{ $product['products']['carts']->count}}" data-id="{{ $product['products']['id']}}"><i class="icon-minus"></i></button>
							<button class="btn plus" type="button" data-count="{{ $product['products']['carts']->count}}" data-id="{{ $product['products']['id']}}"><i class="icon-plus"></i></button>
							<button class="btn btn-danger deleteCart" type="button"  data-id="{{ $product['products']['id']}}"><i class="icon-remove icon-white"></i></button>

						</div>
						<button class="btn btn-warning moveToWishlist" type="button"  data-id="{{ $product['products']['id']}}">Move to
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
								</svg>
							</button>
					</td>
					<td colspan="4" class="price"> {{ $product['products']['price']*$product['products']['carts']->count}}</td>
					</tr>
				</div>
				@endforeach	

                <tr>
                  <td colspan="5" style="text-align:right">Total Price:	</td>
                  <td class="label label-important total" style="display:block"> </td>
                </tr>
				<tr>
                  <td colspan="6" style="text-align:right">
				  	<button class="btn btn-success checkout" type="button">Checkout </button>
				  </td>
                </tr>
				
				</tbody>
				
            </table>
			
			<table class="table table-bordered">
			 <tr><th>ESTIMATE YOUR SHIPPING </th></tr>
			 <tr> 
			 <td>
				<form class="form-horizontal">
				  <div class="control-group">
					<label class="control-label" for="inputCountry">Country </label>
					<div class="controls">
					  <input type="text" id="inputCountry" placeholder="Country">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputPost">Post Code/ Zipcode </label>
					<div class="controls">
					  <input type="text" id="inputPost" placeholder="Postcode">
					</div>
				  </div>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" class="btn">ESTIMATE </button>
					</div>
				  </div>
				</form>				  
			  </td>
			  </tr>
            </table>		
	<a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
@endsection