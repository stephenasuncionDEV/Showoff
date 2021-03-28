// Client-Side validation for the register page
$(function () {
    $("form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            name: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            }
        },

        messages: {
            email: {
                required: "Please provide an email",
                email: "Please enter a valid email address"
            },
            name: "Please enter your name",
            username: {
                required: "Please provide a username",
                minlength: "Your username must be at least 2 characters long"
            },
            password: {
                required: "Please enter a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },

        errorClass: 'field-error',
        errorLabelContainer: "#error-list",
        wrapper: "li",
        
        highlight: function(element, errorClass, validClass) {
            return false;
        },
        unhighlight: function (element, errorClass, validClass) {
            return false;
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});