<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @php $setting = App\Models\Setting::find($currentLang->id); @endphp
    <!-- Page Title -->
    <title>@yield('title')</title>
    @if($setting->loader_status == 1) 
        <script type="text/javascript">
            window.paceOptions = { ajax: false, restartOnRequestAfter: false, restartOnPushState: false};
        </script>
    @endif
    <!-- Meta Data -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('meta')">
    <link rel="canonical" href="{{url()->current()}}">
    <meta name="keywords" content="{{$setting->keywords}}" />
    <meta name="publisher" content="{{url()->current()}}">
    <meta name="copyright" content="Copyright (c) {{$setting->title}}" />
    <meta name="author" content="{{$setting->author}}" />
    <meta name="contact" content="{{$setting->contact}}" />

    <meta name="revisit-after" content="7 Days" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="subjects" content="{{$setting->title}}" />
    <meta name="classification" content="{{$setting->title}}" />

    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('meta')">
    <meta itemprop="image" content="{{route('home')}}{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}">
    
    @if($setting->OGgraph_switch == 1)

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{route('home')}}" />
    <meta property="og:image" content="{{route('home')}}{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}" />
    <meta property="og:site_name" content="{{$setting->author}}" />
    <meta property="og:description" content="@yield('meta')" />
    
    @endif

    @if($setting->analytics_switch == 1)

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$setting->analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{$setting->analytics}}');
    </script>
    
    @endif

    @if($setting->facebook_pixel_switch == 1)

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{$setting->facebook_pixel}}');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id={{$setting->facebook_pixel}}&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    
    @endif
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{$setting->favicon}}" type="image/x-icon">
    <link rel="icon" href="{{$setting->favicon}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    
    @if($currentLang->rtl == 1) 
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    @else 
        <link href="{{$setting->font}}" rel="stylesheet">
    @endif

    @if($setting->maintenance_status == 0) 

        @if($setting->loader_status == 1) 
            <script type='text/javascript' src="{{ asset('js/front/pace.min.js') }}" id='pace-js'></script>
            <script> setTimeout(function () {Pace.stop();},4500);</script>
        @endif

     @endif

        <!-- Styles -->
        <link href="{{ asset('css/front/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/libs/fontawesome.min.css')}}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/front/owl.carousel.min.css')}}" type="text/css" rel="stylesheet">
        <link href="{{ asset('css/front/venor.css') }}" type="text/css" rel="stylesheet">

     

        @yield('styles')

        @if($currentLang->rtl == 1) 
            <link href="{{ asset('css/front/rtl.css') }}" type="text/css" rel="stylesheet">
        @endif


        <!-- Inline Styles -->
        <style>
            body {
                @if($currentLang->rtl == 1) 
                    font-family: 'Cairo', sans-serif;
                @else 
                    font-family: 'Poppins', sans-serif;
                @endif
            }

            @if($setting->custom_css)
                {!! $setting->custom_css !!}
            @endif

            @if($setting->loader_status == 1) 
                .pace-cover {
                    background-image: url({!! $setting->loader_img !!});
                    background-color: {!! $setting->loader_color !!};
                }
            @endif


        </style>



    
    

