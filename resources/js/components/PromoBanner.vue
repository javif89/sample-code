<template>
    <div class="promo_banner_wrapper">
        <!--todo: need to add logic and then variables here for country specific promos-->
        <div class="promo_banner_container">
            <span class="promo_text">Payments as low as $133/month with 0% financing</span>
            <button class="btn promo_banner_btn">Learn More</button>
        </div>

        <!--        todo: need to add a hiding the promo banner functionality-->
        <img @click="hide" src="icons/White Close.svg" alt="" class="close_icon">
    </div>

</template>

<script>
  export default {
    name: "PromoBanner",
    methods: {
      hide() {
        $('.promo_banner_wrapper').addClass('d-none')
      }
    }
  }
</script>

<style scoped>

</style>
