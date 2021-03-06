$(document).ready(function () {

    $(document).on('click', '#login-please', function (e) {
        e.stopPropagation();
        var login_id = $(this).data('login');

        $.ajax({
            url: 'core/ajax_db/login_add',
            method: 'POST',
            dataType: 'text',
            data: {
                login_id: login_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".login-popup").hide();
                });
                // console.log(response);
            }
        });
    });

    $(document).on('click', '#recharge_coins', function (e) {
        e.stopPropagation();
        var user = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/balance_payment',
            method: 'POST',
            dataType: 'text',
            data: {
                recharge_coins: user,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".balance-popup").hide();
                });
                // console.log(response);
            }
        });
    });

    $(document).on('click', '#logout-please', function (e) {
        e.stopPropagation();

        $.ajax({
            url: 'core/ajax_db/logout_',
            method: 'POST',
            dataType: 'text',
           
            success: function (response) {
                location.reload();
                // console.log(response);
            }
        });
    });

});
