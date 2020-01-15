@if (!empty($localedata['promotion']))
    <div id="promo_banner" class="promo_banner_wrapper">
        {{-- <div></div> --}}
        <!--todo: need to add logic and then variables here for country specific promos-->
        <a href="{{$localedata['promotion']->link}}" target="_blank" class="promo_banner_container">
            <span class="promo_title">{{$localedata['promotion']->title}}</span>
            <span class="promo_text d-none d-md-inline mr-lg-3">{{ $localedata['promotion']->body }}</span>
            <span class="promo_text d-md-none d-inline">{{ $localedata['promotion']->body }}</span>
            <span class="btn promo_banner_btn d-none d-lg-inline">Learn More</span>
        </a>

        {{-- <button class="btn close-promo close-btn" onclick="$('.promo_banner_wrapper').hide();"><i class="fa fa-times"></i></button> --}}
    </div>
@endif