<template>
    <div v-if="isMobile" class="menu_container">
        <div class="top_row">
            <img src="images/Ricoma Logo Gray.svg" class="logo d-none d-sm-block" alt="">
            <img src="icons/Ricoma R.svg" class="logo d-sm-none" alt="">

            <!--xl > only hamburger-->
            <div class="d-xl-none">
                <button @click="toggleMenu($event)" class="toggle-switch hamburger hamburger--spin-r"
                        type="button">
                    <span class="hamburger-box toggle-menu"><span class="hamburger-inner"></span></span>
                </button>
            </div>

            <div class="d-none d-xl-flex align-items-center justify-content-end">
                    <span class="phone_info">Questions? Call
                        <span class="phone_number"> (888) 292-6282</span></span>

                <a href="" class="support_link">Talk to Support</a>

                <div class="lang_btn">
                    <div class="dropdown">
                        <a class="btn" href="#" id="langList" data-toggle="dropdown"
                           aria-haspopup="true"
                           @click="toggleDropDown($event)"
                           aria-expanded="false">
                            <span class="locale">{{locale}}</span>
                            <div class="d-flex globe_icon">
                                <img src="icons/Language.svg" class="img-fluid" alt="">
                                <i class="fas fa-caret-down"></i>
                            </div>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="langList">
                            <a v-for="lang in languages" class="dropdown-item locale" href="#">{{lang.code + ' (' +
                                lang.name + ')'}}</a>
                        </div>
                    </div>
                </div>


                <button class="btn orange_gradient_btn square_btn newsletter_btn">Join the ricoma club</button>
            </div>
        </div>


        <transition name="slide">
            <nav v-if="show" class="bottom_row">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a @mouseenter="toggleDropDown($event)"
                           @mouseleave="toggleDropDown($event)"
                           @click="toggleDropDown($event)"
                           class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a @mouseenter="toggleDropDown($event)"
                           @mouseleave="toggleDropDown($event)"
                           @click="toggleDropDown($event)"
                           class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a @mouseenter="toggleDropDown($event)"
                           @mouseleave="toggleDropDown($event)"
                           @click="toggleDropDown($event)"
                           class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </nav>
        </transition>
    </div>
</template>

<script>
  export default {
    name: "NavMenu",
    props: ['languages', 'locale'],
    data() {
      return {
        //todo: turn this false when small screen size detected
        show: true
      }
    },
    computed: {
        isMobile(){
            return this.$mq === 'mobile' || this.$mq === 'medium' || this.$mq === 'tablet';  
        }
    },
    methods: {
      toggleMenu(event) {
        $(event.target).toggleClass('is-active')
        this.show = !this.show;
      },
      toggleDropDown(elem) {
        $(elem.target).dropdown('toggle')
      }
    },
    created() {
      //Hide menu if smaller than average desktop for slide out menu
    //   if ($(document).width() < 1200) {
    //     this.show = false;
    //   }
    }
  }
</script>

<style lang="scss" scoped>
    #langList {
        padding: 0.25rem;
    }
</style>
