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
                        <span class="tab_title">High-Definition True-Color 10.4" <br class="d-none d-lg-inline"> LCD Touch Screen</span>
                        <p>
                          Run your machine with ease with the CHT2’s
                          high-definition true-color 10.4-inch LCD touch-screen
                          panel. With a large memory capacity of 50 million
                          stitches, this computerized panel allows you to upload
                          and edit design settings and create customized
                          lettering.
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
            title: "Needle change key",
            text: 'This icon displays the current needle position and degree settings on the machine. The left side displays the current needle position and the right side displays the degree the machine is aligned to.'
          },
          'feat3': {
            title: "Startup key",
            text: 'This key is used to set the color-change mode. You can set the mode to automatic, semi-automatic or manual.'
          },
          'feat4': {
            title: "Message key/Floating key",
            text: 'Fast forward and rewind through designs with the floating mode key. This key also displays which status the machine is on, whether it’s preparing, working or waiting.'
          },
          'feat5': {
            title: "Embroidery Parameters Key",
            text: 'Select this key to adjust the machine\'s parameters.'
          },
          'feat6': {
            title: "Production Statistics",
            text: 'View production stats such as how many garments you’ve embroidered, how many thread breaks you’ve gotten, and the total stitches you’ve embroidered.'
          },
          'feat7': {
            title: "Frame Out Key",
            text: 'The frame out key brings your hoop forward during the embroidery process for simple one-step appliqué.'
          },
          'feat8': {
            title: "Design import/export",
            text: 'This key is used to select, display, delete, copy, divide, combine, edit and group designs in the machine’s memory.'
          },
          'feat9': {
            title: "Design settings menu",
            text: 'Select preset hoops, repeat designs and edit settings like size and rotation angle with the design settings menu.'
          },
          'feat10': {
            title: "Color sequence menu",
            text: 'Select your design’s colors with the color sequence menu. The number to the left displays the current needle position while the second displays the upcoming needle/color.'
          },
          'feat11': {
              title: 'Embroidery progress',
              text: 'This key displays the progress of the embroidery job as a percentage.'
          },
          'feat12': {
              title: '100 Degree key',
              text: 'This key automates the process of aligning the machine to 100 degrees. In order to use the machine, it must be aligned to 100 degrees.'
          },
          'feat13': {
              title: 'Manual trimming key',
              text: 'Use this key to perform trimming during operation status and preparation status.'
          },
          'feat14': {
              title: 'Start/Stop Button',
              text: 'Use these buttons to start or stop the embroidery process and or fast forward or rewind. If you need to stop embroidering at any time during the process, click the Stop button to make the machine stop.'
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
                background-image: url('/images/panels/machine/cht.png')
                background-position: -125px center
            .machine_panel
                background-image: url('/images/panels/cht2.png')
                right: 160px
                top: 320px
                height: 107px
                width: 150px
                &.animate
                  transform: scale(4)
                  .panel_descriptor_btn
                    transform: scale(0.5)
                .panel_descriptor_btn
                    &:hover
                        cursor: pointer

                    &:nth-child(1)
                        left: 25%
                        top: 50%
                    &:nth-child(2)
                        left: 50%
                        top: 20%
                    &:nth-child(3)
                        left: 58%
                        top: 20%
                    &:nth-child(4)
                        left: 66%
                        top: 20%
                    &:nth-child(5)
                        left: 74%
                        top: 20%
                    &:nth-child(6)
                        left: 63%
                        top: 51%
                    &:nth-child(7)
                        left: 70%
                        top: 51%
                    &:nth-child(8)
                        left: 50%
                        top: 75%
                    &:nth-child(9)
                        left: 58%
                        top: 75%
                    &:nth-child(10)
                        left: 66%
                        top: 75%
                    &:nth-child(11)
                        left: 74%
                        top: 75%
                    &:nth-child(12)
                        left: 93%
                        top: 18%
                    &:nth-child(13)
                        left: 93%
                        top: 30%
                    &:nth-child(14)
                        left: 93%
                        top: 75%
    @media (max-width: 480px)
      .machine_tab_wrapper
        .machine_imgs_container
          margin-top: 0
          margin-bottom: 0
          .machine_panel
            top: 100px
            right: 80px
            &.animate
              transform: scale(1.8)
            .panel_descriptor_btn
              height: 15px
              width: 15px
              font-size: 14px
    @media (min-width: 500px) and (max-width: 768px)
      .machine_tab_wrapper
        .machine_imgs_container
          margin-top: 0
          margin-bottom: 0
          .machine_panel
            top: 250px
            right: 120px
            &.animate
              top: 0
              bottom: 0
              margin: auto
</style>
