if (document.body.classList.contains('home')) {

    function mouseStop() {
        var background = document.getElementById('clikea-navigation-background');
        background.style.opacity = "0";
    }

    var navBackgound = document.getElementById('clikea-navigation-background');
    navBackgound.classList.remove('clikea-navigation-background');
    navBackgound.classList.add('clikea-navigation-background-home');

    var navContainer = document.getElementById('clikea-navigation-container');
    navContainer.classList.add('clikea-navigation-container-home');

    document.body.addEventListener('mousemove', e => {
        var background = document.getElementById('clikea-navigation-background');
        background.style.opacity = "1";

       
        setTimeout(mouseStop, 1500);
    });

}