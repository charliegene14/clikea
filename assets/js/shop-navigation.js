
/**
 * Manage CSS .active menus class.
 * Displaying first big ul.sub-menu and all others sub-menu.
 * Remove .active class when display sub-menu in the same stage.
 */
var menuItem = document.querySelectorAll ('#clikea-shop-navigation-container .menu-item a');

menuItem.forEach(item => item.addEventListener('mouseover', e => {
    item.parentNode.parentNode.querySelectorAll('li').forEach(li => li.classList.remove('active'));

    //Path for Chrome OR composedPath for Firefox
    var path = e.path ? e.path : e.composedPath();
    path[1].classList.add('active');
    
    if (firstSubChild = item.parentNode.querySelector('.menu-item-has-children')) {
        firstSubChild.classList.add('active');
    }
}));

/**
 * Remove first big ul.sub-menu according to its size.
 * When the mouse out of the field.
 */
var subMenuWindowed = document.querySelectorAll('#clikea-shop-navigation-container .menu > .menu-item > .sub-menu');

document.body.addEventListener('mousemove', e => {
    subMenuWindowed.forEach(function(sub) {
        if(e.clientY > sub.clientHeight + sub.getBoundingClientRect().top) {
            sub.parentNode.classList.remove('active');
        }
    });
});
