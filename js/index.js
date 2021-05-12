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
});