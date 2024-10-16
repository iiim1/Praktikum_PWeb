document.addEventListener('DOMContentLoaded', function () {
    const lightmode = document.getElementById("light");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const marker = document.getElementById("marker");

    if (lightmode) {
        lightmode.onclick = function () {
            document.body.classList.toggle("light-theme");
            if (document.body.classList.contains("light-theme")) {
                lightmode.src = "assets/moon.png";
                if (email) email.src = "assets/email.png";
                if (phone) phone.src = "assets/phone.png";
                if (marker) marker.src = "assets/marker.png";
            } else {
                lightmode.src = "assets/sun.png";
                if (email) email.src = "assets/emailDark.png";
                if (phone) phone.src = "assets/phoneDark.png";
                if (marker) marker.src = "assets/markerDark.png";
            }
        };
    }
    
    const modal = document.getElementById("pop");
    const span = document.getElementsByClassName("close")[0];

    function hideModal() {
        modal.style.display = "none";
        document.getElementById("contactForm").reset();
    }

    span.onclick = hideModal;

    window.onclick = function (event) {
        if (event.target == modal) {
            hideModal();
        }
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');

    if (burger && navLinks) {
        burger.addEventListener('click', function () {
            this.classList.toggle('change');
            navLinks.classList.toggle('active');
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                burger.classList.remove('change');
                navLinks.classList.remove('active');
            });
        });
    }
});