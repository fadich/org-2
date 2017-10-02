;(function () {
    let home = {
        template: "#homepage",
    };
    let signIn = {
        template: "#sign-in",
    };
    let signUp = {
        template: "#sign-up",
    };

    const routes = {
        '#sign-in': signIn,
        '#sign-up': signUp,
    };

    let vue = new Vue({
        el: '#page',
        data: {
            currentRoute: window.location.hash
        },
        computed: {
            ViewComponent () {
                return routes[this.currentRoute] || home
            }
        },
        render (h) {
            console.log(h);
            return h(this.ViewComponent)
        }
    });
})();