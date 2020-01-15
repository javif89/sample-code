<li class="nav-item">
    <a class="nav-link @if($active) active @endif" id="home-tab" data-toggle="tab"
       href="#products{{ $cat->id }}tab" role="tab">
        {{ blank($parent) ? "" : "($parent)" }} {{ $cat->name }} <span class="badge badge-primary badge-pill">{{ isset($cat->distributorFiles) ? count($cat->distributorFiles) : 0 }}</span>
    </a>
</li>
@if(!blank($cat->subcategories))
    @foreach($cat->subcategories as $category)
        @include('view.partials.dist-files-cat-tab', ['cat' => $category, 'parent' => blank($parent) ? $cat->name : "$parent / $cat->name", 'active' => false])
    @endforeach
@endif