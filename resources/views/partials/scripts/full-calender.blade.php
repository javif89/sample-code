@push('js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    {{-- Full Calendar --}}
    <div id="calendar" class="bg-white my-3 text-center"></div>

    {{-- Event Modal --}}
    <div id="calendarModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border border-bottom-1">
                    <h4 id="modalTitle" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span
                            class="sr-only">close</span></button>
                </div>
                <div id="modalBody" class="modal-body border border-bottom-1">
                    {{-- <div class="location form-group">
                        <span style="color: #959595;"><u>Location:</u></span>&nbsp;<i class="fas fa-map-marker">&nbsp;</i> 3450 NW 114th Ave, Doral, FL 33178
                    </div> --}}
                    <div id="start-time" class="form-group">
                    </div>
                    <div id="end-time" class="form-group">
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="edit-event"></div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function () {

            const baseUrl = '{{ env('APP_URL')}}';
            const events = {!! json_encode($events) !!};
            let eventObj = events.map(event => {
                let obj = {
                    id: event.id,
                    title: event.name,
                    start: event.start_datetime,
                    end: event.end_datetime,
                    backgroundColor: '#FC9500',
                    textColor: 'white',
                    className: [
                        "d-flex",
                        "py-1", 
                        "btn",
                        "mx-auto",
                        // "text-sm",
                        // "font-weight-bold"
                    ]
                };
                return obj;
            });

            $('#calendar').appendTo($('#events-container'));
            
            $('#calendar').fullCalendar({
                weekends: true,
                events: eventObj,
                fixedWeekCount: false,
                header: {
                    left: '',
                    center: 'title',
                    right: 'today prevYear,prev,next,nextYear'
                }
                ,
                eventRender: function(event, element) {
                    element.html(`
                        <div class="text-left mx-auto">
                            <div class="row">
                                <div class="col text-underline">${event.title} ${event.start.format('LT')} - ${event.end.format('LT')}</div>
                            </div>
                        </div>
                    `);
                },
                eventClick: function(event, jsEvent, view) {
                    $('#modalTitle').html(event.title);
                    $('#start-time').html(`<span style="color: #959595;"><u>Starts:</u></span>&nbsp;<i class="far fa-calendar-alt">&nbsp;</i> ${event.start.format('LL')}
                    at <i class="fas fa-clock">&nbsp;</i><span id="startTime">${event.start.format('LT')}</span></div>`);

                    $('#end-time').html(`<span style="color: #959595;"><u>Ends:</u></span>&nbsp;<i class="far fa-calendar-alt">&nbsp;</i> ${event.end.format('LL')}
                    at <i class="fas fa-clock">&nbsp;</i><span id="startTime">${event.end.format('LT')}</span></div>`);
                    
                    $('#edit-event').html(`<a href="${baseUrl}/events/${event.id}/edit" class="text-white"><button type="button" class="btn btn-primary" id="edit-event">Edit</button></a>`);
                    $('#eventUrl').attr('href',event.url);
                    $('#calendarModal').modal();
                },
            });

        })
    </script>
@endpush