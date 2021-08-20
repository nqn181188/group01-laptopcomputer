@extends('shop.layout.layout1')
@section('contents')


    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Contact us</span></li>
            </ul>
        </div>
    </div>
    
     
           

              

            <div class="our-team-info">
                <h4 class="title-box">Our teams</h4>
                <div class="our-staff">
                    <div 
                        class="slide-carousel owl-carousel style-nav-1 equal-container" 
                        data-items="3" 
                        data-loop="false" 
                        data-nav="true" 
                        data-dots="false"
                        data-margin="30"
                        data-responsive='{"480":{"items":"1"},"768":{"items":"2"},"992":{"items":"3"}}' >

                        <div class="team-member equal-elem">
                            <div class="media">
                                <a href="#" title="Luu Thanh Sang">
                                    <figure><img src="{{asset('images/avatar/avatar.png')}}" alt="Luu-Thanh-Sang"></figure>
                                </a>
                            </div>
                            <div class="info">
                                <b class="name">Luu Thanh Sang</b>
                                <span class="title">Leader</span>
                                <p class="desc">Designer+Coder</p>
                            </div>
                        </div>

                        <div class="team-member equal-elem">
                            <div class="media">
                                <a href="#" title="Nguyen Quang Nguyen">
                                    <figure><img src="{{asset('images/avatar/avatar.png')}}" alt="Nguyen Quang Nguyen"></figure>
                                </a>
                            </div>
                            <div class="info">
                                <b class="name">Nguyen Quang Nguyen</b>
                                <span class="title">Member</span>
                                <p class="desc">Designer+Coder</p>
                            </div>
                        </div>

                        <div class="team-member equal-elem">
                            <div class="media">
                                <a href="#" title="Luu Huy Hoang">
                                    <figure><img src="{{asset('images/avatar/avatar.png')}}" alt="Luu Huy Hoang"></figure>
                                </a>
                            </div>
                            <div class="info">
                                <b class="name">Luu Huy Hoang</b>
                                <span class="title">Member</span>
                                <p class="desc">Coder</p>
                            </div>
                        </div>
                        
                    </div>

                </div>

            </div>
        <!-- </div> -->
        

    </div><!--end container-->


@endsection