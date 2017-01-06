import $ from 'jquery';
import Chart from 'chart.js';
import Vue from 'vue';
import Router from 'vue-router';
import Resource from 'vue-resource';
import Vue2Filters from 'vue2-filters';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

// Components
import BaseView from './components/BaseView.vue';
import MainNav from './components/MainNav.vue';
import Modal from './components/modals/Modal.vue';
import AddEditEgg from './components/modals/AddEditEgg';
import AddEditEggData from './components/modals/AddEditEggData';
import Eggs from './components/eggs/Index.vue';
import Chicks from './components/chicks/Index.vue';
import EggList from './components/eggs/EggList.vue';
import EggDetails from './components/eggs/EggDetails.vue';
import _404 from './components/errors/404.vue';

$(() => {
  // Site Base URL
  // window.site_base_url = '/project_examples/sutton/';
  window.site_base_url = '/';

  Vue.use(Router);
  Vue.use(Resource);
  Vue.use(Vue2Filters);
  Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

  // Initialize the router
  let router = new Router({
    routes: [
      { path: window.site_base_url, component: BaseView },
      { path: '*', component: _404 }
    ],
    mode: 'history'
  });

  // Initialize the global event bus
  window.eventBus = new Vue();

  Vue.component('main-nav', MainNav);
  Vue.component('modal', Modal);
  Vue.component('add-edit-egg', AddEditEgg);
  Vue.component('add-edit-egg-data', AddEditEggData);
  Vue.component('eggs', Eggs);
  Vue.component('egg-list', EggList);
  Vue.component('egg-details', EggDetails);
  Vue.component('chicks', Chicks);
  Vue.component('pulse-loader', PulseLoader);

  // Instantiate the Application
  new Vue({
    el: '#app',
    router: router
  });
});