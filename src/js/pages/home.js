import Swiper, { Navigation, Autoplay } from 'swiper';

function home() {
  const bodyEl = document.querySelector('body');

  bodyEl.dataset.page === 'home' && (window.onload = init);
}

function init() {
  initSwiper();
}

function initSwiper() {
  new Swiper('.swiper.banner', {
    modules: [Navigation, Autoplay],
    slidesPerView: 1.5,
    spaceBetween: 16,
    centeredSlides: true,
    loop: true,
    autoHeight: true,
    breakpoints: {
      576: {
        spaceBetween: 64,
      },
      768: {
        spaceBetween: 128,
      },
    },
    navigation: {
      prevEl: '.swiper.banner .slide-prev',
      nextEl: '.swiper.banner .slide-next',
    },
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
  });
}

export default home;
