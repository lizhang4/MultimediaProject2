/// <reference path="../typings/globals/jquery/index.d.ts">
function clickLike(id) {
            
    $.ajax({
        type: "GET",
        url: "./includes/like.inc.php",
        data: jQuery.param({id: id}),
        success: function(response) {
            if(response == 1) {
                location.reload();
            }
        }

    });
}