@push('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
	    $(document).ready( function () {
	        $('.simple_date_picker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
            });
			const eventType = {!! json_encode($pageTitle); !!};
			const singleDate = eventType === 'PRESS' ? true : false
			if(eventType !== "VIRTUAL DEMOS") {
				$('#datepicker').daterangepicker({
					singleDatePicker: singleDate,
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
					console.log(start.format('LLLL'))
					$('input[name="end_datetime"]').val(end.format('YYYY-MM-DD HH:mm:ss'));
					$('#end_date').val(end.format('LLLL'));
					console.log("A new date selection was made: " + start.format('LLLL'));
				});
			} 

	    })
    </script>
@endpush