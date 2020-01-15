<div class="card mb-0">
    <div class="card-header collapsed" data-toggle="collapse" data-target="#faq{{$id}}">
        <div class="plus-button"><i class="fa fa-plus orange caret"></i></div> <span>{{$title}}</span>
    </div>

    <div id="faq{{$id}}" class="collapse">
        <div class="card-body">
            {{$slot}}
        </div>
    </div>
</div>