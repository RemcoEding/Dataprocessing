// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
//import router from './router'
import VueRouter from 'vue-router'
import vueResource from 'vue-resource'
import Countrys from './components/Countrys'
import About from './components/About'
import Add from './components/Add'
import Edit from './components/Edit'
import CountryDetails from './components/CountryDetails'

Vue.use(vueResource)
Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    {path:'/', component: Countrys},
    {path: '/about', component: About},
    {path: '/add', component: Add},
    {path:'/country/:Code', component: CountryDetails},
    {path:'/edit/:Code', component: Edit},
  ]

})

/* eslint-disable no-new */
new Vue({
  router,
  template: `
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">vCountry</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><router-link to="/">Home</router-link></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><router-link to="/about">About</router-link></a>
          </li>
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-md-0 navbar-right">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><router-link to="/add">Add Country</router-link></a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
      <router-view></router-view>
    </div>
  `
}).$mount('#app')
