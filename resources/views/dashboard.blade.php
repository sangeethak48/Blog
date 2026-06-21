@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 dark:bg-[#060606] py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="lg:flex lg:gap-8">
            <!-- SIDEBAR -->
            <aside class="hidden lg:block w-64 flex-shrink-0">
                <div class="sticky top-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-[#1E6FFF] to-[#3B82F6] flex items-center justify-center text-white font-bold">B</div>
                        <div>
                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ config('app.name', 'Blog') }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">Dashboard</div>
                        </div>
                    </div>

                    <nav class="bg-white dark:bg-[#0b0b0b] border border-gray-100 dark:border-neutral-800 rounded-lg p-3 shadow">
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium bg-[#EAF2FF] dark:bg-[#11203a] text-[#1E6FFF]">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18"/></svg>
                                    Dashboard
                                </a>
                            </li>

                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <li><a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">Users</a></li>
                                <li><a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">Categories</a></li>
                                <li><a href="{{ route('admin.tags.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">Tags</a></li>
                                <li><a href="{{ route('admin.comments.index') ?? '#' }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">Comments</a></li>
                            @elseif(auth()->check() && auth()->user()->role == 'author')
                                <li><a href="{{ route('author.posts.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">My Posts</a></li>
                                <li><a href="{{ route('author.posts.create') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">Write Post</a></li>
                            @else
                                <li><a href="{{ route('reader.posts.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">Explore</a></li>
                                <li><a href="{{ route('reader.posts.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">Subscriptions</a></li>
                            @endif

                            <li class="pt-3 border-t border-gray-100 dark:border-neutral-800 mt-2">
                                <a href="{{ route('profile.show') ?? '#' }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm hover:bg-gray-50 dark:hover:bg-neutral-900">
                                    Profile
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <!-- MAIN -->
            <div class="flex-1">
                <!-- Mobile top nav (small screens) -->
                <div class="lg:hidden mb-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Welcome, {{ Auth::user()->name }}!</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                @if(Auth::user()->role == 'admin') Manage your blog platform
                                @elseif(Auth::user()->role == 'author') Create and manage your posts
                                @else Discover and read amazing posts @endif
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md bg-[#1E6FFF] text-white text-sm">Dashboard</a>
                        </div>
                    </div>
                </div>

                <!-- Desktop header (within main column) -->
                <div class="hidden lg:flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Welcome, {{ Auth::user()->name }}!</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            @if(Auth::user()->role == 'admin') Manage your blog platform
                            @elseif(Auth::user()->role == 'author') Create and manage your posts
                            @else Discover and read amazing posts @endif
                        </p>
                    </div>

                    <div class="flex items-center gap-3">
                        @if(Auth::user()->role == 'author')
                            <a href="{{ route('author.posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#1E6FFF] hover:bg-[#155ed6] text-white rounded-md shadow-sm text-sm">Write Post</a>
                        @endif

                        <div class="flex items-center gap-3">
                            <div class="text-xs text-gray-500 dark:text-gray-400">Signed in as</div>
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                </div>

                <!-- STAT CARDS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                        <div class="text-xs text-gray-500 dark:text-gray-400">Total Users</div>
                        <div class="mt-2 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $totalUsers ?? 0 }}</div>
                    </div>

                    <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                        <div class="text-xs text-gray-500 dark:text-gray-400">Active Posts</div>
                        <div class="mt-2 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $activePosts ?? 0 }}</div>
                    </div>

                    <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                        <div class="text-xs text-gray-500 dark:text-gray-400">Published</div>
                        <div class="mt-2 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $publishedPosts ?? 0 }}</div>
                    </div>

                    <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                        <div class="text-xs text-gray-500 dark:text-gray-400">Flagged</div>
                        <div class="mt-2 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $flaggedCount ?? 0 }}</div>
                    </div>
                </div>

                <!-- ROLE-SPECIFIC CONTENT -->
                @if(Auth::user()->role == 'admin')
                    <!-- Admin layout: Recent activity + Moderation -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Recent Activity -->
                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                                <div class="flex items-center justify-between mb-3">
                                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Recent Activity</h2>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Latest events</span>
                                </div>

                                <div class="divide-y divide-gray-100 dark:divide-neutral-800">
                                    @if(!empty($recentActivities) && count($recentActivities))
                                        @foreach($recentActivities as $act)
                                            <div class="py-3 flex items-start justify-between">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-800 dark:text-gray-100">{{ $act['user'] ?? ($act->user->name ?? '') }} <span class="text-xs text-gray-400">· {{ $act['action'] ?? ($act->action ?? '') }}</span></div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ $act['title'] ?? ($act->title ?? '') }}</div>
                                                </div>
                                                <div class="text-xs text-gray-400">{{ $act['time'] ?? ($act->created_at->diffForHumans() ?? '') }}</div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="py-6 text-center text-sm text-gray-500 dark:text-gray-400">No recent activity.</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Activity/Stats chart placeholder -->
                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Platform overview</h3>
                                <div class="w-full h-40 bg-gray-50 dark:bg-neutral-900 rounded-md flex items-center justify-center text-sm text-gray-400">[Chart placeholder]</div>
                            </div>
                        </div>

                        <!-- Moderation queue -->
                        <div class="space-y-6">
                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Moderation Queue</h3>
                                <ul class="space-y-3">
                                    @if(!empty($moderationQueue) && count($moderationQueue))
                                        @foreach($moderationQueue as $q)
                                            <li class="flex items-center justify-between">
                                                <div>
                                                    <div class="text-sm text-gray-800 dark:text-gray-100">{{ $q['post'] ?? ($q->title ?? '') }}</div>
                                                    <div class="text-xs text-gray-400">{{ $q['time'] ?? ($q->created_at->diffForHumans() ?? '') }}</div>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <form action="{{ route('admin.posts.destroy', $q['id'] ?? ($q->id ?? null)) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 text-sm" onclick="return confirm('Delete this post?')">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.posts.edit', $q['id'] ?? ($q->id ?? null)) }}" class="text-gray-500 text-sm">Edit</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="py-6 text-center text-sm text-gray-500 dark:text-gray-400">No items in the moderation queue.</li>
                                    @endif
                                </ul>
                            </div>

                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Quick Links</h3>
                                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                    <li><a href="{{ route('admin.categories.index') }}" class="hover:underline">Categories</a></li>
                                    <li><a href="{{ route('admin.tags.index') }}" class="hover:underline">Tags</a></li>
                                    <li><a href="{{ route('admin.users.index') }}" class="hover:underline">Users</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                @elseif(Auth::user()->role == 'author')
                    <!-- Author layout: My posts + Drafts + Recent posts -->
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Author Dashboard</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Welcome back, {{ Auth::user()->name }}</p>
                            </div>
                            <a href="{{ route('author.posts.create') }}" class="px-4 py-2 bg-[#1E6FFF] text-white rounded-md">Write Post</a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                                <div class="text-xs text-gray-500">My Posts</div>
                                <div class="mt-2 text-xl font-semibold">{{ $myPostsCount ?? 0 }}</div>
                            </div>
                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                                <div class="text-xs text-gray-500">Published</div>
                                <div class="mt-2 text-xl font-semibold">{{ $publishedCount ?? 0 }}</div>
                            </div>
                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                                <div class="text-xs text-gray-500">Drafts</div>
                                <div class="mt-2 text-xl font-semibold">{{ $draftsCount ?? 0 }}</div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Recent Posts</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @if(!empty($recentPosts) && count($recentPosts))
                                    @foreach($recentPosts as $p)
                                        <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-3 shadow-sm border border-gray-100 dark:border-neutral-800">
                                            <div class="h-36 bg-gray-100 dark:bg-neutral-900 rounded-md mb-3 flex items-end p-3">
                                                <div class="text-xs text-gray-600 dark:text-gray-300">{{ $p['date'] ?? ($p->created_at->format('M d, Y') ?? '') }}</div>
                                            </div>
                                            <div class="font-medium text-gray-900 dark:text-gray-100">{{ $p['title'] ?? ($p->title ?? '') }}</div>
                                            <div class="mt-2 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                                                <div>{{ $p['likes'] ?? ($p->likes ?? 0) }} likes</div>
                                                <div class="space-x-2">
                                                    <a href="{{ route('author.posts.edit', $p['id'] ?? ($p->id ?? null)) }}" class="text-blue-600">Edit</a>
                                                    <form action="{{ route('author.posts.destroy', $p['id'] ?? ($p->id ?? null)) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Delete this post?')" class="text-red-600">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="py-6 text-center text-sm text-gray-500 dark:text-gray-400">No recent posts.</div>
                                @endif
                            </div>
                        </div>

                        <div class="bg-white dark:bg-[#0f0f10] rounded-lg p-4 shadow-sm border border-gray-100 dark:border-neutral-800">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Quick Drafts</h3>
                            <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                @if(!empty($drafts) && count($drafts))
                                    @foreach($drafts as $d)
                                        <li class="flex items-center justify-between">
                                            <span>{{ is_array($d) ? ($d['title'] ?? '') : (is_object($d) ? ($d->title ?? '') : $d) }}</span>
                                            <a href="{{ route('author.posts.edit', is_array($d) ? ($d['id'] ?? null) : (is_object($d) ? ($d->id ?? null) : null)) }}" class="text-sm text-[#1E6FFF]">Continue Editing</a>
                                        </li>
                                    @endforeach
                                @else
                                    <div class="py-4 text-sm text-gray-500">No drafts.</div>
                                @endif
                            </ul>
                        </div>
                    </div>

                @else
                    <!-- Reader layout: Featured + Feed grid -->
                    <div class="space-y-6">
                        @if(!empty($featuredTitle) || !empty($featuredImage) || !empty($featuredExcerpt))
                            <div class="bg-white dark:bg-[#0f0f10] rounded-lg overflow-hidden shadow-sm border border-gray-100 dark:border-neutral-800">
                                @if(!empty($featuredImage))
                                    <div class="h-56 bg-cover bg-center" style="background-image: url('{{ $featuredImage }}')"></div>
                                @endif
                                <div class="p-4">
                                    <div class="text-xs text-gray-500">Featured Post</div>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mt-1">{{ $featuredTitle ?? '' }}</h3>
                                    <div class="text-sm text-gray-500 mt-2">{{ $featuredExcerpt ?? '' }}</div>
                                </div>
                            </div>
                        @endif

                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Reader Feed</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @if(!empty($feedPosts) && count($feedPosts))
                                    @foreach($feedPosts as $fp)
                                        <article class="bg-white dark:bg-[#0f0f10] rounded-lg p-3 shadow-sm border border-gray-100 dark:border-neutral-800">
                                            @if(!empty($fp['image']) || (!empty($fp->image) ?? false))
                                                <div class="h-36 bg-gray-100 dark:bg-neutral-900 rounded-md mb-3 bg-cover bg-center" style="background-image: url('{{ $fp['image'] ?? ($fp->image ?? '') }}')"></div>
                                            @else
                                                <div class="h-36 bg-gray-100 dark:bg-neutral-900 rounded-md mb-3"></div>
                                            @endif

                                            <h4 class="font-medium text-gray-900 dark:text-gray-100">{{ $fp['title'] ?? ($fp->title ?? '') }}</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $fp['excerpt'] ?? ($fp->excerpt ?? '') }}</p>
                                            <div class="mt-3 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                                                <div>{{ $fp['author'] ?? ($fp->author->name ?? '') }} · {{ $fp['date'] ?? ($fp->created_at->format('M d, Y') ?? '') }}</div>
                                                <div class="flex items-center gap-3">
                                                    <button class="text-red-500">♥</button>
                                                    <button class="text-gray-500">Share</button>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                @else
                                    <div class="py-6 text-center text-sm text-gray-500 dark:text-gray-400">No posts found.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
