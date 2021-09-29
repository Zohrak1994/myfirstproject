<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="{{asset('themes/images/ico-cart.png')}}" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu "><a> Orders</a>
			<ul style="display:none">
			@foreach($orders as $order)
				<li><a class="active" href="{{'/orders/'.$order['id']}}"><i class="icon-chevron-right"></i>Order N. {{$order['id']}} </a></li>
			@endforeach
				</ul>
			</li>
