
var menuItem = document.querySelectorAll('#clikea-shop-navigation-container .menu-item a');


menuItem.forEach(item => item.addEventListener('mouseover', e => {

    item.parentNode.parentNode.querySelectorAll('li').forEach(li => li.classList.remove('active'));

    //Path for Chrome OR composedPath for Firefox
    var path = e.path ? e.path : e.composedPath();
    path[1].classList.add('active');

    item.parentNode.querySelector('.menu-item-has-children').classList.add('active');
}));