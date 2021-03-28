// Client-Side validation for the login page
$(function () {
    $("form").validate({
        rules: {
            username: "required",
            password: "required"
        },

        messages: {
            username: "You must enter your username",
            password: "You must enter your password"
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