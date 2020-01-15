<div class="card">
    <div class="card-header">
        Facebook Reviews
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4" v-for="(review, index) in facebookReviews" :key="review.id">
                <div class="text-right">
                    <button class="btn btn-sm btn-danger" @click="deleteFacebookReview(review)"><i
                            class="fa fa-trash"></i></button>
                </div>
                <label for="">Customer picture</label>
                <media-edit :media="review.media"></media-edit>
                <label for="">Review Content</label>
                <content-edit :content="review.content" type="textarea"></content-edit>
            </div>
        </div>
        <div class="py-3">
            <button class="btn btn-success" @click="createFacebookReview()"><i
                    class="fa fa-plus"></i></button>
        </div>
    </div>
</div>