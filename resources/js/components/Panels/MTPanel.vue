<template>
    <div class="machine_tab_wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div v-view="panelAnim" class="machine_imgs_container">
                    <figure :class="['machine_img', 'square',{'animate': inView}]"></figure>
                    <figure :class="['machine_panel', {'animate': inView}]">
                        <div v-for="(feat, key) in objFeatures" @click="featureChange(key, $event)" :key="key"
                            :class="['panel_descriptor_btn', {'selected': selectedFeature === key}]">+
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
                            Run your machine with ease with the easy-to-use
                            high-definition true-color 7" LCD touch screen
                            panel. Each Ricoma MT Series includes a computerized
                            control panel that holds 20 millions stitches of
                            storage. With the 7S panel, you can upload and edit
                            design settings and create customized lettering
                            directly on the panel.
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
            title: "Emergency Stop Button",
            text: 'In case of an emergency, press the emergency stop button located on top right side of the panel and rotate clockwise. This will stop the machine.'
          },
          'feat2': {
            title: "Working Mode/Color Change Mode Key",
            text: 'This key sets your machine to automatically or manually change to the next color stop.'
          },
          'feat3': {
            title: "Color Sequence Menu",
            text: 'Select your design’s colors with the color sequence menu. The number to the left displays the current needle position while the second displays the upcoming needle/color.'
          },
          'feat4': {
            title: "Needle Icon",
            text: 'Manually switch needles with the needle icon. This icon also displays the current needle position and degree settings on the machine. The left side displays the current needle position and the right side displays the degree the machine is aligned to.'
          },
          'feat5': {
            title: "Design import/export",
            text: 'This key is used to select, display, import and delete designs in the machine’s memory.'
          },
          'feat6': {
            title: "Design Settings Menu",
            text: 'Select preset hoops, repeat designs and edit settings like size and rotation angle with the design settings menu.'
          },
          'feat7': {
            title: "Embroidery Parameters Key",
            text: 'Select this key to adjust the machine\'s parameters.'
          },
          'feat8': {
            title: "Design preview",
            text: 'In this small preview screen, you can see the design you\'re embroidering and how far along you are in the embroidery process.'
          },
          'feat9': {
            title: "100 Degree Key",
            text: 'This key automates the process of aligning the machine to 100 degrees. In order to use the machine, it must be aligned to 100 degrees.'
          },
          'feat10': {
            title: "Start/Stop Button",
            text: 'Use these buttons to start or stop the embroidery process. If you need to stop embroidering at any time during the process, click the Stop button to make the machine stop.'
          },
          'feat11': {
            title: 'Manual Trimming Key',
            text: 'Use this key to perform trimming during operation status and preparation status.'
          },
          'feat12': {
            title: 'Frame Out Key',
            text: 'The frame out key brings your hoop forward during the embroidery process for simple one-step appliqué.'
          },
          'feat13': {
            title: 'Trace Design Key',
            text: 'Use this key to trace the design’s start and end point. This will help you select your design’s placement and determine if your needle will come into contact with the hoop at any point during the embroidery process.'
          },
          'feat14': {
            title: 'Message Key/Floating Key',
            text: 'Fast forward and rewind through designs with the floating mode key. This key also displays which status the machine is on, whether it’s preparing, working or waiting.'
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
                background-image: url('/images/panels/machine/mt.png')
                background-position: -125px center
            .machine_panel
                background-image: url('/images/TCTabsSection/machine_panel.png')
                right: 0
                top: 350px
                height: 203px
                width: 267px
                .panel_descriptor_btn
                    &:hover
                        cursor: pointer

                    &:nth-child(1)
                        right: 11%
                        top: 2%

                    &:nth-child(2)
                        right: 30%
                        top: 17%

                    &:nth-child(3)
                        right: 37%
                        top: 17%

                    &:nth-child(4)
                        right: 44%
                        top: 17%

                    &:nth-child(5)
                        right: 9%
                        top: 35%

                    &:nth-child(6)
                        right: 9%
                        top: 45%

                    &:nth-child(7)
                        right: 9%
                        top: 55%

                    &:nth-child(8)
                        left: 20%
                        top: 60%

                    &:nth-child(9)
                        left: 31%
                        top: 85%

                    &:nth-child(10)
                        left: 73.5%
                        top: 88%

                    &:nth-child(11)
                        right: 43%
                        top: 82%

                    &:nth-child(12)
                        right: 43%
                        top: 40%

                    &:nth-child(13)
                        right: 26%
                        top: 40%
                    &:nth-child(14)
                        right: 23%
                        top: 17%
    @media (max-width: 480px)
      .machine_tab_wrapper
        .machine_imgs_container
          .machine_panel
            top: 80px
            right: -18px
            .panel_descriptor_btn
              height: 15px
              width: 15px
              font-size: 14px
</style>
