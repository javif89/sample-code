<template>
    <div v-view="panelAnim" class="machine_hoop_container">
        <img :src="topimg" class="machine_top">
        <img :src="midimg"
             :class="['machine_hoop', {'animate': inView}]">
        <img :src="bottomimg"
             class="machine_base">
    </div>
</template>

<script>
  export default {
    name: "MachineHoop",
    data() {
      return {
        inView: false
      }
    },
    props: ['topimg', 'midimg', 'bottomimg'],
    methods: {
      panelAnim(e) {
        // if (!this.inView)
            this.inView = e.percentCenter < 0.55 && e.percentCenter > 0.25
      }
    }
  }
</script>

<style lang="sass" scoped>
    .machine_hoop_container
        position: relative
        width: 100%
        height: 100%
        display: flex
        align-items: center
        justify-content: center

        .machine_top, .machine_base, .machine_hoop
            position: absolute
            max-height: 160%
            max-width: 100%
            left: -50px

        .machine_top
            z-index: 3

        .machine_base
            z-index: 1

        .machine_hoop
            z-index: 2
            transition-duration: 1.85s
            transition-timing-function: ease-in-out
            transform: translate3d(2px, 75px, 0)

            &.animate
                transform: translate3d(0px, 0px, 0)
    @media (max-width: 768px)
      .machine_hoop_container
        text-align: center
        .machine_top, .machine_base, .machine_hoop
            position: absolute
            max-height: 100%
            max-width: 100%
            left: 0
            right: 0
            margin: auto

</style>
