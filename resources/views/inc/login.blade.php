<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	@if($errors->has('mEmail') || $errors->has('mPassword'))
	<div id="login" class="modal  fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
	@else;
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
	@endif
	 
		  <div class="modal-header">
			<button type="button" class="close modalClose" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action="{{'/'}}" method="post">
				@csrf
			  <div class="control-group">								
				<input type="text" id="inputEmail" placeholder="Email" name="mEmail">
			  </div>
			  @if ($errors->has('mEmail'))
            	<div style="color:red" class="error">{{$errors->first('mEmail')}}</div>
              @endif
			  <div class="control-group">
				<input type="password" id="inputPassword" placeholder="Password" name="mPassword">
			  </div>
			  @if ($errors->has('mPassword'))
            	<div style="color:red" class="error">{{$errors->first('mPassword')}}</div>
              @endif
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			  <button class="btn btn-success">Sign in</button>
			</form>		
			
			<button class="btn modalClose" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>