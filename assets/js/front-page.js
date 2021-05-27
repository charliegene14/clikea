if (document.body.classList.contains('home')) {

    var mouseStopIn = 1;

    document.body.addEventListener('mousemove', e => {
        let button = document.getElementById('btn-home-collection');
        let buttonText = document.getElementById('btn-text');

        let background = document.getElementById('background-gradient');

        background.style.opacity = "1";
        button.style.opacity = "1"
        mouseStopIn = 1;

        let xAxis = - (window.innerWidth / 2 - e.pageX) /10;
        let yAxis = (window.innerHeight / 2 - e.pageY) /10;

        button.style.transform = `translate(-50%, -50%) rotateY(${xAxis}deg) rotateX(${yAxis}deg)`
        buttonText.style.transform = "translateZ(20px)"
    });

    setInterval(function() {
        if (mouseStopIn <= 0) {
            let button = document.getElementById('btn-home-collection');
            let background = document.getElementById('background-gradient');

            background.style.opacity = "0";
            button.style.opacity = "0.6";
            button.style.transform = "translate(-50%, -50%) rotateY(0deg) rotateX(0deg)"
        }
        mouseStopIn -= 1;
    }, 1000);
}