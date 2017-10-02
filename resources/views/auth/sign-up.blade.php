<template id="sign-up">
    <div class="col-md-4 auth">
        <div class="wrap">

            <div class="title">
                Sign up to Application
            </div>

            <form action="{{ route('auth.register') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Login" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Confirm password" required>
                </div>

                <div class="form-group actions">
                    <div class="action">
                        Do you have an account? <a href="#sign-in">Sign in</a>
                    </div>
                    <div class="action">
                        <input class="btn btn-default" type="submit" value="Sign-up">
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>