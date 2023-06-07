@extends('website.master')
@section('main')
     
<main>
    <section>
       <div class="banner-3">
           <div class="container full-width-cont">
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
       </div>
    </section>
   
    <section>
        @if(isset($breadcrumbs))
        <div class="brc">
            <div class="container">

                <div class="brc-link">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    <div class="line-brc"></div>
                    @foreach ($breadcrumbs as $breadcrumb)
                    <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
                    @endforeach
                </div>

            </div>
        </div>
        @endif
   </section>
  

<section>
   
<div class="services-det-02 padding-b">
   <div class="container">
       <div class="important-title">
          <h1>{{ $model->translate(app()->getLocale())->title }}</h1>
       </div>
       <div class="det-02-box">
        @if(isset($organizations_posts))
        @foreach($organizations_posts as $post)
       
           <div class="ser-item-01">
               <ul class="posit-relative">
               
                   <li>
                        <div class="service-column-box001">
                           <div class="top-links-box top-links-box2">
                               <a href="/{{ $post->getFullSlug()  }}" class="t-li-a t-li-a-01 ">{{ $post->translate(app()->getLocale())->title }}</a>
                           </div>
                           <a href="#">
                            @if(isset($post->thumb))
                               <img src="{{  image($post->thumb)  }}" alt="Logo" class="company-logo comp-logo2">
                               @else
                               <img src="website/assets/img/logo.svg" alt="Logo" class="company-logo">
                               @endif
                           </a>
                           
                        </div>
                        <div class="det-bb001">
                            <ul class="posit-relative">
                               <li>
                                   <a href="#" class="h-links-2111">
                                       <div class="hidden-icon111">
                                         <img src="/website/assets/img/i1.png" alt="png">
                                       </div>
                                       <span>
                                        {!! $post->translate(app()->getlocale())->desc !!}
                                       </span>
                                     </a>
                               </li>
                               <li>
                                   <a href="#" class="h-links-2111">
                                       <div class="hidden-icon111">
                                         <img src="/website/assets/img/i2.png" alt="png">
                                       </div>
                                       <span>
                                        {{ $post->mobile }}
                                       </span>
                                     </a>
                               </li>
                               <li>
                                   <a href="#" class="h-links-2111">
                                       <div class="hidden-icon111">
                                         <img src="/website/assets/img/i3.png" alt="png">
                                       </div>
                                       <span>
                                        {{ $post->email }}
                                       </span>
                                     </a>
                               </li>
                               <li>
                                   <a href="#" class="h-links-2111">
                                       <div class="hidden-icon111">
                                         <img src="/website/assets/img/i4.png" alt="png">
                                       </div>
                                       <span>
                                        {{ $post->website }}
                                       </span>
                                     </a>
                               </li>
                            </ul>
                        </div>
                   </li> 
                   
               </ul>
               <img src="/website/assets/img/lines2.png" alt="line" class="lines2">
               <img src="/website/assets/img/lines2.png" alt="line" class="lines3">
           </div>
           @endforeach
           @endif
         
       </div>
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
            <h2> {{ $midlle->translate(app()->getlocale())->title }}</h2>
            <a href="{!! settings('Get_free_legal_help') !!}" class="details-link">{{ trans('admin.in_details') }}</a>
        </div>
    </div>
    @endforeach
</section>


</main>
@endsection