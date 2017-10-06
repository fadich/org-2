// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from '@/App'
import NavPanel from '@/NavPanel'
import router from '@/router'
import Ckeditor from '@/components/Ckeditor'

import '../node_modules/bootstrap/less/bootstrap.less'
import '../node_modules/bootstrap-sass/assets/stylesheets/_bootstrap.scss'

Vue.config.productionTip = false

Vue.component('nav-panel', NavPanel)
Vue.component('ck-editor', Ckeditor)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  router,
  components: {
    App
  }
})
