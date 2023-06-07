@extends('website.master')
@section('main')
<main>
    
    <section>
        @if(isset($breadcrumbs))
       <div class="brc brc2">
           <div class="container">
                <div class="brc-link">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                   <div class="line-brc"></div>
                   <span>ძიება</span>
                </div>
           </div>
       </div>
       @endif
   </section>
  
   <section>
   
       <div class="search padding-b mt-search01">
           <div class="container">
                <div class="search-form-box">
                   <form action="">
                       <input type="text" class="form-controller" id="search" name="que"
                    value="@if(isset($searchText)) {{$searchText}} @endif">
                    <a href="">
                        <button>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L16.2779 16.2695L21 21ZM18.8947 9.94737C18.8947 12.3204 17.9521 14.5962 16.2741 16.2741C14.5962 17.9521 12.3204 18.8947 9.94737 18.8947C7.57438 18.8947 5.29858 17.9521 3.62062 16.2741C1.94267 14.5962 1 12.3204 1 9.94737C1 7.57438 1.94267 5.29858 3.62062 3.62062C5.29858 1.94267 7.57438 1 9.94737 1C12.3204 1 14.5962 1.94267 16.2741 3.62062C17.9521 5.29858 18.8947 7.57438 18.8947 9.94737V9.94737Z" stroke="#FF6138" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </a>
                     
                   </form>
                   <div class="search-result-count">
                       {{ trans('admin.Finding') }}  <span>{{ $posts->total() }}</span> {{ trans('admin.Result') }}
                   </div>
                </div>
                @foreach ($posts as $item )
                <div id="data-wrapper">
                    <!-- Results -->
                </div>
        
                <div class="search-result-box auto-load">
                    <div class="search-result-child">
                        <a href="/{{ $item->getfullslug() }}" target="_blank"  class="search-result-item">
                            <h1>{!! $item->translate(app()->getlocale())->title !!}</h1>
                            <div class="text">
                                {!! $item->translate(app()->getlocale())->text !!}
                            </div>
                            <div class="line-res"></div>
                            
                        </a>
                        <a href="/{{ $item->parent->getfullslug() }}" target="_blank" class="see-all"> {{ trans('admin.See_All') }} </a>
                    </div>
                  
                 </div>
                @endforeach
           </div>
       </div>
    </section>

</main>

@endsection
