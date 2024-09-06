@extends('app')
@section('content')
<div class="container my-4">
    <div id="welcomeCard">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="border: none">
            <div class="card-body">
                <div class="text-center">
                    <h2 class="fs-2x  fw-bolder mb-0">WELCOME TO UNITE</h2>
                    <p class="text-gray-500 fs-4 fw-semibold py-4">Diabetes Check</p>
                    <a href="{{ route('formQuesioner') }}" class="btn btn-primary er fs-6 px-8 py-4"><i class="fa-solid fa-stethoscope"></i>Diagnosis</a>
                    <div class="text-center pb-15 px-5">
                        <img src="{{ asset('images/gif1.gif') }}" class="mw-100 h-200px h-sm-325px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dataCard" style="display: none" class="col-md-6">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="border: none">
            <div class="card-body">
                <div class="text-center">
                    <p class="fs-2 fw-semibold py-4">Check Up Result</p>
                    <i class="fa-solid fa-heart-circle-check text-success" style="font-size: 120px !important"></i>
                    <p class="fw-semibold fs-3 mt-4">Sehat</p>
                    <p class="text-gray-700 fw-semibold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        since the 1500s, when an unknown printer took a galley of type and scrambled
                        only five centuries, but also the leap into electronic typesetting, remaining
                        the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        including versions of Lorem Ipsum.
                    </p>
                    <button class="btn btn-sm btn-primary er fs-6 px-8 py-4 py-4" onclick="on()"><i class="fa-solid fa-print"></i>Print Result</button>
                    <button class="btn btn-sm btn-outline-primary er fs-6 px-8 py-4 py-4" onclick="on()"><i class="fa-solid fa-print"></i>Home</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
    function on() {
        $('#loading').modal('show');
        $('#welcomeCard').hide();

        url = "{{ route('getIdData') }}"
        $.get(url, function(data){
            console.log(data.id_data)
        }, 'JSON');

        setTimeout(function() {
            $('#loading').modal('toggle');
            $('#dataCard').show();
            console.log('time jalan')
        }, 3000);
    }
</script>
@endpush
