$(".modalClose").click(function(){
    $( "#login" ).addClass( "hide" );
    $(".error").remove()
})
function getBaseURL (x) {
    return location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/"+x;
 }

$('.search').click(function(){
  $('.searchResult').html("")
    let priceStarting = $('#priceStarting').val()
    let priceOver = $('#priceOver').val()
    jQuery.ajax({
        url: getBaseURL ('all'),
        type:'GET',
        data: {
            name:'search',
            priceStarting:priceStarting,
            priceOver:priceOver,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
           if(result!=""){
            
           $('.searchResult').html(result)
        }else{
            $('.searchResult').html(`<h3>The search did not find anything</h3>`)
        }
        }
    });
})
$('.addCard').click(function(){
    let id = $(this).data('id')
    jQuery.ajax({
        url: getBaseURL ('all'),
        type: 'POST',
        data: {
            name: 'addCard',
            id:id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            if(result=='notHave'){
                alert('The item has been added to your cart')
            }else{
                alert('Already in your cart from that product') 
            }
        }
    });
})
$('.addWishlist').click(function(){
    let id = $(this).data('id')
    jQuery.ajax({
        url: getBaseURL ('all'),
        type: 'POST',
        data: {
            name: 'addWishlist',
            id:id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            if(result=='notHave'){
                alert('The item has been added to your wishlist')
            }else{
                alert('Already in your wishlist from that product') 
            }
        }
    });
})

$('.delete').click(function(){
    let id = $(this).data('id')
    //  console.log(id)
    jQuery.ajax({
        url: getBaseURL ('all'),
        type: 'POST',
        data: {
            name: 'delete',
            id:id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            if(result!=""){
                location.reload();
             }
        }
    });
})
$('.sendEmail').click(function(){
    $('.errorTeg').remove()
    let email = $('#inputEmail1').val()
    jQuery.ajax({
        url: getBaseURL ('send'),
        type: 'POST',
        data: {
            name: 'sendEmail',
            email:email
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            console.log(result)
            if(result=="not"){
                $(".error").append(`<h5 class="errorTeg" style="color:red">Not found user with this email</h5>`)
            }else{
                $('.form').html("")
                $(".form").append(`
                            <div class="span9" style="min-height:900px">
                            <div class="well">
                            <h5>Reset your password</h5><br/>
                            Enter the code in your email<br/><br/><br/>
                            <form>
                            <div class="control-group">
                                <label class="control-label" for="emailCode">E-mail Code</label>
                                <div class="controls">
                                <input class="span3"  type="text" id="emailCode" placeholder="Email Code">
                                <div class="CodeError"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="forgetpassword">Password</label>
                                <div class="controls">
                                    <input class="span3"  type="password" id="forgetpassword" placeholder="New password">
                                <div class="passerror"></div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="forgetpasswordC">Confirm Password</label>
                                <div class="controls">
                                    <input class="span3"  type="password" id="forgetpasswordC" placeholder="Confirm new password">
                                <div class="error"></div>
                                </div>
                            </div>
                            <div class="controls">
                            <button type="button" class="btn block enterCode">Update</button>
                            </div>
                            </form>
                        </div>
                `)
            }
        }
    });
})
$(document).on( 'click','.enterCode' ,function(){
    $('.errorTeg').remove()
    let code = $('#emailCode').val()
    let password = $('#forgetpassword').val()
    let Cpassword = $('#forgetpasswordC').val()
    if(password == Cpassword){
     console.log(code)
    jQuery.ajax({
        url: getBaseURL ('updatepassword'),
        type: 'POST',
        data: {
            code: code,
            password:password
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            if(result == "updated"){
            window.location.href = getBaseURL ('login')
            }else{
                $('.CodeError').append(`<h5 class="errorTeg" style="color:red">${result}</h5>`)
            }
        }
    });
    }else{
        $('.passerror').append(`<h5 class="errorTeg" style="color:red">The new password is not valid</h5>`)
    }
})