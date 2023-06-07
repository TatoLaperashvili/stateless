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
                
                <div class="publications-box ">
                    @if(isset($publication_posts) && (count($publication_posts) > 0))
                    @foreach($publication_posts as  $publication)
                    
                    @if(pathinfo($publication->translate(app()->getlocale())->file,PATHINFO_EXTENSION) == 'png')
                    <a @if(isset($publication->translate(app()->getlocale())->file)) href="/{{config('config.file_path').$publication->translate(app()->getlocale())->file }}" download @endif  target="_blank" class="publication-item">
                        @else
                        <a @if(isset($publication->translate(app()->getlocale())->file)) href="/{{config('config.file_path').$publication->translate(app()->getlocale())->file }}" @endif  target="_blank" class="publication-item">
                            @endif 
                    
                        <div class="pb-it-title">
                            <h4> {{ getDates($publication->date) }}</h4>
                        </div>
                        @if(isset($publication->thumb))
                        <div class="public-img">
                            <img src="{{ image($publication->thumb) }}" alt="p1">
                        </div>
                        @else
                        <div class="public-img">
                            
                            <img src="/website/assets/img/p01.png" alt="p1">
                            
                        </div>
                        @endif
                        <h3>{{ $publication->translate(app()->getlocale())->title }}
                        </h3>
                    </a>
                    @endforeach
                    @endif
                  
                </div>  
               
                @if(count($publication_posts) > 4)
                <div  class="see-all-box">
                    <a  class="see-all-01-2"> {{ trans('website.drop_more') }} </a>
                </div>
                @endif
            </div>
        </div>
    </section>




</main>

<!--end::Entry-->
@endsection
