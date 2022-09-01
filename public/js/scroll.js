const MAIN = document.getElementById("main");
const header = document.getElementById("header");
let elementTarget = document.getElementById("scroll");

$("#scroll").click(function(){
    MAIN.scrollIntoView();
});


window.addEventListener('load', (event) => {
    if (window.scrollY > (elementTarget.offsetTop + elementTarget.offsetHeight)) {
        header.style.backgroundColor = "rgba(0, 0, 0, 0.9)";
    }

    else if (window.scrollY < (elementTarget.offsetTop + elementTarget.offsetHeight)) {
        header.style.backgroundColor = "rgba(0, 0, 0, 0.705)";
    }
});



window.addEventListener("scroll", function(){
    
    if (window.scrollY > (elementTarget.offsetTop + elementTarget.offsetHeight)) {
        header.style.backgroundColor = "rgba(0, 0, 0, 0.9)";
    }

    else if (window.scrollY < (elementTarget.offsetTop + elementTarget.offsetHeight)) {
        header.style.backgroundColor = "rgba(0, 0, 0, 0.705)";
    }
});