
/**
 * Left shop navigation.
 * Manage CSS .active menus class.
 * Displaying first big ul.sub-menu and all others sub-menu.
 * Remove .active class when display sub-menu in the same stage.
 */
var menuItem = document.querySelectorAll ('#clikea-shop-navigation-left-container .menu-item a');

if (window.screen.width <= 660) {

    let menu = document.querySelector('#clikea-shop-menu-container');
    let div = document.createElement('div');

    div.classList.add('res-left-menu');
    menu.prepend(div);
    document.querySelector('#clikea-shop-menu-container .menu').classList.add('mobile-res');

    let resMenuIcon = document.querySelector('#clikea-shop-menu-container .res-left-menu');
    let resMenu = document.querySelector('#clikea-shop-menu-container .menu.mobile-res');

    resMenuIcon.addEventListener('click', e => {
        resMenu.classList.toggle('active');
    })
}

menuItem.forEach(item => item.addEventListener('mouseover', e => {
    item.parentNode.parentNode.querySelectorAll('li').forEach(li => li.classList.remove('active'));

    //Path for Chrome OR composedPath for Firefox
    var path = e.path ? e.path : e.composedPath();
    path[1].classList.add('active');
    var firstSubChild = item.parentNode.querySelector('.menu-item-has-children');

    if (firstSubChild) {
        firstSubChild.classList.add('active');
    }
}));

/**
 * Left shop navigation.
 * Remove first big ul.sub-menu according to its size.
 * When the mouse get out of the field.
 */

if (window.screen.width > 660) {
    var subMenuWindowed = document.querySelectorAll('#clikea-shop-navigation-left-container .menu > .menu-item > .sub-menu');

    document.body.addEventListener('mouseover', e => {
        subMenuWindowed.forEach(function(sub) {
            if(e.clientY > sub.clientHeight + sub.getBoundingClientRect().top) {
                sub.parentNode.classList.remove('active');
            }
        });
    });
}