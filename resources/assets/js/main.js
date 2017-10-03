;(function () {
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