</head>
<body class="common-front @if($currentLang->rtl == 1) rtl @endif" @if($currentLang->rtl == 1) dir="rtl" @endif>
    
    @if($setting->maintenance_status == 1) 

        <div class="maintenance_cls"><div class="maintenance_inner">{!!$setting->maintenance_text!!}</div></div>

    @endif

    @if($setting->maintenance_status == 0) 

    <!-- body -->

    @if($setting->loader_status == 1) 
    <div class="pace-cover"></div>
    @endif


    <header class="header">

        

        <div class="header__content__venor">
            <div class="header__logo">
                <a href="{{url('/')}}" title="{{$setting->title}}">
                    <img width="105" height="22" class="img-fluid logo-front" src="{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}" alt="logo">
                </a>
            </div>

            <div class="header__actions__venor">

                @if($headerfooter->sidebar_title2)
                <div class="header__action">
                    <a  class="header__action-btn header__action-btn--start-project" href="{{$headerfooter->sidebar_description2}}">
                        {{$headerfooter->sidebar_title2}} <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg>
                    </a>
                </div>
                @endif

                @if($headerfooter->sidebar_title)
                <div class="header__action">
                    <a  class="header__action-btn header__action-btn--start-project" href="{{$headerfooter->sidebar_description}}">
                        {{$headerfooter->sidebar_title}} <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg>
                    </a>
                </div>
                @endif


             
                
                <div class="header__lang">

                    @if (!empty($currentLang) && count($langs) > 1)
   
                        <ul class="header__lang-list" >
            
                            @foreach ($langs as $key => $lang)
                                
                            <li @if ($currentLang->code == $lang->code) class="active" @endif><a title="{{$lang->name}}"  href='{{ route('changeLanguage', $lang->code) }}'><span>{{$lang->code}}</span></a></li>
                            @endforeach
                        </ul>
                    @endif

                </div>

                
            </div>

            
        </div>
    </header>

    <div class="header-burger">
        <div class="burger">  <span></span> <span></span> <span></span> </div>
    </div>

    <div class="fixed-sidebar-menu-overlay" style="opacity: 0;"></div>

    <div class="fixed-sidebar-menu-holder header7">
        <div class="fixed-sidebar-menu">
            <div class="header7 sidebar-content">
                <div class="left-side">

                    <div class="left-side-inner">

                        <div class="flx-div">
                            <img src="/public/img/sidebar-img.svg" alt="sidebar-img.svg" >
                        </div>

                        <div class="header__menu__venor">
                            <ul class="header__nav">

                                @foreach( $menus->sortBy('order') as $prod )
                                   
                                    @if($prod->on_off_submenu == 1)
                                       <li class="header__nav-item dropdown">
                                            <a class="header__nav-link dropdown-toggle" href="{{$prod->link}}"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$prod->name}}
                                            </a>
                                            {!! $prod->submenu !!}
                                           
                                        </li>
                                    @else 
                                         <li class="header__nav-item"> <a title="{{$prod->name}}" class="header__nav-link" href="{{$prod->link}}">{{$prod->name}}</a> </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>

                        <div class="menu-description">
                            {!!$headerfooter->sidebar_menu_description!!}
                        </div>

                        <div class="header-social-share">
                            {!!$headerfooter->social_links!!}
                        </div>


                        <div class="address-sidebar">
                            <div><img width="16" height="16" src="/public/img/map-pin.svg" alt="map-pin.svg" > {!!$setting->address!!}</div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


    @yield('content')

    <div class="typed-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                        <h4 class="parent-typed-text">
                        <span class="mt_typed-beforetext">{{$headerfooter->typed_title}} </span>
                            <span class="mt_typed_text"></span>

                        </h4>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{$headerfooter->typed_buttonlink}}" target="_self" class="btn btn-style1"><span>{{$headerfooter->typed_buttontext}}</span><svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a>
                </div>
            </div>
        </div>
    </div>   


    <footer class="footer-section">
        <div class="footer-wrapper">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="footer-left">
                        <div class="inner">
                            <span>{{$headerfooter->footer_col1_subtitle}}</span>
                            <h4>{{$headerfooter->footer_col1_title}}</h4>
                            <a class="btn btn-style2" href="{{$headerfooter->footer_col1_buttonlink}}"> <span>{{$headerfooter->footer_col1_buttontext}}</span> <svg width="11.4" height="9.2"> <use xlink:href="#arrow"></use></svg></a> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-right">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="footer-widget">
                                    <div class="footer-widget widget_nav_menu">
                                        <h4 class="title">{{$headerfooter->footer_col2_title1}}</h4>
                                        <span class="venor-animate-border"></span>
                                        <div class="menu-quick-link-container">
                                            {!!$headerfooter->footer_col2_html1!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="footer-widget">
                                    <div class="widget widget_custom_html">
                                        <h4 class="title">{{$headerfooter->footer_col2_title2}}</h4>
                                        <span class="venor-animate-border"></span>
                                        <div class="custom-html-widget">
                                            {!!$headerfooter->footer_col2_html2!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="copyright-text">
                                    {!!$headerfooter->footer_copyright!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>
  




    @if($setting->SchmeaORG_switch == 1)

    <div class="hidden"  itemscope="" itemtype="https://schema.org/LocalBusiness">
        <span itemprop="description">@yield('meta')</span> 
        <a itemprop="url" href="{{route('home')}}"> </a>
        <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
        <img src="{{route('home')}}{{$setting->photo ? '/public/images/media/' . $setting->photo->file : '/public/img/200x200.png'}}" alt="logo" width="120" itemprop="url"></div>
        <span itemprop="name">{{$setting->title}}</span>
        <em><span itemprop="priceRange">{{$setting->price_range}}</span></em>
        <div itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress"> 
            <span itemprop="addressLocality">{{$setting->address}}</span> | 
            <span itemprop="addressCountry">{{$setting->country}}</span> | 
            <span itemprop="telephone">{{$setting->phone}}</span> | 
            <span itemprop="email">{{$setting->contact}}</span>
        </div>
    </div> 

    @endif


    @if($setting->whatsapp == 1)
    <a class="chat__trigger-quin logo-chat" href="https://wa.me/{{$setting->phone}}"  target="_blank" title="whatsapp">
        <svg class="chat" width="30.2" height="30.2"><use xlink:href="#chat"></use></svg>
    </a>
    @endif
    

    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/front/popper.min.js') }}"></script>
    <script src="{{ asset('js/front/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/front/simpleParallax.min.js') }}" defer></script>
    <script src="{{ asset('js/front/countTO.js') }}" defer></script>
    <script src="{{ asset('js/front/typed.min.js') }}" defer></script>
    <script src="{{ asset('js/front/shuffleLetters.js') }} " defer></script>
    <script src="{{ asset('js/front/magnific.min.js') }}" defer></script>
    <script src="{{ asset('js/front/scrollreveal.min.js') }}" defer></script>
    <script src="{{ asset('js/front/venor.js') }}" defer></script>

    <svg width="0" height="0" display="none" xmlns="http://www.w3.org/2000/svg">
        <symbol id="arrow" xmlns="http://www.w3.org/2000/svg" width="11.4" height="9.2"><path d="M11.3 4.1L8.1.2c-.3-.2-.7-.3-1 0-.3.2-.3.6-.1.9l2.3 2.8H.7c-.4 0-.7.3-.7.7 0 .4.3.7.7.7h8.6L7 8c-.2.3-.2.8.1 1 .3.2.7.2 1-.1L11.3 5c.2-.3.2-.6 0-.9z"/></symbol>
        <symbol id="chat" xmlns="http://www.w3.org/2000/svg" width="30.2" height="30.2" viewBox="0 0 30.2 30.2" style="enable-background:new 0 0 30.2 30.2"><path d="M15.1 29c-2.5 0-5-.7-7.2-2l-.2-.1-5.1 1.5c-.2.1-.4 0-.5-.1-.2-.1-.2-.3-.2-.5l1.5-5.1-.1-.2c-1.3-2.2-2-4.7-2-7.3 0-7.7 6.2-13.9 13.9-13.9S29 7.4 29 15.1C29 22.8 22.7 29 15.1 29zm0-29C6.8 0 0 6.8 0 15.1c0 2.7.7 5.3 2 7.6l.1.1-1.3 4.6c-.2.6 0 1.2.4 1.7.4.4 1.1.6 1.7.4l4.7-1.3.1.1c2.3 1.3 4.9 2 7.5 2 8.3 0 15.1-6.8 15.1-15.1S23.4 0 15.1 0z"/><path d="M7.7 18.1c-1.6 0-3-1.3-3-3 0-1.6 1.3-3 3-3 1.6 0 3 1.3 3 3s-1.4 3-3 3zm0-5c-1.1 0-2.1.9-2.1 2.1 0 1.1.9 2.1 2.1 2.1s2.1-.9 2.1-2.1c0-1.2-1-2.1-2.1-2.1zM14.8 18.1c-1.6 0-3-1.3-3-3 0-1.6 1.3-3 3-3 1.6 0 3 1.3 3 3s-1.3 3-3 3zm0-5c-1.1 0-2.1.9-2.1 2.1 0 1.1.9 2.1 2.1 2.1s2.1-.9 2.1-2.1c0-1.2-.9-2.1-2.1-2.1zM21.8 18.1c-1.6 0-3-1.3-3-3 0-1.6 1.3-3 3-3 1.6 0 3 1.3 3 3s-1.4 3-3 3zm0-5c-1.1 0-2.1.9-2.1 2.1 0 1.1.9 2.1 2.1 2.1 1.1 0 2.1-.9 2.1-2.1-.1-1.2-1-2.1-2.1-2.1z"/></symbol>
        <symbol id="scroll" xmlns="http://www.w3.org/2000/svg" width="15" height="22.1"><path class="st0" d="M7.5 16.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 9.8c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 6.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 3.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 0c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1C6.4.5 6.9 0 7.5 0zM7.5 19.8c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM4.2 16.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM10.6 16.5c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM7.5 13.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM1.9 13.5c.4.4.4 1.2 0 1.6-.4.4-1.2.4-1.6 0-.4-.4-.4-1.2 0-1.6.5-.4 1.2-.4 1.6 0M4.3 13.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1zM14.7 13.5c.4.4.4 1.2 0 1.6-.4.4-1.2.4-1.6 0-.4-.4-.4-1.2 0-1.6.4-.4 1.1-.4 1.6 0M10.7 13.2c.6 0 1.1.5 1.1 1.1 0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1z"/></symbol>

    </svg>


    @include('cookieConsent::index')



 

    <script type="text/javascript">
    ( function ( $ ) {
        'use strict';
        $( document ).ready( function () {
            /* TYPED TEXT */
            $(function(){
                $(".mt_typed_text").typed({
                  strings: {!! $headerfooter->typed_text !!}, //blade / php dynamic functionality
                  typeSpeed: 1,
                  backDelay: 4000,
                  loop: true
                });
            });
        })
    } ( jQuery ) )
    </script>

    @if($setting->custom_css)
        <script type="text/javascript">
            {!! $setting->custom_js !!} //blade / php dynamic functionality
        </script>
    @endif



    @yield('scripts')


    <!-- body -->

    @endif



</body>
</html>
