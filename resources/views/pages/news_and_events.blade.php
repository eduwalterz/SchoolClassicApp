@extends('layouts.frontend')
@section('content')


<!--banner section-->
<section class="bannerSection bannerPageSection" style="backgroung-image:url('{{asset('images/links.png')}}')">
    <div class="innerBannerPageSection">
        <div class="bannerContent">
            <h2><strong>News And Events</strong></h2>
            <h6><strong>Home/News And Events</strong></h6>
        </div>
    </div>
</section>
<!--end of banner section-->

<!--news and events section-->
<section class="newsSection bg-light">
    
    <center>
    @if(!empty($newsandevents1))
    <h2 class="text-center">{{$newsandevents1->main_heading}}</h2>
    @endif
    <div class="border"></div>

    <div class="row newsSectionRow">
    @if(!empty($newsandevents))
        @foreach($newsandevents as $newsandevents)
        <!--first column-->
        <div class="col-md-4">
            <div class="card newsCard">
                <div class="card-header">
                    <img src="{{asset('images/'.$newsandevents->image)}}" alt="">
                </div>
                <div class="card-body">
                    <span id="newsDate">{{$newsandevents->dates}}</span>
                    

                    <hr>

                    <h5>
                        <strong>{{$newsandevents->sub_heading}}</strong>
                    </h5>

                    <p>
                    {{$newsandevents->paragraph}}
                    </p>
                </div>
            </div>
        </div>
        <!--end of first column-->

      @endforeach
    </div>
    </center>
    @endif
</section>
<!--end of news and events section-->
@endsection