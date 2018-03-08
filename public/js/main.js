// INITIALISATION DU CAROUSEL
    $(document).ready(function(){
        $('.carousel').carousel({
            duration : 300,
            fullWidth : true,
            indicators : true,
        });
    });

// INITIALISATION SLIDER
    $(document).ready(function(){
        $('.slider').slider();
    });

// INITIALISATION MENU RESPONSIVE
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

// INITIALISATION menu dropdown
    $(document).ready(function(){
        $(".dropdown-trigger").dropdown({hover: false});
    });

// INITIALISATION COLLAPSE PAGE LOGIN
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });