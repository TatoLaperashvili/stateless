@extends('website.master')

@section('main')


<main>
    <section>
        <div class="banner-3">
            <div class="container full-width-cont">
                @if(isset($video))

                <div class="banner-img">
                    <img src="{{ image($video->cover) }}" alt="banner">
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
        <div class="news-section padding-b service-page-section question-page-section pos-rel">
            <div class="container">

                <div class="important-title">
                    <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
                </div>
                <div class="row row-rew-2">
                    <div class="col-xxl-8 col-lg-7 col-md-12 col-sm-12">
                        <div class="about-left-box video-det-box">
                            <h1> {{ getDates($model->date) }}</h1>
                            <div class="text hide-text">
                                {!! $model->translate(app()->getlocale())->text !!}
                            </div>
                            <div class="det-video-item-p">
                                <a href="{{$model->translate(app()->getlocale())->youtube}}" data-fancybox="video00">
                                    @if(isset($model->thumb))
                                    <img src="{{ image($model->thumb) }}" alt="video">
                                    @else
                                    <img src="/website/assets/news1.png" alt="video">
                                    @endif
                                </a>
                                <span>
                                    <svg width="75" height="54" viewBox="0 0 75 54" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M37.2588 53.3818C37.2008 53.3818 31.3591 53.3816 24.8901 53.1816C18.9111 52.9956 11.1461 52.5979 8.10205 51.7539C6.51648 51.304 5.07633 50.4472 3.92432 49.2686C2.77231 48.0899 1.94863 46.6306 1.53516 45.0352C0.0181563 39.1992 0 26.8232 0 26.6982C0 26.5732 0.0181563 14.2594 1.53516 8.35938C1.96469 6.74601 2.80186 5.27019 3.9668 4.07422C5.10058 2.89085 6.52739 2.02837 8.10205 1.57422C11.1141 0.763219 18.8812 0.380195 24.8672 0.200195C31.3452 0.00719531 37.1998 0 37.2588 0C37.3178 0 43.1749 0.00019531 49.6499 0.200195C55.6339 0.387195 63.3991 0.784883 66.4141 1.62988C67.9996 2.07948 69.4398 2.93574 70.5918 4.11426C71.7438 5.29278 72.5675 6.75231 72.981 8.34766C74.563 14.2637 74.5171 26.625 74.5161 26.748C74.5151 26.871 74.498 39.1879 72.981 45.0859C72.568 46.6815 71.7444 48.1407 70.5923 49.3193C69.4402 50.4979 67.9998 51.3546 66.4141 51.8037C63.4021 52.6157 55.6349 53.0037 49.6499 53.1787C43.1719 53.3797 37.3168 53.3818 37.2588 53.3818ZM29.833 15.2646V38.124L49.2271 26.6943L29.833 15.2637V15.2646Z"
                                            fill="white" />
                                    </svg>
                                </span>
                            </div>
                            <div class="text text-hidden">
                                {!! $model->translate(app()->getlocale())->text !!}
                            </div>
                            <div class="share-icons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}" target="_blank">
                                    <svg width="17" height="33" viewBox="0 0 17 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.85239 32.2493V17.3828H0.986328V12.0301H4.85239V7.45822C4.85239 3.86561 7.13608 0.566406 12.3982 0.566406C14.5288 0.566406 16.1042 0.774088 16.1042 0.774088L15.9801 5.77257C15.9801 5.77257 14.3734 5.75666 12.6201 5.75666C10.7225 5.75666 10.4184 6.64584 10.4184 8.12166V12.0301H16.1309L15.8823 17.3828H10.4184V32.2493H4.85239Z"
                                            fill="white" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}" target="_blank">
				
                             	       <svg width="40" height="33" viewBox="0 0 40 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M39.1756 4.32457C37.7435 4.95966 36.205 5.38876 34.5877 5.58272C36.2565 4.5834 37.505 3.01058 38.1002 1.15775C36.5324 2.08976 34.8164 2.74579 33.027 3.09732C31.8236 1.81148 30.2297 0.959203 28.4928 0.672812C26.7558 0.386421 24.973 0.681939 23.4211 1.51349C21.8691 2.34503 20.6349 3.66608 19.9101 5.27154C19.1853 6.87699 19.0103 8.67703 19.4124 10.3922C16.2355 10.2325 13.1277 9.40617 10.2905 7.96669C7.4534 6.52721 4.95041 4.50679 2.944 2.03657C2.25796 3.22091 1.86349 4.59406 1.86349 6.05646C1.86272 7.37296 2.18667 8.66929 2.80659 9.83044C3.42651 10.9916 4.32323 11.9817 5.41719 12.7128C4.14848 12.6724 2.90777 12.3293 1.79831 11.7121V11.8151C1.79819 13.6615 2.43639 15.4512 3.60463 16.8803C4.77288 18.3094 6.39921 19.2901 8.20766 19.6558C7.03073 19.9746 5.7968 20.0215 4.59908 19.7931C5.10932 21.3819 6.10322 22.7712 7.44164 23.7665C8.78006 24.7619 10.396 25.3135 12.0632 25.3441C9.23301 27.5675 5.73772 28.7736 2.13962 28.7683C1.50225 28.7685 0.865427 28.7313 0.232422 28.6568C3.8847 31.0069 8.13621 32.2541 12.4783 32.2493C27.1767 32.2493 35.212 20.066 35.212 9.49963C35.212 9.15634 35.2034 8.80962 35.188 8.46633C36.751 7.33516 38.1001 5.93441 39.1722 4.32972L39.1756 4.32457Z"
                                            fill="white" />
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29.223" height="29.165"
                                        viewBox="0 0 29.223 29.165">
                                        <g id="linkedin-svgrepo-com" transform="translate(-0.005 -0.563)">
                                            <path id="Path_211" data-name="Path 211"
                                                d="M14.477,164.715H8.609a.471.471,0,0,0-.471.471v18.85a.471.471,0,0,0,.471.471h5.867a.471.471,0,0,0,.471-.471v-18.85a.471.471,0,0,0-.47-.471Z"
                                                transform="translate(-7.673 -154.781)" fill="#fff" />
                                            <path id="Path_212" data-name="Path 212"
                                                d="M3.872.563A3.868,3.868,0,1,0,7.741,4.431,3.868,3.868,0,0,0,3.872.563Z"
                                                fill="#fff" />
                                            <path id="Path_213" data-name="Path 213"
                                                d="M187.079,156.508a6.892,6.892,0,0,0-5.155,2.164v-1.224a.471.471,0,0,0-.471-.471h-5.619a.471.471,0,0,0-.471.471V176.3a.471.471,0,0,0,.471.471h5.855a.471.471,0,0,0,.471-.471v-9.326c0-3.143.854-4.367,3.044-4.367,2.386,0,2.576,1.963,2.576,4.529V176.3a.471.471,0,0,0,.471.471h5.857a.471.471,0,0,0,.471-.471V165.96C194.579,161.285,193.688,156.508,187.079,156.508Z"
                                                transform="translate(-165.351 -147.043)" fill="#fff" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if(isset($video))

                    <div class="col-xxl-4 col-lg-5 col-md-12 col-sm-12 pos-abs">
                        <div class="right-accord det-right-accord">
                            @if($video->parent != null)

                            <div class="accord-box">
                                <h2>{{ $model->translate(app()->getLocale())->title }}</h2>
                                <ul>
                                    @foreach ($video['parent']->children as $children )
                                    <li>

                                        <div class="top-links-box">
                                            <a href="/{{$children->getFullSlug()  }}">
                                                {{ $children->translate(app()->getlocale())->title }} </a>
                                            @if(isset($children['children']) && count($children['children']))
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="hidden-links-box">
                                            @foreach ($children['children'] as $subchild )
                                            <a href="/{{$subchild->getFullSlug()  }}"
                                                class="  @if (isset($subchild[app()->getlocale()]->slug) && ($subchild[app()->getlocale()]->slug  == $model[app()->getlocale()]->slug)) active-dot @endif">{{ $subchild->translate(app()->getlocale())->title }}</a>
                                            @endforeach

                                        </div>


                                    </li>
                                    @endforeach

                                </ul>
                                <img src="/website/assets/img/lines2.png" alt="line" class="lines2">
                                <img src="/website/assets/img/lines2.png" alt="line" class="lines3">
                            </div>
                            <div class="resp-active-arrow">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            @else

                            <div class="accord-box">
                                <h2>{{ $model->translate(app()->getLocale())->title }}</h2>

                                <ul>

                                    @foreach ($model->children as $grandchildren)

                                    <li>

                                        <div class="top-links-box">

                                            <a
                                                href="/{{ $grandchildren->getFullSlug()  }}">{{ $grandchildren->translate(app()->getlocale())->title}}</a>
                                            @if(isset($grandchildren['children']) && count($grandchildren['children']) >
                                            0)
                                            <span>

                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            @endif
                                        </div>


                                        @foreach ($grandchildren['children'] as $post )
                                        <div class="hidden-links-box">
                                            <a href="/{{ $post->getFullSlug()  }}"
                                                class=" @if (isset($post[app()->getlocale()]->slug) && ($post[app()->getlocale()]->slug  == $model[app()->getlocale()]->slug))active-dot @endif">{{ $post->translate(app()->getlocale())->title}}</a>

                                        </div>
                                        @endforeach


                                    </li>
                                    @endforeach


                                </ul>
                                <img src="/website/assets/img/lines2.png" alt="line" class="lines2">
                                <img src="/website/assets/img/lines2.png" alt="line" class="lines3">
                            </div>
                            <div class="resp-active-arrow">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            @endif


                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </section>




    <section>
        <div class="other-services padding">
            <div class="container">
                <div class="news-title other-service-title">
                    <h2>{{ trans('admin.Other_video') }}</h2>
                    <a href="/{{$video->getFullSlug()  }}" class="see-all hide-link4">{{trans('website.See_All')}}</a>
                </div>





                <div class="video-gallery video-gallery-det">
                    @if (isset($video_slider))
                    @foreach ($video_slider as $post)
                    <div class="video-item">

                        <div class="video-img-side">
                            <div class="vide-img">

                                <a href="{{$post->translate(app()->getlocale())->youtube}}"
                                    data-fancybox="video-gallery">
                                    <img src="{{ image($post->thumb) }}" alt="video">
                                </a>
                                <span>
                                    <svg width="75" height="54" viewBox="0 0 75 54" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M37.2588 53.3818C37.2008 53.3818 31.3591 53.3816 24.8901 53.1816C18.9111 52.9956 11.1461 52.5979 8.10205 51.7539C6.51648 51.304 5.07633 50.4472 3.92432 49.2686C2.77231 48.0899 1.94863 46.6306 1.53516 45.0352C0.0181563 39.1992 0 26.8232 0 26.6982C0 26.5732 0.0181563 14.2594 1.53516 8.35938C1.96469 6.74601 2.80186 5.27019 3.9668 4.07422C5.10058 2.89085 6.52739 2.02837 8.10205 1.57422C11.1141 0.763219 18.8812 0.380195 24.8672 0.200195C31.3452 0.00719531 37.1998 0 37.2588 0C37.3178 0 43.1749 0.00019531 49.6499 0.200195C55.6339 0.387195 63.3991 0.784883 66.4141 1.62988C67.9996 2.07948 69.4398 2.93574 70.5918 4.11426C71.7438 5.29278 72.5675 6.75231 72.981 8.34766C74.563 14.2637 74.5171 26.625 74.5161 26.748C74.5151 26.871 74.498 39.1879 72.981 45.0859C72.568 46.6815 71.7444 48.1407 70.5923 49.3193C69.4402 50.4979 67.9998 51.3546 66.4141 51.8037C63.4021 52.6157 55.6349 53.0037 49.6499 53.1787C43.1719 53.3797 37.3168 53.3818 37.2588 53.3818ZM29.833 15.2646V38.124L49.2271 26.6943L29.833 15.2637V15.2646Z"
                                            fill="white" />
                                    </svg>
                                </span>
                                <div class="time-03">
                                    {{ getDates($post->date) }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ $post->getFullSlug() }}" class="link-text-03">
                            <h2>
                                {{$post->translate(app()->getlocale())->title}}
                            </h2>
                            <div class="text">
                                {!! $post->translate(app()->getlocale())->text !!}
                            </div>
                        </a>

                    </div>
                    @endforeach
                    @endif

                </div>
                <div class="hide-link3">
                    <a href="/{{$video->getFullSlug()  }}" class="see-all see-all2"> {{trans('website.See_All')}}</a>
                </div>
            </div>
        </div>
    </section>


</main>


@endsection