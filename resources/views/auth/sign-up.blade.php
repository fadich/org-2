<div id="sign-up" class="col-md-4">
    <div class="wrap">

        <div class="title">
            Sign up to Application
        </div>

        <form action="/auth/sign-in" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <input class="form-control" type="email" name="login" placeholder="Login" required>
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
                    Do you have an account? <a href="{{ route('auth.sign-in') }}">Sign in</a>
                </div>
                <div class="action">
                    <input class="btn btn-default" type="submit" value="Sign-in">
                </div>
            </div>

        </form>
    </div>
</div>