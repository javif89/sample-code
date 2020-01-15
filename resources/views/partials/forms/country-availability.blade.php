<div class="card shadow">
    <div class="card-header">
        Country Availability
    </div>
    <div class="table-responsive">
        <form action="{{ route('set-entity-countries', ['id' => $entity->id]) }}" method="POST">
            <table class="table">
                <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Available</th>
                </tr>
                </thead>
                <tbody>
                @foreach($countryContext->getAvailableCountries() as $country)
                
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>
                            <!-- Rounded switch -->
                            <label class="switch">
                                <input type="checkbox" name="countries[]" value="{{ $country->id }}" @if(in_array($country->id, collect($entity->countries)->pluck('id')->toArray())) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @csrf
            <div class="p-2">
                <input type="hidden" name="entity_name" value="{{$entity->name}}" />
                <input type="hidden" name="entity_type" value="{{$resource_name}}" />
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
