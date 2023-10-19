$(document).ready(function () {

    $('.cong_btn').click(function (e) {

        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 20) {
            value++;
            var qty = $(this).closest('.product_data').find('.input-qty').val(value);
        }

    });
    $('.tru_btn').click(function (e) {

        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            var qty = $(this).closest('.product_data').find('.input-qty').val(value);
        }

    });
    $('.AddtoCartbtn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var proid = $(this).val();
      

        $.ajax({
            method: "POST",
            url: "function/handlecart.php",
            data: {
                "prodid": proid,
                "prodqty": qty,
                "scope": "add"
            },
            success: function (response) {
                $("#message").html(response);
             
            }
        });
        
    });

    $(document).on('click','.update_qty',function (){

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var prod_id = $(this).closest('.product_data').find('.prodId').val();

       
        $.ajax({
            method: "POST",
            url: "function/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            success: function (response) {
                $("#message").html(response);
             
            }
        });
            

    });


});