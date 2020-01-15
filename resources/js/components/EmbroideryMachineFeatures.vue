<template>
    <div class="spec-container">
        <div class="form-group section-container" v-if="embroidery">
            <div class="section-header">Quick Look</div>
            <hr>
            <!-- Test Text for now -->
            <div class="compare-section" :class="{'justify-content-around': products.length < 3}">
                <div v-for="(product, prodIndex) in products" :key="product.id" class="form-group compare-group col-lg-3">
                    <ul v-if="product.attributes" class="list-group list-group-flush">
                        <li v-if="getSpec(prodIndex, 'spec_heads')" class="section-item form-group">
                            <div class="quick-spec">
                                <span class="item-value">{{getSpec(prodIndex, 'spec_heads').text}}</span>
                                <span class="item-label">Head</span>
                            </div>
                        </li>
                        <li v-if="getSpec(prodIndex, 'spec_needles')" class="section-item form-group">
                            <div class="quick-spec">
                                <span class="item-value">{{getSpec(prodIndex, 'spec_needles').text}}</span>
                                <span class="item-label">Needles</span>
                            </div>
                        </li>
                        <li v-if="getSpec(prodIndex, 'spec_stitchesperminute')" class="section-item form-group">
                            <div class="quick-spec">
                                <span class="item-value">{{getSpec(prodIndex, 'spec_stitchesperminute').text}}</span>
                                <span class="item-label">Maximum speed in <br> stitches per minute</span>
                            </div>
                        </li>
                        <li v-if="getSpec(prodIndex, 'spec_memorycapacity')" class="section-item form-group">
                            <div class="quick-spec">
                                <img src="/icons/stitch_icon.svg" alt="">
                                <span class="item-label">{{getSpec(prodIndex, 'spec_memorycapacity').text}}<br> Memory Capacity</span>
                            </div>
                        </li>
                        <li v-if="getMedia(prodIndex, 'spec_panel')" class="section-item form-group">
                            <img :src="getMedia(prodIndex, 'spec_panel').path" alt="">
                            <span class="item-label">{{getMedia(prodIndex, 'spec_panel').caption}}</span>
                        </li>
                        <li v-if="getSpec(prodIndex, 'spec_embroideryarea')" class="section-item form-group">
                            <div class="quick-spec">
                                <img src="/icons/Embroidery Area Icon.svg" alt="">
                                <span class="item-label">{{getSpec(prodIndex, 'spec_embroideryarea').text}}</span>
                            </div>
                        </li>
                        <li v-if="getSpec(prodIndex, 'spec_hoops')" class="section-item form-group">
                            <div class="quick-spec">
                                <span class="item-value">{{getSpec(prodIndex, 'spec_hoops').text}}</span>
                                <span class="item-label">Hoops</span>
                            </div>
                        </li>
                        <li v-if="getSpec(prodIndex, 'spec_includes')" class="section-item form-group">
                            <div class="quick-spec">
                                <img src="/icons/Cap Ring Icon.svg" alt="">
                                <span class="item-label">{{getSpec(prodIndex, 'spec_includes').text}}</span>
                            </div>
                        </li>
                        <li v-if="getSpec(prodIndex, 'spec_usability')" class="section-item form-group">
                            <div class="quick-spec">
                                <img src="/icons/Shirt.svg" alt="">
                                <span class="item-label">{{getSpec(prodIndex, 'spec_usability').text}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section-container" v-if="embroidery">
            <div class="section-header">Panel</div>
            <hr>
            <div class="compare-section" :class="{'justify-content-around': products.length < 3}">
                <div v-for="(product, prodIndex) in products" :key="product.id" class="form-group compare-group col-lg-3">
                    <!-- Test Text for now -->
                    <ul class="list-group list-group-flush">
                        <li v-if="getSpec(prodIndex, 'specpanel_specs')" class="panel-item">
                            <span v-html="getSpec(prodIndex, 'specpanel_specs').text"  class="item-label"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="section-container" >
            <div class="section-header">Size & Weight</div>
            <hr>
            <div class="compare-section" :class="{'justify-content-around': products.length < 3}">
                <div v-for="(product, i) in products" :key="product.id" class="form-group compare-group col-lg-3">
                    <!-- Test Text for now -->
                    <ul class="list-group list-group-flush">
                        <li :key="content.id" v-for="(content, i) in specs(product.attributes, 'sizeweight')" class="panel-item">
                            <span class="item-label">{{content.text}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section-container">
            <div class="section-header">Additional Features</div>
            <hr>
            <div class="compare-section" :class="{'justify-content-around': products.length < 3}">
                <div v-for="(product, prodIndex) in products" :key="product.id" class="form-group compare-group info col-lg-3">
                    <ul class="list-group list-group-flush">
                        <li v-if="getSpec(prodIndex, 'additional_features')" class="panel-item">
                            <span v-html="getSpec(prodIndex, 'additional_features').text" class="item-label"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'EmbroideryMachinesFeatures',
    props: ['products', 'category', 'embroidery'],
    methods: {
        getSpec(prodIndex, contentName){
            let spec = this.products[prodIndex].attributes.find(s => {
                return s.name === contentName;
            })
            return spec;
        },
        specs(content, contentyType){
            let specs = content.filter(c => c.name.includes(contentyType));
            if(contentyType !== 'spec_'){
                specs.sort((a, b) => (a.name > b.name) ? 1 : -1)
            } 
            else {
                this.quickLookSort(specs);
            }
            return specs;
        },
        getMedia(index, name){
            let media = this.products[index].media.find(m => {
                return m.name === name;
            });
            return media;
        },
        quickLookSort(specs){
            var specOrder = ["spec_heads", "spec_needles", "spec_stitchesperminute", "spec_memorycapacity", "spec_panel", "spec_embroideryarea", "spec_hoops", "spec_includes", "spec_usability"];
            specs = specs.sort(function(a, b) { 
                return specOrder.indexOf(a.name) - specOrder.indexOf(b.name);
            });
        }
    },
    mounted(){
        // console.log(this.products)

    }
}
</script>

<style>

</style>