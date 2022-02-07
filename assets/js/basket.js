$(document).ready(function(){
    $('.add_to_cart').click(function () {
        let id = $(this).attr("id");
        $.post(`${mainUrl}/cart/addAjax/${id}`, {}, function (data) {
            $("#cart_count").html(data);
        });
        return false;
    });
});