<div class="card">
    <div class="card-header">
        Content Section
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Main Description</label>
                    <content-edit type="rich" :content="getContent('tradeshow_main_description')"></content-edit>
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <content-edit type="text" :content="getContent('tradeshow_location')"></content-edit>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <content-edit @change="getLocation" type="google-place" :content="getContent('tradeshow_address')"></content-edit>
                </div>
                @if ($event->type->name == "Trade Show")
                    <div class="form-group">
                        <label for="">Booth Number</label>
                        <content-edit type="text" :content="getContent('tradeshow_booth')"></content-edit>
                    </div>
                @endif
                <div class="form-group">
                    <label for="">@if($event->type->name == "Trade Show")Tradeshow @endif Website URL</label>
                    <content-edit type="text" :content="getContent('tradeshow_url')"></content-edit>
                </div>
                @if ($event->type->name == "Trade Show")
                    <div class="form-group">
                        <label for="">Promo Code</label>
                        <content-edit type="text" :content="getContent('tradeshow_promo')"></content-edit>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>