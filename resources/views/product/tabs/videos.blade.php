<div class="card">
    <div class="card-header">
        Videos Section
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <h3>Video 1 Thumbnail</h3>
                <media-edit :media="getMedia('video_1_thumb')"></media-edit>
            </div>
            <div class="col-6">
                <h3>Video 2 Thumbnail</h3>
                <media-edit :media="getMedia('video_2_thumb')"></media-edit>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <h3>Video 1 Link</h3>
                <content-edit :content="getContent('video_1_embed')" type="text"></content-edit>
            </div>
            <div class="col-6">
                <h3>Video 2 Link</h3>
                <content-edit :content="getContent('video_2_embed')" type="text"></content-edit>
            </div>
        </div>
    </div>
</div>