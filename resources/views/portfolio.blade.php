@extends('layouts.front')


@section('title') {{$portfoliosettings->meta_title}} @endsection
@section('meta') {{$portfoliosettings->meta_description}} @endsection


@section('content')
  
  
   <div class="banner-section" data-background-image-url="{{$portfoliosettings->banner_img ? $portfoliosettings->banner_img : '/public/img/200x200.png'}}">

        <div class="container">
            <h1 class="banner-title">{!!$portfoliosettings->banner_title!!}</h1>
            <p class="banner-desc">{!!$portfoliosettings->banner_desc!!}</p>
        </div>

        <div class="header-social-share">
            {!!$headerfooter->social_links!!}
        </div>

        <a href="#" class="hero__scroll"><svg width="15" height="22.1"><use xlink:href="#scroll"></use></svg></a>
       
   </div>

   <div class="portfolio-section-page light-section">
       <div class="projects-page-row">

                      @php $count = 1; @endphp  
                      @foreach($projects as $project)
        

                        <div class="project-row @php if($count % 2 == 0){ echo 'project-row-right'; } @endphp">
                            <div class="project_index">0.@php echo $count; @endphp  </div>
                            <div class="project__img">
                              <img class="img-fluid thumparallax-down" width="900" height="938" src="{{$project->image_featured2}}">                
                            </div>
                            <div class="container">
                                <div class="info-row__info">
                                    <span class="case_tt">{{$project->project_category->name}}</span>
                                    <h2 class="info-row__title"><a href="{{URL::to('/')}}/project/{{$project->slug}}">{{$project->title}}</a></h2>
                                    <div class="project-desc">
                                        {!!$project->excerpt!!}
                                    </div>
                                    <div class="project-button">
                                        <a href="{{URL::to('/')}}/project/{{$project->slug}}" title="{{$project->title}}"><span>{{clean( trans('niva-backend.view_project') , array('Attr.EnableID' => true))}}</span><svg viewBox="0 0 80 80"><polyline points="19.89 15.25 64.03 15.25 64.03 59.33"></polyline><line x1="64.03" y1="15.25" x2="14.03" y2="65.18"></line></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        @php $count++; @endphp  
                        @endforeach

       </div>
   </div>

 

@endsection





