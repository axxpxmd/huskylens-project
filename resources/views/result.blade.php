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
                        <div class="text-center">
                            <a href="#" class="btn btn-sm btn-primary m-r-2" data-bs-toggle="modal" data-bs-target="#kt_modal_select_users"><i class="fa fa-hospital m-r-8"></i>Hospitals</a>
                        </div>
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
                            <a href="{{ route('printReport', $id) }}" target="_blank" class="btn btn-sm btn-primary m-r-2">Print Out <i class="fa fa-print m-l-8"></i></a>
                            <a href="{{ route('sendEmail', $id) }}" class="btn btn-sm btn-success">Send Email <i class="fa fa-mail-forward m-l-8"></i></a>
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
<div class="modal fade" id="kt_modal_select_users" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mw-700px">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                <div class="text-center mb-13">
                    <h1 class="d-flex justify-content-center align-items-center mb-3">Hospitals</h1>
                    <div class="text-muted fw-semibold fs-5">Below is a list of the nearest hospitals</div>
                </div>
                <div class="mh-475px scroll-y me-n7 pe-7">
                    @foreach ($detail_rumah_sakit as $i)
                    <div class="border border-hover-primary p-7 rounded m-b-10">
                        <div class="d-flex flex-stack pb-3">
                            <div class="d-flex">
                                <div class="symbol symbol-circle symbol-45px">
                                    <img src="{{ asset('images/hospital.png') }}" alt="" />
                                </div>
                                <div class="ms-5">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-5 me-4">{{ $i['name'] }}</a>
                                    </div>
                                    <span class="text-muted fw-semibold mb-3">{{ $i['address'] }}</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="p-0">
                            <div class="d-flex flex-column">
                                <p class="text-gray-700 fw-semibold fs-6 mb-4"><i class="fa fa-phone m-r-8 text-success"></i> : {{ isset($i['phone']) ? $i['phone'] : '-' }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
