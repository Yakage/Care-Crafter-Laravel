$(document).ready(function(){
    // Smooth scrolling for anchor links
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });

    // Smooth scrolling for feature boxes
    $(".feature-box").on('click', function(event) {
        var sectionId = $(this).attr("data-section");
        var targetSection = $("#" + sectionId);
        if (targetSection.length) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: targetSection.offset().top
            }, 800);
        }
    });
});
