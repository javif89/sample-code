<template>
  <div class="media-edit">
    <div class="file">
      <label class="overlay-button" :for="'file-input' + media.id">
        <i class="fa fa-edit"></i>
        Change
      </label>
      <input
        type="file"
        ref="fileInput"
        style="display: none;"
        name="file"
        :id="'file-input' + media.id"
        @change="updateMedia"
      />
      <img :src="media.path" alt class="img-fluid" v-if="mediatype == 'image'" />
      <video
        :src="media.path"
        v-if="mediatype == 'video'"
        style="width: 100%; height: auto;"
        autoplay
        loop
        muted
      ></video>
    </div>
    <div v-if="entity !== 'event'" class="row">
      <div class="col">
        <input
          v-if="media.name !== 'included'"
          type="text"
          class="form-control"
          placeholder="Caption..."
          v-model="media.caption"
          v-debounce:1ms="updateCaption"
        />
        <tinymce @onKeyUp="updateCaption" v-if="media.name === 'included'" v-model="media.caption" :init="{height: 500, plugins: 'link'}"></tinymce>
      </div>
      <div class="col-2 d-flex justify-content-start align-items-center">
        <div class="spinner-border" role="status" v-if="loading"></div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Editor from '@tinymce/tinymce-vue';

export default {
  data() {
    return {
      loading: false,
      entity: this.$parent.entity
    };
  },
  props: ["media"],
    components: {
    'tinymce': Editor
  },
  methods: {
    updateMedia() {
      if (this.loading) {
          return;
      }
      let updateRoute = route(`update-${this.entity}-media`, {
          id: this.mediaId()
      });

      var formData = new FormData();
      var files = this.$refs.fileInput;
      formData.append("file", files.files[0]);
      formData.append("name", this.media.name);
      formData.append("country_code", $('#set_country_code').val());
      formData.append("lang_code", $('#set_lang_code').val());
      formData.append(`${this.entity}_id`,  this.$parent[this.entity].id);
      this.loading = true;
      axios
        .post(updateRoute, formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          this.media = response.data;
          this.$forceUpdate();
          this.$emit("updated", response.data);
        })
        .finally(() => {
          this.loading = false;
        });
    },
    updateCaption() {
      let updateRoute = route(`update-${this.entity}-media`, {
          id: this.mediaId()
      });
      this.loading = true;

      let updateObj = {
          name: this.media.name,
          country_code: $('#set_country_code').val(),
          lang_code: $('#set_lang_code').val(),
      };

      if(this.entity !== 'event'){
        updateObj.caption = this.media.caption;
      }
      updateObj[`${this.entity}_id`] = this.$parent[this.entity].id
      axios
        .post(updateRoute, 
          updateObj
        )
        .then(response => {
            this.$set(this.media, 'id', response.data.id);
        })
        .finally(() => {
          this.loading = false;
        });
    },
    mediaId() {
        if (!this.media.id) {
            return -1;
        } else if (this.media.country_code !==  $('#set_country_code').val() || this.media.lang_code !==  $('#set_lang_code').val())
        {
            // is default content - need to replace with new one
            return -1;
        } else {
            return this.media.id
        }
    }
  },
  computed: {
    mediatype() {
      return this.media.type ? this.media.type.name : "image";
    },
  }
};
</script>

<style lang="scss" scoped>
.media-edit {
  .file {
    position: relative;
    .overlay-button {
      position: absolute;
      color: white;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: rgba($color: #000000, $alpha: 0.5);
      font-size: 30px;
      font-weight: bold;
      opacity: 0;
      transition: opacity 0.3s linear;
      cursor: pointer;
      z-index: 100;
    }

    .overlay-button:hover {
      opacity: 1;
    }
  }
}
</style>