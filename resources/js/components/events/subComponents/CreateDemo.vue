<template>
    <div id="create-event-container" class="col-xs-12">
        <div class="card shadow mb-3">
            <div class="card-header border-primary">
                <h3 class="mb-0">Create {{ eventdata.name }}</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="submitForm" id="new-demo">
                    <!-- Date Range -->
                    <div class="row">
                        <div class="col">
                            <label for="">Select Date Range</label>
                            <div id='datepicker' class="input-group">
                                <input required disabled="true" id="start_date" type='text' class="form-control">
                                <input name="start_datetime" type="hidden">
                                <div class="input-group-append">
                                    <span class="input-group-text"><span class="mx-1">
                                        <i class="fa fa-calendar fa-lg calendar-logo" aria-hidden="true"></i>
                                    </span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col" id="select-dates-input">
                            <label for="select-dates-input">Select Days</label>
                            <div class="form-group" id="select-dates">
                                <div v-for="(day, index) in days" :key="day" class="form-check form-check-inline">
                                    <input class="form-check-input" name="day" type="checkbox" :id="'day-'+ index" :value="day">
                                    <label class="form-check-label" :for="'day-'+index">{{day}}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product List -->
                    <div class="row">
                        <div class="col">
                            <label for="product-list">Product</label>
                            <select v-model="product" class="form-control" name="product_id" id="product-list">
                                <option :key="product.id" v-for="product in products" :id="'product-id-' + product.id"
                                    :data-product="product.name"
                                    :value="product.id">{{ product.name }}
                                </option>
                            </select>
                        </div>

                        <!-- Time Slots -->
                        <div class="col" id="select-times-input">
                            <label for="select-times-input">Time Slot</label>
                            <div class="form-group" id="time-range">
                                <div v-for="(time, index) in times" :key="time.toString()" class="form-check form-check-inline">
                                    <input class="form-check-input" name="time" type="checkbox" :id="'time-'+index" :value="time.format('HH:mm:ss')">
                                    <label class="form-check-label" :for="'time-'+index">{{time.format('h:mm a')}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
                    <input name="end_datetime" type="hidden">
                    <div class="form-group">
                        <label for="">Language</label>
                        <select name="language_id" id="">
                            <option :key="language.id" v-for="language in allowedLang" :id="'lang-id-'+language.id" :data-language="language.name" :value="language.id">
                            {{language.name}}</option>
                        </select>
                    </div>
    
                    <input type="hidden" name="event_type_id" v-model="eventdata.id">
                    <button  class="btn btn-primary btn-block" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
export default {
    name: 'CreateDemo',
    props: ['eventdata', 'products', 'languages'],
    data(){
        return {
            days: [],
            times: [],
            product: '',
            allowedLang: [],
        }
    },
    methods: {
        initializeTimeSlots(){
            for (let i = 0; i < 8; i++) {
                this.times.push(moment().startOf('day').add(9 + i , 'hour'));
            }
        },
        submitForm(){
            let dataObj = this.getDataObj($('#new-demo'));
            if(dataObj.start_datetime && dataObj.end_datetime){ 
                let dateArray = this.getDates(new Date(dataObj.start_datetime), new Date(dataObj.end_datetime));
                let selectedDays = this.getSelectedDays();
                dataObj.selected_times = this.getSelectedTimes();
                dataObj.filtered_dates = this.dateFilter(selectedDays, dateArray);

                this.ajaxReq('POST', dataObj);
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Please fill out starting and ending date times'
                })
            }
        },
        getDataObj(thisObj){
            let formData = thisObj.serializeArray();
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
        getDates(startDate, stopDate) {
            var dateArray = new Array();
            var currentDate = startDate;
            while (currentDate <= stopDate) {
                dateArray.push(moment(currentDate));
                currentDate=currentDate.addDays(1); 
            } 
            return dateArray; 
        },
        getSelectedDays() {
            let selectedDays = [];
            $.each($("input[name='day']:checked"), function(){            
                selectedDays.push($(this).val());
            });
            return selectedDays;
        },
        getSelectedTimes() {
            let selectedTImes = [];
            $.each($("input[name='time']:checked"), function(){            
                selectedTImes.push($(this).val());
            });
            return selectedTImes;
        },
        dateFilter(days, dateArray) {
            let filteredDates = [];
            for (let i = 0; i < dateArray.length; i ++ ) {
                for (let index = 0; index < days.length; index++) {
                    if(dateArray[i].format("LLLL").search(days[index]) !== -1){
                        filteredDates.push(dateArray[i].format("YYYY-MM-DD"));
                    }							
                }
            }
            return filteredDates;
        },
        ajaxReq(method, dataObj, eventId = '') {
            $.ajax({
                async: true,
                type: method,
                url: `/admin/event-products/${eventId}`,
                data: JSON.stringify(dataObj),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(response){
                    // console.log('response is: ', response)
                    window.location = `/admin/demos`
                },
                error: function(xhr, status, code) {
                    console.log(code);
                    Swal.fire({
                        text: status
                    })
                }
            })
        }
    },
    mounted() {
        // initialize time slots
        this.initializeTimeSlots();
        this.days = days;
        this.allowedLang = this.languages.filter(lang => lang.code === 'en' || lang.code === 'es');

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#datepicker').daterangepicker({
					opens: 'left',
					startDate: moment().startOf('hour'),
					endDate: moment().startOf('hour').add(32, 'hour'),
					locale: {
						format: 'LLLL'
					}
				}, function(start, end, label) {

					Date.prototype.addDays = function(days) {
						var date = new Date(this.valueOf());
						date.setDate(date.getDate() + days);
						return date;
					}
					
					function getDates(startDate, stopDate) {
						var dateArray = new Array();
						var currentDate = startDate;
						while (currentDate <= stopDate) {
							dateArray.push(moment(currentDate));
							currentDate=currentDate.addDays(1); 
						} 
						return dateArray; 
					}

					let startDate = new Date(start);
					let endDate = new Date(end);
					console.log(`new start is: ${startDate} and end is: ${endDate}`)
					
					let dateArray = getDates(startDate, endDate);
					let filteredDates = [];
					for (let i = 0; i < dateArray.length; i ++ ) {
						for (let index = 0; index < days.length; index++) {
							if(dateArray[i].format("LLLL").search(days[index]) !== -1){
								filteredDates.push(dateArray[i]);
							}							
						}
					}

					$('input[name="start_datetime"]').val(start.format('YYYY-MM-DD HH:mm:ss'));
					$('#start_date').val(`${start.format('MM/DD/YYYY')} - ${end.format('MM/DD/YYYY')}`);
					
					$('input[name="end_datetime"]').val(end.format('YYYY-MM-DD HH:mm:ss'));
					$('#end_date').val(end.format('LLLL'));
					console.log(`A new date selection was made from ${start.format('YYYY-MM-DD')} to ${end.format('YYYY-MM-DD')}`);
				});
        });
    }
}
</script>

<style>

</style>