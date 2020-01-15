<div class="video-thumbnail" onclick="showVideo{{str_replace('-', '', $id ?? '')}}()">
    <img src="{{$thumbnail}}" alt=""
        class="img-fluid">
    @if (empty($playbtn) || $playbtn !== 'none')
        <div class="play-button-container">
            <div class="video-play-button">
                <i class="fa fa-play"></i>
            </div>
        </div>
    @endif
</div>

<div class="modal video-modal" tabindex="-1" role="dialog" id="{{!empty($id) ? 'video-modal-'.$id : 'video-modal'}}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="{{!empty($id) ? 'video-iframe-'.$id : 'video-iframe'}}" src="" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@if (empty($id))
    @push('scripts')
    <script>
        function showVideo() {
            $("#video-modal").modal('show');
            $("#video-iframe").attr('src', '{{$src ?? ''}}');
          }
        
          $('#video-modal').on('hidden.bs.modal', function (e) {
            $("#video-iframe").attr('src', '');
          });
    </script>
    @endpush
@else
    @push('scripts')
    <script>
        function showVideo{{str_replace('-', '', $id)}}() {
            $("#video-modal-{{$id}}").modal('show');
            $("#video-iframe-{{$id}}").attr('src', '{{$src ?? ''}}');
          }
        
          $('#video-modal-{{$id}}').on('hidden.bs.modal', function (e) {
            $("#video-iframe-{{$id}}").attr('src', '');
          });
    </script>
    @endpush
@endif