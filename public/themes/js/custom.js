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