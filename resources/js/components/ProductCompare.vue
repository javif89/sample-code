<template>
    <div id="compare-container" class="container">
        <div class="scroll-container">
            <div class="header">
                <h1 class="m-auto text-center">Compare <br>{{category.name}}</h1>
            </div>
            <div class="form-group view-category-link"><a :href="getCategoryUrl()">View All {{category.name}}</a></div>
            <div class="products-compare-container col-xs-12">
                <div class="products-container" :class="{'justify-content-around': products.length < 3}">
                    <div class="product col-lg-3" v-for="(product, i) in products" :key="product.id">
                        <div class="product-img-container">
                            <div class="form-group">
                                <a :href="getProductUrl(product.product.slug)">
                                    <img :src="product.media.length ? product.media[0].path : '' " alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row container" id="product-header-container">
                    <div class="form-group product-header-container container" :class="{'justify-content-around': products.length < 3}">
                        <div class="col-lg-3 text-center" :key="product.id" v-for="(product, i) in products">
                            <div class="product-header">{{product.product.name}}</div>
                            <div class="product-link">
                                <a :href="product.product.link">Learn More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            <embroidery-features :embroidery="products[0]['isEmbroidery']" :category="category" :products="products"/>

            </div>
        </div>
  </div>
</template>

<script>
import EmbroideryMachinesFeatures from "../components/EmbroideryMachineFeatures";
export default {
    name: 'ProductCompare',
    props: ['products', 'country', 'category'],
    data(){
        return {
            offSet: '',
        }
    },
    methods: {
        getProductUrl(product){
            return route('machine-page', { 'slug': product, 'country': this.country}).url();
        },
        getCategoryUrl(){
            return route('category-overview-page', {'country': this.country,'category': this.category.slug}).url();
        },
        setOffset(){
            let header = document.querySelector('.product-header-container');
            this.offSet = header.offsetTop - 50;
        },
        handleScroll (event) {
            var header = document.querySelector(".product-header-container");               
                if (window.pageYOffset > this.offSet - $(header).height()) {
                    console.log('true')
                    $(header).appendTo("#sticky-bar");
                    $(header).addClass("m-auto");
                } else {
                    console.log('false')
                    $(header).appendTo("#product-header-container");
                    $(header).removeClass("m-auto");
                }
        }
    },
    mounted(){
        this.setOffset();
        //fixme - replace product category
        this.productCategory = this.products[0].product.product_category_id;
    },
    created(){
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll);
    },
}
</script>

<style>

</style>