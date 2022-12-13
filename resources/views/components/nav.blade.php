<nav class="fixed bg-theme-d3 md:bg-white shadow mb-10 w-full p-1">
    <div x-data="{ isOpen: false }" class="max-w-7xl mx-auto py-3 md:py-0 px-6  md:px-0 md:flex md:justify-between md:items-center">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{'/'}}" ><img src="{{asset('/images/logo6.png')}}" class="h-10 W-15 shadow rounded-full sm:mt-10 md:my-2" alt=""></a>

            </div>
            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button
                    type="button"
                    class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                    aria-label="toggle menu"
                    @click="isOpen = !isOpen"
                >
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu, if mobile set to hidden -->
        <div :class="isOpen ? 'show' : 'hidden'" class="md:flex items-center md:block mt-4 md:mt-0">
            <div class="">
                <ul class="flex flex-col space-y-2 md:space-y-0 px-4 md:px-0 bg-theme-d3 md:bg-white w-full items-start md:flex-row md:ml-6">


                    @auth
                    <li>

                        @if(Auth::user()->isAdmin())

                        <a href="{{ route('admin.panel')}}" class="flex flex-row justify-between text-xl text-bold text-white md:text-theme-d4 hover:text-theme-l2 mr-4">
                           Admin Panel
                        </a>
                        @else
                        <a></a>
                        @endif
                    </li>

                    <li
                    class="mr-4 "
                    x-data="{ isOpen: false, timeout: null }"
                    x-on:mouseenter="isOpen = true; clearTimeout(timeout)"
                    x-on:mouseleave="timeout = setTimeout(() => { isOpen = false }, 300)"
                >



                    <a href="#" class="flex flex-row justify-between text-xl text-bold text-white md:text-theme-d4 hover:text-theme-l2">
                        @if(Auth::user()->profile_photo_path)
                        <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" class="h-8 shadow rounded-full mr-2" alt="">
                        @else
                        <img src="{{ asset('images/dummy.jpeg')}}" class="h-8 shadow rounded-full mr-2" alt="">
                        @endif
                        {{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name}}
                    </a>

                    <ul x-show="isOpen" class="absolute bg-theme-d1 text-white md:text-theme-d4  py-2 rounded">
                        <li class="border-b border-theme-l2 px-5 py-1  hover:bg-theme-l1">
                            <a href="{{route('profile.show')}}" class="block text-sm text-bold text-white hover:text-theme-d4 hover:font-bold">Update Profile</a>
                        </li>
                        @if(!Auth::user()->subscription)
                        <li class="border-b border-theme-l2 px-5 py-1  hover:bg-theme-l1">
                            <a href="{{ route('selsub')}}" class="block text-sm text-bold text-white hover:text-theme-d4 hover:font-bold">Create Subscription</a>
                        </li>
                        @elseif(Auth::user()->subscription->charge_at = '')
                        <li class="border-b border-theme-l2 px-5 py-1  hover:bg-theme-l1">
                            <a href="{{ route('subscribe.show')}}" class="block text-sm text-bold text-white hover:text-theme-d4 hover:font-bold">Start Subscription</a>
                        </li>
                        @else
                        <li class="border-b border-theme-l2 px-5 py-1  hover:bg-theme-l1">
                            <a href="{{ route('subscribe.show')}}" class="block text-sm text-bold text-white hover:text-theme-d4 hover:font-bold">View Subscription</a>
                        </li>

                        @endif
                        <li class="border-b border-theme-l2 px-5 py-1  hover:bg-theme-l1" >
                            <a href="{{ route('sploffsel')}}" class="block text-sm text-bold text-white hover:text-theme-d4 hover:font-bold">Pay SpecialOffering</a>
                        </li>
                        <li class="border-b border-theme-l2 px-5 py-1  hover:bg-theme-l1">
                            <a href="{{ route('splofflist')}}" class="block text-sm text-bold text-white hover:text-theme-d4 hover:font-bold">View SpecialOffering</a>
                        </li>

                        <li class="border-b border-theme-l2 px-5 py-1  hover:bg-theme-l1">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block text-sm text-bold text-white hover:text-theme-d4 hover:font-bold">Logut</a>
                            </form>

                        </li>

                    </ul>
                </li>

                        @else
                        <li class="mr-4">
                            <a href="{{'/login'}}" class="text-xl text-white text-bold md:text-theme-d4 hover:text-theme-d4 hover:font-bold">Login</a>
                        </li>
                        <li>
                            <a href="{{'/register'}}" class="text-xl text-bold text-white md:text-theme-d4 hover:text-theme-d4 hover:font-bold">Register</a>
                        </li>
                    @endauth


                </ul>
            </div>
        </div>
    </div>
</nav>
