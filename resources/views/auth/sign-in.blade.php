<div id="sign-in" class="col-md-4">
    <div class="wrap">

        <div class="title">
            Sign in to Application
        </div>

        <form action="{{ route('auth.login') }}" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <input class="form-control" type="text" name="login" placeholder="Login" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group actions">
                <div class="action">
                    Don't have account? <a href="{{ route('auth.sign-up') }}">Sign up</a> now!
                </div>
                <div class="action">
                    <input class="btn btn-default" type="submit" value="Sign-in">
                </div>
            </div>

            <div class="form-group actions">
                <div class="action">
                    Did you <a href="/auth/forgot-password">forgot password</a>?
                </div>
            </div>

        </form>
    </div>
</div>