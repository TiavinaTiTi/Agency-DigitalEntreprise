/*
* Navbar scrolled
* */
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('nav.navbar');

    if (!navbar) {
        console.error('Élément .navbar introuvable.');
        return;
    }

    // const initPosition = navbar.getBoundingClientRect().top;
    const initPosition = 0;
    console.log(initPosition);
    function changeToScroll() {
        const currentPosition = window.scrollY;
        console.log(initPosition + " / " + currentPosition);

        if (currentPosition > initPosition || currentPosition !== 0) {
            /*if(navbar.classList.contains('navbar-dark')){
                navbar.classList.replace('navbar-dark', 'navbar-light');
                navbar.classList.replace('bg-transparent', 'bg-light');
            }*/
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
            /*if(navbar.classList.contains('navbar-light')){
                navbar.classList.replace('navbar-light', 'navbar-dark');
                navbar.classList.replace('bg-light', 'bg-transparent');
            }*/
        }
    }

    // Attacher l'événement "scroll" de manière performante
    window.addEventListener('scroll', changeToScroll, { passive: true });
});

/*
* Liste slick
* */
$(document).ready(function($) {
    console.log('LOG');
    $('.list-slick').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 4000,
        cssEase: 'linear',
        variableWidth: true,
        dots: false,
        arrows: false,
        pauseOnHover: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});