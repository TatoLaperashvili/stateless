@extends('website.master')
@section('main')
<main>


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
        @if(isset($breadcrumbs))
        <div class="brc">
            <div class="container">

                <div class="brc-link">
                    <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                    @if(isset($model->parent))
                    <div class="line-brc"></div>
                   
                    <a href="/{{$model->getfullslug()}}">{{ Str::limit($model->parent[app()->getlocale()]->title , 50, $end='...') }}  </a>
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
        <div class="contact-page padding-b">
            <div class="container">
                <div class="important-title">
                    <h1>{{$model->posts[0][app()->getLocale()]->title}}</h1>
                </div>
                <div class="row row-01-reverse">
                    <div class="col-xxl-5 col-lg-5 col-md-5">
                        <div class="contact-left-info">
                            <span class="comp-contact-info">
                                <h2>{{trans('admin.phone')}} :</h2>
                                <a href="#">{{$model->posts[0]->mobile}}</a>
                            </span>
                            <span class="comp-contact-info">
                                <h2>{{trans('admin.email')}}:</h2>
                                <a href="#">{{$model->posts[0]->email}}</a>
                            </span>
                            <span class="comp-contact-info">
                                <h2>{{trans('admin.adress')}}:</h2>
                                <a href="#">{{$model->posts[0]->translate(app()->getlocale())->adress}}</a>
                            </span>
                           
                            <div class="social-contact">
                                <i>
                                    <a href="{{ settings('Twitter') }}">
                                        <svg width="40" height="33" viewBox="0 0 40 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M39.1756 4.32457C37.7435 4.95966 36.205 5.38876 34.5877 5.58272C36.2565 4.5834 37.505 3.01058 38.1002 1.15775C36.5324 2.08976 34.8164 2.74579 33.027 3.09732C31.8236 1.81148 30.2297 0.959203 28.4928 0.672812C26.7558 0.386421 24.973 0.681939 23.4211 1.51349C21.8691 2.34503 20.6349 3.66608 19.9101 5.27154C19.1853 6.87699 19.0103 8.67703 19.4124 10.3922C16.2355 10.2325 13.1277 9.40617 10.2905 7.96669C7.4534 6.52721 4.95041 4.50679 2.944 2.03657C2.25796 3.22091 1.86349 4.59406 1.86349 6.05646C1.86272 7.37296 2.18667 8.66929 2.80659 9.83044C3.42651 10.9916 4.32323 11.9817 5.41719 12.7128C4.14848 12.6724 2.90777 12.3293 1.79831 11.7121V11.8151C1.79819 13.6615 2.43639 15.4512 3.60463 16.8803C4.77288 18.3094 6.39921 19.2901 8.20766 19.6558C7.03073 19.9746 5.7968 20.0215 4.59908 19.7931C5.10932 21.3819 6.10322 22.7712 7.44164 23.7665C8.78006 24.7619 10.396 25.3135 12.0632 25.3441C9.23301 27.5675 5.73772 28.7736 2.13962 28.7683C1.50225 28.7685 0.865427 28.7313 0.232422 28.6568C3.8847 31.0069 8.13621 32.2541 12.4783 32.2493C27.1767 32.2493 35.212 20.066 35.212 9.49963C35.212 9.15634 35.2034 8.80962 35.188 8.46633C36.751 7.33516 38.1001 5.93441 39.1722 4.32972L39.1756 4.32457Z"
                                                fill="white" />
                                        </svg>
                                    </a>

                                </i>
                                <i>
                                    <a href="{{ settings('instagram') }}">
                                        <svg width="34" height="33" viewBox="0 0 34 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.0774 11.1251C14.0979 11.1251 11.6665 13.499 11.6665 16.4078C11.6665 19.3167 14.0979 21.6906 17.0774 21.6906C20.0569 21.6906 22.4884 19.3167 22.4884 16.4078C22.4884 13.499 20.0569 11.1251 17.0774 11.1251ZM33.3063 16.4078C33.3063 14.2202 33.3266 12.0525 33.2008 9.86883C33.0749 7.33249 32.4823 5.08148 30.5826 3.22678C28.6788 1.36812 26.3772 0.793478 23.7793 0.670624C21.5386 0.54777 19.3181 0.567585 17.0815 0.567585C14.8408 0.567585 12.6204 0.54777 10.3837 0.670624C7.78582 0.793478 5.48016 1.37208 3.58043 3.22678C1.67664 5.08545 1.08805 7.33249 0.962217 9.86883C0.83638 12.0564 0.856676 14.2242 0.856676 16.4078C0.856676 18.5915 0.83638 20.7632 0.962217 22.9469C1.08805 25.4832 1.6807 27.7342 3.58043 29.5889C5.48422 31.4476 7.78582 32.0222 10.3837 32.1451C12.6244 32.2679 14.8448 32.2481 17.0815 32.2481C19.3222 32.2481 21.5426 32.2679 23.7793 32.1451C26.3772 32.0222 28.6828 31.4436 30.5826 29.5889C32.4863 27.7302 33.0749 25.4832 33.2008 22.9469C33.3307 20.7632 33.3063 18.5954 33.3063 16.4078ZM17.0774 24.536C12.4702 24.536 8.75192 20.9059 8.75192 16.4078C8.75192 11.9098 12.4702 8.27966 17.0774 8.27966C21.6847 8.27966 25.403 11.9098 25.403 16.4078C25.403 20.9059 21.6847 24.536 17.0774 24.536ZM25.7439 9.84506C24.6682 9.84506 23.7996 8.99697 23.7996 7.94676C23.7996 6.89656 24.6682 6.04847 25.7439 6.04847C26.8196 6.04847 27.6883 6.89656 27.6883 7.94676C27.6886 8.19614 27.6386 8.44312 27.541 8.67358C27.4434 8.90403 27.3001 9.11342 27.1195 9.28976C26.9389 9.46609 26.7244 9.60591 26.4884 9.70119C26.2523 9.79648 25.9994 9.84537 25.7439 9.84506Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </i>
                                <i>
                                    <a href="{{ settings('facebook') }}">
                                        <svg width="17" height="33" viewBox="0 0 17 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.85239 32.2493V17.3828H0.986328V12.0301H4.85239V7.45822C4.85239 3.86561 7.13608 0.566406 12.3982 0.566406C14.5288 0.566406 16.1042 0.774088 16.1042 0.774088L15.9801 5.77257C15.9801 5.77257 14.3734 5.75666 12.6201 5.75666C10.7225 5.75666 10.4184 6.64584 10.4184 8.12166V12.0301H16.1309L15.8823 17.3828H10.4184V32.2493H4.85239Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </i>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-xxl-7 col-lg-7 col-md-7">
                            <form method="POST" action="/{{app()->getlocale()}}/contform/{{$model->id}}" >
                                @csrf 
                                <div class="contact-left-form">
                                    <div class="input-lab-box">
                                        <input type="hidden" placeholder="Name" name="post_id"  value="{{$model->posts[0]->id}}">
                                        <label>{{trans('admin.name')}}</label>
                                    <input  type="text" placeholder=" {{trans('admin.name')}}" name="name" class="data-icon"  required>
                                    </div>
                                    <div class="input-lab-box">
                                        <!-- <label>გვარი</label> -->
                                        <input  type="text" placeholder="{{trans('admin.Surname')}}" name="lastname" >
                                    </div>
                                    <div class="input-lab-box">
                                        <label>{{trans('admin.email')}}</label>
                                    <input  type="email" placeholder="{{trans('admin.email')}}" name="email"  required>
                                    </div>
                                    <div class="input-lab-box">
                                        <input  type="number"    placeholder="{{trans('admin.phone')}}" name="phone"  required>
                                    </div>
                                    <div class="input-lab-box input-lab-width">
                                        <label>შეტყობინება</label>
                                        <input type="text" name="message"  placeholder="{{trans('website.MESSAGE')}}" required>
                                    </div>
                                    @if(Session::has('message'))
                                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                                    @endif
                                    
                                    <button>
                                        გაგზავნა
                                    </button>
                                </div>
                            </form>
                             
                        </div>
                      
                    </div>
                   
                </div>
              
               
            </div>
           
        </div>
    </section>

    <section>
        <div class="map">
           {{$model->posts[0]->map}}
        </div>
    </section>
  
</main>


@endsection
