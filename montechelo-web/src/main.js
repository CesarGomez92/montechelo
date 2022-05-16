import Vue from 'vue'
import VueRouter from 'vue-router'
import '@/assets/tailwind.css';
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import App from '@/App.vue'
import HomePage from '@/views/HomePage.vue'
import ExceptionsReport from '@/views/ExceptionsReport.vue'
import CreateUser from '@/views/CreateUser.vue'
import UsersList from '@/views/UsersList.vue'

Vue.config.productionTip = false
Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [  
      {
        path: '/',
        component: HomePage,
      },
      {
        path: '/exceptions',
        component: ExceptionsReport,
      },
      {
        path: '/create-user',
        component: CreateUser,
      },
      {
        path: '/user-list',
        component: UsersList,
      }
  ]
})

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
