$(document).ready(function() {
    $("#btn-save-post").click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // var formData = {
        //     title: $('#title').val(),
        //     body: CKEDITOR.instances.valueOf('a').body.getData(),
        //     photos: $('#photos').val(),
        //     tags: $('#tags').val()
        // }



        var formData = new FormData($('#form-post-create')[0]);
        formData.append('body', CKEDITOR.instances.valueOf('a').body.getData());

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/admin/posts/store',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                window.location = 'http://localhost:8000/admin/posts/';
            },
            error: function(data) {
                console.log('Error:', data);
            }

        });
    });
});