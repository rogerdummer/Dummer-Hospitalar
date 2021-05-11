document.addEventListener("DOMContentLoaded", function(event) {
    let time = 10000,
        currentSectionIndex = 0,
        sections = document.querySelectorAll(".slider_about_us section"),
        max = sections.length;
    console.log(max);

    function nextSection() {
        console.log("trocou");
        sections[currentSectionIndex].classList.remove("selected");
        currentSectionIndex++;
        if (currentSectionIndex >= max) {
            currentSectionIndex = 0;
        }
        sections[currentSectionIndex].classList.add("selected");
    }
    setInterval(nextSection, time);
    var offset = document.getElementsByClassName('header')[0].offsetTop;
    var menu = document.getElementsByClassName('header')[0];

    document.addEventListener('scroll', function() {
        if (document.body.scrollTop > offset || document.documentElement.scrollTop > offset) {
            menu.style.position = 'fixed';
        } else {
            menu.style.position = 'initial';
        }
    });
});