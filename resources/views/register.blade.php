@extends('layouts.header')
@section('title','Register')
@section('body')
<!-- Header End====================================================================== -->
@include('inc.orders')
		</ul>
		<br/>
		  <div class="thumbnail">
			<img src="../themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
			<div class="caption">
			  <h5>Panasonic</h5>
				<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
			</div>
		  </div><br/>
			<div class="thumbnail">
				<img src="../themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
				<div class="caption">
				  <h5>Kindle</h5>
				    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
				</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="../themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">


	<form class="form-horizontal" action="{{'/register'}}" method="post">
	@csrf
		<h4>Your personal information</h4>
		<div class="control-group">
		<label class="control-label">Title <sup>*</sup></label>
		<div class="controls">
		<select class="span1" name="gender">
			<option value="">-</option>
			<option value="Mr">Mr.</option>
			<option value="Mrs">Mrs</option>
			<option value="Miss">Miss</option>
		</select>
		@if ($errors->has('gender'))
            	<div style="color:red">{{$errors->first('gender')}}</div>
              @endif
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname1">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" name="name" placeholder="First Name">
			  @if ($errors->has('name'))
            	<div style="color:red">{{$errors->first('name')}}</div>
              @endif
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputLnam"  name="surname" placeholder="Last Name">
			  @if ($errors->has('surname'))
            	<div style="color:red">{{$errors->first('surname')}}</div>
              @endif
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="Age">Age <sup>*</sup></label>
			<div class="controls">
			  <input type="number" id="Age" name="age" placeholder="Age">
			  @if ($errors->has('age'))
            	<div style="color:red">{{$errors->first('age')}}</div>
              @endif
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="input_email" name="email" placeholder="Email">
		  @if ($errors->has('email'))
            	<div style="color:red">{{$errors->first('email')}}</div>
              @endif
		</div>
	  </div>	  
		<div class="control-group">
			<label class="control-label" for="Password">Password <sup>*</sup></label>
			<div class="controls">
			<input type="password" id="Password" name="password" placeholder="Password">
			@if ($errors->has('password'))
            	<div style="color:red">{{$errors->first('password')}}</div>
              @endif
			</div>
		</div>	  
		<div class="control-group">
			<label class="control-label" for="CPassword">Confirm password <sup>*</sup></label>
			<div class="controls">
			<input type="password" id="cpassword" name="cpassword" placeholder="Confirm password">
			@if ($errors->has('password'))
            	<div style="color:red">{{$errors->first('cpassword')}}</div>
              @endif
			</div>
		</div>			
		<p><sup>*</sup>Required field	</p>
	
		<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit"  value="Register" />
				
			</div>
		</div>		
	</form>
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
@endsection;