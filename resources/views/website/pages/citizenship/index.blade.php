@extends('website.master')
@section('main')


<main>
    <section>
        <div class="banner-3">
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
        <div class="about-page-section padding-b">
            <div class="container">
                <div class="row row-rew-2">

                    @if(isset($text_page_posts))
                    @foreach ($text_page_posts as $posts )

                    <div class="col-xxl-8 col-lg-8 col-md-8 col-sm-6">
                        <div class="about-left-box">
                            <h1>{{ $posts->translate(app()->getlocale())->title }}</h1>
                            <div class="text">
                                {!! $posts->translate(app()->getlocale())->text  !!}
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
                                <script>
                                    function shareOnFB() {
                                        var url =
                                            "https://www.facebook.com/sharer/sharer.php?u=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}";
                                        window.open(url, '',
                                            'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600'
                                            );
                                        return false;
                                    }

                                </script>
                                <script>
                                    function shareOntwitter() {
                                        var url =
                                            'https://twitter.com/intent/tweet?text=optional%20promo%20text%20hurl=https://stateless.azurewebsites.net/{{$model->getfullslug()}}&amp;src={{$model}}';
                                        TwitterWindow = window.open(url, 'TwitterWindow', width = 600, height = 300);
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
                            <div class="about-gallery-box ">
                                @foreach ($posts->files as $file)

                                <div class="about-img-item about-img-item2">


                                    <a href="/{{ config('config.image_path') . $file->file }}"
                                        data-fancybox="about-gall">
                                        <img src="/{{ config('config.image_path') . $file->file }}" alt="ab">
                                    </a>


                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                    <div class="col-xxl-4 col-lg-5 col-md-12 col-sm-12 pos-abs">

                        @if(isset($model['children']) && count($model['children']) > 0)
                        <div class="right-accord">
                            <div class="accord-box">
                                <h2>{{ $model->translate(app()->getLocale())->title }}</h2>
                                <ul>


                                    @foreach($model->children as $children)
                                    @foreach($children->menutypes as $menutypes)
                                    @if($menutypes['menu_type_id'] == 1)
                                    <li class="li-01">
                                        <div class="top-links-box">
                                            <a
                                                href="/{{ $children->getFullSlug() }}">{{ $children->translate(app()->getLocale())->title }}</a>
                                            @if(isset($children['children']) && count($children['children']) > 0)
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
                                            @foreach ($children['children'] as $grandchild )
                                            <span class="sp-001">
                                                <a href="/{{ $grandchild->getFullSlug() }}"
                                                    class="@if (isset($grandchild[app()->getlocale()]->slug) && ($grandchild[app()->getlocale()]->slug  == $model[app()->getlocale()]->slug)) active-dot @endif">{{ $grandchild->translate(app()->getLocale())->title }}</a>
                                                @if(isset($grandchild['children']) && count($grandchild['children']) >
                                                0)
                                                <div class="svvg">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z"
                                                            fill="black" />
                                                    </svg>
                                                </div>
                                                @endif
                                                @foreach ($grandchild['children'] as $lastchild )

                                                <div class="child-link-sp-box">
                                                    <a href="/{{ $lastchild->getFullSlug() }}"
                                                        class="sp-child-link">{{ $lastchild->translate(app()->getLocale())->title }}</a>
                                                </div>
                                                @endforeach

                                            </span>
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
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
                        </div>
                        @else
                        <div class="right-accord">
                            <div class="accord-box">
                                <h2>{{ $model['parent']->translate(app()->getLocale())->title }}</h2>
                                <ul>


                                    @foreach($model['parent']->children as $children)
                                    @foreach($children->menutypes as $menutypes)
                                    @if($menutypes['menu_type_id'] == 1)
                                    <li class="li-01">
                                        <div class="top-links-box">
                                            <a
                                                href="/{{ $children->getFullSlug() }}">{{ $children->translate(app()->getLocale())->title }}</a>
                                            @if(isset($children['children']) && count($children['children']) > 0)
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
                                            @foreach ($children['children'] as $grandchild )
                                            @foreach($grandchild->menutypes as $menutypes)
                                            @if($menutypes['menu_type_id'] == 1)
                                            <span class="sp-001">
                                                <a href="/{{ $grandchild->getFullSlug() }}"
                                                    class="@if (isset($grandchild[app()->getlocale()]->slug) && ($grandchild[app()->getlocale()]->slug  == $model[app()->getlocale()]->slug)) active-dot @endif">{{ $grandchild->translate(app()->getLocale())->title }}</a>
                                                @if(isset($grandchild['children']) && count($grandchild['children']) >
                                                0)
                                                <div class="svvg">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z"
                                                            fill="black" />
                                                    </svg>
                                                </div>
                                                @endif
                                                @foreach ($grandchild['children'] as $lastchild )

                                                <div class="child-link-sp-box">
                                                    <a href="/{{ $lastchild->getFullSlug() }}"
                                                        class="sp-child-link">{{ $lastchild->translate(app()->getLocale())->title }}</a>
                                                </div>
                                                @endforeach

                                            </span>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
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
                        </div>
                        @endif

                    </div>


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
                <a href="{{ $midlle->translate(app()->getlocale())->redirect_link }}"
                    class="details-link">{{ trans('website.in_details') }}</a>
            </div>
        </div>
        @endforeach
    </section>


</main>
@endsection
