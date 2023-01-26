import "../sass/style.scss";
import * as bootstrap from "bootstrap";
import Typed from "typed.js";
import ScrollReveal from "scrollreveal";
import Glider from "glider-js";
import Swal from "sweetalert2";
import "animate.css";

// let typed = new Typed('.element', {
//     strings: ["Learning Application","Learning Programming"],
//     typeSpeed: 30,
//     backSpeed: 20,
//     backDelay: 1500,
//     loop: true,
//     showCursor: true,
//     // cursorChar: '|',
//   });

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

// const UserSignIn = document.getElementById("UserSignIn");
// UserSignIn.addEventListener("click", () => {
//     Swal.fire({
//         title: "Login Form",
//         html: `
//     <div  style="margin-bottom: 40px;">
//     <label for="login">Enter Username</label>
//     <input type="text" id="login" class="swal2-input" placeholder="Username">
//     </div>
//     <div  style="margin-bottom: 30px;">
//     <label for="email">Enter Your Email</label>
//     <input type="email" id="email" class="swal2-input" placeholder="Email">
//     </div>
//     <div>
//     <label for="password">Enter Password</label>
//     <input type="password" id="password" class="swal2-input" placeholder="password">
//     </div>`,
//         confirmButtonText: "Sign in",
//         focusConfirm: false,
//         preConfirm: () => {
//             const login = Swal.getPopup().querySelector("#login").value;
//             const password = Swal.getPopup().querySelector("#password").value;
//             const email = Swal.getPopup().querySelector("#email").value;
//             if (!login || !password || !email) {
//                 Swal.showValidationMessage(
//                     `Please enter login and password and email`
//                 );
//             }
//             return { login: login, password: password, email: email };
//         },
//     }).then((result) => {
//         Swal.fire(
//             `
//       Login: ${result.value.login}
//       Password: ${result.value.password}
//       Email:${result.value.email}
//     `.trim()
//         );
//     });
// });
