require('./bootstrap');
window.Vue = require('vue');

// Buefy lightweight ui components
import Buefy from 'buefy'
Vue.use(Buefy)

window.Slug = require('slug');
Slug.defaults.mode = "rfc3986";

import { Form, HasError, AlertError } from 'vform' // v-form library
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form =Form;


$(document).ready(function() {
  $(".navbar-burger").click(function() {
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");
  });
});
