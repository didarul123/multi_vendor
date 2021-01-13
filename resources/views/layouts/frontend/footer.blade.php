<?php
        $pages = App\Models\Page::where('status', 1)->get();

?>




  

    <!-- footer area-->
    <footer class="footer-area">
        <!-- footer top start-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="" class="logo-footer">
                            <img src="{{asset('public/frontend/assets/images/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-9">
                       <div class="widget widget-newsletter form-wrapper d-flex form-wrapper-inline">
                          <div class="newsletter-info ">
                            <h4 class="widget-title">Subscribe to our Newsletter</h4>
                            <p>Get all the latest information on Events, Sales and Offers.</p>
                          </div>
                          <form action="{{route('subscription')}}" class="input-wrapper input-wrapper-inline d-flex" method="post">
                            @csrf
                            <input type="email" class="form-control" name="email" id="newsletter_email" placeholder="Email address here..." required="">
                            <button class="btn btn-grey btn-md ml-2" type="submit">subscribe<i class="fa fa-arrow-right"></i></button>
                          </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of footer top-->


        <!-- start of footer middle-->
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="widget">
                            <h4 class="widget-title">Location</h4>
                            <ul class="widget-body">
                                <li>                                         
                                    <label>Phone:</label>
                                    <a href="#">Toll Free (123) 456-7890</a>
                                </li>
                                <li>
                                    <label>Email:</label>
                                    <a href="#">mail@gmail.com</a>
                                </li>
                                <li>
                                    <label>Address:</label>
                                    <a href="#">Hatirpul</a>
                                </li>
                                <li>
                                    <label>WORKING DAYS/HOURS:</label>
                                </li>
                                <li>
                                    <a href="#">Mon - Sun / 9:00 AM - 8:00 PM</a>
                                </li>
                            </ul>                                
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget ml-lg-4">
                            <h4 class="widget-title">My Account</h4>
                            <ul class="widget-body">
                                <li>                                         
                                    <a href="#">Profile</a>
                                </li>
                                <li>
                                    <a href="#">Order History</a>
                                </li>
                                <li>
                                    <a href="#">Returns</a>
                                </li>
                                <li>
                                    <a href="#">Custom Service</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Condition</a>
                                </li>
                            </ul>                                
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget ml-lg-4">
                            <h4 class="widget-title">Quick Links</h4>
                            <ul class="widget-body">
                                @foreach($pages as $page)
                                <li>                                         
                                    <a href="{{route('page-description', [$page->slug])}}">{{$page->title}}</a>
                                </li>
                                @endforeach
                            </ul>                                
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget widget-instagram">
                            <h4 class="widget-title">Instagram</h4>
                            <figure class="widget-body row">
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/01.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/02.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/03.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/04.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/05.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/06.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/07.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/assets/images/instagram/08.jpg')}}" alt="instagram 1" width="64" height="64">
                                </div>
                            </figure>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="container">
                <div class="bordr-bottom"></div>
                <div class="footer-content d-flex">
                    <div class="footer-left">
                        <p>
                           Navieasoft eCommerce © 2020. All Rights Reserved                            
                        </p>
                    </div>
                    <div class="footer-right">
                        <ul>
                            <li><a href=""><i class="fab fa-facebook"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>