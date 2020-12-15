$(document).ready(function () {

    $(document).on('click', '#add_gurisha', function (e) {
        $('.progress-hidex').hide();
        $('.progress-hidec').hide();
        $('.progress-hidez').hide();
        e.stopPropagation();
        var sale_view = $(this).data('gurisha');

        $.ajax({
            url: 'core/ajax_db/sale_add_gurisha.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sale_view: sale_view,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".sale-popup").hide();
                });
                console.log(response);
            }
        });
    });

    $(document).on('click', '#form-sale-gurisha', function (e) {
        // event.preventDefault();
        e.stopPropagation();
        var title = $('#title');
        var code = $('#code');
        var price = $('#price');
        var phone = $('#phone');
        var additioninformation = $('#addition-information');
        var country = $('#country');
        var province = $('.provincecode');
        var districts = $('.districtcode');
        var sector = $('.sectorcode');
        var cell = $('.codecell');
        var village = $('.CodeVillage');
        var photo = $('#photo');
        var other_photo = $('#other-photo');
        var video = $('#video');
        var youtube = $('#youtube');
        var categories_sale = $('#categories_sale');
        var photo_Titleo0 = $('#photo-Titleo0');
        var photo_Title0 = $('#photo-Title0');
        var photo_Title1 = $('#photo-Title1');
        var photo_Title2 = $('#photo-Title2');
        var photo_Title3 = $('#photo-Title3');
        var photo_Title4 = $('#photo-Title4');
        var photo_Title5 = $('#photo-Title5');

        if (isEmpty(country) && isEmpty(province) && isEmpty(districts) &&
            isEmpty(sector) && isEmpty(cell) && isEmpty(village) && isEmpty(categories_sale) &&
            isEmpty(additioninformation) && isEmpty(title) && isEmpty(code) && isEmpty(price) && isEmpty(phone) &&
            isEmpty(photo) && isEmpty(other_photo) && isEmpty(video) && isEmpty(youtube) && isEmpty(photo_Titleo0) && isEmpty(photo_Title0) && isEmpty(photo_Title1) && isEmpty(photo_Title2) &&
            isEmpty(photo_Title3) && isEmpty(photo_Title4) && isEmpty(photo_Title5)) {

            var extensions1 = $('#photo').val().split('.').pop().toLowerCase();
            var extensions2 = $('#other-photo').val().split('.').pop().toLowerCase();

            if (jQuery.inArray(extensions1, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitsale").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitsale").fadeOut();
                }, 4000);
                $('#photo').val('');
                return false;
            } else if (jQuery.inArray(extensions2, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {
                $("#responseSubmitsale").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#responseSubmitsale").fadeOut();
                }, 4000);
                $('#other-photo').val('');
                return false;
            } else {
                $.ajax({
                    url: 'core/ajax_db/sale_add_gurisha.php',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            var progress = Math.round((e.loaded / e.total) * 100);
                            $('.progress-hidex').show();
                            $('.progress-hidec').show();
                            $('.progress-hidez').show();
                            $('#prox').css('width', progress + '%');
                            $('#proc').css('width', progress + '%');
                            $('#proz').css('width', progress + '%');
                            $('#prox').html(progress + '%');
                            $('#proc').html(progress + '%');
                            $('#proz').html(progress + '%');
                        });

                        xhr.addEventListener('load', function (e) {
                            $('.progress-bar').removeClass('bg-info').addClass('bg-success').html('<span>upload completed  <span class="fa fa-check"></span></span>');
                        });
                        return xhr;
                    },
                    success: function (response) {
                        $("#responseSubmitsale").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitsale").fadeOut();
                        }, 2000);
                        setInterval(function () {
                            // location.reload();
                        }, 2400);
                    }, error: function (response) {
                        $("#responseSubmitsale").html(response).fadeIn();
                        setInterval(function () {
                            $("#responseSubmitsale").fadeOut();
                        }, 3000);
                    }
                });
                return false;
            }
        }
    });

    $(document).on('click', '.delete-gurisha', function (e) {
        e.preventDefault();
        var sale_id = $(this).data('sale');
        var user_id = $(this).data('user');

        $.ajax({
            url: 'core/ajax_db/sale_gurisha_delete.php',
            method: 'POST',
            dataType: 'text',
            data: {
                deleteEvents: user_id,
                showpopupdelete: sale_id,
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-retweet-popup,.cancel-it").click(function () {
                    $(".sale-popup").hide();
                });
                $(".delete-it-sale-gurisha").click(function () {
                    $.ajax({
                        url: 'core/ajax_db/sale_gurisha_delete.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            deleteTweetHome: sale_id,
                        }, success: function (response) {
                            $("#responseDeletePost").html(response);
                            setInterval(function () {
                                $("#responseDeletePost").fadeOut();
                            }, 1000);
                            setInterval(function () {
                                location.reload();
                            }, 1100);
                            console.log(response);
                        }

                    });
                });
                console.log(response);
            }

        });
    });

    $(document).on('click', '.update-sale-gurisha-btn', function (e) {
        e.preventDefault();
        var sale_id = $(this).data('sale');
        var user_id = $(this).data('user');
        var title = $('#title' + sale_id).val();
        var available = $('#available' + sale_id).val();
        var discount_change = $('#discount_change' + sale_id).val();
        var discount_price = $('#discount_price' + sale_id).val();
        var price = $('#price' + sale_id).val();
        var banner = $('#banner' + sale_id).val();

        $.ajax({
            url: 'core/ajax_db/sale_gurisha_delete.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sale_id: sale_id,
                user_id: user_id,
                title: title,
                available: available,
                discount_change: discount_change,
                discount_price: discount_price,
                price: price,
                banner: banner,
            }, success: function (response) {
                $("#response" + sale_id).html(response);
                setInterval(function () {
                    $("#response" + sale_id).fadeOut();
                }, 1000);
                setInterval(function () {
                    location.reload();
                }, 1100);
                console.log(response);
            }

        });
    });

    $(document).on('change', '#update-form-sale-gurisha', function (e) {
        e.preventDefault();
        var sale_id = $(this).data('sale');
        var image = $(this).val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        //validate file type
        if (!img_ex.exec(image)) {
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $(this).val('');
            return false;
        } else {
            $('#form-photo'+sale_id).submit();
            // console.log(image);
        }
        
    });

    $(document).on('click', '.offer-price-gurisha', function (e) {
        e.stopPropagation();
        var sale = $(this).data('sale');

        $.ajax({
            url: 'core/ajax_db/sale_gurisha_offer.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sale: sale,

            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".gurisha-popup").hide();
                });
                console.log(response);
            }
        });
    });


    $(document).on('click', '.offer-price-sale', function (e) {
        e.stopPropagation();
        var sale = $(this).data('sale');

        $.ajax({
            url: 'core/ajax_db/sale_offer.php',
            method: 'POST',
            dataType: 'text',
            data: {
                sale: sale,

            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".close-imagePopup").click(function () {
                    $(".sale-popup").hide();
                });
                console.log(response);
            }
        });
    });


});

