function sendEmail(event) {
    event.preventDefault();

    // Validate form fields
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();
    const securityCheckbox = document.getElementById("securityCheckbox");

    // Regular expression for validating email format
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Initialize an empty error message
    let errorMessage = "";

    // Check each field and append specific error messages
    if (!name) {
        errorMessage = "Name cannot be empty.";
    } else if (!email) {
        errorMessage = "Email cannot be empty.";
    } else if (!emailPattern.test(email)) {
        errorMessage =
            "Please enter a valid email address (e.g., test@gmail.com).";
    } else if (!message) {
        errorMessage = "Message cannot be empty.";
    } else if (!securityCheckbox.checked) {
        errorMessage = "You must agree to the terms and conditions.";
    }

    // If there's an error, display it and stop the function
    if (errorMessage) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: errorMessage,
        });
        return;
    }

    // Initialize EmailJS
    emailjs.init("HkBkINhJGWtvYu4ST");

    const serviceID = "service_9hdtfbk";
    const templateID = "template_9oqw406";

    const templateParams = {
        name: name,
        email: email,
        message: message,
    };

    emailjs
        .send(serviceID, templateID, templateParams)
        .then(() => {
            // Display a success message using SweetAlert2
            Swal.fire({
                icon: "success",
                title: "Email Sent!",
                text: "Your message has been sent successfully.",
            }).then(() => {
                // Clear the form fields without reloading the page
                document.getElementById("contactForm").reset();
            });
        })
        .catch((err) => {
            console.error("Error sending email:", err);
            // Display an error message using SweetAlert2
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error sending email. Please try again later.",
            });
        });
}

//Swiper JS
const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 28,
    centeredSlides: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: "fraction",
        formatFractionCurrent: function (number) {
            return number;
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: false,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 28,
            centeredSlides: true,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 32,
        },
    },
});

//Hamburger
var toggleOpen = document.getElementById("toggleOpen");
var toggleClose = document.getElementById("toggleClose");
var collapseMenu = document.getElementById("collapseMenu");

function handleClick() {
    if (collapseMenu.style.display === "block") {
        collapseMenu.style.display = "none";
    } else {
        collapseMenu.style.display = "block";
    }
}

toggleOpen.addEventListener("click", handleClick);
toggleClose.addEventListener("click", handleClick);

//Blur

/* Listen for scroll event to apply the blurred background */
window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    const scrollY = window.scrollY;

    if (scrollY > 50) {
        /* Adjust the threshold for when to blur (optional) */
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});

toggleOpen.addEventListener("click", handleClick);
toggleClose.addEventListener("click", handleClick);

// Auto-close the hamburger menu when a navbar link is clicked
var navbarLinks = collapseMenu.querySelectorAll("a");
navbarLinks.forEach(function (link) {
    link.addEventListener("click", function () {
        collapseMenu.style.display = "none";
    });
});


//Back to top
// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
