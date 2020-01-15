<div id="category-menu-container">
    <div class="container">
        <a href="{{getRoute('category-overview-page', ['category' => 'embroidery'])}}" class="category-item">
            <div class="category-icon">
                <img src="{{asset('/images/embroidery-icon.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="category-name">
                Embroidery Machines
            </div>
            <div class="line {{$category->slug == 'embroidery' ? 'active' : ''}}"></div>
        </a>
        <div class="border"></div>
        <a href="{{getRoute('category-overview-page', ['category' => 'accessories'])}}" class="category-item">
            <div class="category-icon">
                <img src="{{asset('/images/accessories-icon.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="category-name">
                Accessories
            </div>
            <div class="line {{$category->slug == 'accessories' ? 'active' : ''}}"></div>
        </a>
        <div class="border"></div>
        <a href="{{getRoute('category-overview-page', ['category' => 'heatpress'])}}" class="category-item">
            <div class="category-icon">
                <img src="{{asset('/images/heatpress-icon.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="category-name">
                Heat Press
            </div>
            <div class="line {{$category->slug == 'heatpress' ? 'active' : ''}}"></div>
        </a>
        <div class="border"></div>
        <a href="{{getRoute('category-overview-page', ['category' => 'cutters'])}}" class="category-item">
            <div class="category-icon">
                <img src="{{asset('/images/cutters-icon.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="category-name">
                Fabric Cutters
            </div>
            <div class="line {{$category->slug == 'cutters' ? 'active' : ''}}"></div>
        </a>
        <div class="border"></div>
        <a href="{{getRoute('category-overview-page', ['category' => 'domestic-sewing-machines'])}}"
            class="category-item">
            <div class="category-icon">
                <img src="{{asset('/images/sewing-icon.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="category-name">
                Domestic Sewing Machines
            </div>
            <div class="line {{$category->slug == 'domestic-sewing-machines' ? 'active' : ''}}"></div>
        </a>
        <div class="border"></div>
        <a href="{{getRoute('category-overview-page', ['category' => 'industrial-sewing-machines'])}}"
            class="category-item">
            <div class="category-icon">
                <img src="{{asset('/images/industrial-sewing-icon.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="category-name">
                Industrial Sewing Machines
            </div>
            <div class="line {{$category->slug == 'industrial-sewing-machines' ? 'active' : ''}}"></div>
        </a>
        <div class="border"></div>
        <a href="{{getRoute('category-overview-page', ['category' => 'sewing-machine-motors'])}}" class="category-item">
            <div class="category-icon">
                <img src="{{asset('/images/sewing-motors.svg')}}" alt="" class="img-fluid">
            </div>
            <div class="category-name">
                Sewing Machine Motors
            </div>
            <div class="line {{$category->slug == 'sewing-machine-motors' ? 'active' : ''}}"></div>
        </a>
    </div>
</div>