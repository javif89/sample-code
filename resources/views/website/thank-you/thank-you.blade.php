@extends('website.layouts.main')
@section('content')
<div class="container-fluid" id="thank-you-container">
    <div class="hero_wrapper">
        <div class="hero_header">{{__('Thank you for your interest!')}}</div>
        <div class="hero_subheader">
            {{__('A Ricoma specialist will be in contact with you to answer any questions you may have.')}}
        </div>
    </div>
    <div class="thank-you-body container">
        <div class="body-text">{{__('Meanwhile, check out our videos below featuring our newest single-head commercial machine, the SWD and our brand-new
        multi-head, the CHT2.')}}</div>
        <div class="videos-container">
            <div class="video-container">
                <div class="video-title">
                    {{__('New Ricoma single-head: SWD')}}
                </div>
                <div><iframe class='sproutvideo-player'
                    src='https://videos.sproutvideo.com/embed/e89ddfb61b17e8ce60/f59f7dc88f6b5826'
                    style='width:522px;height:309px;border-radius:9px;' frameborder='0'
                    allowfullscreen></iframe>
                </div>
            </div>
            <div class="video-container">
                <div class="video-title">
                    {{__('New Ricoma multi-head: CHT2')}}
                </div>
                <div><iframe class='sproutvideo-player'
                    src='//videos.sproutvideo.com/embed/709adcb71b1ce4c2f8/9ea1701221b4743c'
                    style='width:522px;height:309px;border-radius:9px' frameborder='0'
                    allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="return-container">
        <a class="return-text" href="{{getRoute('website-home')}}">
            <i class="far fa-long-arrow-alt-left"></i>{{__('Back to Ricoma.com')}}
        </a>
    </div>

</div>
@endsection