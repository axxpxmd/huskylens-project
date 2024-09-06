@extends('app')
@section('content')
<div class="container col-8 my-4">
    <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="border: none">
        <div class="card-body">
            <form action="">
                <div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Pasien</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email / No HP</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                </div>
                <div class="">
                    <hr>
                    @foreach ($dataQuestions['pertanyaan'] as $key => $i)
                    <div style="margin-bottom: 15px">
                        <span class="fw-bold fs-14">{{ $key+1 }}. {{ $i }}</span>
                        <i class="bi bi-question text-danger" title="{{ $dataQuestions['deskripsi'][0] }}"></i>
                        <div style="margin-left: 15px !important">
                            <div class="row mt-3">
                                <div class="col">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault{{ $key }}" id="flexRadioDefault1">
                                    <label class="form-check-label text-black" for="flexRadioDefault1">
                                        &nbsp;&nbsp;&nbsp;Ya
                                    </label>
                                </div>
                                <div class="col">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault{{ $key }}" id="flexRadioDefault1">
                                    <label class="form-check-label text-black" for="flexRadioDefault1">
                                        &nbsp;&nbsp;&nbsp;Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
