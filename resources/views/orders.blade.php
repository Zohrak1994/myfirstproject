@extends('layouts.header')
@section('title','ORDERS')
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
		<li><a href="{{'/'}}">Home</a> <span class="divider">/</span></li>
		<li class="active">Order</li>
    </ul>
	<hr class="soft"/>

	<div id="myTab" class="pull-right">
	 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
	 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
	</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
		@foreach($products as $product)
		<div class="row">	  
			<div class="span2">
				<img src="{{asset('themes/images/products/'.$product->products->photos[0]->photo)}}" alt=""/>
			</div>
			<div class="span4">
				<h3>New | Available</h3>				
				<hr class="soft"/>
				<h5>{{$product->products->name}} </h5>
				<p>
				
				{{$product->products->description}}
				</p>
				<a class="btn btn-small pull-right" href="{{'/details/'.$product->products->id}}">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
				<form class="form-horizontal qtyFrm">
				<h3> {{$product->products->price}}</h3>
				</form>
			</div>
		</div>
		<hr class="soft"/>
		@endforeach
	</div>


	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		@foreach($products as $product)
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.html"><img src="{{asset('themes/images/products/'.$product->products->photos[0]->photo)}}" alt=""/></a>
				<div class="caption">
				  <h5>{{$product->products->name}}</h5>
				  <p> 
				  {{$product->products->description}} 
				  </p>
				  <h4 style="text-align:center"><a class="btn btn-primary" href="{{'/details/'.$product->products->id}}">&euro;{{$product->products->price}}</a></h4>
				
				
				  <a href="#{{$product->products->id}}" role="button" data-toggle="modal"  style="padding-right:0" ><span class="btn btn-warning " >Add feedback</span></a>					
							<div id="{{$product->products->id}}" class="modal hide fade in" tabindex="-1" role="dialog" aria-hidden="false" >
								<div class="modal-header">
									<button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">×</button>
									<h3>Feedback</h3>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" action="{{'/orders'}}" method="post" >	
									
									@csrf

										<div class="form-group">
											<div class="col-sm-10">		 
												<textarea class="form-control" style="resize: none;width:80%;height:150px" type="text" id="feedback"  placeholder="Feedback" name="feedback"></textarea>
											</div>
										</div>	
										<input class="form-control" type="hidden" value="{{$product->products->id}}" name="id">	  

									<button class="btn btn-success edit" data-id="{{$product->products->id}}">Save</button>
									</form>		
									
									<button class="btn modalClose" data-dismiss="modal" aria-hidden="true">Close</button>
								</div>
							</div>
				
				
				
				</div>
			  </div>
			</li>
			@endforeach
		  </ul>
		  <hr class="soft"/>
	</div>
</div>
<div class="pagination">
	{{$products->links('pagination::bootstrap-4')}}

</div>
<br class="clr"/>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
@endsection