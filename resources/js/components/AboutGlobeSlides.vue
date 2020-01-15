<template>
  <div class="slides" id="slides-app">
    <div class="card h-100 mx-lg-4">
      <div class="d-md-flex w-100">
        <div class="d-md-none slide-img-long" :style="backgroundStyle"></div>
        <div class="square d-none d-md-block slide-img" :style="backgroundStyle"></div>
        <div class="verticenter pr-md-5 slide-content-container">
          <p class="slide-title">{{title}}</p>
          <p class="slide-content">{{content}}</p>
        </div>
      </div>
    </div>
    <button class="control next-btn" @click="next">
      <i class="fa fa-arrow-right"></i>
    </button>
    <button class="control prev-btn" @click="prev">
      <i class="fa fa-arrow-left"></i>
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      slides: [
        {
          title: "Michelle Newitt: Bundaberg, Australia",
          image: "/images/about/reviews/michelle.jpg",
          content: "I have owned single needle embroidery machines for over 20 years, and I must say that the Ricoma was a very steep learning curve for me initially. Move forward a few months though, I am very happy with the speed of operation and quality of the items that I am producing. The online Ricoma videos are helpful and I did use them quite frequently.",
          lat: -24.8670,
          lng: 152.3510
        },
        {
          title: "Yazz Lee Russell: Lawson, New South Wales",
          image: "/images/about/reviews/yazz.jpg",
          content: "I own a 1501 Ricoma we go through 100’s of thousands of stitches weekly. I challenge her more that most machines ever experience. I love her. The stitch quality is amazing and it’s user friendly. Ricoma has the best support system of any other industrial brand. Don’t hesitate, you will not regret the purchase.",
          lat: -33.7167,
          lng: 150.4333
        },
        {
          title: "Alban Tullumi:  GjakovaI, Kosovo",
          image: "/images/about/reviews/alban.jpg",
          content: "I can call myself lucky to have had the opportunity to buy a 6-head Ricoma. Thanks to the amazing experience with Ricoma I am looking to by another Ricoma single head…",
          lat: 42.3844,
          lng: 20.4285
        }
      ],
      currentSlide: 0
    };
  },
  methods: {
    next() {
      if (this.currentSlide < this.slides.length - 1) {
        this.currentSlide = this.currentSlide + 1;
      } else {
        this.currentSlide = 0;
      }

      this.$emit("slidechange", this.slides[this.currentSlide]);
    },
    prev() {
      if (this.currentSlide > 0) {
        this.currentSlide = this.currentSlide - 1;
      } else {
        this.currentSlide = this.slides.length - 1;
      }

      this.$emit("slidechange", this.slides[this.currentSlide]);
    }
  },
  computed: {
    title() {
      return this.slides[this.currentSlide].title;
    },
    content() {
      return this.slides[this.currentSlide].content;
    },
    image() {
      return this.slides[this.currentSlide].image;
    },
    backgroundStyle() {
      return `background-image: url('${this.image}');`;
    }
  }
};
</script>

<style lang="scss" scoped>
#slides-app {
  position: relative;

  .slide-title {
    font-size: 20px;
    font-weight: bold;
  }

  .control {
    position: absolute;
    background-color: black;
    border-radius: 50%;
    height: 50px;
    width: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-weight: bold;
    border: none;
    top: 0;
    bottom: 0;
    margin: auto;
  }

  .next-btn {
    right: 0 !important;
  }

  .slide-img {
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    max-width: 30%;
    margin-right: 20px;
  }

  .slide-img-long {
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 160px;
  }
}

@media (max-width: 480px) {
    #slides-app {
        .control {
            top: 135px;
            bottom: initial;
        }

        .slide-content-container {
          padding: 30px 10px;
        }
    }
}
</style>