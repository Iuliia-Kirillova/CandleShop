$(document).ready(function(){
    $('.add_to_cart').click(function () {
        const id = $(this).attr("id");
        $.post(`${mainUrl}/cart/add/${id}`, {}, function (data) {
            $("#cart_count").html(data);
        });
        return false;
    });
});

