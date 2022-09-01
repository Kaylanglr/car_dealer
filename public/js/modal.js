$(document).on('click', '#verwijder', function(){
    $("body").addClass("stop-scrolling");
    $("#delete-confirm").css('display', 'grid');
});

$("#cancel").click(function () {
    $("body").removeClass("stop-scrolling");
    $("#delete-confirm").css('display', 'none');
});