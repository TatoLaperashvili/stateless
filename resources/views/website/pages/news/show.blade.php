@extends('website.master')



@section('main')
<main>
    @if(isset($news))

    <section>
        <div class="banner-3">
            <div class="container full-width-cont">
                <div class="banner-img">
                    <img src="{{ image($news->cover) }}" alt="banner">
                </div>
            </div>
        </div>
    </section>
    @endif
    <section>
        @if(isset($breadcrumbs))
        <div class="brc">
            <div class="container">
                <div class="brc-link">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    <div class="line-brc"></div>
                    @if(isset($model->parent))
                    <a href="/{{$model->parent->getfullslug()}}">{{ Str::limit($model->parent[app()->getlocale()]->title , 50, $end='...') }}
                    </a>
                    @endif
                    <div class="line-brc"></div>
                    @foreach ($breadcrumbs as $breadcrumb)
                    <a href="/{{ $breadcrumb['url'] }}"
                        class="brc-active">{{ Str::limit($breadcrumb['name'] , 55 ,$end='...') }}</a>
                    @endforeach
                </div>

            </div>
        </div>
        @endif
    </section>
    <section>
        <div class="about-page-section padding-b">
            <div class="container">
                <div class="hide-h1-about">
                    <h1>{{ Str::limit($model->translate(app()->getlocale())->title , 100)  }}</h1>
                    <h3>{{ getDates($model->date) }}</h3>
                </div>
                <div class="row row-rew-2">
                    <div class="col-xxl-8 col-lg-8 col-md-12 col-12">

                        <div class="about-left-box mtt-2">
                            <h1 class="hide-ab">{{ Str::limit($model->translate(app()->getlocale())->title , 100)  }}
                            </h1>
                            <h3 class="hide-ab"> {{ getDates($model->date) }}</h3>
                            <div class="text">
                                {!! $model->translate(app()->getlocale())->text !!}

                            </div>
                            <div class="share-icons">

                                <a onclick="shareOnFB()">
                                    <svg width="17" height="33" viewBox="0 0 17 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.85239 32.2493V17.3828H0.986328V12.0301H4.85239V7.45822C4.85239 3.86561 7.13608 0.566406 12.3982 0.566406C14.5288 0.566406 16.1042 0.774088 16.1042 0.774088L15.9801 5.77257C15.9801 5.77257 14.3734 5.75666 12.6201 5.75666C10.7225 5.75666 10.4184 6.64584 10.4184 8.12166V12.0301H16.1309L15.8823 17.3828H10.4184V32.2493H4.85239Z"
                                            fill="white" />
                                    </svg>
                                </a>

                                <a onclick="shareOntwitter()">
                            
                                    <svg width="40" height="33" viewBox="0 0 40 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M39.1756 4.32457C37.7435 4.95966 36.205 5.38876 34.5877 5.58272C36.2565 4.5834 37.505 3.01058 38.1002 1.15775C36.5324 2.08976 34.8164 2.74579 33.027 3.09732C31.8236 1.81148 30.2297 0.959203 28.4928 0.672812C26.7558 0.386421 24.973 0.681939 23.4211 1.51349C21.8691 2.34503 20.6349 3.66608 19.9101 5.27154C19.1853 6.87699 19.0103 8.67703 19.4124 10.3922C16.2355 10.2325 13.1277 9.40617 10.2905 7.96669C7.4534 6.52721 4.95041 4.50679 2.944 2.03657C2.25796 3.22091 1.86349 4.59406 1.86349 6.05646C1.86272 7.37296 2.18667 8.66929 2.80659 9.83044C3.42651 10.9916 4.32323 11.9817 5.41719 12.7128C4.14848 12.6724 2.90777 12.3293 1.79831 11.7121V11.8151C1.79819 13.6615 2.43639 15.4512 3.60463 16.8803C4.77288 18.3094 6.39921 19.2901 8.20766 19.6558C7.03073 19.9746 5.7968 20.0215 4.59908 19.7931C5.10932 21.3819 6.10322 22.7712 7.44164 23.7665C8.78006 24.7619 10.396 25.3135 12.0632 25.3441C9.23301 27.5675 5.73772 28.7736 2.13962 28.7683C1.50225 28.7685 0.865427 28.7313 0.232422 28.6568C3.8847 31.0069 8.13621 32.2541 12.4783 32.2493C27.1767 32.2493 35.212 20.066 35.212 9.49963C35.212 9.15634 35.2034 8.80962 35.188 8.46633C36.751 7.33516 38.1001 5.93441 39.1722 4.32972L39.1756 4.32457Z"
                                            fill="white" />
                                    </svg>
                                </a>
                                <a onclick="shareOnLinkedin()">
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
                            <script>
                                function shareOnFB() {
                                    var url =
                                        "https://www.facebook.com/sharer/sharer.php?u=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}";
                                    window.open(url, '',
                                        'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
                                    return false;
                                }
                            </script>
                            <script>
                                function shareOntwitter() {
                                    var url =
                                        'https://twitter.com/intent/tweet?button_hashtag=stateless&ref_src=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}';
                                    TwitterWindow = window.open(url, 'TwitterWindow', width = 600, height = 300);
                                    async src="https://platform.twitter.com/widgets.js" charset="utf-8"
                                    return false;
                                }
                            </script>
                            <script>
                                function shareOnLinkedin() {
                                    var url =
                                        'https://www.linkedin.com/sharing/share-offsite/?url=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}';
                                    TwitterWindow = window.open(url, 'TwitterWindow', width = 600, height = 300);
                                    return false;
                                }
                            </script>


                        </div>


                    </div>
                    <div class="col-xxl-4 col-lg-4 col-md-12 col-12">
                        @if(isset($model->thumb))
                        <div class="r-img-box">
                            <a href="{{ image($model->thumb) }}" data-fancybox="about-gall122">
                                <img src="{{ image($model->thumb) }}" alt="ab">
                            </a>

                        </div>
                        @else
                        <div class="r-img-box">
                            <a href="/website/assets/img/news1.png" data-fancybox="about-gall122">
                                <img src="/website/assets/img/news1.png" alt="ab">
                            </a>

                        </div>
                        @endif
                    </div>

                </div>
                <div class="about-gallery-box">
                    @foreach ($model->files as $file)
                    @if($file->file != $model->thumb)
                    <div class="about-img-item">
                        <a href="/{{ config('config.image_path') . $file->file }}" data-fancybox="about-gall">
                            <img src="/{{ config('config.image_path') . $file->file }}" alt="ab">
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="other-services padding news-slide-r">
            <div class="container">
                <div class="news-title other-service-title">
                    <h2>{{ trans('admin.other_news') }}</h2>
                    <a href="/{{ $news->getFullSlug() }}" class="see-all hide-link4"> {{ trans('website.See_All') }}
                    </a>
                </div>

                <div class="news-boxes news-slider-box">
                    @if(isset($news_slider))
                    @foreach ($news_slider as $slider)
                    <a href="/{{ $slider->getFullSlug() }}" class="news-item news-more">
                        <div class="news-left-info">
                            <div class="time">
                                {{ getDates($slider->date) }}

                            </div>
                            <div class="text">
                                {{$slider->translate(app()->getlocale())->title}}
                            </div>
                            <div class="see-all-link">
                                {{trans('website.See_All')}}
                                <span>
                                    <svg width="20" height="13" viewBox="0 0 20 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M14.3817 13L20 6.5L14.3817 -3.09134e-07L13.4374 1.09254L17.4437 5.72753L-1.98891e-07 5.72753L-2.52544e-07 7.27257L17.4436 7.27257L13.4374 11.9075L14.3817 13Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="news-img">
                            <img src="{{ image($slider->thumb) }}" alt="news">
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