$(document).ready(function(){
    
    $("#currentPassword").keyup(function(){
        var currentPassword = $("#currentPassword").val();
        // alert(currentPassword);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/check-current-admin-password',
            data: {currentPassword:currentPassword},
            success:function(resp) {
                // alert(resp);
                if (resp == "false") {
                    $("#check_password").html("<font color='red'>Current password is incorrect!</font>" );
                }else if (resp=="true") {
                    $("#check_password").html("<font color='green'>Current password is correct!</font>" );

                }
            }, error:function() {
                alert('Error')
            }
        })
    
    })
})