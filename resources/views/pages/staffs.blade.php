@extends('layouts.frontend')
@section('content')

<!--banner section-->
<section class="bannerSection bannerPageSection" style="backgroung-image:url('{{asset('images/links.png')}}')">
    <div class="innerBannerPageSection">
        <div class="bannerContent">
            <h2><strong>Staffs</strong></h2>
            <h6><strong>Home/Staffs</strong></h6>
        </div>
    </div>
</section>
<!--end of banner section-->

<!--staff section-->
<section class="staffSection bg-light">
    <center>

    <div class="row staffSectionRow">

    <div> 

    <!-- main column -->
    @if(!empty($staffsmainsectiondata))
    <div class="col-md-12 mt-10">
                <div class="row py-4">
                    <div class="col-md-3">
                        <center>
                            <img src="{{asset('images/' .$staffsmainsectiondata->image)}}" width="200px" height="200px" alt="">
                        </center>
                    </div>

                    <div class="col-md-8">
                        <h5 class="mt-4 mb-2">
                            <b>{{$staffsmainsectiondata->staff_name}}</b>
                        </h5>
                        <p>
                        {{$staffsmainsectiondata->paragraph}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <!--end of main column-->
    </div>
        
            <!--column one-->
            @if(!empty($staffsrowsection))
                          @foreach($staffsrowsection as $staffs)
            <div class="col-md-6 mt-5">
                <div class="row py-4">
                    <div class="col-md-4">
                        <center>
                            <img src="{{asset('images/' .$staffs->image)}}" width="160px" height="160px" alt="">
                        </center>
                    </div>

                    <div class="col-md-8">
                        <h5 class="mt-4 mb-2">
                            <b>{{$staffs->staff_name}}</b>
                        </h5>
                        <p>
                        {{$staffs->paragraph}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <!--end of column one-->

           

            
        </div>
    </center>
</section>
<!--end of staff section-->
@endsection