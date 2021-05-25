if (document.body.classList.contains('home')) {

    var mouseStopIn = 1;

    var navBackgound = document.getElementById('clikea-navigation-background');
    navBackgound.classList.remove('clikea-navigation-background');
    navBackgound.classList.add('clikea-navigation-background-home');

    var navContainer = document.getElementById('clikea-navigation-container');
    navContainer.classList.add('clikea-navigation-container-home');

    document.body.addEventListener('mousemove', e => {
        let button = document.getElementById('btn-home-collection');
        let background = document.getElementById('clikea-navigation-background');

        background.style.opacity = "1";
        button.style.opacity = "1"
        mouseStopIn = 1;

        let xAxis = - (window.innerWidth / 2 - e.pageX) /10;
        let yAxis = (window.innerHeight / 2 - e.pageY) /10;

        button.style.transform = `translate(-50%, -50%) rotateY(${xAxis}deg) rotateX(${yAxis}deg)`
    });

    setInterval(function() {
        if (mouseStopIn <= 0) {
            let button = document.getElementById('btn-home-collection');
            let background = document.getElementById('clikea-navigation-background');

            background.style.opacity = "0";
            button.style.opacity = "0.6";
            button.style.transform = "translate(-50%, -50%)"
        }
        mouseStopIn -= 1;
        
    }, 1000);



}