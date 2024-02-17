<style>
    #navigation-menu {
        height: calc(100vh - 4rem);
    }

    .navigation-link:hover .navigation-submenu {
        display: block !important;
    }
</style>

<header class="bg-blue-900 sticky top-0" style="z-index:900" x-data="dropdown()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center h-16 justify-between md:justify-start">
        <a :class="{'bg-opacity-100 text-orange-500':open}" x-on:click="show()"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">Categorias</span>
        </a>

        <a href="/" class="block h-9 w-auto m-14">
            <x-application-logo/>
        </a>
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>
        <div class="mx-6 relative hidden md:block">

            @auth
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button
                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </button>
                    @else
                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            {{ Auth::user()->name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Gestionar Cuenta') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Ver Perfil') }}
                    </x-dropdown-link>

                    @role('admin')
                    <x-dropdown-link href="{{ route('admin.index') }}">
                        {{ __('Administrador') }}
                    </x-dropdown-link>
                    @endrole

                    <x-dropdown-link href="{{ route('orders.index') }}">
                        {{ __('Mis pedidos') }}
                    </x-dropdown-link>
                    <div class="border-t border-gray-200"></div>



                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Cerrar Sesion') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
            @else
            <x-dropdown>
                <x-slot name="trigger">
                    <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                </x-slot>


                <x-slot name="content">
                    <x-dropdown-link href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-dropdown-link>

                    <x-dropdown-link href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
            @endauth

        </div>

        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
    </div>
    <nav id="navigation-menu" :class="{'block':open ,'hidden':!open}" x-show="open"
        class="bg-zinc-700 bg-opacity w-full absolute hidden">
        {{--Menu computadora---}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach($categories as $category)
                    <li class=" navigation-link text-gray-500 hover:bg-orange-500 hover:text-white">
                        <a href="{{route('categories.show',$category)}}" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!!$category->icon!!}
                            </span>

                            {{$category->name}}
                        </a>

                        <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                            <x-navigation-subcategories :category="$category" />
                        </div>
                    </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>

        {{--Menu Mobil--}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 mb-2 bg-gray-200">
                @livewire('search')
            </div>
            <ul class="bg-white">
                @foreach($categories as $category)
                <li class=" text-gray-500 hover:bg-orange-500 hover:text-white">
                    <a class="py-2 px-4 text-sm flex items-center">
                        <span class="flex justify-center w-9">
                            {!!$category->icon!!}
                        </span>
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
            </ul>
            <p class="text-zinc-500 px-6 mx-2">USUARIOS</p>
            @livewire('cart-mobil')
            @auth()

            <a href="{{route('profile.show')}}"
                class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-address-card"></i>
                </span>
                Perfil
            </a>

            <a onclick="event.preventDefault();
                     document.getElementById('logout-form').submit()"
                class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white cursor-pointer">
                <span class="flex justify-center w-9">
                    <i class="fas fa-sign-out-alt"></i>
                </span>
                Cerrar Sesión
            </a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="hidden">
                @csrf

            </form>
            @else
            <a href="{{route('login')}}"
                class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-user-circle"></i>
                </span>
                Iniciar Sesion
            </a>

            <a href="{{route('register')}}"
                class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
                <span class="flex justify-center w-9">
                    <i class="fas fa-fingerprint"></i>
                </span>
                Registrarse
            </a>
            @endauth

        </div>
    </nav>
</header>