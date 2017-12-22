var projectSlick = null;
jQuery(function($) {
    var $ = jQuery;
    var $container = $(".gallery");
    $container.imagesLoaded(function() {
        $container.masonry({
            itemSelector: '.gallery-item'
        });
    });
    projectSlick = $(".modal-thumbnail-wrapper").slick({
        dots:false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true
    });
    var slideIndex = 1;
    showSlides(slideIndex);

    setProjectImageHeight();
    $(window).resize(function() {
        setProjectImageHeight();
    });
    if($(window).width()> 991) {
        var waypoint = new Waypoint({
            element: document.getElementById('header'),
            handler: function() {
                $("#header").toggleClass('shrink');
            },
            offset: -10
        });
    }
});

function openModal() {
    var $ = jQuery;
    $("#projectModal").addClass('fadeIn');
}
function closeModal() {
    var $ = jQuery;
    $("#projectModal").removeClass('fadeIn');
}
function plusSlides(n) {
    var $ = jQuery;
    var slideIndex = $(".viewed").val();
    if(n == -1) {
        n = (slideIndex - 1);
    } else {
        var a = parseInt(slideIndex);
        var b = parseInt(n);
        n = (a + b);
    }
    showSlides(n);
}

function currentSlide(n) {
    var $ = jQuery;
    $(".viewed").val(n);
    showSlides(n);
}
function showSlides(n) {
    var $ = jQuery;
    var slides = $(".slides").length;
    var slideIndex = n;
    if (n > slides) {
        //go back to first slide
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides;
    }
    for (i = 1; i <= slides; i++) {
        $(".slide"+i).hide();
        $(".preview"+i).removeClass('active-preview');
    }
    $(".slide"+slideIndex).show();
    $(".preview"+slideIndex).addClass('active-preview');
    $(".viewed").val(n);
}
function setProjectImageHeight() {
    var $ = jQuery;
    var h = $(".project-banner-wrapper img").height();
    $(".project-banner-wrapper").css('height', h+'px');
}