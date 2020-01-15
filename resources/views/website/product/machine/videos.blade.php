<div class="row section_2">
    <div class="col-md-6 p-0">
        <div class="square-16by9 background" style="background-image: url('{{$product->getMedia('video_1_thumb')->path}}')">
            <div class="play-button" onclick="showProductVideo1()">
                <img src="{{asset('icons/Play Button Copy 2-Play Button.svg')}}" alt="" class="play_icon">
                <span>{{$product->getMedia('video_1_thumb')->caption}}</span>
            </div>
        </div>
    </div>
    <div class="col-md-6 p-0">
        <div class="square-16by9 background" style="background-image: url('{{$product->getMedia('video_2_thumb')->path}}')">
            <div class="play-button" onclick="showProductVideo2()">
                <img src="{{asset('icons/Play Button Copy 2-Play Button.svg')}}" alt="" class="play_icon">
                <span>{{$product->getMedia('video_2_thumb')->caption}}</span>
            </div>
        </div>
    </div>
</div>

<div class="modal video-modal" tabindex="-1" role="dialog" id="video1-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="video1-iframe" src="" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div class="modal video-modal" tabindex="-1" role="dialog" id="video2-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="video2-iframe" src="" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function showProductVideo1() {
            $("#video1-modal").modal('show');
            $("#video1-iframe").attr('src', '{{$product->getContent("video_1_embed")}}');
        }
    
        $('#video1-modal').on('hidden.bs.modal', function (e) {
            $("#video1-iframe").attr('src', '');
        });

        function showProductVideo2() {
            $("#video2-modal").modal('show');
            $("#video2-iframe").attr('src', '{{$product->getContent("video_2_embed")}}');
        }
        
        $('#video2-modal').on('hidden.bs.modal', function (e) {
            $("#video2-iframe").attr('src', '');
        });
    </script>
@endpush