<template id="app-sign-in">
    <div class="col-md-4 auth">
        <div class="wrap">

            <div class="title">
                Sign in to Royallib
            </div>

            <form @submit.prevent="submit">

                {{ csrf_field() }}

                <div class="form-group">
                    <input class="form-control"
                           name="email"
                           placeholder="Username or Email"
                           v-model="login"
                           @keydown="errors.login = ''"
                           required>
                </div>

                <div class="form-group">
                    <input class="form-control"
                           type="password"
                           name="password"
                           placeholder="Password"
                           v-model="password"
                           @keydown="errors.login = ''"
                           required>
                    <small class="danger"><?= "{{ errors.login }}" ?></small>
                </div>

                <div class="form-group actions">
                    <div class="action">
                        Don't have account? <a href="#sign-up">Sign up</a>now!
                    </div>
                    <div class="action">
                        <input class="btn btn-default" type="submit" value="Sign-in">
                    </div>
                </div>

                <div class="form-group actions">
                    <div class="action">
                        Did you <a href="#forgot-password">forgot password</a>?
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>