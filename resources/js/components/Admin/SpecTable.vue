<template>
  <div class="spec-table container">
    <div class="form-group" v-for="(spec, i) in specs">
        <label class="spec-col">
            {{spec.name.split('_')[1].toUpperCase()}}
        </label>
        <div class="spec-col">
            <content-edit :type="contentType" :content="spec"></content-edit>
        </div>
        <hr>
    </div>
</div>
</template>

<script>
export default {
    name: 'SpecTable',
    props: ['specs', 'media'],
    data(){
        return {
            entity: 'product',
        }
    },
    computed: {
        product(){
            let product = {};
            product.id = this.specs[0].product_id;
            return product;
        },
        contentType(){
            return this.specs[0].name === 'additional_features' ||
             this.specs[0].name === 'specpanel_specs' ? "rich" : "text";
        }
    },
    mounted(){
        // this.product = this.specs[0].product_id;
    }
}
</script>

<style lang="scss" scoped>
    hr {
        margin: 1rem 0
    }
</style>