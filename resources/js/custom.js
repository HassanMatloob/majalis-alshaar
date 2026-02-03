
$(document).ready(function() {
    $('ul li').removeClass('active');
        $('ul li a').on('click', function() {
            $('ul li').removeClass('active'); 
            $(this).parent().addClass('active');
        });
        const currentUrl = window.location.href;
        $('ul li a').each(function() {
            if (this.href === currentUrl) {
                $(this).parent().addClass('active');
            }
        });
    // header li color changes ends

    // mobile menu button script
    const mobileMenuButton = $('#mobile-menu-button');
    const mobileMenuCloseButton = $('#mobile-menu-close-button');
    const mobileMenu = $('#mobile-menu');

    mobileMenuButton.on('click', function() {
        mobileMenu.removeClass('-translate-x-full').addClass('translate-x-0');
    });

    mobileMenuCloseButton.on('click', function() {
        mobileMenu.removeClass('translate-x-0').addClass('-translate-x-full');
    });

    // mobile menu button script ends

    // mobile view sidebar menu item dropdown
    const mobileMenuItemToggle = $('#mobile-properties-toggle');
    const mobileDropdown = $('#mobile-dropdown');
    mobileMenuItemToggle.on('click', function() {
        mobileDropdown.slideToggle(300);
        $(this).find('i').toggleClass('bx-chevron-down bx-chevron-up');
    });
    $('.category-toggle').on('click', function() {
        const subcategories = $(this).next('.subcategory-list');
        subcategories.slideToggle(300); // Same duration here
        $(this).find('i').toggleClass('bx-chevron-down bx-chevron-up');
    });
    // mobile view sidebar menu item dropdown ends

    // mega menu dropdown header
    $('#propertiesToggle').on('mouseover', function() {
        $('#dropdown').removeClass('hidden');
    });

    $('#dropdown').on('mouseleave', function() {
        $('#dropdown').addClass('hidden');
    });

    $('#dropdown .relative').on('mouseenter', function() {
        $(this).find('.subcategories').removeClass('hidden');
    }).on('mouseleave', function() {
        $(this).find('.subcategories').addClass('hidden');
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('#propertiesToggle, #dropdown').length) {
            $('#dropdown').addClass('hidden');
            $('.subcategories').addClass('hidden');
        }
    });
    // mega menu dropdown header ends

    // Home banner tabs start
    $('.tab-button-banner').on('click', function() {
        var $activeButton = $('.tab-button-banner.active');
        $activeButton.removeClass('active');
        $(this).addClass('active');
        $('.tab-content-banner').addClass('hidden');
        var tab = $(this).data('tab');
        $('#tab-banner-' + tab).removeClass('hidden');
    });
    // Home banner tabs end

    // alpine modal starts
    $('.alpine-modal').removeClass('hidden');
    // alpine modal ends

    // Category filters select button starts
    $('.filter-button').on('click', function() {
        $('.filter-button').removeClass('bg-[#EAEAFF]');
        $(this).addClass('bg-[#EAEAFF]');
    });
    // Category filters select button ends

    // modal homebanner select button starts
    $('.select-btn-1').click(function() {
        $('.select-btn-1').css('background-color', '');
        $(this).css('background-color', '#EAEAFF');
    });
    $('.select-btn-2').click(function() {
        $('.select-btn-2').css('background-color', '');
        $(this).css('background-color', '#EAEAFF');
    });
    $('.select-btn-3').click(function() {
        $('.select-btn-3').css('background-color', '');
        $(this).css('background-color', '#EAEAFF');
    });
    $('.select-btn-4').click(function() {
        $('.select-btn-4').css('background-color', '');
        $(this).css('background-color', '#EAEAFF');
    });
    $('.select-btn-5').click(function() {
        $('.select-btn-5').css('background-color', '');
        $(this).css('background-color', '#EAEAFF');
    });
    // modal homebanner select button ends

    // category against data show starts
    $('.residential-filters').on('click', function() {
        $('.filter-section').removeClass('hidden').addClass('flex');
        $('.filter-section-2').removeClass('flex').addClass('hidden');
        $('.filter-section-3').removeClass('flex').addClass('hidden');
        $('.filter-section-4').removeClass('flex').addClass('hidden');
    });

    $('.commercial-filters').on('click', function() {
        $('.filter-section').removeClass('flex').addClass('hidden');
        $('.filter-section-2').removeClass('hidden').addClass('flex');
        $('.filter-section-3').removeClass('flex').addClass('hidden');
        $('.filter-section-4').removeClass('flex').addClass('hidden');
    });

    $('.hotel-filters').on('click', function() {
        $('.filter-section').removeClass('flex').addClass('hidden');
        $('.filter-section-2').removeClass('flex').addClass('hidden');
        $('.filter-section-3').removeClass('hidden').addClass('flex');
        $('.filter-section-4').removeClass('flex').addClass('hidden');
    });

    $('.development-filters').on('click', function() {
        $('.filter-section').removeClass('flex').addClass('hidden');
        $('.filter-section-2').removeClass('flex').addClass('hidden');
        $('.filter-section-3').removeClass('flex').addClass('hidden');
        $('.filter-section-4').removeClass('hidden').addClass('flex');
    });
    // category against data show starts ends

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
    
});
