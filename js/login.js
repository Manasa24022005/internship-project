$("#loginBtn").click(function () {

    $.ajax({
        url: "php/login.php",
        type: "POST",
        data: {
            email: $("#email").val(),
            password: $("#password").val()
        },
        success: function (res) {

            let data = JSON.parse(res);

            if (data.status === "success") {
                localStorage.setItem("token", data.token);
                window.location.href = "profile.html";
            } else {
                alert("Invalid login");
            }
        }
    });

});