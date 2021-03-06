<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizer | Royallib</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/assets/style/main.css">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

</head>
<body>

<div id="page" class="wrapper">
    <app-navbar v-bind:current-page="$route.path"></app-navbar>
    <app-content></app-content>
    <app-footer></app-footer>
</div>

@include("components.navbar")
@include("components.content")
@include("components.footer")

@include("components.homepage")
@include("components.auth.sign-in")
@include("components.auth.sign-up")
@include("components.not-found")

<script>
    var __settings = {  };
</script>

@if(auth()->user())
    <script>
        __settings.user = {
            id: "<?= auth()->user()->getAuthIdentifier() ?>",
            token: "<?= auth()->user()->getRememberToken() ?>",
        }
    </script>
@endif

<script src="/js/app.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script src="/assets/js/main.js"></script>

</body>


</html>
