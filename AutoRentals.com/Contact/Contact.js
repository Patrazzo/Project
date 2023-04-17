let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.Links');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}

src="http://code.jquery.com/jquery-3.3.1.min.js"
	    type="text/javascript"
        function sendEmail() {
        var fname = $("#fname");
        var lname = $("#lname");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if (isNotEmpty(fname) && isNotEmpty(lname) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
            $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
                fname: fname.val(),
                lname: lname.val(),
                email: email.val(),
                subject: subject.val(),
                body: body.val()
            }, success: function (response) {
                    $('#myForm')[0].reset();
                    $('.sent-notification').text("Message Sent Successfully.");
            }
            });
        }
    }


        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }