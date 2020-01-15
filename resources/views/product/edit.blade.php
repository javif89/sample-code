@extends('layouts.page')

@section('page-content')
    <div id="product-edit-app">
        <div v-if="loading" class="alert alert-success" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; font-size: 24px; border-radius: 0;" role="alert">
            Loading <div class="spinner-border"></div>
        </div>
        <div class="row">
            <div class="col-5 col-lg-3">
                @include('partials.country-context')
                <div class="mb-3">
                    @include('product.partials.product-edit-form')
                </div>
                <div class="mb-3">
                </div>
                @include('product.partials.menu')
            </div>
            <div class="col">
                <div class="tab-content">
                    <div class="tab-pane active" id="hero" role="tabpanel">
                        @include('product.tabs.hero')
                    </div>
                    <div class="tab-pane" id="gallery" role="tabpanel">
                        @include('product.tabs.gallery')
                    </div>
                    <div class="tab-pane" id="videos" role="tabpanel">
                        @include('product.tabs.videos')
                    </div>
                    <div class="tab-pane" id="project-collage" role="tabpanel">
                        @include('product.tabs.project-collage')
                    </div>
                    <div class="tab-pane" id="instagram-photos" role="tabpanel">
                        @include('product.tabs.instagram-photos')
                    </div>
                    <div class="tab-pane" id="panel" role="tabpanel">
                        @include('product.tabs.panel')
                    </div>
                    <div class="tab-pane" id="ipad-pic" role="tabpanel">
                        @include('product.tabs.ipad-pic')
                    </div>
                    <div class="tab-pane" id="hoop-animation" role="tabpanel">
                        @include('product.tabs.hoop-animation')
                    </div>
                    <div class="tab-pane" id="needle-animation" role="tabpanel">
                        @include('product.tabs.needle-animation')
                    </div>
                    <div class="tab-pane" id="fade-animation" role="tabpanel">
                        @include('product.tabs.fade-animation')
                    </div>
                    <div class="tab-pane" id="customer-carousel" role="tabpanel">
                        @include('product.tabs.customer-carousel')
                    </div>
                    <div class="tab-pane" id="social-proof" role="tabpanel">
                        @include('product.tabs.social-proof')
                    </div>
                    <div class="tab-pane" id="thumbnail" role="tabpanel">
                        @include('product.tabs.thumbnail')
                    </div>
                    <div class="tab-pane" id="accessories" role="tabpanel">
                        @include('product.tabs.accessories')
                    </div>
                    <div class="tab-pane" id="product-specs-table" role="tabpanel" aria-labelledby="profile-tab">
                        @include('product.tabs.specs')
                    </div>
                    <div class="tab-pane" id="country-availability" role="tabpanel">
                        <country-availability entityid="{{$product->id}}" entityclass="App\Product">
                        </country-availability>
                    </div>
                    <div class="tab-pane" id="facebook-reviews" role="tabpanel" aria-labelledby="profile-tab">
                        @include('product.tabs.facebook-reviews')
                    </div>
                    <div class="tab-pane" id="whats-included" role="tabpanel" aria-labelledby="profile-tab">
                        @include('product.tabs.whats-included')
                    </div>
                    <div class="tab-pane" id="product-dist-files">
                        @include('product.partials.distributor-files')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include("partials.scripts.confirm-delete")
@include("partials.scripts.img-preview")

