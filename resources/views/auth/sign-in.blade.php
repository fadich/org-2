<div id="sign-in" class="col-md-4">
    <div class="wrap">
        <form action="/auth/sign-in" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <input class="form-control" type="email" name="login" placeholder="Login">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="btn btn-default" type="submit" value="Sign-in">
            </div>
        </form>
    </div>
</div>