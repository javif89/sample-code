<!-- Modal -->
<div class="modal fade" id="countrySelectModal" tabindex="-1" role="dialog" aria-labelledby="countrySelectModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        @php
            $countries = App\Country::enabled()->get();
            foreach ($countries as $key => $country) {
                $country->flag = country_flag($country->code);
            }
        @endphp
        <country-select 
            :selectedcountry="{{json_encode(session('country'))}}"
            :countries="{{json_encode($countries)}}">
        </country-select>
    </div>
</div>