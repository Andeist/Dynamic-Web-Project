$(document).ready(function() {
    // Admin Login function
    $("#loginadminBtn").click(function() {
        var username = $('#adminUsername').val();
        var password = $('#adminPassword').val();

        var input = {
            adminUsername: username,
            adminPassword: password
        };

        $.ajax({
            url: "../backend/session/val_admin_login.php",
            type: "POST",
            data: input,
            dataType: "json",
            success: function(response) {
                if (response["status"] === "success") {
                    window.location.href = "../frontend/menu_dashboard.php";
                } else {
                    $("#modalMessage").html(response);
                    $("#modalPop").modal("show");
                }
            }
        });
    });

    // User Login function
    $('#loginBtn').click(function() {
        let username = $('#username').val();
        let password = $('#password').val();
    
        $.ajax({
            url: '../backend/session/val_login.php',
            method: 'POST',
            data: { username: username, password: password },
            dataType: 'json',
            success: function(response) {
                console.log(response)
                if (response.status === 'success') {
                    // User Login successful, redirect to user to the main page
                    window.location.href = '../frontend/index.php';
                } else {
                    // User Login failed, display error message
                    $('#userLoginMsg').text(response.message);
                }
            },
        });
    });

    // User Registration function
    $("#registerBtn").click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        var email = $('#email').val();
    
        if (username.trim() === '') {
            showErrorModal('Username cannot be empty');
            return;
        }
    
        if (password.trim() === '') {
            showErrorModal('Password cannot be empty');
            return;
        }
    
        if (password !== confirm_password) {
            showErrorModal('Password confirmation does not match');
            return;
        }
    
        var input = {
            username: username,
            password: password,
            email: email
        };
    
        $.ajax({
            url: "../backend/session/val_register.php",
            type: "POST",
            data: input,
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.status === 'success') {
                    window.location.href = "../frontend/login.php";
                } else {
                    $("#errorMessage").html(errorMessage);
                    $("#errorModal").modal('toggle');
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });    

    // Logout function
    $('#logoutBtn').click(function() {
        $.ajax({
            url: '../backend/session/logout.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Logout successful, redirect to login page
                    window.location.href = '../frontend/index.php';
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});




