function getBaseURL (x) {
    return location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/"+x;
 }
 let total = 0
 $('.price').each(function(){
     let price = parseInt($(this).html())
     total =total+price
   });
   $(".total").html(total)

$('.minus').click(function(){
    let this_is = $(this)
    this_is.prop('disabled', true)
    let count=$(this).parent().find('.count').html()
    let count1 = count
    let tr = $(this).parents(".tr")
    let id = $(this).data('id')
    let tihisPrice = $(this).parent().parent().parent().find(".price").html()
    $(this).parent().parent().parent().find(".price").html(tihisPrice-(tihisPrice/count))
    count--
    jQuery.ajax({
        url: getBaseURL ('shoping-cart'),
        type: 'POST',
        data: {
            name: 'minus',
            id:id,
            count:count
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            if(result == "deleted"){
            tr.remove()
            }
            $('#'+id).html(count)
            this_is.prop('disabled', false)

            let totalPrice = parseInt($(".total").html())
            $(".total").html(totalPrice-(tihisPrice/count1))
        }
    });
})

$('.plus').click(function(){
    let this_is = $(this)
    this_is.prop('disabled', true)
    let count=$(this).parent().find('.count').html()
    let id = $(this).data('id')
    let productCount=+$(this).parent().find('.productCount').val()
    let tihisPrice = +$(this).parent().parent().parent().find(".price").html()
    let itemPrice=tihisPrice/count
    let tihisPrice1 = $(this).parent().parent().parent().find(".price")
    count++
    if(count>productCount){
        alert("Not available in the store")
        this_is.prop('disabled', false)
    }else{
    jQuery.ajax({
        url: getBaseURL ('shoping-cart'),
        type: 'POST',
        data: {
            name: 'plus',
            id:id,
            count:count
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            // console.log(result)
            // console.log(count)
            $('#'+id).html(count)
            this_is.prop('disabled', false)
            tihisPrice1.html(tihisPrice+itemPrice)
            let totalPrice = parseInt($(".total").html())
            $(".total").html(totalPrice+itemPrice)
            
        }
    });
}
})


$('.deleteCart').click(function(){
    let id = $(this).data('id')
    let tr = $(this).parents(".tr")
    let price =parseInt($(this).parent().parent().parent().find(".price").html())
    let total = parseInt($('.total').html())
    console.log(typeof(total))
    console.log(id)
    jQuery.ajax({
        url: getBaseURL ('shoping-cart'),
        type: 'POST',
        data: {
            name: 'deleteCart',
            id:id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            tr.remove()
            $('.total').html(total-price)
        }
    });
})

$('.moveToWishlist').click(function(){
    let id = $(this).data('id')
    let productId=$(this).parents().find('.productId').val()
    let tr = $(this).parents(".tr")
    let price =parseInt($(this).parent().parent().parent().find(".price").html())
    let total = parseInt($('.total').html())
    console.log(productId)
    jQuery.ajax({
        url: getBaseURL ('shoping-cart'),
        type: 'POST',
        data: {
            name: 'moveToWishlist',
            productId:productId,
            id:id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            tr.remove()
            $('.total').html(total-price)
            alert('The item has been added to your wishlist')
        }
    });
})
$('.moveToCart').click(function(){
    let id = $(this).data('id')
    let tr = $(this).parents(".tr")
    jQuery.ajax({
        url: getBaseURL ('wishlist'),
        type: 'POST',
        data: {
            name: 'moveToCart',
            id:id
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            // console.log(result)
            tr.remove()
            alert('The item has been added to your cart')
        }
    });
})

$('.deleteWishlist').click(function(){
    let id = $(this).data('id')
    let tr = $(this).parents(".tr")
    console.log(id)
    jQuery.ajax({
        url: getBaseURL ('wishlist'),
        type: 'POST',
        data: {
            name: 'deleteWishlist',
            id:id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(result){
            tr.remove()
            alert('The item has been deleted')
        }
    });
})
// let productsId = []
// $('.productId').each(function(){
//     let id = parseInt($(this).val())
//     productsId.push(id)
//   });
//   console.log(productsId)count


$('.checkout').click(function(){
    $('.errorCheckout').html("")
    let total = $(".total").html()

    
    let products = []
    let i=0
    $('.productId').each(function(){
        let id = parseInt($(this).val())
        products.push({'id': id})
    });
    let l=0
    $('.productCount').each(function(){
        let productCount = parseInt($(this).val())
        products[l]['productCount']=productCount
        l++
    });
    $('.count').each(function(){
        let count = parseInt($(this).html())
        products[i]['count']=count
        i++
    });
    if(products.length!=0){
        jQuery.ajax({
            url: getBaseURL ('shoping-cart'),
            type: 'POST',
            data: {
                name: 'checkout',
                total:total,
                products:products
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result){
                $('.tr').parent().remove()
            }
        });
    }else{
        $('.errorCheckout').html('Your cart is empty')
    }
})