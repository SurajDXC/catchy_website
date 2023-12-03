@extends('layouts.front')


@section('title') {{$pricingsetting->meta_title}} @endsection
@section('meta') {{$pricingsetting->meta_description}} @endsection

@section('content')
  
  


   <div class="banner-section" data-background-image-url="{{$pricingsetting->banner_img ? $pricingsetting->banner_img : '/public/img/200x200.png'}}">

        <div class="container">
            <h1 class="banner-title">{!!$pricingsetting->banner_title!!}</h1>
            <p class="banner-desc">{!!$pricingsetting->banner_desc!!}</p>
        </div>

        <div class="header-social-share">
            {!!$headerfooter->social_links!!}
        </div>

        <a href="#" class="hero__scroll"><svg width="15" height="22.1"><use xlink:href="#scroll"></use></svg></a>
       
   </div>

   	<div class="pricing-elements">

   		<div class="container">

   			<h2>{!!$pricingsetting->title!!}</h2>
   			<p>{{$pricingsetting->description}}</p>

	   		<div class="row">

	   			@foreach($pricings as $pricing)
	   			<div class="col-md-4">
	   				<div class="venor-price-box @if($pricing->pricing_switch == 1) premium-pricing @endif">
	   					@if($pricing->pricing_switch == 1) <div class="plan-ribbon-wrapper"><div class="plan-ribbon">{{$pricing->popular_text}}</div></div> @endif
					    {!!$pricing->title!!}
					    <div class="plan-features">
					        {!!$pricing->description!!}
					    </div>
					    <div class="project-button">
							<a href="{{$pricing->button_link}}" title="Web Design"><span>{{$pricing->button_text}}</span><svg viewBox="0 0 80 80"><polyline points="19.89 15.25 64.03 15.25 64.03 59.33"></polyline><line x1="64.03" y1="15.25" x2="14.03" y2="65.18"></line></svg></a>
						</div>
					</div>
	   			</div>
	   			@endforeach

	   		</div>
	    </div>
   	</div>
    




@endsection

