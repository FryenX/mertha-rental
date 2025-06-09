const nav = document.querySelector("nav");

    window.addEventListener("scroll", function() {
        nav.classList.toggle("main-color", window.scrollY > 0);
    });

