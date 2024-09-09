@extends('app')
@section('content')
<div class="wrapper">
    <div class="inner">
        <div class="container my-4">
            <div id="welcomeCard">
                <div class="card shadow-lg p-3 mb-5 bg-body" style="border: none; border-radius: 20px">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="fs-2x fw-bolder">WELCOME TO <span class="text-warning">UNITED</span></h2>
                            <p class="fs-18">Revolutionizing Diabetes Detection with AI – <span style="color: #F61687">A Painless</span>, <span style="color: #002EEF">Accessible</span>, and <span class="text-success">Affordable</span> Solution</p>
                            <p class="fs-18">Through Tongue Analysis!</p>
                            <hr style="width:25%; margin-left:37% !important; margin-right:40% !important;" />
                            <p class="fs-18">UNITED leverages AI to detect early signs of diabetes through tongue analysis</p>
                            <p class="fs-18">offering a painless and accessible alternative to traditional blood tests</p>
                            <a href="{{ route('formQuesioner') }}" class="btn btn-primary btn-sm fs-6 px-8 py-4"><i class="fa-solid fa-stethoscope"></i>Getting Started</a>
                        </div>
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
