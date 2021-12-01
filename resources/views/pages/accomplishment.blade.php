@extends('layouts.frontend')
@section('content')

<!--banner section-->
<section class="bannerSection bannerPageSection" style="backgroung-image:url('{{asset('images/links.png')}}')">
    <div class="innerBannerPageSection">
        <div class="bannerContent">
            <h2><strong>Accomplishment</strong></h2>
            <h6><strong>Home/Accomplishment</strong></h6>
        </div>
    </div>
</section>
<!--end of banner section-->

<!--Achivement-->
<section class="achievementSpot">
<center>
    <h2 class="text-center mt-5">
        <b>Our Hall of Fame</b>
    </h2>
    <div class="border"></div>
</center>

<br>

    <div class="row achievementSpotRow">
        @if($accomplishmentfirstsection)
        <!--column one-->
        <div class="col-md-3">
            <img src="{{asset('images/' .$accomplishmentfirstsection->image)}}" class="img-fluid img-thumbnail float-left" alt="">
        </div>
        <!--end of column one-->

        <!--column two-->
        <div class="col-md-9">
            <h5 class="ml-4 py-3">
                <b>{{$accomplishmentfirstsection->heading}}</b>
            </h5>

            <p>
               {{$accomplishmentfirstsection->paragraph}}
                <br>
                <span style="color:#fe730c !important">
                    <strong>
                        <i class="fas fa-calendar-alt"></i> &nbsp;
                        
                        {{$accomplishmentfirstsection->dates}}
                    </strong>
                </span>
            </p>
        </div>
        <!--end of column two-->
        @endif
    </div>
</section>
<!--end of achievement-->

<!--Achivement two-->
<section class="achievementSpot">

    <div class="row achievementSpotRow">
        @if($accomplishmentsecondsection)
        
        <!--column two-->
        <div class="col-md-9">
            <h5 class="ml-4 py-3">
                <b>{{$accomplishmentsecondsection->heading}}</b>
            </h5>

            <p>
                {{$accomplishmentsecondsection->paragraph}}
            </p>

              <br>
                <span style="color:#fe730c !important">
                    <strong>

                        <i class="fas fa-calendar-alt"></i> &nbsp;
                        
                        {{$accomplishmentsecondsection->dates}}
                    </strong>
                </span>
            </p>
        </div>
        <!--end of column two-->

        <!--column one-->
        <div class="col-md-3">
            <img src="{{asset('images/' .$accomplishmentsecondsection->image)}}" class="img-fluid img-thumbnail float-left" alt="">
        </div>
        <!--end of column one-->
        @endif
    </div>
</section>
<!--end of achievement two-->
@endsection