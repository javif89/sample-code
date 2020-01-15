<template>
  <div class="card h-100 show-container d-flex flex-column justify-content-between">
      <div class="show-img-container square-16by9" :style="mainImageStyle">
        <!-- <img :src="mainimage ? mainimage.path : ''" alt="" class="main-img img-fluid"> -->
        <div v-if="getContent('tradeshow_promo')" class="promo-available">Promo Available</div>
      </div>
      <div class="show-info-body d-flex flex-column justify-content-between">
        <div>
          <div class="show-header">
            <div class="short-date">
              <div class="date-number">{{getDate(show.start_datetime)}}</div>
              <div class="date-month">{{getMonth(show.start_datetime)}}</div>
            </div>
            <div class="show-name" :class="{'small-text': show.name.length > 26}">{{show.name}}</div>
          </div>
          <div class="date-range my-3">{{dateRange}}</div>

          <div class="location-container ">
            <div class="location-name">
              <i class="fas fa-map-marker-alt"></i>
              <div class="location">{{getContent('tradeshow_location')}}</div>
            </div>
            <div class="location-address">{{getContent('tradeshow_address')}}</div>
            <div class="booth-info ">Booth number {{getContent('tradeshow_booth')}}</div>
          </div>

          <a class="event-url form-group mt-3" :href="getContent('tradeshow_url')">
            <div class="link-name">{{show.name}}</div>
            <i class="fas fa-external-link-alt"></i>
          </a>

          <div class="my-3">
            <div v-if="!showShare" @click.prevent="showShare = !showShare" class="share-toggle share-btn">Share<i class="fas fa-share-alt"></i></div>
            <div v-else class="share-links">
              <div @click.prevent="showShare = !showShare" class="share-btn">Share</div>
              <a target="_blank" class="share-link" :href="'mailto:?subject='+show.name+'&body='+shareUrl">
                  <i class="fas fa-envelope"></i>
              </a>
              <div class="fb-share-button" :data-href="shareUrl" data-layout="button"
                  data-size="small">
                  <a target="_blank"
                      :href="'https://www.facebook.com/sharer/sharer.php?u='+shareUrl+'&amp;src=sdkpreparse'"
                      class="fb-xfbml-parse-ignore share-link"><i style="font-size: 20px; color: #ffffff !important" class="fab fa-facebook-f"></i>
                  </a>
              </div>
              <a target="_blank" :href="twitterLink" :id="show.slug" class="twitter-share share-link"><i style="font-size: 20px" class="fab fa-twitter"></i></a>
              <a target="_blank" :href="'http://pinterest.com/pin/create/button/?url='+shareUrl+'&media='+(mainimage ? mainimage.path : '')+'&description='+(getContent('tradeshow_main_description') ? getContent('tradeshow_main_description') : '')"
                  class="pin-it-button share-link" count-layout="horizontal">
                  <i style="font-size: 20px"  class="fab fa-pinterest-p"></i>
              </a>
            </div>
          </div>
        </div>
          
        <a class="tradeshow-btn-link" :href="tradeShowLink">READ MORE</a>
      </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
    name: 'TradeShowCard',
    props: ['show', 'country', 'mainimage', 'shareroute'],
    data(){
      return {
        showShare: false
      }
    },
    computed: {
      dateRange(){
        return `${this.getDay(this.show.start_datetime)},
         ${this.getMonth(this.show.start_datetime)}
          ${this.getDate(this.show.start_datetime)}
           - ${this.getDay(this.show.end_datetime)},
            ${this.getMonth(this.show.end_datetime)}
             ${this.getDate(this.show.end_datetime)}`;
      },
      tradeShowLink(){
        return this.shareroute;
      },
      shareUrl(){
        return window.location;
      },
      twitterLink(){
        let route = this.shareroute;
        let text = encodeURIComponent(`Check out`);
        let shareUrl = 'https://twitter.com/intent/tweet?url=' + route + '&text=' + text;
        return shareUrl;
      },
      mainImageStyle() {
        return `background-image: url(${this.mainimage ? this.mainimage.path : ''});`;
      }
    },
    methods:{
      getDate(date){
        return moment(date).format('DD');
      },
      getMonth(date){
        return moment(date).format('MMM');
      },
      getDay(date){
        return moment(date).format('ddd')
      },
      getContent(contentType){
        let content = this.show.content.filter(content => {
          return content.name === contentType;
        });
        return content.length ? content[0].text : '';
      },
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
    mounted(){
    }
}
</script>

<style>

</style>