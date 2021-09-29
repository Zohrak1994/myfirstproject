@extends('layouts.header')
@section('title','Home')
@section('body')

<!-- Header End====================================================================== -->
@include('inc.orders')
		</ul>
		<br/>
		  <div class="thumbnail">
			<img src="{{asset('themes/images/products/panasonic.jpg')}}" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="{{asset('themes/images/products/kindle.png')}}" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="{{asset('themes/images/payment_methods.png')}}" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	


	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="{{asset('themes/images/products/'.$thisproduct[0]['photos'][0]['photo'])}}" title="{{$thisproduct[0]['name']}}">
				<img src="{{asset('themes/images/products/'.$thisproduct[0]['photos'][0]['photo'])}}" style="width:100%" alt="{{$thisproduct[0]['name']}}"/>
            </a>
			<div id="differentview" class="moreOptopm carousel slide">
			<div class="carousel-inner">
                  <div class="item active">
					  @foreach($thisproduct[0]['photos'] as $photo)
                   <a href="{{asset('themes/images/products/'.$photo['photo'])}}"> <img style="width:29%" src="{{asset('themes/images/products/'.$photo['photo'])}}" alt=""/></a>
					@endforeach
				</div>

                </div>
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3>{{$thisproduct[0]['name']}}  </h3>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>${{$thisproduct[0]['price']}}</span></label>
					<div class="controls">
						<label for=""><span> Count: {{$thisproduct[0]['count']}}</span></label>
					<input type="number" class="span1" placeholder="Qty."/>
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<h4>100 items in stock</h4>
				<form class="form-horizontal qtyFrm pull-right">
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span2">
						  <option>Black</option>
						  <option>Red</option>
						  <option>Blue</option>
						  <option>Brown</option>
						</select>
					</div>
				  </div>
				</form>
				<hr class="soft clr"/>
				<p>{{$thisproduct[0]['description']}}</p>
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
            	<div class="tab-pane fade active in" id="home">

					<h3>Feedbacks</h3>
					<div>
						@foreach($thisproduct[0]['feedback'] as $feedback)
						<div>
							<h4></h4>
							<h5>{{$feedback['feedback']}}</h5>
							<hr class="soft"/>
						</div>
						@endforeach
					</div>

           	 	</div>
			</div>
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
@endsection