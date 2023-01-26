import "../sass/style.scss";
import * as bootstrap from "bootstrap";
import Typed from "typed.js";
import ScrollReveal from "scrollreveal";
import Glider from "glider-js";
import "animate.css";
import "fontawesome-free/css/all.min.css";

let slideDown = {
    distance: "50px",
    origin: "top",
    duration: 800,
    interval: 300,
    easing: "ease-in-out",
};

ScrollReveal().reveal(".slide-down", slideDown);

let slideleft = {
    distance: "50px",
    origin: "left",
    duration: 800,
    interval: 300,
    easing: "ease-in-out",
};

ScrollReveal().reveal(".slide-left", slideleft);

let slideRight = {
    distance: "50px",
    origin: "right",
    duration: 800,
    interval: 300,
    easing: "ease-in-out",
};

ScrollReveal().reveal(".slide-right", slideRight);

new Glider(document.querySelector(".glider"), {
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: ".dots",
    draggable: true,
    arrows: {
        prev: ".glider-prev",
        next: ".glider-next",
    },
    responsive: [
        {
            // screens greater than >= 775px
            breakpoint: 100,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 1,
                slidesToScroll: 1,
                // itemWidth: 150,
                // duration: 0.25
            },
        },
        {
            // screens greater than >= 1024px
            breakpoint: 500,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                // itemWidth: 150,
                // duration: 0.25
            },
        },
        {
            // screens greater than >= 1024px
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                // itemWidth: 150,
                // duration: 0.25
            },
        },
    ],
});

new Glider(document.querySelector(".Glider"), {
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: ".dots",
    draggable: true,
    arrows: {
        prev: ".glider-pre",
        next: ".glider-nex",
    },
    responsive: [
        {
            // screens greater than >= 775px
            breakpoint: 100,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 1,
                slidesToScroll: 1,
                // itemWidth: 150,
                // duration: 0.25
            },
        },
        {
            // screens greater than >= 1024px
            breakpoint: 500,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                // itemWidth: 150,
                // duration: 0.25
            },
        },
        {
            // screens greater than >= 1024px
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                // itemWidth: 150,
                // duration: 0.25
            },
        },
    ],
});
