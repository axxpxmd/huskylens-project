@extends('app')
@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
                {{-- <img src="{{ asset('images/gif2.gif') }}" alt="" class="image-1"> --}}
            </div>
            <div class="col-auto">
                <div class="card shadow-lg p-3 bg-body my-10" style="border: none; border-radius: 20px">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="fw-bold fs-20 text-uppercase">Questionnaire</p>
                            <p class="mb-0">Help us tailor your experience! <span class="text-primary">Answer a few quick questions</span> to better understand </p>
                            <p class="mb-0">your health and personalize your diabetes screening. </p>
                            <p class="mb-0">Your responses will guide our AI-powered analysis, ensuring the most accurate and insightful results, </p>
                            <p class="mb-0">all while remaining non-invasive and stress-free! </p>
                        </div>
                        <hr class="mb-4">
                        <form action="{{ route('submitForm') }}" class="needs-validation" method="post">
                            <a href="{{ route('home') }}" class="text-danger"><i class="fa fa-arrow-left text-danger m-r-8 mb-4"></i>Back</a>
                            <div class="form-group row">
                                <label for="patient_name" class="col-sm-3 col-form-label fw-bold fs-12">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="patient_name" placeholder="Patient Name" required>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="contact" class="col-sm-3 col-form-label fw-bold fs-12">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control form-control-sm" name="contact" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="mt-4">
                                @foreach ($dataQuestions['pertanyaan'] as $key => $i)
                                <div style="margin-bottom: 15px">
                                    <span class="fw-bold fs-12">{{ $key+1 }}. {{ $i }}</span>
                                    <i class="fa fa-question-circle text-warning"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="{{ $dataQuestions['deskripsi'][$key] }}"></i>
                                    <div style="margin-left: 15px !important">
                                        <div class="row mt-3">
                                            <div class="col">
                                                <input class="form-check-input" type="radio" value="1" name="answer{{ $key }}" id="flexRadioDefault1" required>
                                                <label class="form-check-label text-black" for="answer{{ $key }}">
                                                    &nbsp;&nbsp;&nbsp;Ya
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input class="form-check-input" type="radio" value="0" name="answer{{ $key }}" id="flexRadioDefault1" required>
                                                <label class="form-check-label text-black" for="answer{{ $key }}">
                                                    &nbsp;&nbsp;&nbsp;Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-sm" type="submit">Next <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
</script>
@endpush

