<div class="card shadow" id="careers-table">

    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Applicants</h3>
            </div>
        </div>
    </div>

<table class="table align-items-center table-flush datatable career-table" id="careers{{ $career->id }}table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Highest Level of Education Completed</th>
            {{-- <th scope="col">Phone</th>
            <th scope="col">Resume</th>
            <th scope="col">LinkedIn</th>
            <th scope="col">Website</th>
            <th scope="col">Reference</th>
            <th scope="col">College</th>
            <th scope="col">Year Graduated</th>
            <th scope="col">Compensation</th>
            <th scope="col">Willing to Relocate</th>
            <th scope="col">Authorized to Work in the US</th> --}}
            <th scope="col">Date Submitted</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($career->applicants as $applicant)
        <tr>
            <th scope="row">
                {{ $applicant->fname . " " . $applicant->lname }}
            </th>
            <td>
                <span class="desc">{{ $applicant->email }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->education_level->level }}</span>
            </td>
            {{-- <td>
                <span class="desc">{{ $applicant->phone }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->resume }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->linkedIn }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->website }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->reference }}</span>
            </td>

            <td>
                <span class="desc">{{ $applicant->college }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->graduation_year }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->compensation }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->relocation ? 'Yes' : 'No' }}</span>
            </td>
            <td>
                <span class="desc">{{ $applicant->authorized ? 'Yes' : 'No' }}</span>
            </td> --}}
            <td>
                <span class="desc">{{ \Carbon\Carbon::parse($applicant->created_at)->isoFormat('LLLL')}}</span>
            </td>
            {{-- <td>
                <span>
                    @include('career.partials/applicant-modal')
                </span>
            </td> --}}

            <td>
                <span class="d-flex">
                @include('career.partials/applicant-modal')
                <form action="{{ route('delete-applicant', ['id' => $applicant->id]) }}" method="POST"
                    onsubmit="return confirmDelete(this, 'applicant')">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
            </span>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>