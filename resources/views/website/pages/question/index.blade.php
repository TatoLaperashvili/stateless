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
       @if(isset($breadcrumbs))
       <div class="brc">
           <div class="container">

               <div class="brc-link">
                   <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                   @if(isset($model->parent))
                <div class="line-brc"></div>
                <a href="/{{$model->parent->getfullslug()}}">{{ Str::limit($model->parent[app()->getlocale()]->title , 50, $end='...') }}  </a>
                @endif
                   @foreach ($breadcrumbs as $breadcrumb)
                   <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
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
                   <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
                </div>
                
                <div class="question-boxes">
               <div class="question-item">
                
                @php
                $numbers = 0;
                @endphp
                      <ol class="question-ol">
                        
                        @if(isset($question_posts))
                        @foreach ( $question_posts as  $question)

                        

                       <li class="question-li" data-index="{{ ++$numbers }}">
                            
                            <div class="question">
                                <div class="quest-t">
                                    <a href="#">{{$question->translate(app()->getlocale())->question}}</a>
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z" fill="black"/>
                                        </svg>
                                    </span>
                                </div>
                                <div class="result">
                                 {!! $question->translate(app()->getlocale())->answer !!}
                                </div>
                            </div>  
                          
                       </li>
                       @endforeach
                           
                       @endif
                   </ol>
                  
               </div>
                </div>
                
              @if(count($question_posts ) > 10)
               <div class="see-all-box">
                   <a href="#" class="see-all see-all-01-2">{{ trans('website.See_All') }} </a>
               </div>
               @endif
             
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
               <a href="{{ $midlle->translate(app()->getlocale())->redirect_link }}" target="_blank" class="details-link">{{ trans('website.in_details') }}</a>
           </div>
       </div>
       @endforeach
    </section>


</main>

@endsection