$("body").on("mouseenter", ".card", function () {
    $(this).find(".car-img").css("opacity", ".6")
    $(this).find(".more").css("visibility", "visible")
    $(this).find(".more").css("opacity", "1")
}).on("mouseleave", ".card", function () {
    $(this).find(".car-img").css("opacity", "1")
    $(this).find(".more").css("visibility", "hidden")
    $(this).find(".more").css("opacity", "0")
});