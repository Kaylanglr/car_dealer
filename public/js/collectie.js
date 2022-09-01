window.addEventListener('load', (event) => {
    $.ajax({
        type:       "GET",
        url:        "inc/collectie.inc.php",
        dataType:   "html",
        success:    function (collectie) {
            $(".collectie").append($(collectie).hide().fadeIn(1000));
        },
        error:      function (request, error) {
            console.log ("FOUT:" + error);
        }
    });
});

$(".merk").click(function () {
    let merk = $(this).data("merk");
    $(".options").css("display", "none");
    if(merk == "all") {
        $(".input-val").html("alle merken");
    }
    else {
        $(".input-val").html(merk);
    }


    $.ajax({
        type:       "GET",
        url:        "inc/collectie.inc.php",
        dataType:   "html",
        data:       {"merk": merk},
        success:    function (collectie) {
            $(".collectie").html("");
            $(".collectie").append($(collectie).hide().fadeIn(1000));
        },
        error:      function (request, error) {
            console.log ("FOUT:" + error);
        }
    });
})