$(document).ready(function() {
    if($('.partenaria-slide').children('.partenaria-item').length < 3 ){
        return ;
    }
    $('.partenaria-slide').slick({
        slidesToShow: 5, // Nombre d'éléments à afficher (desktop)
        slidesToScroll: 1, // Nombre d'éléments à faire défiler
        infinite: true, // Active le défilement infini
        autoplay: true, // Défilement automatique
        autoplaySpeed: 2000, // Vitesse entre chaque défilement (ms)
        dots: true, // Affiche les points de navigation
        arrows: true, // Active les flèches de navigation
        responsive: [
            {
                breakpoint: 1024, // Largeur maximale pour les tablettes
                settings: {
                    slidesToShow: 4 // Affiche 4 éléments
                }
            },
            {
                breakpoint: 768, // Largeur maximale pour les mobiles
                settings: {
                    slidesToShow: 3 // Affiche 1 élément
                }
            },
            {
                breakpoint: 575, // Largeur maximale pour les mobiles
                settings: {
                    slidesToShow: 1 // Affiche 1 élément
                }
            }
        ]
    });
});

$(document).ready(function () {
    if($('.bestsellers-slide').children('.col-lg-3').length < 4 ){
        return ;
    }
    /* Au chargement de la section best sellers */
    let products = document.querySelectorAll('.bestsellers-slide .col-lg-3');
    products.forEach(function (element) {
        element.classList.remove('d-none');
    });

    let description = document.querySelectorAll('.bestsellers-slide .col-lg-3 .card-body');
    description.forEach(function (element){
        element.classList.add('position-absolute', 'bottom-0');
    })

    $('.bestsellers-slide').slick({
        slidesToShow: 4, // Nombre d'éléments à afficher (desktop)
        slidesToScroll: 1, // Nombre d'éléments à faire défiler
        infinite: true, // Active le défilement infini
        autoplay: true, // Défilement automatique
        autoplaySpeed: 3000, // Vitesse entre chaque défilement (ms)
        dots: true, // Affiche les points de navigation
        arrows: true, // Active les flèches de navigation
        responsive: [
            {
                breakpoint: 1024, // Largeur maximale pour les tablettes
                settings: {
                    slidesToShow: 4 // Affiche 4 éléments
                }
            },
            {
                breakpoint: 768, // Largeur maximale pour les mobiles
                settings: {
                    slidesToShow: 3 // Affiche 1 élément
                }
            },
            {
                breakpoint: 575, // Largeur maximale pour les mobiles
                settings: {
                    slidesToShow: 1 // Affiche 1 élément
                }
            }
        ]
    });
})