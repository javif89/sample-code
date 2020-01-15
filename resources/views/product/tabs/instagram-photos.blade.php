<div class="card">
    <div class="card-header">
        Instagram Photos
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4" v-for="(photo, index) in instagramPhotos" :key="photo.id">
                <div class="text-right">
                    <button class="btn btn-sm btn-danger" @click="deleteMedia(photo)"><i class="fa fa-trash"></i></button>
                </div>
                <media-edit :media="photo"></media-edit>
            </div>
        </div>
        <div class="py-3">
            <button class="btn btn-success" @click="createMedia({'name': 'instagram_photo'})"><i class="fa fa-plus"></i></button>
        </div>
    </div>
</div>