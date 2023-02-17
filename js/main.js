$(document).ready(function() {
    $('#manage_user').submit(function(e) {
        e.preventDefault()
        $.ajax({
            url: 'register.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg').html(resp);
            }
        })
    })

    $('#login_user').submit(function(e) {
        e.preventDefault()
        $.ajax({
            url: 'login.class.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function(resp) {
                $('#error_msg_log').html(resp);
            }
        })
    })
})
