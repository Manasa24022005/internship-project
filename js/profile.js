$(document).ready(function () {

    let token = localStorage.getItem("token");

    // Fetch profile
    $.ajax({
        url: "php/getProfile.php",
        type: "POST",
        data: { token: token },
        success: function (res) {

            let data = JSON.parse(res);

            $("#age").val(data.age);
            $("#dob").val(data.dob);
            $("#contact").val(data.contact);
        }
    });

    // Update profile
    $("#updateBtn").click(function () {

        $.ajax({
            url: "php/updateProfile.php",
            type: "POST",
            data: {
                token: token,
                age: $("#age").val(),
                dob: $("#dob").val(),
                contact: $("#contact").val()
            },
            success: function () {
                alert("Updated Successfully");
            }
        });

    });

});