function checkout(checkout) {

    $.ajax({
        url: 'core/ajax_db/sale_offer.php',
        method: 'POST',
        dataType: 'text',
        data: {
            checkout: checkout,

        }, success: function (response) {
            $("#responseSubmititerm").html('<div class="alert alert-success alert-dismissible fade show text-center">' +
                '<button class="close" data-dismiss="alert" type="button">' +
                '<span>&times;</span>' +
                '</button> <strong>SUCCESS</strong>' + ' </div>');
            setInterval(function () {
                $("#responseSubmititerm").fadeOut();
            });
            $("#responseCheckout").html(response);
            console.log(response);
        }
    });
}

function paymentSale(payment) {

    $.ajax({
        url: 'core/ajax_db/sale_offer.php',
        method: 'POST',
        dataType: 'text',
        data: {
            payment: payment,

        }, success: function (response) {
            $("#responseSubmititerm").html('<div class="alert alert-success alert-dismissible fade show text-center">' +
                '<button class="close" data-dismiss="alert" type="button">' +
                '<span>&times;</span>' +
                '</button> <strong>SUCCESS</strong>' + ' </div>');
            setInterval(function () {
                $("#responseSubmititerm").fadeOut();
            });
            $("#responseCheckout").html(response);
            console.log(response);
        }
    });
}

function saleuploadz(success, fileName) {
    if (success) {
        $('#salePreview' + success).attr("src",fileName);
        // $('#salePreview'+success).attr("src", fileName);
        // $('#fileInput').attr("value", fileName);
        console.log(success);
        console.log(fileName);

    } else {
        alert('There was an error during file upload!');
    }
    return true;
}
