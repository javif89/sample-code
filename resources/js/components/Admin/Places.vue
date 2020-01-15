<!-- components/Places.vue -->
<template>
  <!-- container for places.js -->
  <div />
</template>
<script>
import places from 'places.js';
export default {
  data() {
    return { instance: null };
  },
  props: ['value', 'placeholder'],
  mounted() {
    // make sure Vue does not know about the input
    // this way it can properly unmount
    this.input = document.createElement('input');
    $(this.input).attr('placeholder', this.placeholder);
    this.$el.appendChild(this.input);
    this.input.value = this.value;
    this.instance = places({
      apiKey: '5c33ac5c4f4df4e396803d3d0bd0e793',
      appId: 'plXQSPWCXVNB',
      type: 'address',
      container: this.input,
    });
    this.instance.on('change', e => {
      this.$emit('change', e.suggestion);
    });
    this.instance.on('clear', e => {
      this.$emit('clear');
    });
  },
  beforeDestroy() {
    this.instance.off('change');
    this.instance.destroy();
  },
  watch: {
      value(val){
          this.input.value = val;
      }
  }
};
</script>