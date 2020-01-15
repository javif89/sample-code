<!-- Modal -->
<div class="modal fade" id="platform-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalCenterTitle">What's new?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-0 p-4">
                @foreach ($announcements as $ann)
                    <h4>{{$ann->type_name }}:</h4>
                    <div>
                        {!! $ann->body !!}
                    </div>
                @endforeach
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn blue_btn_white_font" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#platform-update').modal('show');
    });
</script>