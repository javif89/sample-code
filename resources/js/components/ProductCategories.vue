<template>
    <!-- English text for now -->
    <div id="product-categories-container" class="col-xs-12">
        <div class="category-header">
            {{category.name}}
        </div>
        <div class="compare-btns">
            <a class="compare-link" v-show="isComparing && comparedProducts.length > 1" :href="compareLink" >
                <button class="compare-btn comparison-link">View Comparison</button>
            </a>
            <button v-if="!nonComparable" @click.prevent="isComparing = !isComparing" class="compare-btn" :class="{'start-compare': !isComparing, 'cancel-compare': isComparing}">
                <div v-if="isComparing" class="cancel-btn"><i class="fa fa-times" aria-hidden="true"></i></div>
                    {{compareText}}</button>
        </div>
        <div v-if="isComparing" class="form-group select-3">Select up to 3 products for a more detailed comparison</div>
        <div v-else class="form-group select-3"></div>
        <div class="align-products">

            <div class="products-container container">
                <div class="card d-flex flex-column justify-content-between" :id="'card-'+product.id" 
                    :key="product.id" v-for="(product, i) in products.products" 
                    :class="{'enabled': isComparing && comparedProducts.includes(product.slug)}">
                    <div v-if="isComparing" class="form-group compare-radio">
                        <span :class="{'no-click': !comparedProducts.includes(product.slug) && comparedProducts.length > 2}" class="round">
                            <input class="prod-radio" :name="product.name" v-model="comparedProducts" :value="product.slug" type="checkbox" :id="'checkbox-' + product.id">
                            <label class="mask" :for="'checkbox-' + product.id"></label>
                            <span class="product-radio" :for="'checkbox-' + product.id"><div class="radio-check"></div></span>
                        </span>
                    </div>
                    <div class="product-header">{{product.name}}</div>
                    <div class="img-container">
                        <img class="img-fluid" :src="getMainImage(product)" alt="product image">
                    </div>
                    <div>
                        <div v-if="!isComparing" class="mb-3 product-link">
                            <a :href="getProductUrl(product)">Learn More <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <p class="card-text"><b>{{ product.content && getContent(product.content, 'short_description') ? getContent(product.content, 'short_description') : ''}}</b></p>
                        <p v-if="!isComparing && !isMobile" class="card-text" v-html="product.content && getContent(product.content, 'description') ? getContent(product.content, 'description') : ''"></p>
                    </div>
                </div>
                <!-- <div v-show="products.products.length - 1 % 3 !== 0" class="card move-left"></div> -->
            </div>

        </div>

    </div>
</template>

<script>
export default {
    name: 'ProductCategories',
    props: ['products', 'country', 'categoryurl', 'category'],
    data(){
        return {
            isComparing: false,
            comparedProducts: [],
        }
    },
    computed: {
        nonComparable(){
            return this.category.slug === 'domestic-sewing-machines' ||
                    this.category.slug === 'industrial-sewing-machines' ||
                    this.category.slug === 'accessories' ||
                    this.category.slug === 'other-products' ||
                    this.category.slug === 'sewing-machine-motors';
        },
        compareText() {
            // English text
            return this.isComparing ?  'Cancel Compare' : 'Compare Models';
        },
        compareLink(){
            if(this.comparedProducts.length > 1){
                return route('category-compare-page', {
                                'country': this.country,
                                'category': this.category.slug,
                                'compare': this.comparedProducts.join(',')}).url();
            }
        },
        isMobile() {
            return this.$mq === 'mobile';
        },
    },
    methods: {
        getProductUrl(product){
            if(product.is_shopify_product) {
                return product.shopify_link;
            }
            else {
                return route('machine-page', {slug: product.slug, country: this.country}).url();
            }
        },
       getMainImage(product){
           return product.media.find(m => m.name == 'thumbnail').path;
       },
       getContent(content, contentType){
           let filteredContent = content.filter(c => {
               c['text'] = c['name'] === 'description' ? this.shortenDescription(c['text']) : c['text'];
               return c['country_code'] === this.country.toUpperCase() && c['name'] === contentType;
           });
        //    if(this.isMobile){
        //        return filteredContent.length ? this.shortenDescription(filteredContent[0].text) : '';
        //    }
           return filteredContent.length ? filteredContent[0].text : '';
       },
        shortenDescription(text) {
            let maxLen = this.isMobile ? 30 : 120;
            if (text && text.length > maxLen) {
                let strArr = text.split("");
                strArr.splice(maxLen - 1, strArr.length - (maxLen - 1) - 1);

                strArr[strArr.length - 1] = ".";
                strArr[strArr.length - 2] = ".";
                strArr[strArr.length - 3] = ".";

                return strArr.join("");
            } else return text ? text : '';
        }
    },
    mounted(){
    },
    watch: {
        isComparing(val){
            if(!val){
                this.comparedProducts = [];
            }
        }
    }
}
</script>

<style>

</style>