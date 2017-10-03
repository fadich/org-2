<template id="app-navbar">
    <nav class="navbar navbar-default navbar-crutch">
        <div class="container-fluid">
            <div class="navbar-header">
                {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
                <button type="button" class="navbar-toggle" @click="toggleNav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  @click="closeNav" href="#homepage" class="navbar-brand">Application</a>
            </div>
            <div class="navbar-collapse" id="myNavbar" :class="{ collapse: !collapse }">
                <ul class="nav navbar-nav">
                    <li v-for="item in items" :class="{ active: currentPage == item.alias }">
                        <a :href="item.url" @click="closeNav"><?= "{{ item.name }}" ?></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->user())
                        <li>
                            <a @click="closeNav" href="{{ route("auth.sign-out") }}">Sign out</a>
                        </li>
                    @else
                        <li :class="{ active: currentPage == '/sign-up' }">
                            <a @click="closeNav" href="#sign-up">Sign up</a>
                        </li>
                        <li :class="{ active: currentPage == '/sign-in' }">
                            <a @click="closeNav" href="#sign-in">Sign in</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</template>
