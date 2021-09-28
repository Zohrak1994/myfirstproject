@extends('layouts.header')
@section('title','All products')
@section('body')
<!-- Header End====================================================================== -->
@include('inc.orders')
		</ul>
		<br/>
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
	<h3> Products Name <small class="pull-right"> 40 products are available </small></h3>	
	<hr class="soft"/>
	<p>
		Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful customers all over the country.
	</p>
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
 <a href="#search" data-toggle="tab"><span class="btn btn-large btn-success"><i class="icon-search"></i></i></span></a>
</div>
<br class="clr"/>

<div class="tab-content">


<div class="tab-pane" id="search">
		<h1>Search</h1>
		<div  class="form-horizontal span6" style="width: 100%">
		<div class="control-group">
		  <label class="control-label alignL">Search by:</label>
		  		<div class="" style="display:flex">
					<input type="number" id="priceStarting">
					<input type="number" id="priceOver">
					<button class="search btn btn-success"><i class="icon-search"></i></button>
				</div>
		</div>
		</div>
		<div class="searchResult"></div>


		
	</div>




	<div class="tab-pane" id="listView">
		<h1>All products</h1>
		@foreach($datas as $data)
		@if($data['count']>0)
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
			
			  <!-- <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a> -->
			  <button class="addCard btn btn-large btn-primary" data-id="{{$data['id']}}" type="button">Add to <i class="icon-shopping-cart"></i></button>
					  <button class="addWishlist btn btn-large btn-primary" type="button" data-id="{{$data['id']}}">Add to 
					  		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
  								<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
							</svg>
					  </button>
			  <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>
		@endif
		@endforeach

		
	</div>

	<div class="tab-pane  active" id="blockView">
		<h1>My products</h1>
			<ul class="thumbnails">
			
			@foreach($myproducts as $data)
			@if($data['count']>0)
				<li class="span3">
				<div class="thumbnail">
					<a href="{{'/details'}}"><img src="themes/images/products/{{$data['photos'][0]->photo}}" alt=""/></a>
					<div class="caption">
					<h5>{{$data['name']}}</h5>
					<p> 
					{{$data['description']}}
					</p>
					<h4 style="text-align:center">
					  <a class="btn" href="{{'/details/'.$data['id']}}"> <i class="icon-zoom-in"></i></a>

					  <button class="addCard btn" data-id="{{$data['id']}}" >Add to <i class="icon-shopping-cart"></i></button>
					  <button class="addWishlist btn" data-id="{{$data['id']}}">Add to 
					  		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
  								<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
							</svg>
					  </button>

					  <a class="btn btn-primary" href="#">${{$data['price']}}</a>
					  <a href="#{{$data['id']}}" role="button" data-toggle="modal"  style="padding-right:0" ><span class="btn btn-warning " >Edit</span></a>					
							<div id="{{$data['id']}}" class="modal hide fade in" tabindex="-1" role="dialog" aria-hidden="false" >
								<div class="modal-header">
									<button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">×</button>
									<h3>Modification</h3>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" action="{{'/update'}}" method="post" enctype="multipart/form-data">	
									
									@csrf
										<div class="form-group">
											<label class="control-label col-sm-2" for="nameproduct">Name:</label>
											<div class="col-sm-10">							
												<input class="form-control"  type="text" id="nameproduct" value="{{$data['name']}}" placeholder="Name" name="name">
											</div>
										</div>	
										<div class="form-group">
											<label class="control-label col-sm-2" for="count">Count:</label>
											<div class="col-sm-10">	
												<input class="form-control"  type="number" id="count" value="{{$data['count']}}" placeholder="Count" name="count">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2" for="price"> Price:</label>
											<div class="col-sm-10">	
												<input class="form-control" type="number" id="price" value="{{$data['price']}}" placeholder="Price" name="price">
											</div>
										</div>	
										<div class="form-group">
											<label class="control-label col-sm-2" for="description"> Description:</label>
											<div class="col-sm-10">		 
												<input class="form-control" type="text" id="description" value="{{$data['description']}}" placeholder="Description" name="description">
											</div>
										</div>	

										<div class="form-group">
										<label class="control-label" for="Images">Images</label>
										<div class="col-sm-10">
												<label class=" btn form-control"  for="Images" id="forInp" >Select images</label>
												<input type="file" class="hidden form-control" id="Images"  name="image[]" accept="image/*" multiple>
											</div>

										</div>
										<input class="form-control" type="hidden" value="{{$data['id']}}" name="id">	  

									<button class="btn btn-success edit" data-id="{{$data['id']}}">Save</button>
									</form>		
									
									<button class="btn modalClose" data-dismiss="modal" aria-hidden="true">Close</button>
								</div>
							</div>
					
					  <!-- <button class="btn btn-warning edit" data-id="{{$data['id']}}" href="#">Edit</button> -->
					  <button class="btn btn-danger delete" data-id="{{$data['id']}}" href="#">Delete</button>
					</h4>
					</div>
				</div>
				</li>
				@endif
			@endforeach
			</ul>
		<hr class="soft"/>
	</div>
</div>
	<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
	<div class="pagination">
	{{$myproducts->links('pagination::bootstrap-4')}}

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
@endsection