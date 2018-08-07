import Vue from 'vue';

/** Components  */
Vue.component('login-auth-component', require('./components/auth/LoginComponent.vue'));
Vue.component('register-auth-component', require('./components/auth/RegisterComponent.vue'));
Vue.component('forgot-password-auth-component', require('./components/auth/ForgotPasswordComponent.vue'));
Vue.component('sidebar-layout-component', require('./components/layout/SidebarComponent.vue'));
Vue.component('navbar-component', require('./components/layout/NavbarComponent.vue'));
Vue.component('if-ie-component', require('./components/layout/IfIEComponent.vue'));

/** Validação */
import PT_BR from 'vee-validate/dist/locale/pt_BR';
import VeeValidate, { Validator, ErrorField } from 'vee-validate';

Validator.localize('pt_BR', PT_BR);
Vue.use(VeeValidate, { events: 'blur|change' });

/** Lodash */
import Lodash from 'lodash';
window._ = Lodash;

/** Axios */
import Axios from 'axios';

window.axios = Axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) { window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content; }

/** Laravel Echo */
//import Echo from 'laravel-echo'
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });

/** Declare Application */
new Vue({el: "#app"});
