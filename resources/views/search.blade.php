@extends('layouts.header')
@section('title','Home')
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
		<li class="active">Products Name</li>
    </ul>
	<h3> Search results </h3>	
	<hr class="soft"/>
	@if(isset($category))
		@foreach($category as $cat)
		<h4>Category {{$cat['name']}} </h4>
			
		@endforeach
	@else
		<h4> ALL Categories </h4>
	@endif
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<hr class="soft"/>
<div class="tab-content">
<div class="tab-pane" id="listView">
		@foreach($products as $data)
		<div class="row">	  
			<div class="span2">
				<img src="themes/images/products/{{$data['photos'][0]->photo}}" alt=""/>
			</div>
			
			<div class="span4">
				<h3>New | Available</h3>				
				<hr class="soft"/>
				<h5>{{$data['name']}}</h5><br>
				<h5>Count: {{$data['count']}}</h5>
				<p>{{$data['description']}}</p>
				<a class="btn btn-small pull-right" href="{{'/details'}}">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> ${{$data['price']}}</h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br/>
			
			  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
			  <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>

		@endforeach

		
	</div>

	<div class="tab-pane  active" id="blockView">
			<ul class="thumbnails">
			@foreach($products as $data)
				<li class="span3">
				<div class="thumbnail">
					<a href="{{'/details'}}"><img src="themes/images/products/{{$data['photos'][0]->photo}}" alt=""/></a>
					<div class="caption">
					<h5>{{$data['name']}}</h5>
					<p> 
					{{$data['description']}}
					</p>
					<h4 style="text-align:center"><a class="btn" href="{{'/details/'.$data['id']}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">${{$data['price']}}</a></h4>
					</div>
				</div>
				</li>
				@endforeach
			</ul>
		<hr class="soft"/>
	</div>
</div>

	<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>
@endsection