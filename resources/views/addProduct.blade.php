@extends('layouts.header')
@section('title','Home')
@section('body')
  <!-- Header End====================================================================== -->
  <div id="mainBody">
    <div class="container">
      <div class="row">
        <!-- Sidebar ================================================== -->
        <div id="sidebar" class="span3">
          <div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
          <ul id="sideManu" class="nav nav-tabs nav-stacked">
            <li class="subMenu open"><a> ELECTRONICS [230]</a>
              <ul>
                <li><a class="active" href="products.html"><i class="icon-chevron-right"></i>Cameras (100) </a></li>
                <li><a href="products.html"><i class="icon-chevron-right"></i>Computers, Tablets & laptop (30)</a></li>
                <li><a href="products.html"><i class="icon-chevron-right"></i>Mobile Phone (80)</a></li>
                <li><a href="products.html"><i class="icon-chevron-right"></i>Sound & Vision (15)</a></li>
              </ul>
            </li>
            <li class="subMenu"><a> CLOTHES [840] </a>
              <ul style="display:none">
                <li><a href="products.html"><i class="icon-chevron-right"></i>Women's Clothing (45)</a></li>
                <li><a href="products.html"><i class="icon-chevron-right"></i>Women's Shoes (8)</a></li>                        
                <li><a href="products.html"><i class="icon-chevron-right"></i>Women's Hand Bags (5)</a></li>  
                <li><a href="products.html"><i class="icon-chevron-right"></i>Men's Clothings  (45)</a></li>
                <li><a href="products.html"><i class="icon-chevron-right"></i>Men's Shoes (6)</a></li>                        
                <li><a href="products.html"><i class="icon-chevron-right"></i>Kids Clothing (5)</a></li>                        
                <li><a href="products.html"><i class="icon-chevron-right"></i>Kids Shoes (3)</a></li>                       
              </ul>
            </li>
            <li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
              <ul style="display:none">
                <li><a href="products.html"><i class="icon-chevron-right"></i>Angoves  (35)</a></li>
                <li><a href="products.html"><i class="icon-chevron-right"></i>Bouchard Aine & Fils (8)</a></li>                       
                <li><a href="products.html"><i class="icon-chevron-right"></i>French Rabbit (5)</a></li>  
                <li><a href="products.html"><i class="icon-chevron-right"></i>Louis Bernard  (45)</a></li>
                <li><a href="products.html"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a></li>                        
                <li><a href="products.html"><i class="icon-chevron-right"></i>Other Liquors & Wine (5)</a></li>                       
                <li><a href="products.html"><i class="icon-chevron-right"></i>Garden (3)</a></li>                       
                <li><a href="products.html"><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>                        
              </ul>
            </li>
            <li><a href="products.html">HEALTH & BEAUTY [18]</a></li>
            <li><a href="products.html">SPORTS & LEISURE [58]</a></li>
            <li><a href="products.html">BOOKS & ENTERTAINMENTS [14]</a></li>
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