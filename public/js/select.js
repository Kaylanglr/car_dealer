$(window).on("click", function (event) {
    if ($(event.target).closest(".select-box").length === 0) {
        $(".options").css("display", "none");
    }
});

$(".select-input").click(function (){
    if($(".options").css("display") == "block") {
        $(".options").css("display", "none");
    }else {
        $(".options").css("display", "block");
    }

});


