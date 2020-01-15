<template>
<div class="lang-select-container">
    <i class="fal fa-globe text-muted"></i>
    <select v-model="activelang" @change="changeLang" name="lang_code" class="lang-select" required>
        <option :key="lang.id" v-for="lang in languages" :value="lang.code" :selected="lang.code.toUpperCase() == activelang">{{ lang.name }} - ({{(lang.code.toUpperCase())}})</option>
    </select>
</div>
</template>

<script>
export default {
    name: 'language-select',
    props: ['languages', 'activelang'],
    methods: {
        changeLang(e){
            let lang = e.target.value;
            let url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?lang='+lang;
            window.location = url;
        }
    },
}
</script>

<style>

</style>