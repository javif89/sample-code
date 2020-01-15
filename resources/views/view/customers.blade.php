@extends('layouts.page')

@section('page-content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3>Customers ({{ count($customers) }})</h3>
            </div>
            <table class="table datatable">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($customers as $c)
                        <tr>
                            <td>{{ $c->first_name }}</td>
                            <td>{{ $c->last_name }}</td>
                            <td>{{ $c->email }}</td>
                            <td>{{ $c->phone }}</td>
                            <td>{{ country_flag($c->country_code) }} {{ $c->country_code }}</td>
                            <td class="d-flex">
                                <form action="{{ route('delete-customer', ['id' => $c->id]) }}" method="POST"
                                    onsubmit="return confirmDelete(this, 'customer: {{ addslashes($c->first_name) }} {{ addslashes($c->last_name) }}')">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@include('partials.scripts.confirm-delete')