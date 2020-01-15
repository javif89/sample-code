<template>
  <div class="content-dropdown">
    <div class="row">
      <div class="col">
        <select name id class="form-control" @change="updateContent">
          <option
            v-for="(opt, index) in options"
            :key="index"
            :value="opt"
            :selected="opt == content.text"
          >{{opt}}</option>
        </select>
      </div>
      <div class="col-1 d-flex justify-content-center align-items-center">
        <div class="spinner-border" role="status" v-if="loading"></div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      loading: false,
      timeout: undefined,
    };
  },
  props: ["content", "options"],
  methods: {
    updateContent(e) {
        this.content.text = e.target.value;
      let updateRoute = route("update-product-content", {
        id: this.content.id
      });
      this.loading = true;
      axios
        .put(updateRoute, {
          text: this.content.text
        })
        .finally(() => {
          this.loading = false;
        });
    }
  }
};
</script>

<style lang="scss">
.tox-notifications-container {
  display: none;
}
</style>