@extends('admin.layouts.app')
@section('title', 'Agency - Revise Plan')
@section('admin.content')
<style>
    #container-radialbar {
        width: 100%;
        height: 100%;
    }
    .highcharts-credits{
        display: none;
    }
     .highcharts-no-tooltip{
        display: none !important;
    }
</style>
<div class="flex sm:justify-between flex-wrap items-center">
    <div>
        <h1 class="text-[#575757] text-4xl font-semibold">Revise Plan</h1>
    </div>
    <div>
       <a href="{{ route('agency.revise.plan.request') }}" class="text-white bg-primary hover:bg-primaryHover px-3 py-4 rounded-lg text-base font-semibold">Request Plan Revision</a>
    </div>
</div>

@if (session('error'))
    <p class="mt-5 bg-red-600 text-white px-4 py-2 rounded text-center">{{ session('error') }}</p>
@endif

<section class="mt-10 mb-20">
    <h1 class="text-[20px] font-semibold text-[#575757]">Plan Details</h1>
    <div class="grid xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-7 mt-6">
        <div class=" h-auto bg-white rounded-lg p-4 w-full">
            <div id="container-radialbar"></div>
           <div class="flex flex-col relative bottom-16">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#D9D9D9] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Total Listings</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ $total_allowed_listings }}</span>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#575757] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Used Listings</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ $total_listings }}</span>
                </div>
           </div>
        </div>
        <div class=" h-auto bg-white rounded-lg p-4 w-full">
            <div id="container-radialbar-chart2"></div>
           <div class="flex flex-col relative bottom-[-10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#D9D9D9] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Total Featured Listings</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ $total_allowed_featured_listings }}</span>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#575757] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Used Featured Listings</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ $total_featured_listings }}</span>
                </div>
           </div>
        </div>
        <div class=" h-auto bg-white rounded-lg p-4 w-full">
            <div id="container-radialbar-chart3"></div>
           <div class="flex flex-col relative bottom-[-10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#D9D9D9] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Total Duration</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ number_format($agency?->plan?->duration) }} month(s)</span>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#575757] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Used Duration</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ $agency?->plan_spent == 'Expired' ? number_format($agency?->plan?->duration) . ' (' . 'Expired' . ')' : $agency?->plan_spent  }}</span>
                </div>
           </div>
        </div>
        <div class=" h-auto bg-white rounded-lg p-4 w-full">
            <div id="container-radialbar-chart4"></div>
           <div class="flex flex-col relative bottom-[-10px]">
                <div class="flex items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#D9D9D9] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Total Agents</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ number_format($agency?->plan?->allowed_agents) }}</span>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex gap-2 items-center">
                        <p class="block w-4 h-4 bg-[#575757] rounded-full"></p>
                        <h1 class="text-[#575757] text-[18px]">Used Agents</h1>
                    </div>
                    <span class="font-bold text-[#575757] text-[18px]">{{ $agency?->agents->count() }}</span>
                </div>
           </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var chart = Highcharts.chart('container-radialbar', {
            chart: {
                type: 'solidgauge',
                height: '100%',
                backgroundColor: 'transparent',
                marginTop: 70
            },
            title: {
                text: 'Total Listings',
                style: {
                    fontSize: '16px',
                    color: '#575757'
                },
                align: 'start',
                verticalAlign: 'top',
                y: 20
            },
            pane: {
                startAngle: 0,
                endAngle: 360,
                background: [{ // Track for Total Listings
                    outerRadius: '112%',
                    innerRadius: '88%',
                    backgroundColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 0
                }]
            },
            yAxis: {
                min: 0,
                max: {{ $total_allowed_listings }},
                lineWidth: 0,
                tickPositions: []
            },
            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        enabled: true,
                        borderWidth: 0,
                        format: '{y}/{{$agency?->plan?->allowed_listings}}',
                        style: {
                            fontSize: '20px',
                            color: '#575757'
                        },
                        y: -20
                    },
                    linecap: 'round',
                    stickyTracking: false,
                    rounded: true
                }
            },
            series: [{
                name: 'Used Listings',
                data: [{
                    color: '#666',
                    radius: '112%',
                    innerRadius: '88%',
                    y: {{ $total_listings }}
                }]
            }],
            tooltip: {
                enabled: false
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var chart = Highcharts.chart('container-radialbar-chart2', {
            chart: {
                type: 'solidgauge',
                height: '100%',
                backgroundColor: 'transparent',
                marginTop: 70
            },
            title: {
                text: 'Featured Listings',
                style: {
                    fontSize: '16px',
                    color: '#575757'
                },
                align: 'start',
                verticalAlign: 'top',
                y: 20
            },
            pane: {
                startAngle: 0,
                endAngle: 360,
                background: [{ // Track for Total Listings
                    outerRadius: '112%',
                    innerRadius: '88%',
                    backgroundColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 0
                }]
            },
            yAxis: {
                min: 0,
                max: {{ $total_allowed_featured_listings }},
                lineWidth: 0,
                tickPositions: []
            },
            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        enabled: true,
                        borderWidth: 0,
                        format: '{y}/{{ $total_allowed_featured_listings }}',
                        style: {
                            fontSize: '20px',
                            color: '#575757'
                        },
                        y: -20 // Adjust the vertical position
                    },
                    linecap: 'round',
                    stickyTracking: false,
                    rounded: true
                }
            },
            series: [{
                name: 'Used Listings',
                data: [{
                    color: '#666',
                    radius: '112%',
                    innerRadius: '88%',
                    y: {{ $total_featured_listings }}
                }]
            }],
            tooltip: {
                enabled: false
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var chart = Highcharts.chart('container-radialbar-chart3', {
            chart: {
                type: 'solidgauge',
                height: '100%',
                backgroundColor: 'transparent',
                marginTop: 70
            },
            title: {
                text: 'Time Duration',
                style: {
                    fontSize: '16px',
                    color: '#575757'
                },
                align: 'start',
                verticalAlign: 'top',
                y: 20
            },
            pane: {
                startAngle: 0,
                endAngle: 360,
                background: [{ // Track for Total Listings
                    outerRadius: '112%',
                    innerRadius: '88%',
                    backgroundColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 0
                }]
            },
            yAxis: {
                min: 0,
                max: {{ number_format($agency?->plan?->duration) }},
                lineWidth: 0,
                tickPositions: []
            },
            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        enabled: true,
                        borderWidth: 0,
                        format: '{y}/{{ number_format($agency?->plan?->duration) }}',
                        style: {
                            fontSize: '20px',
                            color: '#575757'
                        },
                        y: -20 // Adjust the vertical position for centering
                    },
                    linecap: 'round',
                    stickyTracking: false,
                    rounded: true
                }
            },
            series: [{
                name: 'Used Listings',
                data: [{
                    color: '#666',
                    radius: '112%',
                    innerRadius: '88%',
                    y: {{ $time_spent == 'Expired' ? number_format($agency?->plan?->duration) : (int) $time_spent }}
                }]
            }],
            tooltip: {
                enabled: false
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var chart = Highcharts.chart('container-radialbar-chart4', {
            chart: {
                type: 'solidgauge',
                height: '100%',
                backgroundColor: 'transparent',
                marginTop: 70
            },
            title: {
                text: 'Agents',
                style: {
                    fontSize: '16px',
                    color: '#575757'
                },
                align: 'start',
                verticalAlign: 'top',
                y: 20
            },
            pane: {
                startAngle: 0,
                endAngle: 360,
                background: [{ // Track for Total Listings
                    outerRadius: '112%',
                    innerRadius: '88%',
                    backgroundColor: 'rgba(0, 0, 0, 0.1)',
                    borderWidth: 0
                }]
            },
            yAxis: {
                min: 0,
                max: {{ number_format($allowed_agents) }},
                lineWidth: 0,
                tickPositions: []
            },
            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        enabled: true,
                        borderWidth: 0,
                        format: '{y}/{{ number_format($allowed_agents) }}',
                        style: {
                            fontSize: '20px',
                            color: '#575757'
                        },
                        y: -20 // Adjust the vertical position for centering
                    },
                    linecap: 'round',
                    stickyTracking: false,
                    rounded: true
                }
            },
            series: [{
                name: 'Used Agents',
                data: [{
                    color: '#666',
                    radius: '112%',
                    innerRadius: '88%',
                    y: {{ (int) $agents_used }}
                }]
            }],
            tooltip: {
                enabled: false
            }
        });
    });
</script>

@endsection