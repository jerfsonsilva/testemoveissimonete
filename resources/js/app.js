require('./bootstrap');


window.Vue = require('vue');

import VModal from 'vue-js-modal';//Modal vue js
Vue.use(VModal);

import VueMask from 'v-mask';
Vue.use(VueMask);


Vue.component("lista-posts", () => import("./components/post/Lista"));

Vue.component("post", () => import("./components/post/Post"));

Vue.component("btn-contato", () => import("./components/contato/ModalBotao"));

const app = new Vue({
	el: '#areaVue'
});