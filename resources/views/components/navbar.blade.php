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
                <router-link to="/homepage" @click="closeNav" class="navbar-brand logo">
                    <img src="/img/logo.png">
                </router-link>
            </div>
            <div class="navbar-collapse" id="myNavbar" :class="{ collapse: !collapse }">
                <ul class="nav navbar-nav">
                    <li v-for="item in items" :class="{ active: currentPage == item.url }" @click="closeNav">
                        <router-link v-bind:to="item.url" @click="closeNav"><?= "{{ item.name }}" ?></router-link>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->user())
                        <li @click="closeNav">
                            <a href="{{ route("auth.sign-out") }}">Sign out</a>
                        </li>
                    @else
                        <li :class="{ active: currentPage == '/sign-up' }" @click="closeNav">
                            <router-link to="/sign-up" @click="closeNav">Sign up</router-link>
                        </li>
                        <li :class="{ active: currentPage == '/sign-in' }" @click="closeNav">
                            <router-link to="/sign-in" @click="closeNav">Sign in</router-link>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</template>
