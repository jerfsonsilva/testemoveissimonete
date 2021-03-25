require('./bootstrap');


window.Vue = require('vue');

Vue.component("lista-posts", () => import("./components/post/Lista"));

const app = new Vue({
	el: '#areaVue'
});