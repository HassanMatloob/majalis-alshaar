// Featured Properties Swiper - Start 
const swiperFeaturedProperties = document.querySelector(".swiper-featured-properties");
if (swiperFeaturedProperties) {
const swiperFeatured = new Swiper('.swiper-featured-properties', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1440: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1700: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
    navigation: {
        nextEl: '.swiper-featured-properties .swiper-button-next',
        prevEl: '.swiper-featured-properties .swiper-button-prev',
    },
});
}
// Featured Properties Swiper - End 

// Browse Properties Swiper - Start 
const swiperPropertyImages = document.querySelector(".swiper-property-images");
if (swiperPropertyImages) {
    const swiperProperty = new Swiper('.swiper-property-images', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-property-images .swiper-button-next',
            prevEl: '.swiper-property-images .swiper-button-prev',
        },
    });

    // $(".swiper-property-images").each(function(elem, target){
    //     var swiperProperty = target.swiper;
    //     $(this).hover(function() {
    //         swiperProperty.autoplay.start();
    //     }, function() {
    //         swiperProperty.autoplay.stop();
    //     });
    // });
}
// Browse Properties Swiper - End 

// swiper hero section images
const swiperHeroImages = document.querySelector(".swiper-hero-images");
if (swiperHeroImages) {
    const swiperHero = new Swiper('.swiper-hero-images', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-hero-images .swiper-button-next',
            prevEl: '.swiper-hero-images .swiper-button-prev',
        },
    });
}
// swiper hero section images ends


// Browse Properties Swiper - Start 
// const PropertyTabsSwiper = document.querySelector(".property-tabs-swiper");
// if (PropertyTabsSwiper) {
// const PropertyTabs = new Swiper('.property-tabs-swiper', {
//     loop: false,
//     slidesPerView: 1,
//     spaceBetween: 20,
//     autoplay: {
//         delay: 5000,
//         disableOnInteraction: false,
//     },
//     pagination: {
//         el: '.swiper-pagination',
//         clickable: true,
//     },
//     navigation: {
//         nextEl: '.property-tabs-swiper .swiper-button-next',
//         prevEl: '.property-tabs-swiper .swiper-button-prev',
//     },
// });
// }
// Browse Properties Swiper - End 

// Top Agent Properties Swiper - End 
const swiperTopAgents = document.querySelector(".swiper-top-agents");
if (swiperTopAgents) {
const swiperTop = new Swiper('.swiper-top-agents', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1440: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1700: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
    navigation: {
        nextEl: '.swiper-top-agents .swiper-button-next',
        prevEl: '.swiper-top-agents .swiper-button-prev',
    },
});
}
// Top Agent Properties Swiper - End 

// thumbnail slider swipper starts
var thumbnailswiperslider = new Swiper('.thumbnailswiperslider', {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    autoplay: { 
        delay: 5000, 
        disableOnInteraction: false, 
    },
});

var thumbnailswiper = new Swiper('.thumbnailswiper', {
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
    },
    thumbs: {
        swiper: thumbnailswiperslider,
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    breakpoints: {
        1280: {
            slidesPerView: 1.5,
        },
        320: {
            slidesPerView: 1,
        },
    },
});
// thumbnail slider swipper ends
