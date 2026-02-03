@extends('layouts.app')
@section('content')
<section class="relative lg:block hidden text-center text-white lg:h-[243px] h-auto bg-cover bg-center" style="background-image: url('{{ asset('images/residential-banner.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center h-full">
            <div class="mt-[68px] lg:mb-0 mb-5 container">
                <div class="bg-white text-black p-6 rounded-bl-lg rounded-tl-lg rounded-r-lg shadow-lg w-full">
                    <x-filters route='agencies'></x-filters> 
                </div>
            </div>
        </div>   
</section>
<section class="mt-12 container">
    <h1 class="text-2xl font-normal text-black">{{$totalAgencies}} results found</h1>
    <div class="grid sm:grid-cols-2 grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-6 mt-12" id="agency-container">
        <x-agency-card :agencies="$agencies"></x-agency-card>
    </div>
    <div class="container w-full mt-24 flex justify-center">
        <button class="w-[185px] h-[55px] bg-primary hover:bg-primaryHover text-white text-[18px] rounded-lg items-center load-more-data" id="loadMore">Load More</button>
    </div>
</section>
<section class="xl:mt-24 mt-16">
    <x-start-listing></x-start-listing>
</section>
<script>
    var ENDPOINT = "{{ route('agencies') }}";
    var page = 1;

    $(".load-more-data").click(function(){
        page++;
        infinteLoadMore(page);
    });

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
            })
            .done(function (response) {
                if (response.html == '') {
                    $('.load-more-data').hide();
                    return;
                }
                $("#agency-container").append(response.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@endsection