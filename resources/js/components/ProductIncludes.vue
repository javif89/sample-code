<template>
    <div id="product-includes" class="included_tab_panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="images-container">
                        <div @click="activeMedia = m" 
                            :key="m.id" v-for="m in media" 
                            class="img_container"
                            :class="{selected: activeMedia.id === m.id}">
                            <div class="panel_descriptor_btn" :class="{selected: activeMedia.id === m.id}">+</div> 
                            <img :src="m.path" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 verticenter">
                    <div v-html="activeMedia.caption" class="content-container">
                
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'product-includes',
    props: ['media'],
    data(){
        return {
            activeMedia: {}
        }
    },
    mounted(){
        this.activeMedia = this.media[0];
    }
}
</script>

<style>

</style>