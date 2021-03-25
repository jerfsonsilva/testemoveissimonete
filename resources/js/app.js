require('./bootstrap');


window.Vue = require('vue');

Vue.component("lista-posts", () => import("./components/post/Lista"));

Vue.component("post", () => import("./components/post/Post"));

const app = new Vue({
	el: '#areaVue'
});