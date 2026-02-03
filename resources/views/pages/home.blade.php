@extends('layouts.app')
@section('content')
    {{-- hero section --}}
    <x-main-hero></x-main-hero>
    {{-- hero section end --}}

    {{-- featured project section --}}
    <section class="container mx-auto mt-[85px]">
        <h1 class="sm:text-[32px] text-2xl font-bold text-black">{{ __('translation.featured-projects') }}</h1>
        <div class="relative mt-[30px]">
            <div class="swiper-featured-properties overflow-hidden p-1">
                <div class="swiper-wrapper">
                    @foreach ($featuredProjects as $featuredProject)
                        <div class="swiper-slide">
                            <a href="{{ route('project.detail', $featuredProject->slug) }}">
                                <x-project-card :project="$featuredProject"></x-project-card>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-navigation-sm">
                    <div class="swiper-button-next featured-section-next right-to-left-next"></div>
                    <div class="swiper-button-prev featured-section-prev right-to-left-prev"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- featured property section end --}}


    {{-- Browse property section --}}
    @foreach($categories as $category)
    @if($category->projects->isNotEmpty())
    <section class="container mx-auto mt-[85px]">
        <div class="flex flex-row gap-5 mt-[31px] justify-between items-center">
            <h1 class="sm:text-[32px] text-2xl font-bold text-black">{{$category->name}}</h1>
                <a href="{{ route('projects') }}?cat={{ $category->name }}"
                        class="py-2 px-3 bg-primary hover:bg-primaryHover text-white text-base font-semibold rounded-lg">{{ __('translation.view all') }}
                </a>
        </div>
        <div class="w-full mt-8">
            <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5" id="properties-container">
                @foreach ($category->projects as $project)
                    <a href="{{ route('project.detail', $project->slug) }}">
                        <x-project-card :project="$project"></x-project-card>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endforeach
    {{-- Browse property section end --}}

    {{-- register now section --}}
    <section class="mt-[85px]">
        <div class="relative bg-cover bg-center sm:h-[600px] h-screen parallax-section"
            style="background-image: url('{{ asset('images/register-now-bg.png') }}');">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="container relative flex flex-col items-center justify-center h-full text-center text-white">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold sm:leading-[62px] max-w-2xl">
                    {{ __('translation.elevating-spaces-with-innovative-outdoor-solutions') }}
                </h1>
                <p class="text-[20px] font-normal mt-6 max-w-2xl sm:leading-[26px]">
                    {{ __('translation.shading-systems-and-custom-structures-for-homes-and-businesses') }}
                </p>
                <a href="https://wa.me/{{ config('app.whatsapp_number') }}" target="_blank"
                    class="inline-flex gap-2 bg-primary hover:bg-primaryHover text-white font-semibold mt-16 w-[254px] h-[55px] flex justify-center items-center rounded-lg text-[15px]">
                    <i class="bx bxl-whatsapp text-xl"></i>
                    {{ __('translation.talk-to-us-now') }}
                </a>
            </div>
        </div>
    </section>
    {{-- register now section end --}}

    {{-- Frequently Asked Question --}}
    <section class="mt-[85px] mb-[85px] container mx-auto">
        <h1 class="sm:text-[32px] text-2xl font-bold text-black">{{ __('translation.frequently-asked-questions') }}</h1>
        <div class="tab-content-freq mt-[30px]" data-tab="1">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                <ul class="accordion" id="accordion-1">
                    <div class="flex flex-col gap-5 w-full">
                        <div>
                            <li class="accordion-item 2xl:p-5 p-4 border border-primary rounded-lg">
                                <div class="accordion-btn cursor-pointer relative">
                                    <div class="icon-wrapper flex justify-center items-center text-black absolute rtl:left-0 ltr:right-0 top-0 w-[10%]">
                                        <i class='bx bx-plus text-xl text-primary'></i>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4 relative faqs-accordian w-[90%]">
                                        <h1 class="text-primary sm:text-base text-sm font-semibold">{{ __('translation.faq1') }}</h1>
                                    </div>
                                </div>
                                <div class="accordion-content mt-4 hidden">
                                    <h1 class="color-h1 text-sm">{{ __('translation.faq1_answer') }}</h1>
                                </div>
                            </li>
                        </div>
                        <div>
                            <li class="accordion-item 2xl:p-5 p-4 border border-primary rounded-lg">
                                <div class="accordion-btn cursor-pointer relative">
                                    <div class="icon-wrapper flex justify-center items-center text-black absolute rtl:left-0 ltr:right-0 top-0  w-[10%]">
                                        <i class='bx bx-plus text-xl text-primary'></i>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4 relative faqs-accordian w-[90%]">
                                        <h1 class="text-primary sm:text-base text-sm font-semibold">{{ __('translation.faq2') }}</h1>
                                    </div>
                                </div>
                                <div class="accordion-content mt-4 hidden">
                                    <h1 class="color-h1 text-sm">{{ __('translation.faq2_answer') }}</h1>
                                </div>
                            </li>
                        </div>
                    </div>
                </ul>
                <ul class="accordion" id="accordion-2">
                    <div class="flex flex-col gap-5 w-full">
                        <div>
                            <li class="accordion-item 2xl:p-5 p-4 border border-primary rounded-lg">
                                <div class="accordion-btn cursor-pointer relative">
                                    <div class="icon-wrapper flex justify-center items-center text-black absolute rtl:left-0 ltr:right-0 top-0  w-[10%]">
                                        <i class='bx bx-plus text-xl text-primary'></i>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4 relative faqs-accordian w-[90%]">
                                        <h1 class="text-primary sm:text-base text-sm font-semibold">{{ __('translation.faq3') }}</h1>
                                    </div>
                                </div>
                                <div class="accordion-content mt-4 hidden">
                                    <h1 class="color-h1 text-sm">{{ __('translation.faq3_answer') }}</h1>
                                </div>
                            </li>
                        </div>
                        <div>
                            <li class="accordion-item 2xl:p-5 p-4 border border-primary rounded-lg">
                                <div class="accordion-btn cursor-pointer relative">
                                    <div class="icon-wrapper flex justify-center items-center text-black absolute rtl:left-0 ltr:right-0 top-0  w-[10%]">
                                        <i class='bx bx-plus text-xl text-primary'></i>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4 relative faqs-accordian w-[90%]">
                                        <h1 class="text-primary sm:text-base text-sm font-semibold">{{ __('translation.faq4') }}</h1>
                                    </div>
                                </div>
                                <div class="accordion-content mt-4 hidden">
                                    <h1 class="color-h1 text-sm">{{ __('translation.faq4_answer') }}</h1>
                                </div>
                            </li>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </section>

    {{-- start listing section starts --}}
    <section class="mt-[86px]">
        <x-start-listing></x-start-listing>
    </section>
    {{-- start listing section ends --}}

    {{-- Frequently Asked Question end --}}
    <script>
        $(document).ready(function() {
            $(".faq-question").click(function() {
                $(".faq-answer").slideUp();
                $(".faq-icon").text("+");

                var answer = $(this).next(".faq-answer");
                if (!answer.is(":visible")) {
                    answer.slideDown();
                    $(this).find(".faq-icon").text("-");
                }
            });
        });
        $(document).ready(function() {
            function Accordion(el, multiple) {
                this.el = el || {};
                this.multiple = multiple || false;
                var links = this.el.find('.accordion-btn');
                links.on('click', {
                    el: this.el,
                    multiple: this.multiple
                }, this.dropdown);
            }

            Accordion.prototype.dropdown = function(e) {
                var $el = e.data.el;
                var $this = $(this);
                var $next = $this.next('.accordion-content');

                $next.slideToggle();
                $this.parent().toggleClass('open active');

                $this.find('i').toggleClass('bx-plus bx-x');
                if ($this.parent().hasClass('active')) {
                    $this.closest('.accordion-item').css('background-color', '#FFFFFF');
                    $this.closest('.accordion-item').find('.color-h1').css('color', 'black');
                } else {
                    $this.closest('.accordion-item').css('background-color', '#FFFFFF');
                    $this.closest('.accordion-item').find('.color-h1').css('color', 'black');
                }

                if (!e.data.multiple) {
                    $el.find('.accordion-content').not($next).slideUp().parent().removeClass('open active')
                        .find('i').removeClass('bx-x').addClass('bx-plus');
                    $el.find('.accordion-item').not($this.closest('.accordion-item')).css('background-color',
                        '#FFFFFF');
                    $el.find('.accordion-item').not($this.closest('.accordion-item')).find('.color-h1').css(
                        'color', 'black');
                }
            }

            var accordion1 = new Accordion($('#accordion-1'), false);
            var accordion2 = new Accordion($('#accordion-2'), false);
            var accordion3 = new Accordion($('#accordion-3'), false);
        });
    </script>
@endsection
