<div class="card mt-3">
    <div class="card-header">
        Accessories
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush" id="">
            <thead class="bg-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Product::getAccessories() as $p)
                <tr>
                    <th scope="row">
                        {{ $p->name }}
                    </th>
                    <td>
                        @if ($product->hasAccessory($p))
                            <form method="post" action="{{route('remove-accessory', ['product' => $product, 'id' => $p->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                            </form>
                        @else
                            <form method="post" action="{{route('add-accessory', ['product' => $product, 'id' => $p->id])}}">
                                @csrf
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>