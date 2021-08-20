@extends('shop.layout.layout1')
@section('contents')


    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">Home</a></li>
                <li class="item-link"><a href="{{route('contact.index')}}" class="link">Contact Us</a></li>
            </ul>
        </div>
        <div class="row">
            <div class=" main-content-area">
                <div class="wrap-contacts ">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="contact-box contact-form">
                            <h2 class="box-title">Leave a Message</h2>
                            <h4 class="form-subtitle"><span style="color: red">*</span> Require fillable</h4>
                            @if (Session::has('success_message'))
                            
                            <h1><span style="color:green">Successfully sent</span></h1>   
                            @endif
                            <form action="{{route('contact.store')}}" method="Post" name="frm-contact">
                                @csrf
                                <label for="firstname">Firstname<span>*</span></label>
                                <input type="text" value="" id="firstname" name="firstname" required>

                                <label for="lastname">Lastname<span>*</span></label>
                                <input type="text" value="" id="lastname" name="lastname" required>

                                <label for="email">Email<span>*</span></label>
                                <input type="text" value="" id="email" name="email" required>

                                <label for="phone">Number Phone</label>
                                <input type="text" value="" id="phone" name="phone" >

                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment"></textarea>

                                <input type="submit" name="ok" value="Submit" >
                                
                            </form>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="contact-box contact-info">
                            <div class="wrap-map">
                                <div class="mercado-google-maps"
                                     id="az-google-maps57341d9e51968"
                                     data-hue=""
                                     data-lightness="1"
                                     data-map-style="2"
                                     data-saturation="-100"
                                     data-modify-coloring="false"
                                     data-title_maps="Kute themes"
                                     data-phone="088-465 9965 02"
                                     data-email="kutethemes@gmail.com"
                                     data-address="Z115 TP. Thai Nguyen"
                                     data-longitude="-0.120850"
                                     data-latitude="51.508742"
                                     data-pin-icon=""
                                     data-zoom="16"
                                     data-map-type="ROADMAP"
                                     data-map-height="263">
                                </div>
                            </div>
                            <h2 class="box-title">Contact Detail</h2>
                            <div class="wrap-icon-box">

                                <div class="icon-box-item">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Email</b>
                                        <p>LaptopComputer@gmail.com</p>
                                    </div>
                                </div>

                                <div class="icon-box-item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Phone</b>
                                        <p>0123-465-789-111</p>
                                    </div>
                                </div>

                                <div class="icon-box-item">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Mail Office</b>
                                        <p>Sed ut perspiciatis unde omnis<br />Street Name, Los Angeles</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

        </div><!--end row-->

    </div><!--end container-->


@endsection

@section('my-scripts')
@if (Session::has('success_message'))
<script>
    swal("Thank you for your feedback!","{!! Session::get('success_message') !!}", "success",{
        button: "OK"
    });
</script>
@endif
@endsection