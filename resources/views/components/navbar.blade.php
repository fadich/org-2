<template id="app-navbar">
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
                    <li v-for="item in items" :class="{ active: currentPage == item.alias }">
                        <a :href="item.url"><?= "{{ item.name }}" ?></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->user())
                        <li>
                            <a href="{{ route("auth.sign-out") }}">Sign out</a>
                        </li>
                    @else
                        <li :class="{ active: currentPage == '/sign-up' }">
                            <a href="#sign-up">Sign up</a>
                        </li>
                        <li :class="{ active: currentPage == '/sign-in' }">
                            <a href="#sign-in">Sign in</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</template>
