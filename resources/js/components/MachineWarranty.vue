<template>
    <div class="machine_warranty_container">
        <img v-view="fadeIn" :src="src">
    </div>
</template>

<script>
  export default {
    name: "MachineWarranty",
    methods: {
      fadeIn(e) {
        if(e.percentInView > 0.3)
          $('.machine_warranty_container img').addClass('fadeIn')
      }
    },
    props: ['src']
  }
</script>

<style lang="sass" scoped>
.machine_warranty_container
    position: relative
    display: flex
    justify-content: center
    height: 100%
    align-items: center
    // width: 100%
    img
        max-width: 100%
        height: auto
        left: -25%
        opacity: 0
        max-height: 731px

.fadeIn
    transition: opacity 1s ease-in-out
    opacity: 1 !important

@media (max-width: 1200px)
  .machine_warranty_container
      max-height: 160%
      img
          left: 0%
          position: absolute
          max-height: 100%

@media (max-width: 992px)
  .machine_warranty_container
      img
          position: absolute
@media (max-width: 769px)
  .machine_warranty_container
      img
          left: 0%
          position: relative
          height: auto
          max-width: 100%
        
@media (max-width: 480px)
  .machine_warranty_container
      img
        left: -6%
        right: 0
        margin: auto
        max-width: 100%
</style>
