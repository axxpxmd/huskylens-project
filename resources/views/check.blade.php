@extends('app')
@section('content')
<div class="wrapper2">
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
                <img src="{{ asset('images/logo-husky.png') }}" class="image-logo-husky">
            </div>
            <div>
                <img src="{{ asset('images/form2.png') }}" class="image-form2">
            </div>
            <div class="col-auto">
                <div class="card shadow-lg p-3 bg-body" style="border: none; border-radius: 20px">
                    <div class="card-body">
                        <form action="{{ route('getResult') }}" method="post">
                            <input type="hidden" class="form-control-plaintext fw-bold fs-14" id="id_data" name="id_data">
                            <div class="text-center">
                                <div class="text-center">
                                    <img src="{{ asset('images/gif1.gif') }}" width="300">
                                </div>
                                <button class="btn btn-primary fs-6" type="submit"><i class="fa-solid fa-stethoscope"></i>Detection Result</button>
                            </div>
                            <hr>
                            <input type="hidden" name="id" value="{{ $result->id }}">
                            <div>
                                <div class="row mb-3">
                                    <label class="col-md-4 fw-bold fs-14">Name</label>
                                    <label class="col-md-8 fw-bold fs-14">{{ $result->name }}</label>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 fw-bold fs-14">Email</label>
                                    <label class="col-md-8 fw-bold fs-14">{{  $result->contact }}</label>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 fw-bold fs-14">ID</label>
                                    <label class="col-md-8 fw-bold fs-14" id="show_id_data"></label>
                                </div>
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
    function myFunction() {
        url = "{{ route('getIdData') }}"
        $.get(url, function(data){
            console.log(data.id_data)
            $('#id_data').val(data.id_data);
            $('#show_id_data').html(data.id_data);
        }, 'JSON')
    }
    setInterval(myFunction, 2000);

</script>
@endpush
