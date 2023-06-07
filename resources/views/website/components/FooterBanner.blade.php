


        <section>

            <div class="create">
                @if(isset($disclaimer))

                
                <div class="container">
                    @foreach($disclaimer as $post)
                    <div class="c-top">
                        @if(isset($disclaimer->icon))
                        <a href=" {{ $post->translate(app()->getlocale())->redirect_link  }}">
                            <img src="/{{ config('config.icon_path') . $disclaimer->icon }}" alt="unhr">
                        </a>
                        @else
                        <a href=" {{ $post->translate(app()->getlocale())->redirect_link }}"><img src="/website/assets/img/unhr.svg" alt="unhr"></a>
                        @endif
                        <div class="text">
                            {!! $post->translate(app()->getlocale())->text !!}
    
                        </div>
                    </div>
                    @endforeach
                    <div class="c-bot">
                        <span>{{trans('admin.COPYRIGHT')}}</span>
                        <a href="https://ideadesigngroup.ge/ka">{{trans('admin.MADE_BY_IDEA')}}</a>
                    </div>
                </div>  
                @endif
            </div>

        </section>
      

        