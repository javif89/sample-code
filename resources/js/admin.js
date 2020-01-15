/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./axios');

window.Vue = require('vue');
import vueDebounce from 'vue-debounce'
import CountryFlag from 'vue-country-flag'
import VueCsrf from 'vue-csrf';
import VuePlaceAutocomplete from 'vue-place-autocomplete';

Vue.use(VuePlaceAutocomplete);
Vue.use(VueCsrf);
Vue.component('country-flag', CountryFlag)
Vue.use(vueDebounce);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./components/Admin/', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
$(document).ready(() => {
    $('#set_lang_code').on('change', function () {
        $('#submitCountryContext').trigger('click');
    });

    $('#set_country_code').on('change', function () {
        $('#set_lang_code').html('');
        for (var i=0; i < countries.length; i ++) {
            if (countries[i].code == $('#set_country_code').val()) {
                for  (var j=0 ; j < countries[i]['available_languages'].length; j ++) {
                    var l =  countries[i]['available_languages'][j];
                    //console.log('ll', l);
                    $('#set_lang_code').append('<option value="'+l.code+'">' + l.name + '</option>');
                }
            }
        }
        $('#submitCountryContext').trigger('click');

    });
    $('#submitCountryContext').on('click', function () {
        axios.post('/set-country-context', {
                code: $('#set_country_code').val(),
                lang_code: $('#set_lang_code').val(),
            }
        ).then(function () {
            window.location.reload();
        });
    });
});

$(document).ready(function () {

    $('.js-typeahead').typeahead({
        order: "asc",
        dynamic: true,
        group: true,
        filter: false,
        minLength: 2,
        maxItem: 20,
        //template: "{{name}} <small style='color:#999;'>{{group}}</small>",
        matcher: function () {
            return true;
        },
        source: {
            Products: {
                href: '/admin/products/{{id}}/edit',
                display: ['name'],
                ajax: {
                    url: "/admin/search",
                    path: "products",
                    data: {query: "{{query}}"}
                }
            },
            Promotions: {
                href: '/admin/promotions/{{id}}/edit',
                display: ['name'],
                ajax: {
                    url: "/admin/search",
                    path: "promotions",
                    data: {query: "{{query}}"}
                }
            },
            Events: {
                href: '/admin/events/{{id}}/edit',
                display: ['name'],
                ajax: {
                    url: "/admin/search",
                    path: "events",
                    data: {query: "{{query}}"}
                }
            },
            Careers: {
                href: '/admin/careers/{{id}}/edit',
                display: ['position_title'],
                ajax: {
                    url: "/admin/search",
                    path: "careers",
                    data: {query: "{{query}}"}
                }
            },


        },
        callback: {

        }
    });
});
