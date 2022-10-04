$(document).ready(function () {

    $('#send-code').click(function (e) { 
        e.preventDefault();

        let email = $("#email").val();
        if(email == '')
        {
            alert('email need to specify');
        }
        $.ajax({
            type: "post",
            url: "code.php",
            data: 
            {
                email: email,
            },
            success: function (response) {
                swal("Here's the title!", "...and here's the text!");
            }
        });

    });
});
