<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Website Country</h5>
        </div>
        <div class="modal-body">
            <div class="country-select">
                <div class="select-text">
                    Select your preferred country website:
                </div>
                <div class="form-group">
                    <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="active-country">
                            <div class="flag">{{activeCountry.flag}}</div>
                            <div class="country-name">{{activeCountry.name}}</div>
                        </div>
                        <ul class="dropdown-menu">
                            <li @click="selectedcountry = country.code" class="country-item" :key="country.id" v-for="(country, i) in countries">
                                <div class="flag">{{country.flag}}</div>
                                <div class="country-name">{{country.name}}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="changing-country-group">
                <div class="change-site-text">Changing country website</div>
                <div class="change-disclaimer">
                    Changing the country you shop from may affect factors including price and product availablility.
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel-btn" data-dismiss="modal">CANCEL</button>
            <button @click.prevent="changeCountry" type="button" class="btn enter-btn">ENTER SITE</button>
        </div>
    </div>

</template>

<script>
export default {
    name: 'country-select',
    props: ['countries', 'selectedcountry',],
    computed: {
        activeCountry(){
            if(this.selectedcountry){
                return this.countries.find(country => {
                    return country.code === this.selectedcountry.toUpperCase();
                })
            } else {
                return {};
            }
        }
    },
    methods: {
        changeCountry(){
            let url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?c='+this.activeCountry.code.toLowerCase();
            window.location = url;
        }
    },
}
</script>

<style>

</style>