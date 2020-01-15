<div class="row section_3">
    <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2 text-center">
        <h3 class="subtitle">Creativity at your fingertips</h3>
        <span class="section_text">
            If you can hoop it, you can embroider it. Check out just some of the many <br class="d-none d-lg-inline">
            projects created with the {{ $product->name }} embroidery
            machine.
        </span>
    </div>
</div>

<div class="row section_4">
    <div class="photo_gallery">
        @foreach ($product->getProjectPics() as $pic)
            <figure>
                <img src="{{$pic->path}}" alt="" class="img-fluid dragon_leather">
                <figcaption>{{$pic->caption}}</figcaption>
            </figure>
        @endforeach
    </div>
</div>