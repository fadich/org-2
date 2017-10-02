;(function () {
    let homepage = {
        template: "#app-homepage",
    };
    let signIn = {
        template: "#app-sign-in",
    };
    let signUp = {
        template: "#app-sign-up",
    };

    const routes = [
        { path: "/sign-in", component: signIn },
        { path: "/sign-up", component: signUp },
        { path: "*", component: homepage }
    ];

    const router = new VueRouter({
        routes // сокращение от `routes: routes`
    });

    const page = new Vue({
        router,
        components: {
            "page": "<router-view></router-view>",
        }
    }).$mount('#page')

})();
