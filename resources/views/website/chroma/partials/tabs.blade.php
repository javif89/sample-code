<div class="tabs">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#features" role="tab" aria-controls="home"
                aria-selected="true">Features</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#formats" role="tab" aria-controls="profile"
                aria-selected="false">Supported Machine Formats</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#requirements" role="tab" aria-controls="contact"
                aria-selected="false">System Requirements</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active py-5" id="features" role="tabpanel" aria-labelledby="contact-tab">
            @include('website.chroma.tabs.features')
        </div>
        <div class="tab-pane fade py-5" id="formats" role="tabpanel" aria-labelledby="contact-tab">
            @include('website.chroma.tabs.formats')
        </div>
        <div class="tab-pane fade py-5" id="requirements" role="tabpanel" aria-labelledby="contact-tab">
            @include('website.chroma.tabs.requirements')
        </div>
    </div>
</div>