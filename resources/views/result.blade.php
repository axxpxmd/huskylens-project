@extends('app')
@section('content')
<div class="wrapper2">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-auto">
                <div class="card shadow-lg p-3 mb-5 bg-body" style="border: none; border-radius: 20px; width: 400px">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="fw-bolder fs-20">RESULT</p>
                            <p class="fw-bold fs-40 {{ $color }} mb-0">{{ $totalResult }}%</p>
                            <p>( <span title="device">{{ $totalDataAlat }}</span> + <span title="form">{{ $totalDataForm }}</span> )</p>
                        </div>
                        @if ($totalDataForm + $totalDataAlat >= 75)
                            <p class="text-center fs-14">
                                We are pleased to inform you that your recent tests show <span class="text-success">negative detection for diabetes mellitus</span>. While this is great news, it is still important to take steps to ensure long-term health and well-being.
                            </p>
                        @else
                            <p class="text-center fs-14">
                                The results of your recent tests indicate a <span class="text-danger">positive detection for diabetes mellitus</span>. While this may feel overwhelming, please remember that with proper management, it is entirely possible to live a healthy and productive life.
                            </p>
                        @endif
                        <hr>
                        <div class="m-b-20">
                            <div class="row mb-3">
                                <label class="col-md-4 fw-bold fs-14">Name</label>
                                <label class="col-md-8 fw-bold fs-14">{{ $data->name }}</label>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 fw-bold fs-14">Email</label>
                                <label class="col-md-8 fw-bold fs-14">{{ $data->contact }}</label>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 fw-bold fs-14">ID</label>
                                <label class="col-md-8 fw-bold fs-14">{{ $id_data }}</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('printReport') }}" target="_blank" class="btn btn-sm btn-primary m-r-2">Print Out <i class="fa fa-print m-l-8"></i></a>
                            <a href="#" class="btn btn-sm btn-success">Send Email <i class="fa fa-mail-forward m-l-8"></i></a>
                        </div>
                        <div class="text-center mt-2">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-danger">Home <i class="fa fa-home m-l-8"></i></a>
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
