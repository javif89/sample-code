<template>
    <carousel-3d :count="images.length" :width="isMobile ? 300 : undefined">
        <slide v-for="(path, index) in images" :key="index" :index="index">
            <img :src="path" class="img-fluid" alt="">
        </slide>
    </carousel-3d>
</template>

<script>
  import {Carousel3d, Slide} from 'vue-carousel-3d';

  export default {
    name: "TCCarousel",
    components: {
      Carousel3d,
      Slide
    },
    data() {
      return {
        isMobile: false
      }
    },
    props: ['images'],
    mounted() {
      if(window.innerWidth <= 480) {
        this.isMobile = true;
      }
    }
  }
</script>

<style lang="sass" scoped>
  .carousel-3d-slide
      height: auto !important
      border: none !important
      box-shadow: 0 0 22px 0 rgba(19,10,50,0.4)
  .carousel-3d-container
    height: fit-content !important
    margin-top: -30px

  @media (min-width: 1200px)
    .carousel-3d-container
      position: absolute
      right: 30px
      width: auto
      margin: auto
      margin-top: 0
      padding: 0 9rem

      img
          max-width: 552px
</style>
