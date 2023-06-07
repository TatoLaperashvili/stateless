@extends('website.master')

@section('main')

<main>
    <section>
        <div class="container">
            @if(isset($model->cover))
            <div class="banner-img">
                <img src="{{ image($model->cover) }}" alt="banner">
            </div>
            @else
            <div class="banner-img">
                <img src="/website/assets/img/banner8.png" alt="banner">
            </div>
            @endif
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
       <div class="news-section padding-b service-page-section">
           <div class="container">
                <div class="important-title">
                   <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
                </div>
               
              
                <div class="news-boxes loadNews">
                    @if(isset($news_posts) && (count($news_posts) > 0))
                    @foreach($news_posts as  $post)
                   
                   <a href="/{{ $post->getfullslug() }}" class="news-item n-item01">
                       <div class="news-left-info">
                           <div class="time">
                            {{ getDates($post->date) }}
                            
                           </div>
                           <div class="text">
                            {!! Str::limit($post->translate(app()->getlocale())->title, 150) !!}
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
                       @if(isset($post->thumb))
                       <div class="news-img">
                           <img src="{{ image($post->thumb) }}" alt="news">
                       </div>
                       @else
                       <div class="news-img">
                        <img src="/website/assets/img/news1.png" alt="news">
                    </div>
                       @endif
                   </a>
                   @endforeach
               @endif
               </div>
              @if(count($news_posts) > 4)
               <div class="see-all-box">
                   <a href="#" class="see-all">{{ trans('website.See_All') }} </a>
               </div>
               @endif
           </div>
       </div>
    </section>
</main>
<style>
    .loadMore{ list-style-type:none; }
    .loadMore a{ display:none; }
    </style>
 
@endsection


