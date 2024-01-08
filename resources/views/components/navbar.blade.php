@php use Illuminate\Support\Facades\App; @endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">{{ __('Home') }}</a>
            <a href="{{ route('about') }}"
               class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">{{ __('About Us') }}</a>
            <a href="{{ route('services') }}"
               class="nav-item nav-link {{ request()->is('services') ? 'active' : '' }}">{{__('Services')}}</a>
            <a href="{{ route('projects') }}"
               class="nav-item nav-link {{ request()->is('projects') ? 'active' : '' }}">{{__('Portfolio')}}</a>
            <a href="{{ route('posts.index') }}"
               class="nav-item nav-link {{ request()->is('posts') ? 'active' : '' }}">{{__('Blog')}}</a>
            <a href="{{ route('contact') }}"
               class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">{{__('Contacts')}}</a>
        </div>


        <div class="nav-item dropdown">
            <a href="#" class="btn btn-primary mr-3 dropdown-toggle " data-toggle="dropdown">{{ App::currentLocale() }}</a>
            <div class="dropdown-menu rounded-0 m-0">
                @foreach($all_locales as  $locale)
                    <a href="{{ route('locale.change', ['locale' => $locale]) }}"
                       class="{{ App::isLocale($locale) ? 'active' : '' }} dropdown-item btn btn-primary mr-3 d-none d-lg-block">
                        {{ $locale }}
                    </a>
                @endforeach
            </div>
        </div>

        @auth()
            <div class="mr-3">
                @if(auth()->user()->unreadNotifications())
                    <a href="{{ route('notifications.index') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/>
                        </svg>

                        <span class="badge warning">{{ auth()->user()->unreadNotifications()->count() }}</span>
                    </a>
                @endif
            </div>

            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-2" data-toggle="dropdown">{{ auth()->user()->name }}</a>
                <div class="dropdown-menu dropdown-menu-right rounded-0 m-0">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item btn btn-primary d-none d-lg-block" type="submit">{{ __('LogOut') }}</button>
                    </form>
                </div>
            </div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary mr-3 d-none d-lg-block">{{ __('Create Post') }}</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary mr-3 d-none d-lg-block">{{ __('Sign In') }}</a>
        @endauth
    </div>
</nav>
