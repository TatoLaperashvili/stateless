    
    <header>
        <div class="header-head">
            <div class="container">
                 <div class="header">
                    <div class="top-header">
                        <div class="l-header">
                            <a href="/{{app()->getLocale()}}" class="logo-img">
                                @if(app()->getLocale() == 'ka')
                                <img src="/website/assets/img/logo.png" alt="logo">
                                @else
                                <img src="/website/assets/img/Rights-Georgia logo-Eng-Geo-03.png" alt="logo_en" style="width: 80%">
                                @endif
                            </a>
                            <a href="/{{app()->getLocale()}}" class="logo-text">{!! settings('header-title') !!}</a>
                        </div>
                        <div class="r-header">
                            <div class="r-t-h">
                                <div class="faq">
                                    <a href="{!! settings('FAQ') !!}">{{trans('website.FAQ')}}</a>
                                </div>
                                <span class="line-lang-001"></span>
                                @foreach (config('app.locales') as $k => $value)
                                  
                             
                                <div class="lang">
                                   
                                    <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif"
                                        class="lang @if(app()->getLocale() == $value) active-lang-color @endif">{{ trans('website.'.$value) }}</a>
                                </div>
                             
                                @endforeach
                             
                                <form action="/{{ app()->getLocale() }}/search" method="GET" role="search">
                                    <input id="myInput" type="text" placeholder="{{ trans('website.search') }}..." name="que" value="@if(isset($que)) {{$que}} @endif">
                                    <a href="/{{ app()->getLocale() }}/search">
                                        <button>
                                            <span>
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24.7986 25.0353L19.1796 19.3503L24.7986 25.0353ZM22.2935 11.7526C22.2935 14.6044 21.1718 17.3394 19.1751 19.3559C17.1785 21.3724 14.4704 22.5053 11.6467 22.5053C8.82306 22.5053 6.11501 21.3724 4.11836 19.3559C2.12171 17.3394 1 14.6044 1 11.7526C1 8.90085 2.12171 6.16588 4.11836 4.14937C6.11501 2.13286 8.82306 1 11.6467 1C14.4704 1 17.1785 2.13286 19.1751 4.14937C21.1718 6.16588 22.2935 8.90085 22.2935 11.7526V11.7526Z" stroke="#232962" stroke-width="2" stroke-linecap="round"/>
                                                </svg>
                                            </span>
                                        </button>
                                    </a>
                                    
                                </form>
                            </div>
                          
                            <div class="r-b-h">
                               
                                <a href=" {!! settings('about_portal') !!}">{{trans('website.about_portal')}}</a>
                              
                                <span> </span>
                                <a href=" {!! settings('Get_free_legal_help') !!}">{{trans('website.Get_free_legal_help')}}</a>
                            </div>
                          
                        </div>
                        <div class="burger-lines">
                            <div class="line-001"></div>
                            <div class="line-001"></div>
                            <div class="line-001"></div>
                         </div>
                    </div>
                    <div class="bottom-header ">
                        
                        <nav class="nav-links">
                            <ul>
                                @foreach ($sections as $section)
                                @if (!in_array($section->type_id, [1,3])) 
                               <li class="nav-li">
                                    <a href="/{{ $section->getFullSlug() }}" class="link-col">{{ strtoupper($section[app()->getlocale()]->title) }} </a>
                                    <div class="sub-menu-1">
                                        <div class="sub-container">
                                            @foreach ($section->children as $subSec)
                                            <span class="sub-li">
                                                <div class="link-sub">
                                                    <img src="/website/assets/img/Polygon2.png" alt="f" class="img-11">
                                                    <a href="/{{ $subSec->getFullSlug() }}" class="sub-a"> {{ strtoupper($subSec[app()->getlocale()]->title) }}</a> 
                                                </div>
                                                <div class="child-sub-menu-1">
                                                    @foreach ($subSec->children as $subchildren )
                                                    <span class="child-sub-li">
                                                        <div class="link-sub">
                                                            <img src="/website/assets/img/Polygon2.png" alt="f" class="img-12">
                                                            <a href="/{{ $subchildren->getFullSlug() }}" class="sub-a sub-a1"> {{ strtoupper($subchildren[app()->getlocale()]->title) }}</a> 
                                                        </div>
                                                        <div class="grandson-sub-menu-1">
                                                            @foreach ($subchildren->children as $grandchildren )
                                                            <span class="grandson-li">
                                                                <div class="link-sub">
                                                                    <img src="/website/assets/img/Polygon2.png" alt="f" class="img-13">
                                                                    <a href="/{{ $grandchildren->getFullSlug() }}" class="sub-a grandson-a"> {{ strtoupper($grandchildren[app()->getlocale()]->title) }}</a>
                                                                </div>
                                                            </span>
                                                             
                                                            @endforeach
                                                            <img src="/website/assets/img/right-imgp.png" alt="ssa" class="img-rp" >
                                                        </div>
                                                    </span>  
                                                    @endforeach
                                                </div>
                                            </span>
                                            @endforeach
                                    </div>
                                 </div>
                                </li>
                                @endif
                                @endforeach
                                
                            </ul>
                        </nav>
                        @if (isset($contact))
                        
                        <a href="/{{ $contact->getFullSlug() }}" class="contact-link">{{ $contact->translate(app()->getlocale())->title }}</a>
                        @endif
                    </div>
                 </div>
            </div>
            
        </div>
        <div class="burger-menu">
                <div class="burger-search">
                    <a href="{!! settings('about_portal') !!}" class="burg-text-link-1">
                        {{trans('website.about_portal')}}
                    </a>
                    <a href="{!! settings('Get_free_legal_help') !!}" class="burg-text-link-1">
                        {{trans('website.Get_free_legal_help')}}
                    </a>
                    <form class="burg-form">
                        <input type="text">
                        <button>
                            <span>
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.7986 25.0353L19.1796 19.3503L24.7986 25.0353ZM22.2935 11.7526C22.2935 14.6044 21.1718 17.3394 19.1751 19.3559C17.1785 21.3724 14.4704 22.5053 11.6467 22.5053C8.82306 22.5053 6.11501 21.3724 4.11836 19.3559C2.12171 17.3394 1 14.6044 1 11.7526C1 8.90085 2.12171 6.16588 4.11836 4.14937C6.11501 2.13286 8.82306 1 11.6467 1C14.4704 1 17.1785 2.13286 19.1751 4.14937C21.1718 6.16588 22.2935 8.90085 22.2935 11.7526V11.7526Z" stroke="#232962" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </span>
                        </button>
                    </form>
                    <div class="burg-lang">
                        <a href="{!! settings('FAQ') !!}"  >
                            {{trans('website.FAQ')}}
                        </a>
                        @foreach (config('app.locales') as $k => $value)
                        <a href="@if (isset($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif"
                                        class="lang @if(app()->getLocale() == $value) active-lang-color @endif">{{ trans('website.'.$value) }}</a>
                                        @endforeach
                    </div>
                </div>


                <ul class="burger-ul">
                    @foreach ($sections as $section)
                    @if (!in_array($section->type_id, [1,3])) 
                    <li class="burger-li-1">
                        <a href="/{{ $section->getFullSlug() }}" class="burger-list-a">{{ strtoupper($section[app()->getlocale()]->title) }} </a>
                        <span class="burg-list-arrow">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z" fill="black"/>
                            </svg>
                        </span>
                        <ul class="burger-child-ul-1">
                            @foreach ($section->children as $subSec)
                            <li class="burger-child-li-2">
                                <a href="/{{ $subSec->getFullSlug() }}" class="burger-list-a-2">
                                    {{ strtoupper($subSec[app()->getlocale()]->title) }}
                                </a>
                                <span class="burg-list-arrow-2">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z" fill="black"/>
                                    </svg>
                                </span>
                                <ul class="burger-child-ul-2">
                                    @foreach ($subSec->children as $subchildren )
                                    <li class="burger-child-li-3">
                                        <a href="/{{ $subchildren->getFullSlug() }}" class="burger-list-a-3">
                                            {{ strtoupper($subchildren[app()->getlocale()]->title) }}
                                        </a>
                                        <span class="burg-list-arrow-3">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.95463 1.84062C5.74372 2.05158 5.62524 2.33768 5.62524 2.63599C5.62524 2.9343 5.74372 3.2204 5.95463 3.43137L11.5234 9.00012L5.95463 14.5689C5.7497 14.781 5.63631 15.0652 5.63887 15.3602C5.64143 15.6552 5.75975 15.9373 5.96833 16.1459C6.17692 16.3545 6.45908 16.4728 6.75405 16.4754C7.04902 16.4779 7.3332 16.3645 7.54538 16.1596L13.9095 9.79549C14.1204 9.58452 14.2389 9.29842 14.2389 9.00012C14.2389 8.70181 14.1204 8.41571 13.9095 8.20474L7.54538 1.84062C7.33441 1.62971 7.04831 1.51123 6.75 1.51123C6.45169 1.51123 6.1656 1.62971 5.95463 1.84062Z" fill="black"/>
                                            </svg>
                                        </span>
                                        <ul class="last-ul">
                                            @foreach ($subchildren->children as $grandchildren )
                                            <li class="last-li">
                                                <a href="/{{ $grandchildren->getFullSlug() }}" class="last-a">
                                                    {{ strtoupper($grandchildren[app()->getlocale()]->title) }}
                                                </a>
                                            </li>
                                            @endforeach
                                           
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                             
                        </ul>
                    </li>
                    @endif
                    @endforeach
                   
                     
                </ul>
                @if (isset($contact))
                <a href="/{{ $contact->getFullSlug() }}" class="burg-contact-link">
                    {{ $contact->translate(app()->getlocale())->title }}
                </a>
                @endif
                <div class="burger-social-links">
                    <a href="#">
                        <svg width="40" height="33" viewBox="0 0 40 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M39.1756 4.32457C37.7435 4.95966 36.205 5.38876 34.5877 5.58272C36.2565 4.5834 37.505 3.01058 38.1002 1.15775C36.5324 2.08976 34.8164 2.74579 33.027 3.09732C31.8236 1.81148 30.2297 0.959203 28.4928 0.672812C26.7558 0.386421 24.973 0.681939 23.4211 1.51349C21.8691 2.34503 20.6349 3.66608 19.9101 5.27154C19.1853 6.87699 19.0103 8.67703 19.4124 10.3922C16.2355 10.2325 13.1277 9.40617 10.2905 7.96669C7.4534 6.52721 4.95041 4.50679 2.944 2.03657C2.25796 3.22091 1.86349 4.59406 1.86349 6.05646C1.86272 7.37296 2.18667 8.66929 2.80659 9.83044C3.42651 10.9916 4.32323 11.9817 5.41719 12.7128C4.14848 12.6724 2.90777 12.3293 1.79831 11.7121V11.8151C1.79819 13.6615 2.43639 15.4512 3.60463 16.8803C4.77288 18.3094 6.39921 19.2901 8.20766 19.6558C7.03073 19.9746 5.7968 20.0215 4.59908 19.7931C5.10932 21.3819 6.10322 22.7712 7.44164 23.7665C8.78006 24.7619 10.396 25.3135 12.0632 25.3441C9.23301 27.5675 5.73772 28.7736 2.13962 28.7683C1.50225 28.7685 0.865427 28.7313 0.232422 28.6568C3.8847 31.0069 8.13621 32.2541 12.4783 32.2493C27.1767 32.2493 35.212 20.066 35.212 9.49963C35.212 9.15634 35.2034 8.80962 35.188 8.46633C36.751 7.33516 38.1001 5.93441 39.1722 4.32972L39.1756 4.32457Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="#"> 
                        <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.0774 11.1251C14.0979 11.1251 11.6665 13.499 11.6665 16.4078C11.6665 19.3167 14.0979 21.6906 17.0774 21.6906C20.0569 21.6906 22.4884 19.3167 22.4884 16.4078C22.4884 13.499 20.0569 11.1251 17.0774 11.1251ZM33.3063 16.4078C33.3063 14.2202 33.3266 12.0525 33.2008 9.86883C33.0749 7.33249 32.4823 5.08148 30.5826 3.22678C28.6788 1.36812 26.3772 0.793478 23.7793 0.670624C21.5386 0.54777 19.3181 0.567585 17.0815 0.567585C14.8408 0.567585 12.6204 0.54777 10.3837 0.670624C7.78582 0.793478 5.48016 1.37208 3.58043 3.22678C1.67664 5.08545 1.08805 7.33249 0.962217 9.86883C0.83638 12.0564 0.856676 14.2242 0.856676 16.4078C0.856676 18.5915 0.83638 20.7632 0.962217 22.9469C1.08805 25.4832 1.6807 27.7342 3.58043 29.5889C5.48422 31.4476 7.78582 32.0222 10.3837 32.1451C12.6244 32.2679 14.8448 32.2481 17.0815 32.2481C19.3222 32.2481 21.5426 32.2679 23.7793 32.1451C26.3772 32.0222 28.6828 31.4436 30.5826 29.5889C32.4863 27.7302 33.0749 25.4832 33.2008 22.9469C33.3307 20.7632 33.3063 18.5954 33.3063 16.4078ZM17.0774 24.536C12.4702 24.536 8.75192 20.9059 8.75192 16.4078C8.75192 11.9098 12.4702 8.27966 17.0774 8.27966C21.6847 8.27966 25.403 11.9098 25.403 16.4078C25.403 20.9059 21.6847 24.536 17.0774 24.536ZM25.7439 9.84506C24.6682 9.84506 23.7996 8.99697 23.7996 7.94676C23.7996 6.89656 24.6682 6.04847 25.7439 6.04847C26.8196 6.04847 27.6883 6.89656 27.6883 7.94676C27.6886 8.19614 27.6386 8.44312 27.541 8.67358C27.4434 8.90403 27.3001 9.11342 27.1195 9.28976C26.9389 9.46609 26.7244 9.60591 26.4884 9.70119C26.2523 9.79648 25.9994 9.84537 25.7439 9.84506Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="#">   
                        <svg width="17" height="33" viewBox="0 0 17 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.85239 32.2493V17.3828H0.986328V12.0301H4.85239V7.45822C4.85239 3.86561 7.13608 0.566406 12.3982 0.566406C14.5288 0.566406 16.1042 0.774088 16.1042 0.774088L15.9801 5.77257C15.9801 5.77257 14.3734 5.75666 12.6201 5.75666C10.7225 5.75666 10.4184 6.64584 10.4184 8.12166V12.0301H16.1309L15.8823 17.3828H10.4184V32.2493H4.85239Z" fill="white"/>
                        </svg>
                    </a>
                </div>
        </div>
    </header>