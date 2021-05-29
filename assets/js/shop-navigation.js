
var menuItem = document.querySelectorAll('#clikea-shop-navigation-container .menu-item a');


menuItem.forEach(item => item.addEventListener('mouseover', e => {

    item.parentNode.parentNode.querySelectorAll('li').forEach(li => li.classList.remove('active'))
 
    e.path[1].classList.add('active');

}));