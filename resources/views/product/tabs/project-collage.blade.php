<div class="card">
    <div class="card-header">
        Project Collage
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <media-edit :media="getMedia('project_1')"></media-edit>
                <div class="row">
                    <div class="col-6">
                        <media-edit :media="getMedia('project_4')"></media-edit>
                    </div>
                    <div class="col-6">
                        <media-edit :media="getMedia('project_5')"></media-edit>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <media-edit :media="getMedia('project_6')"></media-edit>
                    </div>
                    <div class="col-6">
                        <media-edit :media="getMedia('project_7')"></media-edit>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <media-edit :media="getMedia('project_2')"></media-edit>
                <media-edit :media="getMedia('project_3')"></media-edit>
                <media-edit :media="getMedia('project_8')"></media-edit>
            </div>
        </div>
    </div>
</div>