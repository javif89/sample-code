@extends('layouts.page')

@section('page-content')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Distributor Assets</h3>
                        </div>
                    </div>

                </div>
                <div class="card-header border-0">
                    <ul class="nav nav-tabs nav-fill nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab"
                               href="#branding-tab" role="tab">
                                Branding Assets <span class="badge badge-primary badge-pill">{{ $brandingFiles->count()  }}</span>
                            </a>
                        </li>
                        @foreach($parentCategories as $index => $cat)
                            @include('view.partials.dist-files-cat-tab', ['cat' => $cat, 'active' => false, 'parent' => ''])
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content">

                    <div class="tab-pane active " id="branding-tab"
                         role="tabpanel">
                        <div class="table-responsive">
                            <table class="table" id="distributor-files-table">
                                <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>File Language</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brandingFiles as $media)
                                    <tr>
                                        <td>{{ $media->name }}</td>
                                        <td>{{ $media->lang_code }}</td>
                                        <td class="d-flex">
                                            <a href="{{ $media->path }}" class="btn btn-sm btn-default"
                                               target="_blank"><i
                                                        class="fa fa-eye"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @foreach($parentCategories as $index => $cat)
                        @include('view.partials.dist-files-tab', ['cat' => $cat, 'active' => false])
                        @if(!blank($cat->subcategories))
                            @foreach($cat->subcategories as $category)
                                @include('view.partials.dist-files-tab', ['cat' => $category, 'active' => false])
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@include('partials.scripts.confirm-delete')
