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

    let homepage = {
        template: "#app-homepage",
    };

    let signIn = {
        template: "#app-sign-in",
    };

    let signUp = {
        template: "#app-sign-up",
        data: function () {
            return {
                login: "",
                email: "",
                password: "",
                confirm: "",
                errors: [],
            };
        },
        methods: {
            submit(event) {
                this.validate();
                if (this.errors.length < 1) {
                    return;
                }
                event.preventDefault();
                console.log(this.errors);
                this.clearPasswords();
            },
            validate() {
                this.errors = [];

                if (!this.login) {
                    this.addError("login", "Fill this field, please.");
                }
                if (!this.email) {
                    this.addError("email", "Fill this field, please.");
                }
                if (!this.password) {
                    this.addError("password", "Fill this field, please.");
                }
                if (this.confirm !== this.password) {
                    this.addError("confirm", "Passwords are not identical.");
                }

                return this.errors;
            },
            addError(field, error) {
                this.errors.push({field: field, error: error});
            },
            clearPasswords() {
                this.password = "";
                this.confirm = "";
            }
        }
    };

    let notFound = {
        template: "#app-not-found",
    };

    const routes = [
        { path: "/", component: homepage },
        { path: "/homepage", component: homepage },
        { path: "/sign-in", component: signIn },
        { path: "/sign-up", component: signUp },
        { path: "*", component: notFound }
    ];

    const router = new VueRouter({
        routes // сокращение от `routes: routes`
    });

    const page = new Vue({
        router,
    }).$mount('#page');
})();
