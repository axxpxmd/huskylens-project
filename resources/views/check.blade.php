@extends('app')
@section('content')
<div class="wrapper">
    <div class="inner">
        <div class="container my-4">
            <div class="card shadow-lg p-3 mb-5 bg-body" style="border: none; border-radius: 20px">
                <div class="card-body">
                    <form action="{{ route('getResult') }}" method="post">
                        <div class="text-center">
                            <div class="text-center px-5">
                                <img src="{{ asset('images/gif1.gif') }}" class="mw-100 h-200px h-sm-325px" />
                            </div>
                            <button class="btn btn-primary fs-6" type="submit"><i class="fa-solid fa-stethoscope"></i>Start Diagnosis</button>
                        </div>
                        <hr>
                        <input type="hidden" name="id" value="{{ $result->id }}">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label fw-bold fs-14">Name</label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext fw-bold fs-14" value=" : {{ $result->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label fw-bold fs-14">Contact</label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext fw-bold fs-14" value=" : {{ $result->contact }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label fw-bold fs-14">ID</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control-plaintext fw-bold fs-14" id="id_data" name="id_data">
                            </div>
                        </div>
                    </form>
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
        }, 'JSON')
    }
    setInterval(myFunction, 2000);

</script>
@endpush
