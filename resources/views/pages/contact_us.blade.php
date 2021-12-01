@extends('layouts.frontend')
@section('content')

<!--banner section-->
<section class="bannerSection bannerPageSection" style="backgroung-image:url('{{asset('images/links.png')}}')">
    <div class="innerBannerPageSection">
        <div class="bannerContent">
            <h2><strong>Contact Us</strong></h2>
            <h6><strong>Home/Contact Us</strong></h6>
        </div>
    </div>
</section>
<!--end of banner section-->

<!--contact us section-->

<section class="contactSpot bg-white">
    <h2 class="text-center mt-5">
        <strong>Get In Touch</strong>
    </h2>
    
@if(session('success'))
<div class="alert alert-success" id="successMessage">
  {{session('success')}}
</div>
@endif


<script>
  /*$("#successMessage").fadeOut.hide(1000);*/
  setTimeout(
    function(){
    $("#successMessage").delay(3000).fadeOut('fast');
  },1000
    );
</script> 


    <div class="row contactSpotRow">
        <!--first column-->
        <div class="col-md-8">
            <div class="card formItem">
                <div class="card-body text-left">
                    <form method="POST" action="{{route('pages.addContact_Us')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!--column one-->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control inputfields @error ('name') is-invalid @enderror" placeholder="Names" name="name">
                                </div>
                            </div>
                            <!--end of column one-->

                            <!--column two-->
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control inputfields @error ('email') is-invalid @enderror" placeholder="Email" name="email">
                                </div>
                            </div>
                            <!--end of column two-->

                            <!--column three-->
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-pencil-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control inputfields" placeholder="Subject" name="subject">
                                </div>
                            </div>
                            <!--end of column three-->

                            <!--column four-->
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-pen-square"></i>
                                        </span>
                                    </div>
                                    <textarea class="form-control inputfields @error ('meassage') is-invalid @enderror" row="4" placeholder="Message" name="message">

                                    </textarea>
                                    
                                </div>
                            </div>
                            <!--end of column four-->

                        </div>

                        <button type="submit" class="btn btn-default btn-lg form-btn">
                            <i class="fa fa-paper-plane"></i> &nbsp; Send
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <!--end of first column-->


        <!-- second column-->
        <div class="col-md-4">
            <div class="card bg-light contactItem">
                <h4 class="text-left">
                    <strong> &nbsp; &nbsp; Contact Details</Details></strong>
                </h4>
                <hr>

                <!--first row-->
                <div class="row">
                    <div class="col-md-4">
                    &nbsp;  
                        <i class="fas fa-home fa-2x mt-2"></i>
                    </div>
                    <div class="col-md-8">
                        <p>
                            Rosslyn, Lavington
                            <br>
                            <small>Address 23232222</small>
                        </p>
                    </div>
                </div>

                <!--end of first row-->

                <!--second row-->

                <div class="row">
                    <!--column one-->
                    <div class="col-md-4">
                    &nbsp;  &nbsp;
                        <i class="fas fa-mobile-alt fa-2x mt-2"></i>
                    </div>
                    <!--end of column one-->

                    <!--column two-->
                    <div class="col-md-8">
                        <p>
                            +256 797 111 222
                            <br>
                            <small>Monday to Friday 8:00am-6:00pm</small>
                        </p>

                    </div>
                    <!--end of column two-->
                </div>
                <!--end of second row-->

                <!--third row-->
                <div class="row">
                    <!--first column-->
                    <div class="col-md-4">
                    &nbsp;  
                        <i class="fas fa-envelope fa-2x mt-2"></i>
                    </div>
                    <div class="col-md-8">
                        <p>
                            support@yahoo.com
                            <br>
                            <small>Always there to help</small>

                        </p>
                    </div>
                    <!--end of first column-->
                </div>

                <!--end of third row-->
            </div>
        </div>
        <!--end of second column-->
    </div>
</section>
<!--end of contact us section-->

@endsection