$(document).ready(function(){
    $('.add_to_cart').click(function () {
        const id = $(this).attr("id");
        $.post(`${mainUrl}/cart/addAjax/${id}`, {}, function (data) {
            $("#cart_count").html(data);
        });
        return false;
    });
});

// $(document).ready(function(){
//     const addToCart = $('.add_to_cart');
//     const cart_value = $('#cart_count');
//
//     let counter = 1;
//
//     $.each(addToCart, function(){
//         $(this).bind('click', function(){
//             const id = ($(this).attr('id'));
//             $.post(`${mainUrl}/cart/addAjax/${id}`, {}, function (data) {
//             $("#cart_count").html(data);
//         });
//         })
//     })
// });