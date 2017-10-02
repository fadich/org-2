<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/assets/style/main.css">

</head>
<body>
<div class="wrapper">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Application</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active">
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
                        <li>
                            <a href="#sign-up">Sign up</a>
                        </li>
                        <li>
                            <a href="#sign-in">Sign in</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        {{--{!! $content !!}--}}
    </div>
</div>
@include("auth.sign-in")
@include("auth.sign-in")
</body>

<script src="/js/app.js"></script>

</html>