<template>
    <div id="edit-demo" class="card shadow">
        <div class="card-header border-primary">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">{{event.type.name}}</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form @submit.prevent="submitForm" id="update-demo">
                <div class="form-group">
                    <label for="product-list">{{event.type.name}} Name</label>
                    <select class="form-control" name="product_id" id="product-list">
                        <option :key="product.id" v-for="product in products" :id="'product-id-'+ product.id" :data-product="product.name" :value="product.id" 
                            :selected="event.products[0].product_id === product.id">{{product.name}}
                        </option>
                    </select>
                </div>          
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <div id='date-picker' class="input-group">
                        <input disabled="true" id="start_date" type='text' class="form-control"
                            v-model="startDateTime">
                        <input name="start_datetime" type="hidden">
                        <div class="input-group-append">
                            <span class="input-group-text"><span class="mx-1" >
                                    <i class="fa fa-calendar fa-lg calendar-logo" aria-hidden="true"></i>
                                </span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input name="end_datetime" type="hidden" :value="endDateTime">
                    <input disabled="true" id="end_date" type='text' class="form-control"
                        :value="endDateTime" />
                </div>
                <div class="form-group">
                    <label for="">Language</label>
                    <select name="language_id" id="">
                        <option :key="language.id" v-for="language in allowedLang" :id="'lang-id-'+language.id"
                            :data-language="language.name"
                            :value="language.id" 
                            :selected="event.products[0].language_id === language.id">
                                {{language.name}}
                        </option>
                    </select>
                </div>
                <input type="hidden" name="event_id" :value="event.id">
                <input type="hidden" name="event_product_id" :value="event.products[0].id">
                <input type="hidden" name="event_type_id" :value="event.type.id">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'EditDemo',
    props: ['event', 'products', 'languages'],
    data(){
        return {
            startDateTime: null,
            endDateTime: null,
            allowedLang: [],
        }
    },
    methods: {
        submitForm(){
            console.log('submitting.')
            let dataObj = this.getDataObj($("#update-demo"));
            console.log('dataObj is: ', dataObj)
            this.ajaxReq("PUT", dataObj, dataObj["event_id"])
        },
        getDataObj(thisObj){
            let formData = thisObj.serializeArray();
            console.log(formData);
            let dataObj = this.assignData(formData);

            let productName = thisObj.find(`#product-id-${dataObj.product_id}`).data('product');
            let langName = thisObj.find(`#lang-id-${dataObj.language_id}`).data('language');
            dataObj['product_name'] = productName;
            dataObj['language_name'] = langName;

            return dataObj;
        },
        assignData(formData) {
            let dataObj = {};
            for (let i = 0; i < formData.length; i++) {
                 dataObj[formData[i]['name']]=formData[i]['value'];
            }
            return dataObj;
        },
        ajaxReq(method, dataObj, eventId = '') {
            $.ajax({
                async: true,
                type: method,
                url: `/event-products/${eventId}`,
                data: JSON.stringify(dataObj),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response){
                    // console.log('response is: ', response)
                    window.location = `/events/${eventId}/edit`
                },
                error: function(xhr, status, code) {
                    console.log(code);
                    Swal.fire({
                        text: status
                    })
                }
            })
        },
    },
    mounted() {
        this.startDateTime = moment(this.event.start_datetime).format("LLLL");
        this.endDateTime = moment(this.event.end_datetime).format("LLLL");
        this.allowedLang = this.languages.filter(lang => lang.code === 'en' || lang.code === 'es');

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#date-picker').daterangepicker({
                // singleDatePicker: true,
                opens: 'left',
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'LLLL'
                }
            }, function(start, end, label) {
                $('input[name="start_datetime"]').val(start.format('YYYY-MM-DD HH:mm:ss'));
                $('#start_date').val(start.format('LLLL'));
                
                $('input[name="end_datetime"]').val(end.format('YYYY-MM-DD HH:mm:ss'));
                $('#end_date').val(end.format('LLLL'));
                // console.log("A new date selection was made: " + start.format('LLLL'));
            });
        });
    }
}
</script>
