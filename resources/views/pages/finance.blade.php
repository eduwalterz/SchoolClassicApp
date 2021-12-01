@extends('layouts.frontend')
@section('content')


<!--banner section-->
<section class="bannerSection bannerPageSection" style="backgroung-image:url('{{asset('images/links.png')}}')">
    <div class="innerBannerPageSection">
        <div class="bannerContent">
            <h2><strong>Finance</strong></h2>
            <h6><strong>Home/Finance</strong></h6>
        </div>
    </div>
</section>
<!--end of banner section-->

<!--ict department-->
<section class ="department bg-light">
    @if(!empty($financedepartment))
    <h2  class="text-center mt-5px">{{$financedepartment->main_heading}}</h2>

    <center>
        <div class="border"></div>
        <div class="row departmentRow">
            <!--first column-->
            <div class="col-md-5">
                <img src="{{asset('images/' .$financedepartment->image)}}"  class="img-fliud" width="400px" height="300px">
            </div>
            <!--end of first column-->

            <!--second column-->
            <div class="col-md-7">
                <h5 class="ml-4 py-3
                ">{{$financedepartment->sub_heading}}</h5>

                <p>
                {{$financedepartment->paragraph}}
                <br>
                <span>
                    <strong>
                        {{$financedepartment->author}}
                    </strong>
                </span>
                <br>
                <span style="color:#fe730c !important">{{$financedepartment->author_title}}</span>
                </p>
            </div>
            <!--end of the second column-->
        </div>
    </center>
    @endif
</section>
<!--end of ict department-->

@endsection