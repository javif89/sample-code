<div class="card">
    <div class="card-header">
        Hero Section
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <media-edit :media="getMedia('hero_image')"></media-edit>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Short Description</label>
                    <content-edit type="text" :content="getContent('short_description')"></content-edit>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <content-edit type="rich" :content="getContent('description')"></content-edit>
                </div>
            </div>
        </div>
    </div>
</div>