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

    const contactForm = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');
    const modal = document.getElementById("pop");
    const confirmYes = document.getElementById('confirmYes');
    const confirmNo = document.getElementById('confirmNo');
    const span = document.getElementsByClassName("close")[0];

    function showModal() {
        if (modal) modal.style.display = "block";
    }

    function hideModal() {
        if (modal) modal.style.display = "none";
    }

    function handleSubmit(e) {
        e.preventDefault();
        showModal();
    }

    function confirmSubmission() {
        hideModal();
        if (successMessage) successMessage.style.display = 'block';
        if (contactForm) contactForm.reset();

        setTimeout(() => {
            if (successMessage) successMessage.style.display = 'none';
        }, 4000);
    }

    if (contactForm) {
        contactForm.addEventListener('submit', handleSubmit);
    }

    if (confirmYes) confirmYes.addEventListener('click', confirmSubmission);
    if (confirmNo) confirmNo.addEventListener('click', hideModal);
    if (span) span.addEventListener('click', hideModal);

    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            hideModal();
        }
    });

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