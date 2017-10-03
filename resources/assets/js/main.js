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
    };

    let signUp = {
        template: "#app-sign-up",
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
