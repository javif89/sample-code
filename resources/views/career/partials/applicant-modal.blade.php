<!-- Button trigger modal -->
<div class="badge btn btn-primary" data-toggle="modal" data-target="#applicantModal{{$applicant->id}}">
    View
</div>

<!-- Modal -->
<div class="modal fade" class="applicant-modal" id="applicantModal{{$applicant->id}}" tabindex="-1" role="dialog"
    aria-labelledby="applicantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-header">
                <h4 class="modal-title" id="applicantModalLabel">Applicant Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="col-xs-12 ">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label class="appl-label">Job Title</label>
                                <div>{{$career->position_title}}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Submission Date</label>
                                <div>{{ \Carbon\Carbon::parse($applicant->created_at)->isoFormat('LLLL')}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Name</label>
                                <div>{{ $applicant->fname . " " . $applicant->lname }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Email</label>
                                <div>{{ $applicant->email }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Phone</label>
                                <div>{{ $applicant->phone}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Linkedin</label>
                                <div><a href="{{ $applicant->linkedIn }}" target="_blank">{{ $applicant->linkedIn }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Website</label>
                                <div><a href="{{ $applicant->website }}" target="_blank">{{ $applicant->website }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Education</label>
                                <div>{{ $applicant->education_level->level }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">College</label>
                                <div>{{ $applicant->college }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Graduation Year</label>
                                <div>{{ $applicant->graduation_year }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Reference</label>
                                <div>{{ $applicant->reference }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Compensation</label>
                                <div>{{ $applicant->compensation }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Authorized</label>
                                <div>{{ $applicant->authorized ? 'Yes' : 'No' }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Relocation</label>
                                <div>{{ $applicant->relocation ? 'Yes' : 'No' }}</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Convicted</label>
                                <div>{{ $applicant->convicted ? 'Yes' : 'No' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="appl-label">Convicted Explanation</label>
                                <p class="convicted">{{ $applicant->convicted ? $applicant->convicted_reason : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="appl-label">Resume</label>
                                <div>
                                    <a href="{{ $applicant->resume }}" target="_blank">
                                        <span>{{ $applicant->resume }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>