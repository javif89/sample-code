<div class="card m-2">
    <div class="card-header">
        Specifications
    </div>
    <div class="card-body">
        <spec-table :specs="getSpecs('spec_')"></spec-table>
        <div class="spec-table container">
            <div class="form-group">
                <label class="spec-col">
                    Spec Panel
                </label>
                <div class="spec-col">
                    <media-edit :media="getMedia('spec_panel')"></media-edit>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
<div class="card m-2">
    <div class="card-header">
        Panel
    </div>
    <div class="card-body">
        <spec-table :specs="getSpecs('specpanel_')"></spec-table>
    </div>
</div>
<div class="card m-2">
    <div class="card-header">
        Size & Weight
    </div>
    <div class="card-body">
        <spec-table :specs="getSpecs('sizeweight_')"></spec-table>
    </div>
</div>
<div class="card m-2">
    <div class="card-header">
        Additional Specs
    </div>
    <div class="card-body">
        <spec-table :specs="getSpecs('additional_')"></spec-table>
    </div>
</div>