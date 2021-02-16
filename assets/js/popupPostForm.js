$(document).ready(function () {

    $(document).on('click', '.addPostBtn', function () {
        $('.status').removeClass().addClass('status-remove');
        $('.hash-box').removeClass().addClass('hash-remove');
        $('#count').attr('id', 'count-remove');
        $('#add-photo0').attr('id', 'add-photo0-remove');
        $('#file').attr('id', 'files');
        $('.progress').removeClass().addClass('progress-xss');

        $.ajax({
            url: 'core/ajax_db/popupPostForm',
            method: 'POST',
            dataType: 'text',
            data: {
            }, success: function (response) {
                $(".popupTweet").html(response);
                $(".closeTweetPopup").click(function () {
                    $('.status-remove').removeClass().addClass('status');
                    $('.hash-remove').removeClass().addClass('hash-box');
                    $('#count-remove').attr('id', 'count');
                    $('#add-photo0-remove').attr('id', 'add-photo0');
                    $(".popup-tweet-wrap").hide();
                });

                // console.log(response);
            }
        });
    });

    $(document).on('submit', "#popupForm", function (e) {
        for(instance in CKEDITOR.instances){
            CKEDITOR.instances[instance].updateElement();
        }
        e.preventDefault();
        var id = $('#id_posts').val();
        var image_name = $('#file').val();
        var title_name = $('#title_name').val();
        // var textarea = $('.status').val();
        var textarea = CKEDITOR.instances.editor1.getData();

         if (image_name == '') {

            if (textarea != '') {
                $.ajax({
                    url: "core/ajax_db/addPostForm",
                    method: "POST",
                    data: {
                        key: 'textarea',
                        id: id,
                        status: textarea,
                        title_name: title_name,
                    },
                    success: function (response) {
                        $("#response-PostMessage").html(response);
                        setInterval(function () {
                            $("#response-PostMessage").fadeOut();
                        }, 800);
                        setInterval(function () {
                            location.reload();
                        }, 1100);
                    }, error: function (response) {
                        $("#response-PostMessage").html(response);
                        setInterval(function () {
                            $("#response-PostMessage").fadeOut();
                        },2000);
                    }
                });

            } else {
                $("#empty-posts2").html('Type or choose image to post').fadeIn();
                setInterval(function () {
                    $("#empty-posts2").fadeOut();
                }, 6000);
            }
        } else {
            var extensions = $('#file').val().split('.').pop().toLowerCase();
            if (jQuery.inArray(extensions, ['gif', 'png', 'jpg', 'mp4', 'mp3', 'jpeg', 'bmp', 'pdf', 'doc', 'ppt', 'docx', 'xlsx', 'xls', 'zip']) == -1) {

                $("#response-PostMessage").html('Invalid Image File').fadeIn();
                setInterval(function () {
                    $("#response-PostMessage").fadeOut();
                }, 3000);
                $('#file').val('');
                return false;
            } else {
                $.ajax({
                    url: "core/ajax_db/addPostForm",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            var progress = Math.round((e.loaded / e.total) * 100);
                            $('.progress-hided').show();
                            $('#prog').css('width', progress + '%');
                            $('#prog').html(progress + '%');
                        });
                        xhr.addEventListener('load', function (e) {
                            $('.progress-bar').removeClass('bg-info').addClass('bg-success').html('<span>upload completed  <span class="fa fa-check"></span></span>');
                        });
                        return xhr;
                    },
                    success: function (response) {
                        $("#response-PostMessage").html(response).fadeIn();
                        setInterval(function () {
                            $("#response-PostMessage").fadeOut();
                        }, 1000);
                        setInterval(function () {
                            location.reload();
                        }, 1100);
                    }, error: function (response) {
                        $("#response-PostMessage").html(response).fadeIn();
                        setInterval(function () {
                            $("#response-PostMessage").fadeOut();
                        }, 2000);
                    }
                });
                return false;
            }
        }
    });//#popupForm End form submitted 
});
 
