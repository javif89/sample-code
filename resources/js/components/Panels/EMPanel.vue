<template>
    <div class="machine_tab_wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div v-view="panelAnim" class="machine_imgs_container">
                    <figure :class="['machine_img', 'square',{'animate': inView}]"></figure>
                    <figure :class="['machine_panel', {'animate': inView}]">
                        <div v-for="(feat, key) in objFeatures" @click="featureChange(key, $event)"
                            :class="['panel_descriptor_btn', {'selected': selectedFeature === key}]" :key="key">+
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 d-flex flex-column justify-content-center">
                <div class="description_container text-center">
                    <div v-if="selectedFeature">
                        <span class="tab_title" v-html="objFeatures[selectedFeature].title"></span>
                        <p v-html="objFeatures[selectedFeature].text"></p>
                    </div>
                    <div v-else>
                        <span class="tab_title">High-Definition True-Color 7" <br class="d-none d-lg-inline"> LCD Touch Screen</span>
                        <p>
                          Run your machine with ease with the EM’s
                          high-definition true-color 7-inch LCD touch-screen
                          panel. With a memory capacity of 20 million stitches,
                          this computerized panel allows you to upload and edit
                          design settings and create customized lettering.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "MachinePanel",
    data() {
      return {
        tempPos: 0,
        selectedFeature: undefined,
        inView: false,
        objFeatures: {
          'feat1': {
            title: "Design Preview",
            text: 'In this small preview screen, you can see the design you\'re embroidering and how far along you are in the embroidery process.'
          },
          'feat2': {
            title: "Needle Switch",
            text: 'Manually switch needles with the needle icon. This icon also displays the current needle position and degree settings on the machine. The left side displays the current needle position and the right side displays the degree the machine is aligned to.'
          },
          'feat3': {
            title: "Color Sequence Menu",
            text: 'Select your design’s colors with the color sequence menu. The number to the left displays the current needle position while the second displays the upcoming needle/color.'
          },
          'feat4': {
            title: 'Message Key/Floating Key',
            text: 'Fast forward and rewind through designs with the floating mode key. This key also displays which status the machine is on, whether it’s preparing, working or waiting.'
          },
          'feat5': {
            title: "Frame Out Key",
            text: 'The frame out key brings your hoop forward during the embroidery process for simple one-step appliqué.'
          },
          'feat6': {
            title: "Trace Design Key",
            text: 'Use this key to trace the design’s start and end point. This will help you select your design’s placement and determine if your needle will come into contact with the hoop at any point during the embroidery process.'
          },
          'feat7': {
            title: "100 Degree Key",
            text: 'This key automates the process of aligning the machine to 100 degrees. In order to use the machine, it must be aligned to 100 degrees.'
          },
          'feat8': {
            title: "Start/Stop Button",
            text: 'Use this button to start or stop the embroidery process. If you need to stop embroidering at any time during the process, click the Stop button to make the machine stop.'
          },
          'feat9': {
              title: 'Manual Trimming Key',
              text: 'Use this key to perform trimming during operation status and preparation status.'
          },
          'feat10': {
              title: "Embroidery Status Key",
              text: 'Used to set the machine in and out of embroidery mode. When the lock appears locked, the machine is in embroidery status. When the lock appears unlocked, the machine is in set-up mode.'
          }
        }
      }
    },
    methods: {
      featureChange(feature, e) {
        this.selectedFeature = feature;
      },
      panelAnim(e) {
        this.inView = e.percentInView >= 0.80
      }
    }
  }
</script>

<style lang="sass" scoped>
    .machine_tab_wrapper
        .machine_imgs_container
            .machine_img
                background-image: url('/images/panels/machine/em.png')
            .machine_panel
                background-image: url('/images/panels/em.png')
                right: 30px
                top: 200px
                height: 238px
                width: 150px

                .panel_descriptor_btn
                    &:hover
                        cursor: pointer

                    &:nth-child(1)
                        left: 70%
                        top: 25%

                    &:nth-child(2)
                        left: 16%
                        top: 51%

                    &:nth-child(3)
                        left: 16%
                        top: 60%

                    &:nth-child(4)
                        left: 16%
                        top: 67%

                    &:nth-child(5)
                        left: 45%
                        top: 60%

                    &:nth-child(6)
                        left: 45%
                        top: 75%

                    &:nth-child(7)
                        left: 30%
                        top: 90%

                    &:nth-child(8)
                        left: 72%
                        top: 90%

                    &:nth-child(9)
                        left: 50%
                        top: 90%

                    &:nth-child(10)
                        left: 16%
                        top: 74%
    @media (max-width: 480px)
      .machine_tab_wrapper
        overflow-x: hidden
        .machine_imgs_container
          margin-bottom: 15px
          .machine_panel
            top: 0px
            right: -20px
            &.animate
              transform: scale(1.6)
</style>
