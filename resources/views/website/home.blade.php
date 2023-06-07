@extends('website.master')

@section('main')
 
<main>
    <section>
       <div class="container full-width-cont">
           <div class="banner">
                <div class="banner-in">
                   <div class="banner-slider">
                    @isset($mainBanner)
                    
                    @foreach ($mainBanner as $banner)
                    
                       <a @if(isset($banner->translate(app()->getlocale())->redirect_link ))  href="{{$banner->translate(app()->getlocale())->redirect_link }}  @endif"  class="slider-item">
                        @if(isset($banner->thumb))
                           <div class="slider-img">
                               <img src="{{ image($banner->thumb) }}" alt="banner">
                           </div>
                           @else
                           <div class="slider-img">
                            <img src="/website/assets/img/banner.webp" alt="banner">
                        </div>
                        @endif
                           <div class="slider-text">
                               <h2>{{ $banner->translate(app()->getlocale())->title }}</h2>
                               <div class="text">
                                {{ Str::limit($banner->translate(app()->getlocale())->desc , 70, $end='...') }}
                                
                               </div>
                           </div>
                       </a>
                       @endforeach
                       @else
                       <div class="slider-img">
                        <img src="/website/assets/img/banner.webp" alt="banner">
                    </div>
                       @endisset
                   </div>
                </div>
                
           </div>
       </div>
    </section>

  
    <section>
       <div class="cit-container padding-b pp">
           <div class="container">
      
          
               <div class="row">
               
                   <div class="col-xxl-3 col-lg-3 col-md-12 col-12">
                       <div class="cit-title-box">
                       
                           <h1>
                             {{ trans('website.first_banner') }}
                          
                           </h1>
                        
                           <a href="{!! settings('See_All_First')  !!}" class="see-all hide-link"> {{ trans('website.See_All') }} </a>
                       </div>
                   </div>
                   
            
                 
                   <div class="col-xxl-9 col-lg-9 col-md-12 col-12 cit-r-box">
                        <div class="row row-slider">
                         
                            @foreach($citizen_banner as $post)
                            
                           <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-6 col-12 p-l">
                              
                              <a  @if(isset($post->translate(app()->getlocale())->redirect_link )) href=" {{ $post->translate(app()->getlocale())->redirect_link }}"  @endif class="cit-item">
                                @if(isset($post->icon))
                                   <div class="img-svg">
                                       <img src="/{{ config('config.icon_path') . $post->icon }}" alt="svg">
                                      
                                   </div>
                                   @else
                                   <div class="img-svg">
                                    <img src="/website/assets/img/logo.svg" alt="svg">
                                   
                                </div>
                                @endif
                                   <div class="line-img">
                                 
                                       <img src="website/assets/img/Mask group.png" alt="">
                                   
                                   </div>
                                   <h1>
                                    {{ $post->translate(app()->getlocale())->title }}
                                   </h1>
                               </a>
                           </div>
                           @endforeach
                         
                        </div>
                        <div class="hide-link3">
                            <a href="{!! settings('See_All_First')  !!}" class="see-all see-all2"> {{ trans('website.See_All') }}</a>
                        </div>
                       
                   </div>
                  
                   
               </div>
              
           </div>
       </div>
    </section>
 
    <section>
        @foreach ($midlleBanner as $midlle)
      
       <div class="banner-2">
        @isset($midlle->thumb)
           <div class="b-img-box">
               <img src="{{ image($midlle->thumb) }}" alt="banner">
           </div>
           @else
           <div class="b-img-box">
            <img src="/website/assets/img/sm-banner.png" alt="banner">
        </div>
        @endisset
            
           <div class="text-box">
               <h2>  {{ $midlle->translate(app()->getlocale())->title }}</h2>
               <a href="{{ $midlle->translate(app()->getlocale())->redirect_link }}" class="details-link">{{ trans('website.in_details') }}</a>
           </div>
       </div>
       @endforeach
    </section>
   
    <section>
       <div class="cit-container padding">
           <div class="container">
               <div class="row">
                   <div class="col-xxl-3 col-lg-3 col-md-12 col-12">
                       <div class="cit-title-box">
                  
                           <h1>
                             {{ trans('website.Second_Banner') }}
                           </h1>
                      
                           <a href="{!! settings('See_All_Second')  !!}" class="see-all hide-link"> {{ trans('website.See_All') }} </a>
                       </div>
                   </div>
                  
                   <div class="col-xxl-9 col-lg-9 col-md-12 col-12 cit-r-box">
                         <div class="service-box">
                            @isset($state_banner) 
                            @foreach($state_banner as $post)
                               <div class="service-item">
                                    <a  @isset($post->translate(app()->getlocale())->redirect_link ) href=" {{ $post->translate(app()->getlocale())->redirect_link }}" @endisset class="circle">
                                        <div class="circle-2">
                                            @isset($post->icon)
                                            <span class="img-svg height-svg">
                                                <img src="/{{ config('config.icon_path') . $post->icon }}" alt="svg">
                                            
                                            </span>
                                            @else
                                            <span class="img-svg height-svg">
                                                <img src="/website/assets/img/s1.svg" alt="svg">
                                            
                                            </span>
                                            @endisset
                                        </div>
                                    </a>
                                   <a class="service-a"  @isset($post->translate(app()->getlocale())->redirect_link ) href=" {{ $post->translate(app()->getlocale())->redirect_link }}"   @endisset>
                                    {{ $post->translate(app()->getlocale())->title }}
                                   </a>
                               </div>
                            
                               @endforeach
                               @endisset
                          
                         </div>
                   </div>
               </div>
           </div>
       </div>
    </section>
    
 
        
   
    <section>
       <div class="news-section padding news-slide-r">
           <div class="container">
          
               <div class="news-title">
                   <h2>{{ trans('website.News_Title') }}</h2>

                   <a href="/{{ $news->getFullSlug() }}"  class="see-all hide-link4">{{ trans('website.See_All') }} </a>
               </div>
             
               <div class="news-boxes news-slider-box">
                @if(isset($news_posts) && (count($news_posts) > 0))
              
                            @foreach($news_posts as $posts)
                         
                   <a href="/{{ $posts->getFullSlug() }}" class="news-item">
                       <div class="news-left-info">
                           <div class="time">
                            {{ getDates($posts->date) }}
                           </div>
                           <div class="text">
                            {{ $posts->translate(app()->getlocale())->title }}
                           </div>
                           <div  class="see-all-link">
                               {{ trans('website.Read_More') }} 
                               <span>
                                   <svg width="20" height="13" viewBox="0 0 20 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M14.3817 13L20 6.5L14.3817 -3.09134e-07L13.4374 1.09254L17.4437 5.72753L-1.98891e-07 5.72753L-2.52544e-07 7.27257L17.4436 7.27257L13.4374 11.9075L14.3817 13Z" fill="black"/>
                                   </svg>
                               </span>
                           </div>
                       </div>
                       <div class="news-img">
                           <img src="{{ image($posts->thumb) }}" alt="news">
                       </div>
                   </a>
                   
                   @endforeach
                   @endif
                 
               </div>
               <div class="hide-link3">
                        <a href="/{{ $news->getFullSlug() }}" class="see-all see-all2"> {{ trans('website.See_All') }} </a>
                </div>
           </div>
       </div>
    </section>
  
</main>


@endsection
