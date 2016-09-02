

jQuery(document).ready(function ($) {
    //open popup
    $('.clickme').on('click', function (event) {
        event.preventDefault();
        $('.blur.contact').addClass('is-visible');
    });
    //close popup
    $('#closeme').on('click', function (event) {
        $('.blur.contact').removeClass('is-visible');
    });
    //close popup when clicking the esc keyboard button
    $(document).keyup(function (event) {
        if (event.which == '27') {
            $('.blur.contact').removeClass('is-visible');
        }
    });
    var textarea = $('.textarea');
    var txt = $('form label.txt');
    /**/
    $("#check1").click(function (){
        if (textarea.hasClass('is-visible2')) {
            textarea.removeClass('is-visible2');
            txt.removeClass('not-visible');
        } else {
            textarea.addClass('is-visible2');
            txt.addClass('not-visible');
        }
    })
});



function contactrequest() {

    var formdata = new FormData();
    formdata.append("type", "contactrequest");
    formdata.append("contactname", document.getElementById("contactname").value);
    formdata.append("phonenumber", document.getElementById('phonenumber').value);
    formdata.append("senderMessage", document.getElementById('message').value);

    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", contractrequestsen, false);

    ajax.open("POST", "/API/mailer.php");
    ajax.send(formdata);
//        $('.blur.contact').removeClass('is-visible');
}

function contractrequestsen(event) {
    document.getElementById("status").innerHTML = event.target.responseText;
}



