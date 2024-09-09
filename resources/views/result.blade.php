@extends('app')
@section('content')
<div class="wrapper">
    <div class="inner">
        <div class="container my-4">
            <div class="card shadow-lg p-3 mb-5 bg-body" style="border: none; border-radius: 20px; width: 400px">
                <div class="card-body">
                    <div class="text-center">
                        <p class="fw-bolder fs-20">RESULT</p>
                        <p class="fw-bold fs-40 {{ $color }} mb-0">{{ $totalResult }}%</p>
                        <p>( <span title="form">{{ $totalDataAlat }}</span> + <span title="device">{{ $totalDataForm }}</span> )</p>
                    </div>
                    @if ($totalDataForm + $totalDataAlat >= 75)
                        <p class="text-center fs-14">The results of the examination that was carried out <span class="fw-bold">did not indicate</span> any symptoms of diabetes.</p>
                    @else
                        <p class="text-center fs-14">The results of the examination that has been carried out <span class="fw-bold">indicate</span> that you have symptoms of diabetes</p>
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
@endsection
@push('script')
<script type="text/javascript">

</script>
@endpush
