
$(document).ready(function() {
    $(".fa-user").on('click', function() {
        var cnt_usericon = $("#cnt-usericon");

        if (cnt_usericon.css("visibility") === "hidden") {
            cnt_usericon.css("visibility", "visible");

        } else {
            cnt_usericon.css("visibility", "hidden");
        }
    });

    $("#nomeSito").on('click', function(){
        window.location.href = "shift.php"
    });
});


const inputs = document.querySelectorAll("input");
const inputsArray = Array.from(inputs);
inputsArray.forEach(input => {
    input.setAttribute("autocomplete", "off");
});
