<div class="card">
    <div class="card-header">
        Panel
    </div>
    <div class="card-body">
        <h1>Choose panel type</h1>
        <content-dropdown :content="getContent('panel_type')" :options="{{json_encode(App\Product::panelTypes())}}"></content-dropdown>
    </div>
</div>