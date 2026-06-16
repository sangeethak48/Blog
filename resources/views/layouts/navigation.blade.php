<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex justify-between h-16">

        <div class="flex">

            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo
                        class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                <x-nav-link :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-nav-link>

                @if(auth()->check())

                    @if(auth()->user()->role == 'admin')

                        <x-nav-link :href="route('admin.categories.index')"
                            :active="request()->routeIs('admin.categories.*')">
                            Categories
                        </x-nav-link>

                        <x-nav-link :href="route('admin.tags.index')"
                            :active="request()->routeIs('admin.tags.*')">
                            Tags
                        </x-nav-link>

                        <x-nav-link :href="route('admin.users.index')"
                            :active="request()->routeIs('admin.users.*')">
                            Users
                        </x-nav-link>

                    @elseif(auth()->user()->role == 'author')

                        <x-nav-link :href="route('author.posts.index')"
                            :active="request()->routeIs('author.posts.*')">
                            My Posts
                        </x-nav-link>

                        <x-nav-link :href="route('author.posts.create')"
                            :active="request()->routeIs('author.posts.create')">
                            Create Post
                        </x-nav-link>

                    @elseif(auth()->user()->role == 'reader')

                        <x-nav-link :href="route('reader.posts.index')"
                            :active="request()->routeIs('reader.posts.*')">
                            Featured Posts
                        </x-nav-link>

                    @endif

                @endif

            </div>

        </div>

        <div class="hidden sm:flex sm:items-center sm:ms-6">

            <x-dropdown align="right" width="48">

                <x-slot name="trigger">

                    <button
                        class="inline-flex items-center px-3 py-2 text-sm rounded-md text-gray-500 bg-white hover:text-gray-700">

                        <div>{{ Auth::user()->name }}</div>

                    </button>

                </x-slot>

                <x-slot name="content">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link
                            :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">

                            Log Out

                        </x-dropdown-link>

                    </form>

                </x-slot>

            </x-dropdown>

        </div>

    </div>

</div>


</nav>
