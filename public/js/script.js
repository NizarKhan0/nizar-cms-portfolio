
//Swiper JS
const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 28,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      type: 'fraction',
      formatFractionCurrent: function (number) {
        return number;
      }
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
var toggleOpen = document.getElementById('toggleOpen');
var toggleClose = document.getElementById('toggleClose');
var collapseMenu = document.getElementById('collapseMenu');

function handleClick() {
  if (collapseMenu.style.display === 'block') {
    collapseMenu.style.display = 'none';
  } else {
    collapseMenu.style.display = 'block';
  }
}

toggleOpen.addEventListener('click', handleClick);
toggleClose.addEventListener('click', handleClick);

//Blur

/* Listen for scroll event to apply the blurred background */
window.addEventListener('scroll', function() {

  const header = document.querySelector('header');
  const scrollY = window.scrollY;

  if (scrollY
 > 50) { /* Adjust the threshold for when to blur (optional) */
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});

toggleOpen.addEventListener('click', handleClick);
toggleClose.addEventListener('click', handleClick);

// Auto-close the hamburger menu when a navbar link is clicked
var navbarLinks = collapseMenu.querySelectorAll('a');
navbarLinks.forEach(function(link) {
  link.addEventListener('click', function() {
    collapseMenu.style.display = 'none';
  });
});
