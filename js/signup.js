$(document).ready(function () {

    $("#signupBtn").click(function () {

        let username = $("#username").val();
        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax({
            url: "php/register.php",
            type: "POST",
            data: {
                username: username,
                email: email,
                password: password
            },
            success: function (response) {
                alert(response);
            },
            error: function () {
                alert("Error occurred");
            }
        });

    });

});