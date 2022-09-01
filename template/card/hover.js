$(".card").mouseenter( function() {
    $(".car-img").css("opacity", ".6")
    $(".more").css("visibility", "visible")
    $(".more").css("opacity", "1")
}).mouseleave( function() {
    $(".car-img").css("opacity", "1")
    $(".more").css("visibility", "hidden")
    $(".more").css("opacity", "0")
} );
