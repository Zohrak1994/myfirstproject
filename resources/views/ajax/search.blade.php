@foreach($datas as $data)
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