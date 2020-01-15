require('./bootstrap');
require('bootstrap-select');
require('vue-image-lightbox/dist/vue-image-lightbox.min.css');

window.Vue = require('vue');
import checkView from 'vue-check-view'
Vue.use(checkView)
import Carousel3d from 'vue-carousel-3d';
Vue.use(Carousel3d);
import VueMq from 'vue-mq';
Vue.use(VueMq, {
    breakpoints: {
        mobile: 576,
        medium: 786,
        tablet: 992,
        largeTablet: 1200,
        desktop: Infinity,
    }
})
import VueLazyLoad from 'vue-lazyload'

Vue.use(VueLazyLoad)
/**
 * The following block of code may be used to automatically register your
@@ -21,11 +25,12 @@ window.Vue = require('vue');

Vue.component('promo-banner', require('./components/PromoBanner').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('tc-panel', require('./components/Panels/TCPanel').default);
Vue.component('em-panel', require('./components/Panels/EMPanel').default);
Vue.component('eights-panel', require('./components/Panels/EightsPanel').default);
Vue.component('cht-panel', require('./components/Panels/ChtPanel').default);
Vue.component('mt-panel', require('./components/Panels/MTPanel').default);
Vue.component('mttwo-panel', require('./components/Panels/MT1502Panel').default);


Vue.component('machine-hoop', require('./components/MachineHoop').default);
Vue.component('machine-needle', require('./components/MachineNeedle').default);
Vue.component('machine-warranty', require('./components/MachineWarranty').default);
Vue.component('tc-carousel', require('./components/TCCarousel').default);
Vue.component('product-gallery', require('./components/ProductGallery').default);

Vue.component('product-categories', require('./components/ProductCategories.vue').default);
Vue.component('product-compare', require('./components/ProductCompare.vue').default);
Vue.component('embroidery-features', require('./components/EmbroideryMachineFeatures.vue').default);

Vue.component('trade-show-card', require('./components/Tradeshows/TradeShowCard.vue').default);
Vue.component('event-card', require('./components/events/EventCard.vue').default);

Vue.component('country-select', require('./components/Util/CountrySelect.vue').default);
Vue.component('language-select', require('./components/Util/LanguageSelect.vue').default);
Vue.component('cookie-notice', require('./components/Util/CookieNotice.vue').default);

Vue.component('about-globe-slides', require('./components/AboutGlobeSlides.vue').default);
Vue.component('about-globe', require('./components/AboutGlobe.vue').default);

Vue.component('product-includes', require('./components/ProductIncludes.vue').default);
Vue.component('nav-menu', require('./components/NavMenu').default);

Vue.component('search-box', require('./components/SearchBox').default);


const app = new Vue({
    el: '#website',

    computed: {
        isMobile(){
            return this.$mq === 'mobile' || this.$mq === 'medium' || this.$mq === 'tablet';
        }
    },

    methods: {
        changeLang(e) {
            let lang = e.target.value;
            let url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?lang=' + lang;
            window.location = url;
        },

        handleScroll (event) {
            // var y = $(window).scrollTop();  //your current y position on the page
            // $(window).scrollTop(y+150);
            if (window.pageYOffset > 100) {
                $(".ricoma-logo").prependTo(".sticky-nav");
                $(".ricoma-club-btn").appendTo(".sticky-nav");
                $('.to-show').each(function(){
                    $(this).show("fast");
                });
                $('.to-hide').each(function(){
                    $(this).hide("fast");
                });
            }
            if (window.pageYOffset === 0) {
                $(".ricoma-logo").prependTo(".first-row");
                $(".ricoma-club-btn").appendTo(".first-row");
                $('.to-show').each(function(){
                    $(this).hide('fast');
                });
                $('.to-hide').each(function(){
                    $(this).show('fast');
                });
            }
            // console.log('this.offSet is: ', this.offSet, "window.pageYOffset is: ", window.pageYOffset)
        },
    },

    mounted() {
        // if(this.isMobile){
        //     $('#sticky-bar').after($('#promo_banner'));
        // }
        $(document).ready(function () {
            // let promo = document.getElementById("promo_banner");
            // let offSet = promo.offsetHeight;
            // let baseHeight = $('.main-menu-section').height();
            // let baseTop = $('.sliding-menu').css('top');
            // if (typeof (promo) != 'undefined' && promo != null) {
            //     $('.main-menu-section').css('height', `calc(${baseHeight}px - ${offSet}px`);
            //     $('.sliding-menu').css('top', `calc(${baseTop} + ${offSet + 6}px)`);
            // }

            if (window.pageYOffset > 0) {
                $('.to-show').each(function () {
                    $(this).show();
                });
                $('.to-hide').each(function () {
                    $(this).hide();
                });
            } else {
                $('.to-show').each(function () {
                    $(this).hide();
                });
                $('.to-hide').each(function () {
                    $(this).show();
                });
            }

            $('#navbarMenuContent').on('show.bs.collapse hide.bs.collapse', function () {
                $('.hamburger--spin').toggleClass('is-active');
                $(this).toggleClass('expand');
                // $("#sticky-bar").toggleClass('expand');
            });

            $('#navbarMenuContent').on('show.bs.collapse', function () {
                $('#promo_banner').hide('fast');
            });
            $('#navbarMenuContent').on('hide.bs.collapse', function () {
                $('.sliding-menu').each(function () {
                    $(this).removeClass('slide')
                    $(this).removeClass('hide')
                    $("#main-menu").removeClass('hide')
                });
                $(this).removeClass('hide');
                $('#mobile-menu').removeClass('expand');
                $(".main-menu-section").removeClass('slide');
                $(".ricoma-club-mobile").removeClass('slide');
                $('#promo_banner').show('fast');
            });

            $("#mobile-emb-toggle").click(function () {
                $('#navbarMenuContent').toggleClass('hide');
                $(".sliding-menu-emb").toggleClass('slide');
                $(".main-menu-section").toggleClass('slide');
                $(".ricoma-club-mobile").toggleClass('slide');
            });
            $("#mobile-other-toggle").click(function () {
                $('#navbarMenuContent').toggleClass('hide');
                $(".sliding-menu-other").toggleClass('slide');
                $(".main-menu-section").toggleClass('slide');
                $(".ricoma-club-mobile").toggleClass('slide');
            });

            $("#mobile-tradeshows-toggle").click(function () {
                $('#navbarMenuContent').toggleClass('hide');
                $(".sliding-menu-tradeshows").toggleClass('slide');
                $(".main-menu-section").toggleClass('slide');
                $(".ricoma-club-mobile").toggleClass('slide');
            });

            $("#mobile-contact-toggle").click(function () {
                $('#navbarMenuContent').toggleClass('hide');
                $(".sliding-menu-contact").toggleClass('slide');
                $(".main-menu-section").toggleClass('slide');
                $(".ricoma-club-mobile").toggleClass('slide');
            });

            $('.main-return').on('click', function () {
                $('#navbarMenuContent').removeClass('hide');
                $('.sliding-menu').removeClass('slide');
                $('.main-menu-section').removeClass('slide');
                $('.ricoma-club-mobile').removeClass('slide');
            });

            $('.emb-return').on('click', function () {
                $(".sliding-menu-emb").removeClass('hide');
                $('.sliding-menu-machines').removeClass('slide');
                $('.sliding-menu-accessories').removeClass('slide');
            });
            $("#emb-machines-toggle").click(function () {
                $(".sliding-menu-emb").toggleClass('hide');
                $(".sliding-menu-machines").toggleClass('slide');
            });
            $("#emb-accessories-toggle").click(function () {
                $(".sliding-menu-emb").toggleClass('hide');
                $(".sliding-menu-accessories").toggleClass('slide');
            });

            $('.other-return').on('click', function () {
                $(".sliding-menu-other").removeClass('hide');
                $('.sliding-menu-heatpress').removeClass('slide');
                $('.sliding-menu-cutters').removeClass('slide');
                $('.sliding-menu-domestic').removeClass('slide');
                $('.sliding-menu-industrial').removeClass('slide');
                $('.sliding-menu-motors').removeClass('slide');
                $('.sliding-menu-otherprod').removeClass('slide');
            });
            $("#other-heatpress-toggle").click(function () {
                $(".sliding-menu-other").toggleClass('hide');
                $(".sliding-menu-heatpress").toggleClass('slide');
            });

            $("#other-cutters-toggle").click(function () {
                $(".sliding-menu-other").toggleClass('hide');
                $(".sliding-menu-cutters").toggleClass('slide');
            });

            $("#other-domestic-toggle").click(function () {
                $(".sliding-menu-other").toggleClass('hide');
                $(".sliding-menu-domestic").toggleClass('slide');
            });

            $("#other-industrial-toggle").click(function () {
                $(".sliding-menu-other").toggleClass('hide');
                $(".sliding-menu-industrial").toggleClass('slide');
            });
            $("#other-motors-toggle").click(function () {
                $(".sliding-menu-other").toggleClass('hide');
                $(".sliding-menu-motors").toggleClass('slide');
            });
            $("#other-otherprod-toggle").click(function () {
                $(".sliding-menu-other").toggleClass('hide');
                $(".sliding-menu-otherprod").toggleClass('slide');
            });

        })
    },
    created(){
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
    },

});

