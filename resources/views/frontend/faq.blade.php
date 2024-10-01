@extends('layouts.frontend_master')
@section('title')
    Faq
@endsection
@section('content')
    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center col-12">
                    <h1 class="page-title">FAQs</h1>
                    <ul class="breadcrumb justify-content-center">
                        {{ Breadcrumbs::render('faq') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner">
            <div class="p-0 container-fluid">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="faq-bg"></div>
                    </div>
                    <div class="col-md-8 mt--100 mt-lg--80 mt-md--60 pb--5">
                        <div class="accordion-container">
                            <div class="row">
                                @foreach ($faqs as $faq)
                                    <div class="col-lg-12">
                                        <div class="accordion__single mb--100 mb-lg--75 mb-md--55 mb-sm--40">
                                            <div class="accordion__header" id="headingFive">
                                                <a class="accordion__link" data-bs-target="#accordionFour">
                                                    {{ $faq->question }}
                                                </a>
                                            </div>
                                            <div id="accordionFour" class="accordion__body">
                                                <div class="accordion__text">
                                                    {{$faq->answar}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-12">
                        <div
                            class="flex-wrap cta bg--3 d-flex justify-content-center align-items-center ptb--70 ptb-sm--50">
                            <h2 class="heading-secondary color--white mr--30 mr-xs--5">If you have more questions
                            </h2>
                            <a href="contact-us.html" class="btn btn-medium btn-style-4">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->
@endsection
