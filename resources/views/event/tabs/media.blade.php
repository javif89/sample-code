<div class="card">
    <div class="card-header">
        Media
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-8 offset-2">
                <label for="">Hero Image</label>
                <media-edit :media="getMedia('tradeshow_hero_image')"></media-edit>
            </div>
            <div class="col-8 offset-2">
                <label for="">Thumbnail Image</label>
                <media-edit :media="getMedia('tradeshow_thumbnail_image')"></media-edit>
            </div>
        </div>
    </div>
</div>