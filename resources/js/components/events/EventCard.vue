<template>
  <div class="event-container">
    <div class="square event-image d-none d-lg-block" :style="getMainImage()"></div>
    <div class="d-flex d-lg-none">
      <div class="square event-image" :style="getMainImage()"></div>
      <div class="event-date d-lg-none">
        <div class="date-number">{{getDate(show.start_datetime)}}</div>
        <div class="date-month">{{getMonth(show.start_datetime)}}</div>
        <div class="date-range">{{dateRange}}</div>
      </div>
    </div>
    <div class="show-info-body verticenter">
      <div class="d-flex justify-content-between">
        <div class="event-name" :class="{'small-text': show.name.length > 26}">{{show.name}}</div>
        <div
          v-if="!showShare"
          @click.prevent="showShare = !showShare"
          class="share-toggle share-btn d-none d-md-flex"
        >
          Share
          <i class="fas fa-share-alt"></i>
        </div>
        <div v-else class="share-links d-none d-md-flex">
          <div @click.prevent="showShare = !showShare" class="share-btn">Share</div>
          <a
            target="_blank"
            class="share-link"
            :href="'mailto:?subject='+show.name+'&body='+shareUrl"
          >
            <i class="fas fa-envelope"></i>
          </a>
          <div class="fb-share-button" :data-href="shareUrl" data-layout="button" data-size="small">
            <a
              target="_blank"
              :href="'https://www.facebook.com/sharer/sharer.php?u='+shareUrl+'&amp;src=sdkpreparse'"
              class="fb-xfbml-parse-ignore share-link"
            >
              <i style="font-size: 20px; color: #ffffff !important" class="fab fa-facebook-f"></i>
            </a>
          </div>
          <a target="_blank" :href="twitterLink" :id="show.slug" class="twitter-share share-link">
            <i style="font-size: 20px" class="fab fa-twitter"></i>
          </a>
          <a
            target="_blank"
            :href="'http://pinterest.com/pin/create/button/?url='+shareUrl+'&media='+(mainimage ? mainimage.path : '')+'&description='+(getContent('tradeshow_main_description') ? getContent('tradeshow_main_description') : '')"
            class="pin-it-button share-link"
            count-layout="horizontal"
          >
            <i style="font-size: 20px" class="fab fa-pinterest-p"></i>
          </a>
        </div>
      </div>
      <div class="location-container">
        <div class="location-name">
          <i class="fas fa-map-marker-alt"></i>
          <div class="location">{{getContent('tradeshow_location')}}</div>
        </div>
        <div class="location-address">{{getContent('tradeshow_address')}}</div>
      </div>

      <div class="event-description" v-html="getContent('tradeshow_main_description')"></div>

      <div
        v-if="!showShare"
        @click.prevent="showShare = !showShare"
        class="share-toggle share-btn d-md-none"
      >
        Share
        <i class="fas fa-share-alt"></i>
      </div>
      <div v-else class="share-links d-md-none">
        <div @click.prevent="showShare = !showShare" class="share-btn">Share</div>
        <a
          target="_blank"
          class="share-link"
          :href="'mailto:?subject='+show.name+'&body='+shareUrl"
        >
          <i class="fas fa-envelope"></i>
        </a>
        <div class="fb-share-button" :data-href="shareUrl" data-layout="button" data-size="small">
          <a
            target="_blank"
            :href="'https://www.facebook.com/sharer/sharer.php?u='+shareUrl+'&amp;src=sdkpreparse'"
            class="fb-xfbml-parse-ignore share-link"
          >
            <i style="font-size: 20px; color: #ffffff !important" class="fab fa-facebook-f"></i>
          </a>
        </div>
        <a target="_blank" :href="twitterLink" :id="show.slug" class="twitter-share share-link">
          <i style="font-size: 20px" class="fab fa-twitter"></i>
        </a>
        <a
          target="_blank"
          :href="'http://pinterest.com/pin/create/button/?url='+shareUrl+'&media='+(mainimage ? mainimage.path : '')+'&description='+(getContent('tradeshow_main_description') ? getContent('tradeshow_main_description') : '')"
          class="pin-it-button share-link"
          count-layout="horizontal"
        >
          <i style="font-size: 20px" class="fab fa-pinterest-p"></i>
        </a>
      </div>

      <div class="d-flex align-items-center event-links">
        <a class="tradeshow-btn-link" :href="tradeShowLink">FIND OUT MORE</a>
        <a class="event-url ml-md-4" :href="getContent('tradeshow_url')">
          <div class="link-name">Learn More</div>
          <i class="fas fa-external-link-alt"></i>
        </a>
      </div>
    </div>
    <div class="event-date d-none d-lg-flex">
      <div class="date-number">{{getDate(show.start_datetime)}}</div>
      <div class="date-month">{{getMonth(show.start_datetime)}}</div>
      <div class="date-range">{{dateRange}}</div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  name: "TradeShowCard",
  props: ["show", "country", "mainimage", "shareroute"],
  data() {
    return {
      showShare: false
    };
  },
  computed: {
    dateRange() {
      return `${this.getDay(this.show.start_datetime)},
         ${this.getMonth(this.show.start_datetime)}
          ${this.getDate(this.show.start_datetime)}
           - ${this.getDay(this.show.end_datetime)},
            ${this.getMonth(this.show.end_datetime)}
             ${this.getDate(this.show.end_datetime)}`;
    },
    tradeShowLink() {
      return this.shareroute;
    },
    shareUrl() {
      return window.location;
    },
    twitterLink() {
      let route = this.shareroute;
      let text = encodeURIComponent(`Check out`);
      let shareUrl =
        "https://twitter.com/intent/tweet?url=" + route + "&text=" + text;
      return shareUrl;
    }
  },
  methods: {
    getDate(date) {
      return moment(date).format("DD");
    },
    getMonth(date) {
      return moment(date).format("MMM");
    },
    getDay(date) {
      return moment(date).format("ddd");
    },
    getContent(contentType) {
      let content = this.show.content.filter(content => {
        return content.name === contentType;
      });
      return content.length ? content[0].text : "";
    },
    getMainImage() {
      return `background-image: url(${
        this.mainimage ? this.mainimage.path : ""
      });`;
    }
    // getWindowOptions(){
    //   var width = 500;
    //   var height = 350;
    //   var left = (window.innerWidth / 2) - (width / 2);
    //   var top = (window.innerHeight / 2) - (height / 2);

    //   return [
    //       'resizable,scrollbars,status',
    //       'height=' + height,
    //       'width=' + width,
    //       'left=' + left,
    //       'top=' + top,
    //       ].join();
    // },
    // twitterShare(){
    //   var win = window.open(this.twitterLink, 'ShareOnTwitter', this.getWindowOptions());
    //   win.opener = null; // 2
    // }
  },
  mounted() {}
};
</script>

<style>
</style>