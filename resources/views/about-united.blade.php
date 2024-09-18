@extends('app')
@section('content')
    <div class="wrapper2">
        <div class="container">
            <div class="row justify-content-md-center">
                <div>
                    <img src="{{ asset('images/logo-united.png') }}" class="image-1 animate__animated  animate__slideInLeft">
                </div>
                <div>
                    <img src="{{ asset('images/about.png') }}" class="image-hide animate__animated  animate__slideInRight" style="width: 15%; bottom: 400px !important; margin-left: 1050px; position: absolute !important">
                </div>
                <div class="col-auto d-flex justify-content-center">
                    <div class="card shadow-lg p-3 mb-5 bg-body animate__animated animate__bounceInDown" style="border: none; border-radius: 20px; width: 60%;">
                        <div class="card-body">
                            <a href="{{ route('home') }}" class="text-danger"><i class="fa fa-arrow-left text-danger m-r-8 mb-4"></i>Back</a>
                            <div class="text-center">
                                <p class="fw-bold fs-18">About <span style="color: #45818E">UNITED</span>: A Revolutionary Tool for Non-Invasive Diabetes Detection</p>
                            </div>
                            <div>
                                <p class="fs-14" style="text-align: justify !important">
                                    <span style="color: #45818E; font-weight: bolder">UNITED</span> (Utilizing AI for Non-Invasive Early Detection of Diabetes Mellitus through
                                    Tongue Analysis) is a groundbreaking platform designed to revolutionize early diabetes
                                    detection. By combining state-of-the-art HuskyLens technology with a user-friendly
                                    digital experience, <span style="color: #45818E; font-weight: bolder">UNITED</span> offers a non-invasive method to identify early signs of
                                    diabetes through advanced tongue analysis. The process begins with a personalized
                                    questionnaire, where users provide insights into their symptoms and experiences related
                                    to potential diabetes risks. This information is crucial for creating a comprehensive
                                    health profile before moving on to the next step.
                                </p>
                                <p class="fs-14" style="text-align: justify !important">
                                    What makes <span style="color: #45818E; font-weight: bolder">UNITED</span> unique is its use of HuskyLens-powered tongue analysis, which detects
                                    early markers of diabetes through AI-driven image processing. Scientific research has
                                    demonstrated that changes in tongue appearance can reveal underlying health issues,
                                    including diabetes. By utilizing this non-invasive technology, <span style="color: #45818E; font-weight: bolder">UNITED</span> offers a simple,
                                    painless way to screen for diabetes risks without the need for blood tests or other
                                    traditional methods. Once the analysis is complete, users receive a detailed PDF report
                                    that includes both their questionnaire responses and the results of the tongue analysis.
                                    The report provides clear, personalized insights into their diabetes risk and suggests
                                    follow-up actions, such as visiting nearby healthcare providers for a more comprehensive
                                    check-up.
                                </p>
                                <p class="fs-14" style="text-align: justify !important">
                                    <span style="color: #45818E; font-weight: bolder">UNITED</span> is designed to empower individuals by offering an accessible, reliable, and
                                    proactive tool for early diabetes detection. With its seamless interface and innovative
                                    approach, <span style="color: #45818E; font-weight: bolder">UNITED</span> helps users take control of their health, making preventive healthcare
                                    more convenient and effective.
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
