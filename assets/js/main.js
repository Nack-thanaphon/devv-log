// Nav Slidebar

var window_height;
var window_width;
var navbar_initialized = false;
var nav_toggle;

var offCanvas = {
    sidenav: {
        // Sidenav is not visible by default.
        // Change to 1 if necessary
        sidenav_visible: 0
    },
    initSideNav: function initSideNav() {
        if (!navbar_initialized) {
            var $nav = $('nav');

            // Add the offcanvas class to the navbar if it's not initialized
            $nav.addClass('navbar-offcanvas');

            // Clone relevant navbars
            var $navtop = $nav.find('.navbar-top').first().clone(true);
            var $navbar = $nav.find('.navbar-collapse').first().clone(true);

            // Let's start with some empty vars
            var ul_content = '';
            var top_content = '';

            // Set min-height of the new sidebar to the screen height
            $navbar.css('min-height', window.screen.height);

            // Take the content of .navbar-top
            $navtop.each(function() {
                var navtop_content = $(this).html();
                top_content = top_content + navtop_content;
            });

            // Take the content of .navbar-collapse
            $navbar.children('ul').each(function() {
                var nav_content = $(this).html();
                ul_content = ul_content + nav_content;
            });

            // Wrap the new content inside an <ul>
            ul_content = '<ul class="navbar-nav sidebar-nav">' + ul_content + '</ul>';

            // Insert the html content into our cloned content
            $navbar.html(ul_content);
            $navtop.html(top_content);

            // Append the navbar to body,
            // and insert the content of the navicons navbar just below the logo/nav-image
            $('body').append($navbar);
            $('.nav-image').after($navtop);


            // Set the toggle-variable to the Bootstrap navbar-toggler button
            var $toggle = $('.navbar-toggler');

            // Add/remove classes on toggle and set the visiblity of the sidenav,
            // and append the overlay. Also if the user clicks the overlay,
            // the sidebar will close
            $toggle.on('click', function() {
                if (offCanvas.sidenav.sidenav_visible == 1) {
                    $('html').removeClass('nav-open');
                    offCanvas.sidenav.sidenav_visible = 0;
                    $('#overlay').remove();
                    setTimeout(function() {
                        $toggle.removeClass('toggled');
                    }, 300);
                } else {
                    setTimeout(function() {
                        $toggle.addClass('toggled');
                    }, 300);

                    // Add the overlay and make it close the sidenav on click
                    var div = '<div id="overlay"></div>';
                    $(div).appendTo("body").on('click', function() {
                        $('html').removeClass('nav-open');
                        offCanvas.sidenav.sidenav_visible = 0;
                        $('#overlay').remove();
                        setTimeout(function() {
                            $toggle.removeClass('toggled');
                        }, 300);
                    });

                    $('html').addClass('nav-open');
                    offCanvas.sidenav.sidenav_visible = 1;
                }
            });
            // Set navbar to initialized
            navbar_initialized = true;
        }
    }
};







$(document).ready(function() {
    window_width = $(window).width();

    nav_toggle = $('nav').hasClass('navbar-offcanvas') ? true : false;

    // Responsive checks
    if (window_width < 992 || nav_toggle) {
        offCanvas.initSideNav();
    }

    // Close the sidebar if the user clicks a link or a dropdown-item,
    // and close the sidebar
    $('.nav-link:not(.dropdown-toggle), .dropdown-item').on('click', function() {
        var $toggle = $('.navbar-toggler');

        $('html').removeClass('nav-open');
        offCanvas.sidenav.sidenav_visible = 0;
        setTimeout(function() {
            $toggle.removeClass('toggled');
        }, 300);
    });
});

$(window).resize(function() {
    window_width = $(window).width();

    // More responsive checks if the user resize the browser
    if (window_width < 992) {
        offCanvas.initSideNav();
    }

    if (window_width > 992 && !nav_toggle) {
        $('nav').removeClass('navbar-offcanvas');
        offCanvas.sidenav.sidenav_visible = 1;
        navbar_initialized = false;
    }
});

// Nav Slidebar


// Nav Slidepicture

$(document).ready(() => {
    $('.slideshow').slick({
        autoplay: true,
        autoplaySpeed: 2500,
        dots: false,
        infinite: false,
        speed: 2500,
        fade: true,
        slide: 'div',
        cssEase: 'linear'
    });
    $('#activities').slick({
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 2
    });
});

//End Nav Slidepicture

// To top Button
var btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});
// End To top Button



// google map

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});

function initMap() {

    const uluru = { lat: 13.7948786, lng: 100.3194293 };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: uluru,
    });

    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
// end google map



// google translate

function googleTranslateElementInit() {
    new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'google_translate_element');
}


// end google map


const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const pinterestBtn = document.querySelector(".pinterest-btn");
const linkedinBtn = document.querySelector(".linkedin-btn");
const whatsappBtn = document.querySelector(".whatsapp-btn");

function init() {
    const pinterestImg = document.querySelector(".pinterest-img");

    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI("Hi everyone, please check this out: ");
    let postImg = encodeURI(pinterestImg.src);

    facebookBtn.setAttribute(
        "href",
        `https://www.facebook.com/sharer.php?u=${postUrl}`
    );

    twitterBtn.setAttribute(
        "href",
        `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
    );

    pinterestBtn.setAttribute(
        "href",
        `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`
    );

    linkedinBtn.setAttribute(
        "href",
        `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
    );

    whatsappBtn.setAttribute(
        "href",
        `https://wa.me/?text=${postTitle} ${postUrl}`
    );
}

init();

$(document).ready(function() {
    setInterval(function() {
        $(".hero-slider .slider img").toggleClass("banner").toggleClass("scale-animation");
    }, 6000);
});