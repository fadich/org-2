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
    @include("components.navbar")
    @include("components.content")
</div>


@include("components.homepage")
@include("components.auth.sign-in")
@include("components.auth.sign-up")

<script src="/js/app.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script src="/assets/js/main.js"></script>
</body>


</html>