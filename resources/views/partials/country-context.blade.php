<div class="mb-3">
    <div class="card shadow mb-1">
        <div class="card-header">
            @if (auth()->user()->is_super)
                <h3 class="mb-0">Country</h3>
                <div class="d-flex justify-content-between">
                <select  id="set_country_code" class="form-control">
                    <option value="DEFAULT">DEFAULT</option>
                    @foreach($countryContext->getAvailableCountries() as $country)
                        <option value="{{$country->code}}" @if($countryContext->get() == $country->code) selected @endif>{{$country->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="d-flex justify-content-between">
                <select  id="set_lang_code" class="form-control">
                    @foreach($countryContext->getAvailableCountries() as $country)
                        @if($countryContext->get() == $country->code)
                            @foreach($country->available_languages as $lang)
                                <option value="{{$lang->code}}" @if($countryContext->getLang() == $lang->code) selected @endif>{{$lang->name}}</option>
                            @endforeach
                        @endif

                    @endforeach
                </select>
                <button type="button" class="btn btn-success" id="submitCountryContext">{{ __('Set') }}</button>
                </div>
            @else
            <h3 class="mb-0">Current country: {{ country_flag($countryContext->get())}} {{$countryContext->get()}}</h3>
            <input type="hidden" id="set_country_code" name="set_country_code" value="{{$countryContext->get()}}" />
                <div class="d-flex justify-content-between">
                    <select  id="set_lang_code" class="form-control">
                    @foreach($countryContext->getCountryObject()->available_languages as $lang)
                        <option value="{{$lang->code}}" @if($countryContext->getLang() == $lang->code) selected @endif>{{$lang->name}}</option>
                    @endforeach

                    </select>
                    <button type="button" class="btn btn-success" id="submitCountryContext">{{ __('Set') }}</button>
                </div>
            @endif
        </div>
    </div>
</div>