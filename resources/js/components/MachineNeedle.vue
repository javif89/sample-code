<template>
    <div class="machine_needle_container">
        <img :src="topimg" class="machine_top">
        <img :src="midimg"
             class="machine_needle">
        <img :src="bottomimg"
             class="machine_base">
    </div>
</template>

<script>
  export default {
    name: "MachineNeedle",
    data() {
      return {
        inView: false
      }
    },
    props: ['topimg', 'midimg', 'bottomimg']
  }
</script>

<style lang="sass" scoped>
    .machine_needle_container
        position: relative
        width: 140%
        height: 100%
        display: flex
        align-items: center
        justify-content: center

        .machine_top, .machine_base, .machine_needle
            position: absolute
            max-height: 160%
            max-width: 100%
            left: -50px

        .machine_top
            z-index: 3

        .machine_base
            z-index: 1

        .machine_needle
            z-index: 2

    @media (max-width: 768px)
      .machine_needle_container
        width: 100%
        .machine_top, .machine_base, .machine_needle
            position: absolute
            max-height: 100%
            max-width: 100%
            left: 0
    @media (max-width: 480px)
      .machine_needle_container
        align-items: flex-end
</style>
