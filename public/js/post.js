$(document).ready(function() {

    $("#btn-save-post").click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var formData = new FormData($('#form-post-create')[0]);
        formData.append('body', CKEDITOR.instances.valueOf('a').body.getData());
        console.dir(document);

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/admin/posts/store',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                //window.location = 'http://localhost:8000/admin/posts/';
            },
            error: function(data) {
                //window.location = 'http://localhost:8000/admin/posts/create';
            }

        });
    });
});
