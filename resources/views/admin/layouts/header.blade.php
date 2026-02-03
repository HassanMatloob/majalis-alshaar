 <!-- Mobile sidebar -->
 <div id="mobileSideBar"
     class="fixed inset-0 items-end bg-[#4345632C] backdrop-blur-sm sm:items-center sm:justify-center z-50 transform -translate-x-full transition-max-width duration-700 ease-in-out bottom-0 left-0 inset-y-0 xl:hidden block">
     <div
         class="scroll-bar h-screen z-50 flex flex-col justify-between gap-6 inset-y-0 flex-shrink-0 w-80 overflow-y-auto bg-[#191A23] border-r-[1px] border-[#2C2D3C] px-4 py-5 relative">
         <div class="absolute top-4 right-4">
             <button class="bg-[#6E79D6] text-2xl rounded-full p-1 flex justify-center items-center"
                 id="mobileSideBarClose">
                 <i class="bx bx-x text-black"></i>
             </button>
         </div>
         <div class="sidebar h-full ">
             <ul class="nav-links">
                 <li>
                     <a href="#" class="p-2 bg-[#85869833] rounded flex items-center gap-3">
                         <img src="{{ asset('images/dashboard.svg') }}" class="w-4" alt="" />
                         <span class="text-black text-sm font-medium">Dashboard</span>
                     </a>
                 </li>
                 <li>
                     <div class="iocn-link p-2 rounded">
                         <a href="#" class="flex items-center gap-3">
                             <img src="{{ asset('images/analysis.svg') }}" class="w-4" alt="" />
                             <span class="text-black text-sm font-medium">Analysis</span>
                         </a>
                         <i class="bx bxs-chevron-down arrow text-[#858699]"></i>
                     </div>
                     <ul class="sub-menu arrow sub-menu-1 flex flex-col gap-3">
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/user-analysis.svg') }}" class="w-4" alt="" />
                                 <span>User Analysis</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/content-analysis.svg') }}" class="w-4" alt="" />
                                 <span>Content Analysis</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/survey-report.svg') }}" class="w-4" alt="" />
                                 <span>Survey Report</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <div class="iocn-link p-2 rounded">
                         <a href="#" class="flex items-center gap-3">
                             <img src="{{ asset('images/management.svg') }}" class="w-4" alt="" />
                             <span class="text-black text-sm font-medium">Management</span>
                         </a>
                         <i class="bx bxs-chevron-down arrow text-[#858699]"></i>
                     </div>
                     <ul class="sub-menu arrow sub-menu-1 flex flex-col gap-3">
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/content-upload.svg') }}" class="w-4" alt="" />
                                 <span>Content Upload</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/content-management.svg') }}" class="w-4"
                                     alt="" />
                                 <span>Content Management</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/category-tags.svg') }}" class="w-4" alt="" />
                                 <span>Category & Tag</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <div class="iocn-link p-2 rounded">
                         <a href="#" class="flex items-center gap-3">
                             <img src="{{ asset('images/afiliate.svg') }}" class="w-4" alt="" />
                             <span class="text-black text-sm font-medium">Affiliate</span>
                         </a>
                         <i class="bx bxs-chevron-down arrow text-[#858699]"></i>
                     </div>
                     <ul class="sub-menu arrow sub-menu-1 flex flex-col gap-3">
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/analytics.svg') }}" class="w-4" alt="" />
                                 <span>Analytics</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/compaign.svg') }}" class="w-4" alt="" />
                                 <span>Campaign</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/afiliate.svg') }}" class="w-4" alt="" />
                                 <span>Affiliate</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/sales.svg') }}" class="w-4" alt="" />
                                 <span>Sales & Commissions</span>
                             </a>
                         </li>
                         <li>
                             <a href="#" class="rounded flex items-center gap-3">
                                 <img src="{{ asset('images/setting.svg') }}" class="w-4" alt="" />
                                 <span>Setting</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="#" class="p-2 rounded flex items-center gap-3">
                         <img src="{{ asset('images/api-management.svg') }}" class="w-4" alt="" />
                         <span class="text-black text-sm font-medium">API Management</span>
                     </a>
                 </li>
                 <div>
                     <a href="#" class="p-2 rounded flex items-center gap-3">
                         <img src="{{ asset('images/invite-people.svg') }}" class="w-4" alt="" />
                         <span class="text-black text-sm font-medium">Invite people</span>
                     </a>
                     <a href="#" class="p-2 rounded flex items-center gap-3">
                         <img src="{{ asset('images/help-support.svg') }}" class="w-4" alt="" />
                         <span class="text-black text-sm font-medium">Help & Support</span>
                     </a>
                 </div>
             </ul>
         </div>
         <div class="flex flex-col gap-3">
             <div class="p-2 bg-[#1D1E2B] rounded text-[#EEEFFC] text-sm font-medium border-[1px] border-[#292B41]">
                 App version 3.1
             </div>
             <div
                 class="p-2 bg-[#1D1E2B] rounded text-[#EEEFFC] text-sm font-medium border-[1px] border-[#292B41] flex items-start gap-2 relative">
                 <div class="absolute top-1 right-1">
                     <i class='bx bx-x'></i>
                 </div>
                 <img src="{{ asset('images/import-issuse.svg') }}" class="w-3" alt="" />
                 <div class="flex flex-col gap-2">
                     <h6 class="text-xs font-medium text-[#EEEFFC]">Import Issues</h6>
                     <p class="text-xs text-[#858699]">
                         Use our Migration Assistant to copy issues from another service.
                     </p>
                     <a class="text-[#575BC7] font-medium flex items-center text-xs">
                         Try Now
                         <i class="bx bx-right-arrow-alt text-[#575BC7]"></i>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </div>



 <!-- Mobile Header  -->
 <div class="lg:hidden flex items-center justify-between">
     <!-- Mobile hamburger -->
     <button
         class="w-12 h-12 bg-[#4345632C] md:shadow-none shadow-md rounded-full focus:outline-none focus:shadow-outline-purple flex justify-center items-center"
         id="mobileSideBarOpen">
         <i class="bx bx-menu text-white text-2xl"></i>
     </button>
     <div class="flex items-center gap-4">
         <div class="flex items-center gap-2">
             <div class="h-7 w-7 rounded bg-[#575BC7] flex items-center justify-center gap-0 text-[#EEEFFC] text-xs">
                 <span>M</span>
                 <span>W</span>
             </div>
             <span class="text-sm font-medium text-[#EEEFFC]">My Workspace
             </span>
         </div>
         <div>
             <img src="{{ asset('images/avatar.svg') }}" class="object-cover rounded-full w-5 h-5" />
         </div>
     </div>
 </div>

 <!-- back breadcrumb  -->
 <div class="flex justify-between w-full bg-white h-[80px] p-8">
    <div class="flex items-center gap-3">
        <i class='bx bxs-home'></i>
         <span class="font-semibold text-sm">Dashboard</span>
     </div>
     <div class="flex items-center gap-3">
        <div class="relative">
            <div id="profileDropdown" class="flex items-center gap-2 cursor-pointer">
                <div class="flex gap-3 items-center">
                    <div>
                        <img src="/images/profile.png" alt="">
                    </div>
                    <div>
                        <h1 class="text-base font-semibold text-[#575757]">{{ Auth::user()->name }}</h1>
                        <p class="text-[#575757] font-normal text-xs">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div>
                    <i id="caretIcon" class='bx bx-caret-down transition-transform'></i>
                </div>
            </div>
    
            <!-- Dropdown menu -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                <a href="{{ route('admin.profile') }}" class="px-4 py-2 text-gray-700 hover:bg-gray-100 flex w-full">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-gray-700 hover:bg-gray-100 flex w-full">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    
     </div>
 </div>
 