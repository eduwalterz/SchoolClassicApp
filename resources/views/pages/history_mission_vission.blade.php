@extends('layouts.frontend')
@section('content')
<section class="bannerSection bannerPageSection" style="backgroung-image:url('{{asset('images/links.png')}}')">
    <div class="innerBannerPageSection">
        <div class="bannerContent">
            <h2><strong>About Us</strong></h2>
            <h6><strong>Home/About Us</strong></h6>
        </div>
    </div>
</section>

<!--value section-->
<section class="valueSection bg-light">
<center>
@if(!empty($historymissionvissiondata))
                  
    <h3><strong>Our value</strong></h3>
    <div class="border"></div>

    <div class="row valueSectionRow">
        <!--column1-->
        @foreach($historymissionvissiondata as $data)
        <div class="col-md-4">
            <i class="{{$data->fontawesome}}"></i>
            <h4 class="mt-4">
            <strong>{{$data->heading}}</strong>
            </h4>
            <div class="border"></div>
            <p>
            {{$data->paragraph}}
            </p>
        </div>
        @endforeach
        <!--end of column1-->

        
    </div>
    @endif
</center>

</section>
<!--end of value section-->
@endsection