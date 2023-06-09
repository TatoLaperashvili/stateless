@extends('website.master')

@section('main')


    
<main>
    <section>
       <div class="banner-3">
           <div class="container full-width-cont">
               <div class="banner-img">
                   <img src="{{ image($model->cover) }}" alt="banner">
               </div>
           </div>
       </div>
       @if(isset($breadcrumbs))
       <div class="brc">
        <div class="container">

            <div class="brc-link">
                <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                @if(isset($model->parent))
                <div class="line-brc"></div>
               
                <a href="/{{$model->parent->getfullslug()}}">{{ Str::limit($model->parent[app()->getlocale()]->title , 50, $end='...') }}  </a>
                @endif
                <div class="line-brc"></div>
                @foreach ($breadcrumbs as $breadcrumb)
                <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ Str::limit($breadcrumb['name'] , 30 ,$end='...') }}</a>
                @endforeach
            </div>

        </div>
       </div>
       @endif
   </section>

   <section>
       <div class="news-section padding-b service-page-section question-page-section">
           <div class="container">
                <div class="important-title">
                   <h1>     {{ $model->translate(app()->getlocale())->title }}</h1>
                </div>
                @if(isset($video))
               <div class="video-gallery">
                @if(isset($video_posts) && (count($video_posts) > 0))

                @foreach($video_posts as $video)
                   <div class="video-item">
                       <div class="video-img-side">
                            <div class="vide-img">
                               <a href="{{$video->translate(app()->getlocale())->youtube}}" data-fancybox="video-gallery">
                                   <img src="{{ image($video->thumb) }}" alt="video">
                               </a>
                               <span>
                                   <svg width="75" height="54" viewBox="0 0 75 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M37.2588 53.3818C37.2008 53.3818 31.3591 53.3816 24.8901 53.1816C18.9111 52.9956 11.1461 52.5979 8.10205 51.7539C6.51648 51.304 5.07633 50.4472 3.92432 49.2686C2.77231 48.0899 1.94863 46.6306 1.53516 45.0352C0.0181563 39.1992 0 26.8232 0 26.6982C0 26.5732 0.0181563 14.2594 1.53516 8.35938C1.96469 6.74601 2.80186 5.27019 3.9668 4.07422C5.10058 2.89085 6.52739 2.02837 8.10205 1.57422C11.1141 0.763219 18.8812 0.380195 24.8672 0.200195C31.3452 0.00719531 37.1998 0 37.2588 0C37.3178 0 43.1749 0.00019531 49.6499 0.200195C55.6339 0.387195 63.3991 0.784883 66.4141 1.62988C67.9996 2.07948 69.4398 2.93574 70.5918 4.11426C71.7438 5.29278 72.5675 6.75231 72.981 8.34766C74.563 14.2637 74.5171 26.625 74.5161 26.748C74.5151 26.871 74.498 39.1879 72.981 45.0859C72.568 46.6815 71.7444 48.1407 70.5923 49.3193C69.4402 50.4979 67.9998 51.3546 66.4141 51.8037C63.4021 52.6157 55.6349 53.0037 49.6499 53.1787C43.1719 53.3797 37.3168 53.3818 37.2588 53.3818ZM29.833 15.2646V38.124L49.2271 26.6943L29.833 15.2637V15.2646Z" fill="white"/>
                                   </svg>
                               </span>
                               <div class="time-03">
                                {{ getDates($video->date) }}
                               </div>
                            </div>
                       </div>
                       <a href="/{{$video->getFullSlug()  }}" class="link-text-03">
                           <h2>
                            {{ $video->translate(app()->getlocale())->title }}
                           </h2>
                           <div class="text">
                            {!! $video->translate(app()->getlocale())->text !!}
                           </div>
                       </a>
                        
                   </div>
                   @endforeach
                   @endif
               </div>
               @endif
              @if(count($video_posts) > 4)
               <div class="see-all-box">
                   <a href="/{{ $video->getFullSlug() }}" class="see-all load_more">{{trans('website.drop_more')}} </a>
               </div>
              @endif
           </div>
       </div>
    </section>



    

    <section>
        @foreach ($midlleBanner as $midlle)
      
       <div class="banner-2 mg-b-1">
           <div class="b-img-box">
               <img src="{{ image($midlle->thumb) }}" alt="banner">
           </div>
            
           <div class="text-box">
               <h2>  {{ $midlle->translate(app()->getlocale())->title }}</h2>
               <a href="{!! settings('Get_free_legal_help') !!}" class="details-link">{{ trans('website.in_details') }}</a>
           </div>
       </div>
       @endforeach
    </section>


</main>






<style>
   
    .video-item{ display:none; }
    </style>

@endsection

