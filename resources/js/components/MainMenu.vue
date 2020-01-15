<template>
<div id="main-menu" class="container">
    <div class="expanded-menu">
        <div class="first-row to-hide">
            <img class="ricoma-logo" :src="'/icons/Ricoma logo gray.svg'" alt="" srcset="">
            <div class="support-container">
                <div class="phone mx-2">Questions? Call <a href="tel:8882926282" class="phone-number">(888) 292-6282</a></div>
                <div class="line"></div>
                <a class="support-link mx-2" href="'tech-support-page'">Talk to Support</a>
                <div class="line"></div>
                <div class="change-lang dropdown mx-2">
                    <button class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="lang-selected">{{activelang.toUpperCase()}}<i class='fal fa-globe text-muted'></i></div>
                    </button>
                    <ul class="dropdown-menu">
                        <li @click="changeLang(lang.code)" v-for="lang in enabledlang" class="dropdown-item"><a>{{(lang.code.toUpperCase())}}</a></li>
                    </ul>
                </div>
                <a class="ricoma-club-btn">JOIN THE RICOMA CLUB<i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="sticky-nav">
            <img class="ricoma-logo to-show" :src="'/icons/Ricoma logo gray.svg'" alt="ricoma-logo" srcset="">
            <div @mouseover="hoveringMenu($event, 'embroidery')" class="embroidery nav-item">Embroidery <span class="active-border"></span></div>
            <div @mouseover="hoveringMenu($event, 'other-products')" class="other-products nav-item">Other Products <span class="active-border"></span></div>
            <div class="financing nav-item">Financing <span class="active-border"></span></div>
            <div class="blog nav-item">Blog <span class="active-border"></span></div>
            <div @mouseleave="currentMenu = null"  @mouseover="showMenu('events')" class="events nav-item">Trade Shows & Events <span class="active-border"></span></div>
            <div @mouseleave="currentMenu = null"  @mouseover="showMenu('contact')" class="contact nav-item">Contact <span class="active-border"></span></div>
            <div class="search-bar to-hide"><i class="fal fa-search"></i><input type="text" placeholder="Search Ricoma"></div>
            <a class="ricoma-club-btn to-show">JOIN THE RICOMA CLUB<i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="menu-border"></div>
    </div>

    <!-- <div @mouseover="hoveringMenu($event)" v-if="currentMenu" class="menu-content"> -->
        <embroidery-menu 
            class="menu-content"
            v-if="currentMenu === 'embroidery'"
            @mouseleave="currentMenu = null" @mouseover="hoveringMenu($event, 'embroidery')" ></embroidery-menu>
    <!-- </div> -->
</div>

</template>

<script>
export default {
    name: 'main-menu',
    props: ['activelang', 'enabledlang'],
    data() {
        return {
            offSet: 0,
            currentMenu: null
        }
    },
    methods: {
        showMenu(menu){
            this.currentMenu = menu;
        },
        hoveringMenu(event, menu = null){
            if(menu !== null){
                this.currentMenu = menu;
            }
            if(!event.target.classList.contains('embroidery') ||
                !event.target.classList.contains('menu-content') ||
                !event.target.classList.contains('other-products')){
                    console.log(event.target.classList)
                    console.log('does not exist')
            } else {
                console.log('it exists')
            }
            // console.log('mouse leave', event)
        },
        setOffset(){
            let header = document.getElementById('main-menu-container');
            this.offSet = header.offsetTop - 50;
        },
        handleScroll (event) {
            if (window.pageYOffset > 0) {
                // $("#main-menu").css("max-height", '47px')
                $('.to-show').each(function(){
                    $(this).show();
                });
                $('.to-hide').each(function(){
                    $(this).hide();
                });
            } else {
                // $("#main-menu").css("max-height", '185px')
                $('.to-show').each(function(){
                    $(this).hide();
                });
                $('.to-hide').each(function(){
                    $(this).show();
                });
            }
        },
        changeLang(lang){
            let url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?lang='+lang;
            window.location = url;
        }
    },
    mounted(){
        $(document).ready(function(){
            // const waitForEl = (selector, callback) => {
            //     if (jQuery(selector).length) {
            //         callback();
            //     } else {
            //         setTimeout(() => { waitForEl(selector, callback)}, 100);
            //     }
            // };
            // waitForEl('#main-menu-container', () => {
            //     $("html,body").scrollTop(0);
            // });

            if (window.pageYOffset > 0) {
                console.log($("#main-menu").css("max-height"))
                // $("#main-menu-container").addClass('collapse');
                $("#main-menu").css("max-height", '47px')
                $('.to-show').each(function(){
                    $(this).show();
                });
                $('.to-hide').each(function(){
                    $(this).hide();
                });
            } else {
                console.log($("#main-menu").css("max-height"))
                $("#main-menu").css("max-height", '185px')
                $('.to-show').each(function(){
                    $(this).hide();
                });
                $('.to-hide').each(function(){
                    $(this).show();
                });
            }
        })
        this.setOffset();

    },
    created(){
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
    },
}
</script>

<style>

</style>