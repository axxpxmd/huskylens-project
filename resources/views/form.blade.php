<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNITE - Diabetes Checking</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="wrapper">
        <div class="inner">
            <img src="{{ asset('images/gif2.gif') }}" alt="" class="image-1" style="margin-left: -120px !important; margin-bottom: 33px !important">
            <div class="container">
                <div class="card shadow-lg p-3 mb-5 bg-body" style="border: none; border-radius: 20px; width: 500px">
                    <div class="card-body">
                        <p class="text-center fw-bold fs-20">FORM CHECKING</p>
                        <hr class="mb-4">
                        <form action="{{ route('submitForm') }}" class="needs-validation" method="post">
                            <a href="{{ route('home') }}" class="text-danger"><i class="fa fa-arrow-left text-danger m-r-8"></i>Back</a>
                            <div class="form-group row">
                                <label for="patient_name" class="col-sm-3 col-form-label fw-bold fs-12">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="patient_name" placeholder="Patient Name" required>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="contact" class="col-sm-3 col-form-label fw-bold fs-12">Contact</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="contact" placeholder="Email / No Telp" required>
                                </div>
                            </div>
                            <div class="mt-4">
                                @foreach ($dataQuestions['pertanyaan'] as $key => $i)
                                <div style="margin-bottom: 15px">
                                    <span class="fw-bold fs-12">{{ $key+1 }}. {{ $i }}</span>
                                    <i class="fa fa-question-circle text-warning" title="{{ $dataQuestions['deskripsi'][0] }}"></i>
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
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-sm" type="submit">Next <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@stack('script')
</html>
