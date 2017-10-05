;(function () {

    Vue.component("app-navbar", {
        props: ['current-page'],
        template: "#app-navbar",
        data: function () {
            return {
                collapse: false,
                items: [
                    {
                        name: "About",
                        url: "#about",
                        alias: "/about",
                    }
                ],
            };
        },
        methods: {
            toggleNav() {
                this.collapse = !this.collapse;
            },
            closeNav() {
                this.collapse = false;
            },
        }
    });

    Vue.component("app-content", {
        template: "#app-content",
    });

    Vue.component("app-footer", {
        template: "#app-footer",
    });

    let homepage = {
        template: "#app-homepage",
    };

    let signIn = {
        template: "#app-sign-in",
        data() {
            return {
                login: "",
                password: "",
                errors: {
                    login: "",
                },
            };
        },methods: {
            submit(ev) {
                let formErrors = this.errors;
                let fd = new FormData();

                fd.append('login', this.login);
                fd.append('password', this.password);

                let request = axios.create({
                    baseURL: '/',
                    timeout: 2000,
                    headers: {"X-CSRFToken": ''},
                });

                request.post('auth/sign-in' + window.location.search, fd)
                    .then(function (response) {
                        window.location.replace(response.data['land-to']);
                    })
                    .catch(function (error) {
                        formErrors.login = error.response.data.errors.login;

                    });

                this.clearPassword();
            },
            clearPassword() {
                this.password = "";
            },
        },
    };

    let signUp = {
        template: "#app-sign-up",
        data() {
            return {
                name: "",
                email: "",
                password: "",
                confirm: "",
                errors: {
                    name: "",
                    email: "",
                    password: "",
                    confirm: "",
                },
            };
        },
        methods: {
            submit(ev) {
                if (!this.validate()) {
                    this.clearPasswords();

                    return;
                }

                let formErrors = this.errors;
                let fd = new FormData();

                fd.append('name', this.name);
                fd.append('email', this.email);
                fd.append('password', this.password);

                let request = axios.create({
                    baseURL: '/',
                    timeout: 2000,
                    headers: {"X-CSRFToken": ''},
                });

                request.post('auth/sign-up' + window.location.search, fd)
                    .then(function (response) {
                        window.location.replace(response.data['land-to']);
                    })
                    .catch(function (error) {
                        let errors = error.response.data.errors;

                        for (let key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                formErrors[key] = errors[key].pop();
                            }
                        }
                    });

                this.clearPasswords();
            },
            validate() {
                if (!this.name) {
                    this.errors.name = "Please, specify your username.";

                    return false;
                }
                if (!this.email) {
                    this.errors.email = "Please, specify your email.";

                    return false;
                }
                if (!this.password) {
                    this.errors.password = "Please, specify your password.";

                    return false;
                }
                if (this.password !== this.confirm) {
                    this.errors.confirm = "Passwords do not match";

                    return false;
                }

                return true;
            },
            clearPasswords() {
                this.password = "";
                this.confirm = "";
            },
        },
    };

    let notFound = {
        template: "#app-not-found",
    };

    let routes = [];

    routes.push({ path: "/", component: homepage });
    routes.push({ path: "/homepage", component: homepage });
    routes.push({ path: "*", component: notFound });

    if (typeof __settings.user === "undefined") {
        routes.push({path: "/sign-in", component: signIn});
        routes.push({path: "/sign-up", component: signUp});
    }

    const router = new VueRouter({
        routes // сокращение от `routes: routes`
    });

    const page = new Vue({
        router,
    }).$mount('#page');
})();
