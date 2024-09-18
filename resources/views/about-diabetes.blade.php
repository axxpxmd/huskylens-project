@extends('app')
@section('content')
    <div class="wrapper2">
        <div class="container">
            <div class="row justify-content-md-center">
                <div>
                    <img src="{{ asset('images/logo-united.png') }}" class="image-1 animate__animated  animate__slideInLeft">
                </div>
                <div>
                    <img src="{{ asset('images/doctor.png') }}" class="image-hide animate__animated  animate__slideInRight" style="width: 15%; bottom: 350px !important; margin-left: 1050px; position: absolute !important">
                </div>
                <div class="col-auto d-flex justify-content-center">
                    <div class="card shadow-lg p-3 mb-5 bg-body animate__animated animate__bounceInDown" style="border: none; border-radius: 20px; width: 60%;">
                        <div class="card-body">
                            <a href="{{ route('home') }}" class="text-danger"><i class="fa fa-arrow-left text-danger m-r-8 mb-4"></i>Back</a>
                            <div class="text-center">
                                <p class="fw-bold fs-18">About Diabetes</p>
                            </div>
                            <div>
                                <p class="fs-14" style="text-align: justify !important">
                                    Diabetes mellitus, commonly known as diabetes, is a chronic condition that disrupts how
                                    your body converts food into energy. It occurs when the body either doesn’t produce
                                    enough insulin or cannot effectively use the insulin it does produce. Insulin, a hormone
                                    that regulates blood sugar (glucose), plays a crucial role in energy production. When
                                    insulin function is impaired, glucose levels in the blood rise, potentially leading to
                                    serious health complications such as heart disease, kidney damage, vision loss, and
                                    nerve damage.

                                </p>
                                <p class="fs-14" style="text-align: justify !important">
                                    There are two primary types of diabetes: <span class="fw-bold">Type 1 Diabetes</span> and <span class="fw-bold">Type 2 Diabetes</span>. <span class="fw-bold">Type 1</span>,
                                    often diagnosed early in life, occurs when the immune system mistakenly attacks the
                                    insulin-producing cells in the pancreas. This type requires insulin injections for blood
                                    sugar management. <span class="fw-bold">Type 2 Diabetes</span>, more common and often linked to lifestyle factors
                                    like poor diet, obesity, and inactivity, typically develops in adulthood. In Type 2, the
                                    body either doesn't produce enough insulin or becomes resistant to it.
                                </p>
                                <p class="fw-bold fs-18">Why It Matters?</p>
                                <p class="fs-14" style="text-align: justify !important">
                                    The rise of diabetes is alarming. As of today, over <span class="fw-bold">540 million people</span> worldwide are
                                    living with diabetes. Projections by the <span class="fw-bold">International Diabetes Federation (IDF)</span>
                                    indicate that by <span class="fw-bold">2045, 1 in 8 adults</span> an estimated <span class="fw-bold">783 million people</span> will be affected by
                                    diabetes, marking a staggering <span class="fw-bold">46% increase</span>. This surge in diabetes cases highlights the
                                    urgent need for early detection and preventive measures to curb the growth of this
                                    epidemic.
                                </p>
                                <p class="fs-14" style="text-align: justify !important">
                                    Though diabetes is a serious condition, it can be managed, and in many cases, prevented.
                                    Early detection is key, as many people live with undiagnosed diabetes or prediabetes,
                                    unaware of their condition. Symptoms like frequent thirst, fatigue, slow-healing wounds,
                                    and blurred vision may signal a need for testing.
                                </p>
                                <p class="fs-14" style="text-align: justify !important">
                                    <span style="color: #45818E; font-weight: bolder">UNITED</span> is dedicated to making early diabetes detection accessible and non-invasive,
                                    empowering individuals to take control of their health before complications arise.
                                    Understanding diabetes and its growing impact is the first step in managing and
                                    preventing this silent but widespread condition. With awareness and action, we can work
                                    to reduce the future burden of diabetes
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript"></script>
@endpush
