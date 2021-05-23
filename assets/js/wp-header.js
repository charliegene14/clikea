if (document.body.classList.contains('home')) {

    var navBackgound = document.getElementById('clikea-navigation-background');
    navBackgound.classList.remove('clikea-navigation-background');
    navBackgound.classList.add('clikea-navigation-background-home');

    var navContainer = document.getElementById('clikea-navigation-container');
    navContainer.classList.add('clikea-navigation-container-home');
}