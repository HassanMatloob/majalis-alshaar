$(document).ready(function () {
    // Desktop Side bar start
    let openMenu = null;
    $(".iocn-link").click(function (e) {
        let arrowParent = $(this).parent();
        if (openMenu && openMenu[0] !== arrowParent[0]) {
            openMenu.removeClass("showMenu");
            openMenu.removeClass("active");
        }
        arrowParent.toggleClass("showMenu");
        arrowParent.toggleClass("active");
        openMenu = arrowParent;
    });
    $(".sideMenuOpen").click(function () {
        const sidebarClasses = $(".sidebar")[0]
            ?.classList?.toString()
            ?.split(" ");
        const subMenu = $(".sub-menu");
        const ul = $("#sidebar-nav-link");
        if (sidebarClasses.includes("close")) {
            subMenu.css("margin-top", `10px`);
        } else {
            const position = ul.scrollTop();
            const subMenu = $(".sub-menu");
            const offset = position / 16;
            const margin = Number(offset + 4).toFixed(2) + "rem";
            subMenu.css("margin-top", `-${margin}`);
        }

        $(".sidebar").toggleClass("close");
        if (openMenu) {
            openMenu.removeClass("showMenu");
            openMenu = null;
        }
    });
    $("#sidebar-nav-link").scroll(function (e) {
        const sidebarClasses = $("#sidebar-nav-link")
            .parent()[0]
            ?.classList?.toString()
            ?.split(" ");
        if (sidebarClasses?.includes("close")) {
            const subMenu = $(".sub-menu");
            const offset = e.target.scrollTop / 16;
            const margin = Number(offset + 4).toFixed(2) + "rem";
            subMenu.css("margin-top", `-${margin}`);
        }
    });
});

$(document).ready(function () {
    // Mobile Side Bar
    $("#mobileSideBarOpen").click(function () {
        $("#mobileSideBar").removeClass("-translate-x-full");
    });
    $("#mobileSideBarClose").click(function () {
        $("#mobileSideBar").addClass("-translate-x-full");
    });
    $(document).click(function (event) {
        if (
            !$(event.target).closest("#mobileSideBar").length &&
            !$(event.target).closest("#mobileSideBarOpen").length &&
            $("#mobileSideBar").hasClass("translate-x-0")
        ) {
            $("#mobileSideBar").addClass("-translate-x-full");
        }
    });
    // Desktop Menu Dropdown
    $(".dropdown-toggle").click(function () {
        let dropdownID = $(this).data("dropdown");
        $(".dropdown-menu")
            .not("#" + dropdownID)
            .addClass("hidden");
        $("#" + dropdownID).toggleClass("hidden");
    });
    // Mobile Menu Dropdown
    $(".mobile-dropdown-toggle").click(function () {
        let mobiledropdownID = $(this).data("mobiledropdown");
        $(".mobile-menu")
            .not("#" + mobiledropdownID)
            .addClass("hidden");
        $("#" + mobiledropdownID).toggleClass("hidden");
    });
    // Minimize SideBar
    $("#minSidebarBtn").click(function () {
        $("#desktopSideBar").toggleClass("sidebar-open-width");
    });
    // Toggle Theme
    setThemeToLocalStorage(getThemeFromLocalStorage());
    var storedTheme = getThemeFromLocalStorage() ? "dark" : "light";
    $("#theme-select").val(storedTheme);
    $("#theme-select").change(function () {
        var selectedTheme = $(this).val();
        if (selectedTheme === "dark") {
            setThemeToLocalStorage(true);
        } else {
            setThemeToLocalStorage(false);
        }
    });
    //    Content  Tab Section
    $(".tab-link").click(function (e) {
        e.preventDefault();
        var tabId = $(this).data("tab");
        $(".tab-link").removeClass("active-tab");
        $(this).addClass("active-tab");
        $(".tab-content").removeClass("active-tab").hide();
        $('.tab-content[data-tab="' + tabId + '"]')
            .removeClass("active-tab")
            .show();
    });
    $(".tab-content:not(:first)").hide();
});


// Dropdown Custom Code 

$(document).on("click", function (event) {
    // Hide all dropdowns if click is outside any dropdown or button
    if (
        !$(event.target).closest(".acs-dropdown").length &&
        !$(event.target).closest(".acs-btn").length
    ) {
        $(".acs-dropdown").hide();
    }
});

$(".acs-btn").click(function () {
    var dropdownId = $(this).data("dropdown");
    $("#" + dropdownId).toggle();
});

$(".acs-dropdown").click(function (event) {
    event.stopPropagation();
});

 // tabs content button
 $('.tab-button').on('click', function() {
    var activeButton = $('.tab-button.active');

    if (activeButton.length) {
        activeButton.removeClass('active');
    }

    $(this).addClass('active');

    var tab = $(this).data('tab');

    $('.tab-content').each(function() {
        if ($(this).attr('id') === 'tab-' + tab) {
            $(this).removeClass('hidden');
        } else {
            $(this).addClass('hidden');
        }
    });
});
// tabs content button ends


$(document).ready(function() {
    $('.toggle-btn').click(function() {
        // Remove 'active' class from all buttons
        $('.toggle-btn').removeClass('toggleActive').addClass('toggleInactive');
        
        // Add 'active' class to the clicked button
        $(this).removeClass('toggleInactive').addClass('toggleActive');
    });

    // Set default active button (optional)
    $('.toggle-btn').first().click(); // Clicks the first button to set it active by default
});

// Browse Properties Swiper - Start 
const swiperPropertyImages = document.querySelector(".swiper-property-images");
if (swiperPropertyImages) {
    const swiperProperty = new Swiper('.swiper-property-images', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-property-images .swiper-button-next',
            prevEl: '.swiper-property-images .swiper-button-prev',
        },
    });

    $(".swiper-property-images").each(function(elem, target){
        var swiperProperty = target.swiper;
        $(this).hover(function() {
            swiperProperty.autoplay.start();
        }, function() {
            swiperProperty.autoplay.stop();
        });
    });
}
// Browse Properties Swiper - End 

// alpine modal starts
$('.alpine-modal').removeClass('hidden');
// alpine modal ends

// Custom dropdown homebanner starts
$(document).on('click', '.select-btn', function() {
    const $optionMenu = $(this).closest('.select-menu');
    $('.select-menu').not($optionMenu).removeClass('active');
    $optionMenu.toggleClass('active');
});

$(document).on('click', '.option', function() {
    const $option = $(this);
    const selectedOption = $option.find('.option-text').text();
    const $optionMenu = $option.closest('.select-menu');
    const $sBtn_text = $optionMenu.find('.sBtn-text');

    $sBtn_text.text(selectedOption);
    $optionMenu.removeClass('active');
});

$(document).on('click', function(event) {
    if (!$(event.target).closest('.select-menu').length) {
        $('.select-menu').removeClass('active');
    }
});
// Custom dropdown homebanner ends

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

// profile dropdown starts
$('#profileDropdown').click(function(event) {
    event.stopPropagation();
    $('#dropdownMenu').toggleClass('hidden');
    $('#caretIcon').toggleClass('rotate-180');
});

$(document).click(function() {
    $('#dropdownMenu').addClass('hidden');
    $('#caretIcon').removeClass('rotate-180');
});
// profile dropdown ends
