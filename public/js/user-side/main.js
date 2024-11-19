$(function () {
    "use strict";

    //===== Prealoder

    $(window).on("load", function (event) {
        $("#preloader").delay(500).fadeOut(500);
    });

    //===== Mobile Menu

    $(".navbar-toggler").on("click", function () {
        $(this).toggleClass("active");

        // Toggle background color based on the navbar state
        if ($(".navbar-toggler").hasClass("active")) {
            $(".navigation").css("background-color", "white");
        } else {
            $(".navigation").css("background-color", "transparent");
        }

        $(".navbar-collapse").toggleClass("show");
    });

    // Close navbar-collapse and reset background when a link is clicked
    $(".navbar-nav a").on("click", function () {
        $(".navbar-collapse").removeClass("show");
    });

    //===== Sticky ==========\\

    $(window).on("scroll", function (event) {
        var scroll = $(window).scrollTop();
        if (scroll < 10) {
            $(".navigation").removeClass("sticky");
            $(".navigation").css("background-color", "");
        } else {
            $(".navigation").addClass("sticky");
            $(".navigation").css("background-color", "");
        }
    });

    //===== Section Menu Active

    var scrollLink = $(".page-scroll");
    // Active link switching
    $(window).scroll(function () {
        var scrollbarLocation = $(this).scrollTop();

        scrollLink.each(function () {
            var sectionOffset = $(this.hash).offset().top - 90;

            if (sectionOffset <= scrollbarLocation) {
                $(this).parent().addClass("active");
                $(this).parent().siblings().removeClass("active");
            }
        });
    });

    //===== Back to top

    // Show or hide the sticky footer button
    $(window).on("scroll", function (event) {
        if ($(this).scrollTop() > 600) {
            $(".back-to-top").fadeIn(200);
        } else {
            $(".back-to-top").fadeOut(200);
        }
    });

    //Animate the scroll to yop
    $(".back-to-top").on("click", function (event) {
        event.preventDefault();

        $("html, body").animate(
            {
                scrollTop: 0,
            },
            1500
        );
    });
});

// =============Function for Navbar=============== //
// Toggle navbar untuk mobile
document
    .getElementById("navbar-toggler")
    .addEventListener("click", function () {
        var navbarMenu = document.getElementById("navbarOne");
        navbarMenu.classList.toggle("hidden");
    });

function toggleDropdown(element) {
    const dropdowns = document.querySelectorAll(".dropdown-menu");

    dropdowns.forEach((dropdown) => {
        if (dropdown !== element.nextElementSibling) {
            dropdown.classList.add("hidden");
        }
    });

    // Buka/tutup dropdown yang dipilih
    const dropdownMenu = element.nextElementSibling;
    dropdownMenu.classList.toggle("hidden");

    dropdowns.forEach((dropdown) => {
        dropdown.classList.remove("active");
    });

    if (!dropdownMenu.classList.contains("hidden")) {
        element.classList.add("active");
    } else {
        element.classList.remove("active");
    }
}
// =============Function for Navbar=============== //

// Menutup dropdown saat klik di luar area
document.addEventListener("click", function (event) {
    const isClickInside = event.target.closest(".dropdown-toggle");

    if (!isClickInside) {
        // Tutup semua dropdown saat klik di luar
        const dropdowns = document.querySelectorAll(".dropdown-menu");
        dropdowns.forEach((dropdown) => dropdown.classList.add("hidden"));

        // Hapus kelas 'active' dari semua dropdown
        const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
        dropdownToggles.forEach((toggle) => toggle.classList.remove("active"));
    }
});

// =============Function for alert=============== //
function closeAlert() {
    const alert = document.getElementById("alert");
    alert.style.display = "none";
}

// Automatically close the alert after 5 seconds
setTimeout(() => {
    closeAlert();
}, 5000); // 5000 ms = 5 seconds
// =============Function for alert=============== //
