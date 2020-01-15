<template>
    <div class="search-bar" :class="{'to-hide': !isMobile }"><i class="fal fa-search"></i>
        <vue-bootstrap-typeahead
                :data="searchResults"
                v-model="searchQuery"
                :serializer="s => s.text"
                placeholder="Search Ricoma"
                @hit="goTo($event)"
        /></div>
</template>
<script>
  import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';
  import axios from "axios";

  export default {
    name: "SearchBox",
    data() {
      return {
          searchResults: [],
          searchQuery: '',
          selectedSearchResult: null,
          loading: false,
      }
    },
   components: {
        VueBootstrapTypeahead
   },
   computed: {
     isMobile(){
       return this.$parent.isMobile;
     }
   },
   methods: {
     async loadData() {
        this.loading = true;
        try {
            const resp = await axios.get(route('search-front') + '?query=' + this.searchQuery);
            this.prepareResults(resp.data);
        } finally {
            this.loading = false;
        }


     },
     prepareResults(data) {
       this.searchResults =  [];
       let results = [];
       if(data.hasOwnProperty('products') && data.products) {
           data.products.forEach(p => {
                results.push({text: p.name, type: 'product', link: p.link})
           });
       }

       if(data.hasOwnProperty('events') && data.events) {
         data.events.forEach(p => {
             results.push({text: p.name, type: 'event', link: p.link})
         });
       }

       if(data.hasOwnProperty('articles') && data.articles) {
         data.articles.forEach(p => {
             results.push({text: p.title, type: 'press', link: p.link})
         });
       }

       this.$set(this, 'searchResults', results);
     },
     goTo(object) {
         window.location.assign(object.link);
     }
   },
   watch: {
    async searchQuery(val,  oldVal) {
        if (val && !this.loading && val.length >=2) {
          await this.loadData();
        }
    },
    isMobile(val){
      if(val){
        this.isMobile = val;
      }
    }
   }
  }
</script>

<style lang="scss">
.vbt-autcomplete-list {
  .vbst-item {
    span {
      color: black !important;
      font-weight: 600;

      strong {
        font-weight: 600;
      }
    }
  }

  .vbst-item:hover {
    background-color: black;
    span {
      color: white !important;
    }
    border: none;
  }
}
</style>