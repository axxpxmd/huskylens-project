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
                            <div class="form-group row" style="margin-bottom: -10px !important">
                                <label for="staticEmail" class="col-sm-4 col-form-label fw-bold fs-14">Name</label>
                                <div class="col-sm-8">
                                  <input type="text" readonly class="form-control-plaintext fw-bold fs-14" value=" : {{ $data->name }}">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: -10px !important">
                                <label for="staticEmail" class="col-sm-4 col-form-label fw-bold fs-14">Contact</label>
                                <div class="col-sm-8">
                                  <input type="text" readonly class="form-control-plaintext fw-bold fs-14" value=" : {{ $data->contact }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label fw-bold fs-14">ID</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control-plaintext fw-bold fs-14" id="id_data" name="id_data" value=" : {{ $id_data }}">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-sm btn-primary m-r-8">Print Out <i class="fa fa-print m-l-8"></i></a>
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
