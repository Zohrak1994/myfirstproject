@extends('layouts.header')
@section('title','Add')
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
        <div class="span6">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Add products</li>
          </ul>
          <h3>ADD PRODUCTS</h3> 
          <form class="form-horizontal" method="post" acttion="{{'/add'}}"  enctype="multipart/form-data">
          @csrf
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="input01">Product Name</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="input01" name="name">
                  @if ($errors->has('name'))
            	<div style="color:red">{{$errors->first('name')}}</div>
              @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="input11">Count</label>
                <div class="controls">
                  <input type="number" class="input-xlarge" id="input11"  name="count">
                  @if ($errors->has('count'))
            	<div style="color:red">{{$errors->first('count')}}</div>
              @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="Price">Price</label>
                <div class="controls">
                  <input type="number" class="input-xlarge" id="Price"  name="price">
                  @if ($errors->has('price'))
            	<div style="color:red">{{$errors->first('price')}}</div>
              @endif
                </div>
              </div>
               <div class="control-group">
                  <label class="control-label" for="forInp">Images</label>
                  <div class="controls">
                    <label class="control-label btn " style="width: 90px" for="Images" id="forInp" >Select images</label>
                    <input type="file" class="hidden" id="Images"  name="images[]" accept="image/*" multiple>
                    @if ($errors->has('images'))
                    <div style="color:red">{{$errors->first('images')}}</div>
                      @endif
                  </div>

              </div>

              <div class="control-group">
                <label class="control-label" for="textarea">Description</label>
                <div class="controls">
                  <textarea class="input-xlarge" id="textarea" rows="3" style="height:65px"  name="description"></textarea>
                  @if ($errors->has('description'))
            	<div style="color:red">{{$errors->first('description')}}</div>
              @endif 
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="multiSelect">Category</label>
                <div class="controls">
                  <div class="btn-group">

                    <select class="btn btn-small" id="multiSelect" name="category">
                        <option disabled selected>Categories</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                         @endforeach
                    </select>
                  </div>
                  @if ($errors->has('category'))
            	<div style="color:red">{{$errors->first('category')}}</div>
              @endif 
                </div> 
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button class="btn">Cancel</button>
              </div>
            </fieldset>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- MainBody End ============================= -->
  <!-- Footer ================================================================== -->
  @endsection