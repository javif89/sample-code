<template>
  <div class="content-edit">
    <div class="row">
        <div class="col">
            <input v-if="type == 'text'" type="text" class="form-control" v-model="content.text" v-debounce:150ms="updateContent" />
            <textarea v-if="type == 'textarea'" v-model="content.text" v-debounce:1ms="updateContent" class="form-control" style="height: 200px !important;"></textarea>
            <tinymce v-if="type == 'rich'" v-model="content.text" @onKeyUp="updateWithDebounce" :init="{height: 500, plugins: 'link'}"></tinymce>
            <places @change="emitChange" v-if="type == 'place'" :value="content.text"></places>
            <place-autocomplete-field 
                placeholder="Enter an an address, zipcode, or location"
                name="field1" 
                api-key="AIzaSyCcpFG28KB9MpiSp5JTOKhdUjnfh3E0GmU"
                v-if="type == 'google-place'"
                v-model="content.text"
                @autocomplete-select="handleGooglePlacesInput"
            >
            </place-autocomplete-field>
        </div>
        <div class="col-1 d-flex justify-content-center align-items-center">
            <div class="spinner-border" role="status" v-if="loading"></div>
        </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Editor from '@tinymce/tinymce-vue';
import debounce from 'vue-debounce/src/debounce';

export default {
  data() {
      return {
          loading: false,
          timeout: undefined,
          entity: this.$parent.entity
      }
  },
  props: ["content", "type"],
  components: {
    'tinymce': Editor
  },
  computed: {

  },
  methods: {
    emitChange(location){
      this.$emit('change', location);
      this.content.text = location.value
      this.updateContent()
    },
    handleGooglePlacesInput(address_data, location_data) {
      console.log(address_data);
      // Format the location object
      let location = {};
      location.latlng = {};
      location.latlng.lat = location_data.geometry.location.lat();
      location.latlng.lng = location_data.geometry.location.lng();
      location.value = address_data.description;
      console.log(location);
      // Re-use already existing functionality
      this.emitChange(location);
    },
    contentId() {
      // console.log('eee', this.content.id);
      // console.log($('#set_country_code').val(),$('#set_lang_code').val());
      if (!this.content.id) {
          return -1;
      } else if (this.content.country_code !==  $('#set_country_code').val() || this.content.lang_code !==  $('#set_lang_code').val())
      {
          // is default content - need to replace with new one
          return -1;
      } else {
          return this.content.id
      }
    },
    updateContent() {
      if (this.loading) {
          return;
      }
      let updateRoute = route(`update-${this.entity}-content`, {
        id: this.contentId(),
      });
      this.loading = true;
      // console.log('content text is: ', this.content.text)
      let updateObj = {
          name: this.content.name,
          text: this.content.text,
          country_code: $('#set_country_code').val(),
          lang_code: $('#set_lang_code').val()
      }
      updateObj[`${this.entity}_id`] = this.$parent[`${this.entity}`].id;
      axios
        .put(updateRoute, 
          updateObj
        )
          .then((result) => {
              this.loading = false;
              this.$set(this.content, 'id', result.data.id);
              this.$set(this.content, 'country_code', result.data.country_code);
              this.$set(this.content, 'lang_code', result.data.lang_code);
          });
    },
    updateWithDebounce() {
      this.updateContent();
      // if (this.timeout) clearTimeout(this.timeout);
      //   this.timeout = setTimeout(() => {
      //
      // }, 150);
    }
  }
};
</script>

<style lang="scss">
.tox-notifications-container {
  display: none;
}
</style>