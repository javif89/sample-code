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
                        <span class="tab_title">High-Definition True-Color 8" <br class="d-none d-lg-inline"> LCD Touch Screen</span>
                        <p>
                          Run your machine with ease with the SWD’s
                          high-definition true-color 8-inch LCD touch screen
                          panel. With a memory capacity of 20 million stitches,
                          this computerized panel allows you to upload and edit
                          design settings and create customized lettering. You
                          can also transfer designs wirelessly to the panel from
                          the Chroma software included with your machine.
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
            title: "Design Preview Screen",
            text: "In this small preview screen, you can see the design you're embroidering and how far along you are in the embroidery process."
          },
          'feat2': {
            title: "Design Menu",
            text: "Create on-board letting and import and view designs on the USB and machine’s memory."
          },
          'feat3': {
            title: "Color Sequence Menu",
            text: "Display and program color sequence settings."
          },
          'feat4': {
            title: "Preset Hoops",
            text: "Displays and programs the machine’s preset hoops"
          },
          'feat5': {
            title: "Design Settings",
            text: "Repeat designs and edit settings like size and rotation angle with the design settings menu."
          },
          'feat6': {
            title: "Camera",
            text: "This optional function allows you to center the design once it has been hooped."
          },
          'feat7': {
            title: "Stitch mode",
            text: "View the machine’s status, and rewind or fast forward the design in low or high speeds."
          },
          'feat8': {
            title: "Float",
            text: "Rewind or fast forward your design by stitch count."
          },
          'feat9': {
            title: "Trace Design Key",
            text: "Use this key to trace the design’s start and end point. This will help you select your design’s placement and determine if your needle will come into contact with the hoop at any point during the embroidery process."
          },
          'feat10': {
            title: "Needle Icon",
            text: "Manually switch needles with the needle icon. This icon also displays the current needle position and degree settings on the machine. The left side displays the current needle position and the right side displays the degree the machine is aligned to."
          },
          'feat11': {
            title: "Report Key",
            text: "This icon displays production statistics."
          },
          'feat12': {
            title: "Embroidery Settings",
            text: "Displays important embroidery settings and parameters"
          },
          'feat13': {
            title: "Frame Out Key",
            text: "The frame out key brings your hoop forward during the embroidery process for simple one-step appliqué. "
          },
          'feat14': {
            title: "Emergency Stop Button",
            text: "In case of an emergency, press the emergency stop button located on bottom left side of the panel. This will stop the machine."
          },
          'feat15': {
            title: "100 Degree Key",
            text: "This key automates the process of aligning the machine to 100 degrees. In order to use the machine, it must be aligned to 100 degrees."
          },
          'feat16': {
            title: "Manual Trimming Key",
            text: "Use this key to perform trimming during operation status and preparation status."
          },
          'feat17': {
            title: "Start/Stop Button",
            text: "Use these buttons to start or stop the embroidery process. If you need to stop embroidering at any time during the process, click the Stop button to make the machine stop."
          },          
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
                background-image: url('/images/panels/machine/swd.png')
            .machine_panel
                background-image: url('/images/panels/8s.png')
                right: 85px
                top: 22%
                height: 31%
                width: 22%
                .panel_descriptor_btn
                    &:hover
                        cursor: pointer

                    &:nth-child(1)
                      top: 35%
                      left: 20%
                    &:nth-child(2)
                      top: 23%
                      left: 83%
                    &:nth-child(3)
                      top: 29%
                      left: 62%
                    &:nth-child(4)
                      top: 35%
                      left: 83%
                    &:nth-child(5)
                      top: 41%
                      left: 62%
                    &:nth-child(6)
                      top: 58.5%
                      left: 16%
                    &:nth-child(7)
                      top: 58.5%
                      left: 28%
                    &:nth-child(8)
                      top: 58.5%
                      left: 39%
                    &:nth-child(9)
                      top: 50%
                      left: 48%
                    &:nth-child(10)
                      top: 74%
                      left: 16%
                    &:nth-child(11)
                      top: 74%
                      left: 28%
                      display: none
                    &:nth-child(12)
                      top: 74%
                      left: 39%
                      display: none
                    &:nth-child(13)
                      top: 74%
                      left: 54%
                    &:nth-child(14)
                      top: 88%
                      left: 10%
                    &:nth-child(15)
                      top: 89%
                      left: 39%
                    &:nth-child(16)
                      top: 89%
                      left: 55%
                    &:nth-child(17)
                      top: 88%
                      left: 85%


    @media (max-width: 480px)
      .machine_tab_wrapper
        .machine_imgs_container
          margin-top: 20px
          margin-bottom: 5px
          .machine_panel
            transform: scale(1)
            top: 90px
            right: 40px
            &.animate
              transform: scale(3)
            .panel_descriptor_btn
              height: 8px !important
              width: 8px !important
              font-size: 6px !important
              padding: 0
              transform: scale(0.75)
</style>