@push('js')
    <script>
        new window.Vue({
            name: 'product-edit',
            el: "#product-edit-app",
            data: {
                product: {!! $product->load('accessories')->toJson() !!},
                content: [],
                media: [],
                accessories: {!!json_encode(App\Product::getAccessories())!!},
                loading: false,
                entity: "product",
                facebookReviews: {!!json_encode($product->getFacebookReviews()) !!},
            },
            methods: {
                getSpecs(specType){
                    let specs = this.content.filter(c => c.name.includes(specType));
                    // if(specType !== 'spec_'){
                        specs.sort((a, b) => (a.name > b.name) ? 1 : -1)
                    // }
                    // else {
                        // this.quickLookSort(specs);
                    // }
                    return specs;
                },
                getContent(name) {
                    let content = this.content.find((element) => {
                        return element.name == name;
                    });

                    return content ? content : {text: '', name: name};
                },
                getMedia(name) {
                    let media = this.media.find((element) => {
                        return element.name == name;
                    });
                    
                    return media ? media : {path: '', name: name, type: {name: 'image'}};
                },
                updateMedia(data) {
                    let index = this.media.findIndex(element => {
                        return element.name == data.name;
                    });

                    this.media[index] = data;

                    this.$forceUpdate();
                },
                createMedia(data) {
                    let createRoute = route('create-product-media');

                    // Append the product id to the payload
                    data.product_id = "{{$product->id}}";

                    axios.post(createRoute, data).then(response => {
                        this.media.push(response.data);
                    });
                },
                async createFacebookReview() {
                    let uniqid = Math.random().toString(36).substr(2, 9);
                    let name = `facebook_review_${uniqid}`;
                    // Create the media
                    let createMediaRoute = route('create-product-media');
                    let media = (await axios.post(createMediaRoute, {'name': name, 'caption': 'Customer name', product_id: '{{$product->id}}', country_code: $('#set_country_code').val(), lang_code: $('#set_lang_code').val()})).data;
                    // Create the content
                    let createContentRoute = route('create-product-content');
                    let content = (await axios.post(createContentRoute, {'name': name, 'text': 'Write the review here', product_id: '{{$product->id}}', country_code: $('#set_country_code').val(), lang_code: $('#set_lang_code').val()})).data;

                    this.facebookReviews.push({
                        customer_name: media.caption,
                        customer_image: media.path,
                        body: content.text,
                        media: media,
                        content: content
                    });
                },
                deleteFacebookReview(review) {
                    this.deleteMedia(review.media);
                    this.deleteContent(review.content);

                    this.facebookReviews = this.facebookReviews.filter(item => {
                        return item.name != review.name;
                    });
                },
                deleteMedia(media) {
                    let deleteRoute = route('delete-product-media', {'id': media.id});
                    
                    axios.delete(deleteRoute).then(response => {
                        // update media
                        this.getAllMedia();
                    });
                },
                deleteContent(content) {
                    let deleteRoute = route('delete-product-content', {'id': content.id});
                    
                    axios.delete(deleteRoute).then(response => {
                        // update media
                        this.getAllContent();
                    });
                },
                getAllContent() {
                    this.loading = true;
                    window.axios.get(route('product.get-content', {product: '{{$product->id}}'}))
                    .then(response => {
                        this.content = response.data;
                    }).finally(() => this.loading = false);
                },
                getAllMedia() {
                    this.loading = true;
                    window.axios.get(route('product.get-media', {product: '{{$product->id}}'}))
                    .then(response => {
                        this.media = response.data;
                    }).finally(() => this.loading = false);
                },
                getAccessories() {
                    window.axios.get(route('product.get-accessories', {product: '{{$product->id}}'}))
                    .then(response => {
                        this.product.accessories = response.data;
                    });
                },
                hasAccessory(accessory) {
                    let item = this.product.accessories.find(element => {
                        return element.id == accessory.id;
                    });
                    return !(item == undefined);
                },

                getAccessory(accessory) {
                    return this.product.accessories.find(element => {
                        return element.id == accessory.id;
                    });
                },
                toggleAccessory(accessory, action) {
                    let updateRoute = route(`${action}-accessory`, {'product': this.product.id, 'id': accessory.id});
                    this.loading = true;
                    window.axios.post(updateRoute).then(response => {
                        this.product.accessories = response.data;
                    }).finally(() => {this.loading = false});
                },

                createDistMedia() {
                    let data = new FormData(document.getElementById('dist-file-form'));
                    if (data.get('file').size <= 0) {
                        alert('Please choose file');
                        return;
                    }
                    let createRoute = route("update-product-media", {
                        id: -1
                    });

                    axios
                        .post(createRoute, data, {
                            headers: {
                                "Content-Type": "multipart/form-data"
                            }
                        })
                        .then(response => {
                            window.location.assign(route('edit-product', {id: this.product.id}) + '?rnd='+Math.random()+'#product-dist-files');
                        });
                },

                deleteDistMedia(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You will permanently delete this file`,
                        type: 'warning',
                        confirmButtonText: 'Continue',
                        showCancelButton: true,
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if(result.value && result.value === true) {
                            axios.delete(route('delete-product-media', {'id': id})).then(response => {
                                window.location.assign(route('edit-product', {id: this.product.id}) + '?rnd='+Math.random()+'#product-dist-files');
                            });
                        }
                    })
                }

            },
            computed: {
                instagramPhotos() {
                    let results = this.media.filter(element => {
                        return element.name == 'instagram_photo';
                    });
                    
                    return results;
                },
                customerCarouselPhotos() {
                    let results = this.media.filter(element => {
                        return element.name == 'customer_carousel';
                    });
                    
                    return results;
                },
                galleryPhotos() {
                    let results = this.media.filter(element => {
                        return element.name == 'gallery';
                    });
                    
                    return results;
                },
                whatsIncluded(){
                    let results = this.media.filter(element => {
                    return element.name == 'included';
                    });
                    
                    return results;
                }
            },
            mounted() {
                this.getAllContent();
                this.getAllMedia();
                this.getAccessories();

                if(window.location.hash) {
                  $('a[data-target="'+window.location.hash+'"]').click();
                }
            }
        })
    </script>
@endpush
