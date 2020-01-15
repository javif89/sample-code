{{-- <div class="my-3"> --}}
    @if ($event->type->name == 'Trade Show')
        <a href="{{getRoute('tradeshow-page', ['slug' => $event->slug])}}" target="_blank">View Event page <i
                class="fa fa-external-link-alt my-4"></i>
        </a>
    @endif

    @if ($event->type->name == 'General')
    <a href="{{getRoute('event-page', ['slug' => $event->slug])}}" target="_blank">View Event page <i
            class="fa fa-external-link-alt"></i>
    </a>
    @endif
    
{{-- </div> --}}
<ul class="list-group nav nav-tabs" id="product-edit-menu">
    <li class="list-group-item">
        <a data-toggle="tab" data-target="#hero" class="nav-link active">Content Section <i
                class="fa fa-chevron-right"></i></a>
    </li>

    <li class="list-group-item">
        <a data-toggle="tab" data-target="#social-proof" class="nav-link">Media <i
                class="fa fa-chevron-right"></i></a>
    </li>

</ul>
