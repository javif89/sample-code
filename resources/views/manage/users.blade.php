@extends('layouts.page')

@section('page-content')
    <div class="row">
        <div class="col-lg-5">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">Invite a User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('create-invite') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" required name="email" class="form-control" placeholder="Enter email to send invite to">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Invite</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="card shadow mt-3">
                <div class="card-header">
                    <h3 class="mb-0">Invitations</h3>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush" id="admin-invite-table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Sent to</th>
                            <th scope="col">Code</th>
                            <th scope="col">Used</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\AdminInvitation::all()->sortBy('used') as $invite)
                            <tr>
                                <td>
                                    {{ $invite->for_email }}
                                </td>
                                <td>
                                    {{ $invite->code }}
                                </td>
                                <td>
                                    @if($invite->used)
                                        <span class="badge badge-danger">Used</span>
                                    @else
                                        <span class="badge badge-success">Not Used</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    @if(!$invite->used)
                                        <form action="{{ route('resend-invite-email', ['invite' => $invite->id]) }}" method="POST" class="mr-2">
                                            @csrf
                                            <button class="btn btn-sm btn-default">Resend Email</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('delete-invite', ['invite' => $invite->id]) }}" method="POST" onsubmit="return confirmDelete(this, 'invite')">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#admin-invite-table').DataTable( {
                "order": [[ 3, "desc" ]],
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": "First page", // This is the link to the first page
                        "sPrevious": "<", // This is the link to the previous page
                        "sNext": ">", // This is the link to the next page
                        "sLast": "Last page" // This is the link to the last page
                    }
                }
            } );
        } );
    </script>
@endpush

@include('partials.scripts.confirm-delete')
