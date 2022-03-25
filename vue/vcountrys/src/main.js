// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
//import router from './router'
import VueRouter from 'vue-router'
import vueResource from 'vue-resource'
import Home from './components/Home'
import About from './components/About'
import Countrys from './components/Countrys'
import AddCountry from './components/AddCountry'
import EditCountry from './components/EditCountry'
import CountryDetails from './components/CountryDetails'
import Citys from './components/Citys'
import AddCity from './components/AddCity'
import EditCity from './components/EditCity'
import CityDetails from './components/CityDetails'
import CountryLanguage from './components/CountryLanguage'
import AddCountryLanguage from './components/AddCountrylanguage'
import EditCountryLanguage from './components/EditCountrylanguage'
import CountryLanguageDetails from './components/CountryLanguageDetails'

Vue.use(vueResource)
Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    {path: '/', component: Home},
    {path: '/about', component: About},
    {path: '/country', component: Countrys},
    {path: '/addcountry', component: AddCountry},
    {path: '/country/:Code', component: CountryDetails},
    {path: '/editcountry/:Code', component: EditCountry},
    {path: '/city', component: Citys},
    {path: '/addcity', component: AddCity},
    {path: '/city/:ID', component: CityDetails},
    {path: '/editcity/:ID', component: EditCity},
    {path: '/countrylanguage', component: CountryLanguage},
    {path: '/addcountrylanguage', component: AddCountryLanguage},
    {path: '/countrylanguage/:Code', component: CountryLanguageDetails},
    {path: '/editcountrylanguage/:ID', component: EditCountryLanguage}
  ]

})

/* eslint-disable no-new */
new Vue({
  router,
  template: `
<div id="app">
<nav class="navbar navbar-inverse">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Country</a>
  </div>
  <div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li><router-link to="/">Home</router-link></li>
      <li><router-link to="/country">Country</router-link></li>
      <li><router-link to="/city">City</router-link></li>
      <li><router-link to="/countrylanguage">Country Languages</router-link></li>
      <li><router-link to="/about">About</router-link></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><router-link to="/addcountry">Add Country</router-link></li>
      <li><router-link to="/addcity">Add City</router-link></li>
      <li><router-link to="/addcountrylanguage">Add Country Language</router-link></li>
    </ul>
  </div><!--/.nav-collapse -->
</div>
</nav>
      <router-view></router-view>
</div>
  `
}).$mount('#app')
