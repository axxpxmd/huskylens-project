@extends('app')
@section('content')
<div class="wrapper">
    <div class="inner">
        <div class="container my-4">
            <div id="welcomeCard">
                <div class="card shadow-lg p-3 mb-5 bg-body" style="border: none; border-radius: 20px">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="fs-2x  fw-bolder mb-0">WELCOME TO UNITE</h2>
                            <p class="text-gray-500 fs-4 fw-semibold py-4">Diabetes Check</p>
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
