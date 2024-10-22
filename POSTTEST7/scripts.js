document.addEventListener('DOMContentLoaded', function () {
    const search = document.getElementById('search');
    if (search) {
        search.addEventListener('keyup', function () {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && this.status == 200) {
                    document.getElementById("cushion-data").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "search.php?search=" + search.value, true);
            xhr.send();
        });
    }

    const lightmode = document.getElementById("light");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const marker = document.getElementById("marker");
    if (localStorage.getItem("light-theme") === "enabled") {
        document.body.classList.add("light-theme");
        if (lightmode) lightmode.src = "assets/moon.png";
        if (lightmode && email) email.src = "assets/email.png";
        if (lightmode && phone) phone.src = "assets/phone.png";
        if (lightmode && marker) marker.src = "assets/marker.png";
    }

    if (lightmode) {
        lightmode.onclick = function () {
            document.body.classList.toggle("light-theme");
            if (document.body.classList.contains("light-theme")) {
                lightmode.src = "assets/moon.png";
                if (email) email.src = "assets/email.png";
                if (phone) phone.src = "assets/phone.png";
                if (marker) marker.src = "assets/marker.png";
                localStorage.setItem("light-theme", "enabled");
            } else {
                lightmode.src = "assets/sun.png";
                if (email) email.src = "assets/emailDark.png";
                if (phone) phone.src = "assets/phoneDark.png";
                if (marker) marker.src = "assets/markerDark.png";
                localStorage.setItem("light-theme", "disabled");
            }
        };
    }
    
    const modal = document.getElementById("pop");
    const span = document.getElementsByClassName("close")[0];

    function hideModal() {
        if (modal) { // Pengecekan untuk memastikan modal ada
            modal.style.display = "none";
            document.getElementById("contactForm").reset();
        }
    }

    if (span) { // Pengecekan untuk span
        span.onclick = hideModal;
    }

    window.onclick = function (event) {
        if (modal && event.target == modal) { // Pengecekan untuk modal
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