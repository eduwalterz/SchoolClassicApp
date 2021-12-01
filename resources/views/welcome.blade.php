@extends('layouts.frontend')
@section('content')
    
            <!--BANNER SECTION-->
            <section class="bannerSection">
            <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#carouselIndicators" data-slide-to="0"></li>
                    <li data-target="#carouselIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselIndicators" data-slide-to="2"></li>

                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 bannerImage img-fliud" src="{{asset('images/slide1.jpg')}}" alt="First Slide">
                    </div>
                @if(!empty($images))
                @foreach($images as $image)
                    <div class="carousel-item">
                        <img class="d-block w-100 bannerImage img-fliud" src="{{asset('images/'.$image->image)}}" alt="Second Slide">
                    </div>
                @endforeach
                @endif

                    <div class="carousel-item">
                        <img class="d-block w-100 bannerImage img-fliud" src="{{asset('images/slide3.jpg')}}" alt="Third Slide">
                    </div>


                </div>

                <a class="carousel-control-prev"  href="#carouselIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next"  href="#carouselIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>



            </div>
            </section>
            <!--END OF BABBER SECTION-->

            <!--marketing section-->
            
            <section class="marketingSection">
                <h2 class="text-center mt-5">
                    @if(!empty($marketingsectionmain))
                <strong>{{$marketingsectionmain->main_heading}}</strong>
                @endif
                </h2>
                <center>
                    <div class="border"></div>
                    @if(!empty($marketingsectionmain))
                    <p class="py-3">
                   {{$marketingsectionmain->main_paragraph}}
                    </p>
                    @endif

                    @if(!empty('$marketingrows'))
                    <div class="row mt-5 marketingRow">
                        @foreach($marketingrows as $rowdata)
                        <!--column one-->
                        <div class="col-md-4">
                          <i class="{{$rowdata->fontawesome}}"></i>
                            <h4 class="mt-4">
                                <strong>{{$rowdata->heading}}</strong>
                            </h4>
                            <div class="border"></div>
                            <p>
                            {{$rowdata->paragraph}}
                            </p>
                            
                        </div>
                        <!--end of column one-->
                        @endforeach
                        
                        


                    </div>
                    @endif
                </center>
            </section>
            <!--end 0f marketing section-->

@endsection
          