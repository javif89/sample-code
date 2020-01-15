<div class="container">    
    <div class="locale-option-select">
        <div class="row d-flex justify-content-end">
            <div class="d-md-flex justify-content-end">
                <div class="lang-select-container">
                    <select @change="changeLang" name="lang_code" class="selectpicker">
                        @foreach ($localedata['active_country']->languages as $lang)
                        <option value="{{ $lang->code }}" @if(strtoupper($lang->code) == strtoupper(session('locale')))
                            selected @endif
                            data-content="<i class='fal fa-globe text-muted'></i> {{ $lang->name }} -
                            ({{strtoupper($lang->code)}})">
                            {{ $lang->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-md-flex justify-content-end">
                <div class="btn country-select-btn" data-toggle="modal" data-target="#countrySelectModal">
                    <div class="active-country">
                        <div class="flag">{{country_flag($localedata['active_country']->code)}}</div>
                        <div class="country-name">{{$localedata['active_country']->name}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>