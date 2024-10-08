@extends('app')
@section('content')
<div class="wrapper2">
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
                <img src="{{ asset('images/logo-united.png') }}" class="image-1 animate__animated  animate__slideInLeft">
            </div>
            <div>
                <img src="{{ asset('images/love.png') }}" class="image-hide animate__animated  animate__slideInRight" style="width: 30%; margin-bottom: -180px; margin-left: 820px; position: sticky !important">
            </div>
            <div class="col-auto">
                <div class="card shadow-lg p-3 mb-5 bg-body animate__animated animate__bounceInDown" style="border: none; border-radius: 20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="fs-26 fw-bolder">WELCOME TO <span style="color: #45818E">UNITED</span></h2>
                            <p class="fs-14">Revolutionizing Diabetes Detection with AI – <span style="color: #F61687">A Painless</span>, <span style="color: #002EEF">Accessible</span>, and <span class="text-success">Affordable</span> Solution</p>
                            <p class="fs-14">Through Tongue Analysis!</p>
                            <hr style="width:25%; margin-left:37% !important; margin-right:40% !important" />
                            <p class="fs-14">UNITED leverages AI to detect early signs of diabetes through tongue analysis</p>
                            <p class="fs-14">offering a painless and accessible alternative to traditional blood tests</p>
                            <a href="{{ route('aboutUnited') }}" class="btn btn-success btn-sm px-8 py-4 m-r-8 mb-8m" style="width: 220px !important"><i class="fa-solid fa-stethoscope"></i>About UNITED</a>
                            <a href="{{ route('aboutDiabeted') }}" class="btn btn-danger btn-sm px-8 py-4" style="width: 220px !important"><i class="fa-solid fa-stethoscope"></i>About Diabetes Mellitus</a>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('formQuesioner') }}" class="btn btn-primary btn-sm px-8 py-4 mt-4"><i class="fa-solid fa-stethoscope"></i>Getting Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/logo1.png') }}" class="image-hide animate__animated  animate__slideInUp" style="width: 30%; margin-top: -12%; margin-left: 5%; position: sticky !important">
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
</script>
@endpush
