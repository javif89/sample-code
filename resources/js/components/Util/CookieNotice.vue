<template>
  <div class="cookie-notice" v-if="show">
    <div class="container-fluid py-3 px-4">
      <div class="row">
        <div class="col-md-9 verticenter">
          <p class="notice-text text-md-left text-center mb-3 mb-md-0">
            Ricoma’s website uses cookies. By proceeding, you consent to our cookie usage. Please see Ricoma’s
            <a
              :href="cookiePageLink"
              class
            >Cookie Policy.</a>
          </p>
        </div>
        <div class="col-4 col-md-3 offset-4 offset-md-0 verticenter">
          <button @click="agree" class="btn agree-btn">I Agree</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        show: true
    };
  },
  props: ["country"],
  methods: {
      agree() {
          window.localStorage.setItem('agree-to-cookies', 'true');
          this.show = false;
      }
  },
  computed: {
    cookiePageLink() {
      return route("cookie-policy-page", { country: this.country });
    }
  },
  mounted() {
      if(window.localStorage.getItem('agree-to-cookies') == 'true') {
          this.show = false;
      }
  }
};
</script>

<style lang="scss" scoped>
.cookie-notice {
  width: 650px;
  background-color: black;
  color: white;
  border: 1px solid white;
  position: fixed;
  bottom: 30px;
  right: 20px;
  z-index: 300;

  .notice-text {
    font-size: 16px;
    line-height: 29px;
    margin-bottom: 0;

    a {
      font-weight: normal;
      color: white;
      text-decoration: underline;
    }
  }

  .agree-btn {
    border: 1px solid white;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: bold;
    line-height: 30px;
    text-align: center;
    width: 100%;
    padding: 10px 0;
    color: white;
  }
}

@media (max-width: 768px) {
    .cookie-notice {
        width: 100%;
        bottom: 0;
        right: 0;
        border: none;
        border-top: 1px solid white;
    }
}
</style>