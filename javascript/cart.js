$(document).ready(function(){
    $('.addItemBtn').click(function(e){
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pimage = $form.find(".pimage").val();
        var pprice = $form.find(".pprice").val();
        var pcode = $form.find(".pcode").val();

        $.ajax({
            url : 'action.php', 
            method : 'post', 
            data : {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode},
            success:function(response){
                $("#message").html(response);
                load_cart_item_number();
            }
        });
    });

    load_cart_item_number();

    function load_cart_item_number(){
        $.ajax({
            url: 'action.php',
            method : 'get',
            data : {cartItem:"cart-item"},
            success : function(response){
                $('#cart-item').css("background-color","#32af32");
                $('#cart-item').css("color","#fff");
                $('#cart-item').css("font-size","11px");
                $('#cart-item').css("font-weight","bold");
                $('#cart-item').css("position","relative");
                $('#cart-item').css("z-index","100");
                $('#cart-item').css("width","20px");
                $('#cart-item').css("height","16px");
                $('#cart-item').css("line-height","16px");
                $('#cart-item').css("text-align","center");
                $('#cart-item').css("border-radius","9px");
                $('#cart-item').css("box-shadow","0px 1px 2px 1px rgba(0,0,0,0.2)");
                $('#cart-item').css("bottom","30px");
                $('#cart-item').css("right","-30px");
                $("#cart-item").html(response);
            }
        })
    }

});