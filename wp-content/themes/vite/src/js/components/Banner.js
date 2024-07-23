import Swiper from 'swiper';
import { EffectFade, Autoplay, Navigation, Pagination } from 'swiper/modules';

export default class Banner {
    constructor() {
        this.setDomMap();
        this.bindEvents();

    }

    setDomMap() {
        // Your DOM mapping logic
    }

    bindEvents = () => {
        const swiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            modules: [EffectFade, Autoplay, Pagination],

            loop: true,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 2000,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
        });

    }
}
