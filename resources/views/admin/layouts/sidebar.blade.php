 <!-- Desktop sidebar -->
 <div
     class="w-[250px] h-screen sidebar scroll-bar relative flex-shrink-0 hidden lg:flex flex-col  gap-4 bg-white text-black px-4 py-5">
     <div class="h-full">

         <!-- logo Icon  -->
         <div class="flex items-center">
             <div>
                 <img src="{{ asset('images/majalis-alshaar-logo.png') }}" />
             </div>
         </div>
         <!-- nav Links -->
         <ul class="nav-links">
            <li>
                <a href="{{route('admin.dashboard')}}" class="px-4 py-3 rounded-lg flex items-center gap-3 hover:bg-[#FFEFE1] {{ request()->routeIs('admin.dashboard') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary hover:text-[#FF7800]' }}">
                    <i class='bx bxs-home text-xl'></i>
                    <span class="text-sm font-semibold">Dashboard</span>
                </a>
            </li>

            <!-- Admin Sidebar  -->
            <li>
                <a href="{{ route('admin.projects') }}" class="px-4 py-3 rounded-lg flex items-center gap-3 hover:bg-[#FFEFE1] hover:text-secondary {{ request()->routeIs('admin.projects') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary hover:text-[#FF7800]' }}">
                    <i class='bx bxs-calculator text-xl'></i>
                    <span class="text-sm font-semibold">Projects</span>
                </a>
            </li>
            {{--<li class="{{ request()->routeIs('admin.agencies') || request()->routeIs('admin.agencies.requests') ? 'showMenu active' : '' }}">
                <div class="iocn-link rounded-lg">
                    <a href="#" class="px-4 py-3 w-full rounded-lg flex items-center gap-3 hover:bg-[#FFEFE1] {{ request()->routeIs('admin.agencies') || request()->routeIs('admin.agencies.requests') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary hover:text-[#FF7800]' }}">
                        <i class='bx bx-bookmarks text-xl'></i>
                        <span class="font-semibold text-sm">Agencies</span>
                    </a>
                </div>
                <ul class="sub-menu arrow sub-menu-1 flex flex-col gap-3">
                    <li>
                        <a href="{{ route('admin.agencies') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.agencies') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            Manage Agencies
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.agencies.requests') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.agencies.requests') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            New Agencies Request
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{  request()->routeIs('admin.home') || request()->routeIs('admin.properties') || request()->routeIs('admin.agencie') || request()->routeIs('admin.about') || request()->routeIs('admin.contact') || request()->routeIs('admin.login') ? 'showMenu active' : '' }}">
                <div class="iocn-link rounded-lg">
                    <a href="#" class="px-4 py-3 w-full rounded-lg flex items-center gap-3 hover:bg-[#FFEFE1] {{ request()->routeIs('admin.home') || request()->routeIs('admin.properties') || request()->routeIs('admin.agencie') || request()->routeIs('admin.about') || request()->routeIs('admin.contact') || request()->routeIs('admin.login') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary hover:text-[#FF7800]' }}">
                        <i class='bx bx-bookmarks text-xl'></i>
                        <span class="font-semibold text-sm">Website Management</span>
                    </a>
                </div>
                <ul class="sub-menu arrow sub-menu-1 flex flex-col gap-3">
                    <li>
                        <a href="{{ route('admin.home') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.home') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.properties') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.properties') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            Properties
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.agencie') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.agencie') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            Agencies
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.about') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.about') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            About us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.contact') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.contact') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.login') }}" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 {{ request()->routeIs('admin.login') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary' }}">
                            Login/Register
                        </a>
                    </li>
                </ul>
            </li>--}}
            {{--<li>
                <div class="iocn-link rounded-lg group">
                    <a href="#" class="px-4 py-3 w-full rounded-lg flex items-center gap-3 group-hover:bg-[#FFEFE1] text-primary group-hover:text-[#FF7800]">
                        <i class='bx bxs-bookmarks text-xl text-primary group-hover:text-[#FF7800]'></i>
                        <span class="font-semibold text-sm group-hover:text-[#FF7800]">Website Management</span>
                    </a>
                </div>                
                <ul class="sub-menu arrow sub-menu-1 flex flex-col gap-3">
                    <li>
                        <a href="#" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 text-primary font-semibold">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 text-primary font-semibold">
                            Properties
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 text-primary font-semibold">
                            Agencies
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 text-primary font-semibold">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 text-primary font-semibold">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rounded flex items-center gap-3 hover:bg-[#FFEFE1] p-2 text-primary font-semibold">
                            Login/Register
                        </a>
                    </li>
                </ul>
            </li>--}}
            <li>
                <a href="{{ route('admin.categories') }}" class="px-4 py-3 rounded-lg flex items-center gap-3 hover:bg-[#FFEFE1] {{ request()->routeIs('admin.categories') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary hover:text-[#FF7800]' }}">
                    <i class='bx bxs-credit-card-front text-xl'></i>
                    <span class="text-sm font-semibold">Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.messages') }}" class="px-4 py-3 rounded-lg flex items-center gap-3 hover:bg-[#FFEFE1] {{ request()->routeIs('admin.messages') ? 'bg-[#FFEFE1] text-[#FF7800]' : 'text-primary hover:text-[#FF7800]' }}">
                    <i class='bx bxs-credit-card-front text-xl'></i>
                    <span class="text-sm font-semibold">Messages</span>
                </a>
            </li>
        </ul>        
     </div>
 </div>
