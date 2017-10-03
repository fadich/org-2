{{--<template id="app-navbar">--}}
    <nav class="navbar navbar-default navbar-crutch">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#homepage" class="navbar-brand">Application</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Item</a>
                    </li>
                    <li>
                        <a href="#">Item 2</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->user())
                        <li>
                            <a href="{{ route("auth.sign-out") }}">Sign out</a>
                        </li>
                    @else
                        <li @click="current(#sign-up)" :class="{ active: currentPage == '#sign-up' }">
                            <a href="#sign-up">Sign up</a>
                        </li>
                        <li @click="current(#sign-in)" :class="{ active: currentPage == '#sign-in' }">
                            <a href="#sign-in">Sign in</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
{{--</template>--}}
