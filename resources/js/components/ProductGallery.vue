<template>
  <div class="product-gallery">
    <LightBox :images="images" :show-light-box="false" ref="lightbox"></LightBox>
    <div class="current-item-container">
      <img
        v-if="currentImageType == 'image'"
        :src="currentImageUrl"
        alt
        class="img-fluid current-image"
      />
      <video
        :src="currentImageUrl"
        v-if="currentImageType == 'video'"
        style="width: 100%; height: auto;"
        class="current-video"
        controls
      ></video>
    </div>
    <div class="thumbnail-row">
      <!-- <button class="btn arrow" @click="previous">
        <i class="fa fa-chevron-left"></i>
      </button> -->
      <div class="thumbnail-pics" :class="[items.length > 7 ? 'left-align' : '']" ref="thumbnailpics">
        <div
          class="thumbnail-container"
          v-for="(pic, index) in items"
          :key="index"
          :class="[isCurrentImage(index) ? 'active' : '']"
          :id="'gallery-thumb-'+index"
        >
          <div class="square" @click="openLightbox(index)" :style="`background-image: url('${pic.path}');`"></div>
          <div v-if="pic.type.name == 'video'" class="video-container" @click="setImage(index)">
            <video
              :src="pic.path"
              v-if="pic.type.name == 'video'"
              style="width: 100%; height: auto;"
            ></video>
            <img src="/icons/Play Button Copy 2-Play Button.svg" alt class="play-button" />
          </div>
        </div>
      </div>
      <!-- <button class="btn arrow" @click="next">
        <i class="fa fa-chevron-right"></i>
      </button> -->
    </div>
  </div>
</template>

<script>
import LightBox from 'vue-image-lightbox'

export default {
  data() {
    return {
      currentIndex: 0
    };
  },
  props: ["items"],
  components: {LightBox},
  methods: {
    setImage(index) {
      this.currentIndex = index;
    },
    isCurrentImage(index) {
      return this.currentIndex == index;
    },
    openLightbox(index) {
      this.$refs.lightbox.showImage(index)
    },
    next() {
      if (this.currentIndex < this.items.length - 1) {
        this.currentIndex = this.currentIndex + 1;
        // Scroll current thumbnail into view
        $(this.$refs.thumbnailpics).scrollLeft($(this.$refs.thumbnailpics).scrollLeft() + 50);
      }
    },
    previous() {
      if (this.currentIndex > 0) {
        this.currentIndex = this.currentIndex - 1;

        // Scroll current thumbnail into view
        $(this.$refs.thumbnailpics).scrollLeft($(this.$refs.thumbnailpics).scrollLeft() - 50);
      }
    }
  },
  computed: {
    images() {
      let images = [];

      this.items.forEach(item => {
          images.push({
            thumb: item.path,
            src: item.path,
        })
      });

      return images;
    },
    currentImageUrl() {
      return this.items[this.currentIndex].path;
    },
    currentImageType() {
      return this.items[this.currentIndex].type.name;
    }
  }
};
</script>

<style lang="scss" scoped>
.product-gallery {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  .current-item-container {
    margin-bottom: 20px;

    // .current-image {
      
    // }
  }

  .thumbnail-row {
    .arrow {
      color: white;
      opacity: 0.7;
    }

    .thumbnail-pics {
      display: flex;
      justify-content: center;
      width: 100%;
      overflow-x: auto;

      &.left-align {
        justify-content: space-between;
      }

      .thumbnail-container {
        width: 70px;
        height: auto;
        margin-right: 10px;
        flex-shrink: 0;
      }

      .thumbnail-container.active {
        border: 2px solid #e6e6e7;
      }

      .video-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        position: relative;

        .play-button {
          width: 50%;
          height: auto;
          position: absolute;
        }
      }
    }
  }
}

@media (max-width: 768px) {
  .product-gallery {
    .current-item-container {
      height: auto;
      margin-bottom: 20px;
    }
  }
}

@media (max-width: 480px) {
  .product-gallery {
    .thumbnail-row {
      .thumbnail-pics {
        .thumbnail-container {
          
        }
      }
    }
  }
}
</style>