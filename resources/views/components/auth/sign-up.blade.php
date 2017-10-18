<template id="app-sign-up">
    <div class="col-md-4 auth">
        <div class="wrap">

            <div class="title">
                Sign up to Royallib
            </div>

            <form @submit.prevent="submit">

                {{ csrf_field() }}

                <div class="form-group">
                    <input class="form-control"
                           name="name"
                           placeholder="Username"
                           v-model="name"
                           @keydown="errors.name = ''"
                           required>
                    <small class="danger"><?= "{{ errors.name }}" ?></small>
                </div>

                <div class="form-group">
                    <input class="form-control"
                           type="email"
                           name="email"
                           placeholder="Email"
                           v-model="email"
                           @keydown="errors.email = ''"
                           required>
                    <small class="danger"><?= "{{ errors.email }}" ?></small>
                </div>

                <div class="form-group">
                    <input class="form-control"
                           type="password"
                           name="password"
                           placeholder="Password"
                           v-model="password"
                           @keydown="errors.password = ''"
                           required>
                    <small class="danger"><?= "{{ errors.password }}" ?></small>
                </div>

                <div class="form-group">
                    <input class="form-control"
                           type="password"
                           placeholder="Confirm password"
                           v-model="confirm"
                           @keydown="errors.confirm = ''"
                           required>
                    <small class="danger"><?= "{{ errors.confirm }}" ?></small>
                </div>

                <div class="form-group actions">
                    <div class="action">
                        Do you have an account? <router-link to="/sign-in">Sign in</router-link>
                    </div>
                    <div class="action">
                        <input class="btn btn-default" type="submit" value="Sign-up">
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>