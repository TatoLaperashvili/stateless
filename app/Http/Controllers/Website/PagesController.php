<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionTranslation;
use App\Models\Subscription;
use App\Models\Post;
use App\Models\Product;
use App\Models\PostTranslation;
use App\Models\PostFile;
use App\Models\Slug;
use Illuminate\Support\Facades\URL;
use App\Models\Submission;
use App\Models\SubmissionFile;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\View\View;
use App\Mail\SubscribeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class PagesController extends Controller
{
	public static function index($model,Request $request)
	
	{
		
		$language_slugs = $model->getTranslatedFullSlugs();
		
		if ($model->type_id == 0) {
			return self::homePage($model, $language_slugs);
		}

		if (request()->method() == 'POST') {
			$values = request()->all();
			
			$values['additional'] = getAdditional($values, config('submissionAttr.additional'));
			$submission = Submission::create($values);
			return back()->with([
				'message' => trans('website.submission_sent'),
			]);
		}
		// BreadCrumb ----------------------------
		$breadcrumbs = [];
		$breadcrumbs[] = [
			'name' => $model[app()->getlocale()]->title,
			'url' => $model->getFullSlug()
		];
		$section = $model;
		while ($section->parent_id !== null) {
			$section = Section::where('id', $section->parent_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $section->title,
				'url' => $section->getFullSlug()
			
			];	
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		
		if ($model->type_id == 2) {

			$news = Section::where('type_id', 2)->with('translations')->first();
			$news_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
			
			return view("website.pages.news.index", compact('model',
			 'breadcrumbs', 'news', 'news_posts', 'language_slugs'));
		}
		if($model->type_id == 4){		
			$text_page = Section::where('type_id', 4)->with('translations')->first();
			$text_page_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
				
			return view("website.pages.citizenship.index", compact('model',
			 'breadcrumbs', 'text_page', 'text_page_posts', 'language_slugs'));
		}

		if($model->type_id == 6){		
			$state_service = Section::where('type_id', 6)->with('translations')->orderby('created_at', 'asc')->first();
			$state_service_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
			$organizations = Section::where('type_id', 9)->with('translations','posts')->first();
			$organizations_posts = Post::Where('section_id', $organizations->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
				if(count($state_service_posts) == 1){
					$organizations = Section::where('type_id', 9)->with('translations')->first();
						if(isset($state_service_posts[0]->organizations) && count($state_service_posts[0]->organizations) > 0){
							foreach($state_service_posts[0]->organizations as $key => $organizations){
									$posts_organizations[] = Post::where('id', $organizations)->with('translations')->first();
	
								}
							}else{
								$posts_organizations = '';
							}
				return view("website.pages.service.show", compact('model',
				'breadcrumbs','organizations','posts_organizations',
				 'state_service_posts' ,  'state_service', 'language_slugs',));
			}
					
			return view("website.pages.service.index", compact('model',
			 'breadcrumbs','organizations','organizations_posts',
			  'state_service_posts' ,  'state_service', 'language_slugs',));
		}		
		if ($model->type_id == 7) {
			$about_section = Section::where('type_id', 7)->with('translations')->first();		
			$about_section_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
			
			$citizen_banner = Banner::where('type_id', bannerTypes()['citizen_banner']['id'])->orderBy('date', 'desc')
            ->whereHas('translation', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })
            ->orderBy('date', 'desc')->limit('3')
            ->get();
			$state_banner = Banner::where('type_id', bannerTypes()['state_banner']['id'])->orderBy('date', 'desc')
            ->whereHas('translation', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })
            ->orderBy('date', 'desc')->limit('5')
            ->get();
			return view("website.pages.about.index", compact('model',
			 'breadcrumbs', 'about_section','state_banner',
			 'about_section_posts', 'language_slugs','citizen_banner'));
		}
		
		if($model->type_id == 9){

			
			$organizations = Section::where('type_id', 9)->with('translations')->first();
		
			if(isset($request->service_id) && ($request->service_id) != null){
				$service = Post::Where('id', $request->service_id)->first();
				
				if(isset($service->organizations) && count($service->organizations) > 0){
					foreach($service->organizations as $key => $organizations){
						$organizations_posts[] = Post::where('id', $organizations)->with('translations')->first();
						
					}
				}else{
					$organizations_posts = [];
				}
			}else{
			
				$organizations_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
					$q->where('active', 1)->whereLocale(app()->getLocale());
				})->orderBy('date', 'desc')->get();
			}	
	
			
			return view("website.pages.organizations.index", compact('model',
			 'breadcrumbs', 'organizations', 'organizations_posts', 'language_slugs'));
		}

		if ($model->type_id == 10){
			$publication = Section::where('type_id' , 10)->with('translations')->first();
			$publication_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
		
			return view("website.pages.publications.index", compact('model',
			 'breadcrumbs', 'publication', 'publication_posts',  'language_slugs'));
		}
        if ($model->type_id == 11) {
			$video  = Section::where('type_id', 11)->with('translations')->first();
			$video_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
			
			return view("website.pages.video.index", compact('model', 'breadcrumbs', 'video','video_posts', 'language_slugs'));
		}
		if($model->type_id == 12){
			$question = Section::where('type_id' , 12)->with('translations')->first();

			$question_posts = Post::Where('section_id', $model->id)->whereHas('translations', function ($q) {
				$q->where('active', 1)->whereLocale(app()->getLocale());
			})->orderBy('date', 'desc')->get();
			
			return view("website.pages.question.index", compact('model', 'breadcrumbs','question_posts' , 'question', 'language_slugs'));
		}
		return view("website.pages.{$model->type['folder']}.index", compact(['model', 'breadcrumbs', 'language_slugs']));
	}

	public static function submission(Request $request)
	{
		
		$validated = $request->validate([
			'name_surname' => 'required',
			'sub_section' => 'required',
			'letter' => 'required',
		]);

		$values = request()->all();
		if ($request->identity != 1) {
			$values['user_id'] = trans('website.unknown');
			$values['name'] = trans('website.unknown');
		}
		$values['additional'] = getAdditional($values, config('submissionAttr.additional'));
		$submission = Submission::create($values);
		
		

		return back()->with([
			'message' => trans('website.submission_sent'),
		]);
	}
	public static function contform(Request $request, $id){
		
		$values = request()->all();
		
		$values['model_id'] = $id;
		
		$mmail = $values['email'];
		
		$contact = Section::where('type_id', 4)->with('translations', 'posts')->first();
		$post = Post::where('section_id' , $contact->id)->with('translation')->first();
		$data2 = 'Your Contact Form has succsessfully been sent';
		$values['additional'] = getAdditional($values, config('submissionAttr.additional'));
		$submission = Submission::create($values);
		
		return back()->with([
			'message' => trans('website.submission_sent'),
		]);
	}
	public static function homePage($model, $locales = null)
	{
		if ($model == null) {
			$model = Section::where('type_id', 0)->first();
		}
		$news = Section::where('type_id', 2)->with( 'translations')->first();
		$news_posts = Post::Where('section_id', $news->id)->whereHas('translations', function ($q) {
			$q->whereActive(true)->whereLocale(app()->getLocale());
		})->where('active_on_home', 1)
->limit(4)
->orderBy('date', 'desc')
->get();
		$about_section = Section::where('type_id', 3)->with( 'translations')->first();
		$about_posts = Post::Where('section_id', $about_section->id)->with('translations', function ($q) {
			$q->whereActive(true)->whereLocale(app()->getLocale());
		})->where('active_on_home', 1)->orderBy('date', 'desc')->get();
		$state_service = Section::where('type_id', 6)->with( 'posts')->first();
		$state_posts = Post::Where('section_id', $state_service->id)->with('translations', function ($q) {
			$q->where('active', 1);
		})->where('active_on_home', 1)->get();
		$text_page = Section::where('type_id', 8)->with( 'posts')->first();
			$state_banner = Banner::where('type_id', bannerTypes()['state_banner']['id'])->orderBy('date', 'desc')
            ->whereHas('translation', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })
            ->orderBy('date', 'desc')->limit('5')
            ->get();
			$citizen_banner = Banner::where('type_id', bannerTypes()['citizen_banner']['id'])->orderBy('date', 'desc')
            ->whereHas('translation', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })
            ->orderBy('date', 'desc')->limit('3')
            ->get();
			

		return view('website.home',
		 compact('about_section', 'state_banner',
			'citizen_banner',
		   'state_service','model',
		    'news','news_posts','state_posts' ,'text_page' ));
	}
	public static function contact($model)
	{
		
		$breadcrumbs = [];
		$sec = $model;
		$breadcrumbs[] = [
			'name' => $model->title,
			'url' => $model->getFullSlug()
		];
		while ($sec->parent_id !== null) {
			$sec = Section::where('id', $model->parent_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $sec->title,
				'url' => $sec->getFullSlug()
			];
		}
		$sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();

		$breadcrumbs[] = [
			'name' => $sec->title,
			'url' => $sec->getFullSlug()
		];
		$breadcrumbs = array_reverse($breadcrumbs);
		$submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();

		return view("website.pages.contact.show", compact('model', 'submenu_sections', 'breadcrumbs'));
	}


	public static function submenu($model)
	{
		
		$breadcrumbs = [];
		$sec = $model;
		$breadcrumbs[] = [
			'name' => $model->title,
			'url' => $model->getFullSlug()
		];
		while ($sec->parent_id !== null) {
			$sec = Section::where('id', $model->parent_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $sec->title,
				'url' => $sec->getFullSlug()
			];
		}
		$sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();

		$breadcrumbs[] = [
			'name' => $sec->title,
			'url' => $sec->getFullSlug()
		];
		$breadcrumbs = array_reverse($breadcrumbs);
		$submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();
		
		return view("website.pages.submenu.index", compact('model', 'submenu_sections', 'breadcrumbs'));
	}


	public static function show($model)
	{
		
		$language_slugs = $model->getTranslatedFullSlugs();
		
			// BreadCrumb ----------------------------
		$breadcrumbs = [];
		$breadcrumbs[] = [
			'name' => $model[app()->getLocale()]->title,
			'url' => $model->getFullSlug()
		];
		if ($model->section_id !== null) {
			$section = Section::where('id', $model->section_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $section->title,
				'url' => $section->getFullSlug()
			];
			while ($model->parent_id !== null) {
				$sec = Section::where('id', $section->section_id)->with('translations')->first();
		
				$breadcrumbs[] = [
					'name' => $sec->title,
					'url' => $sec->getFullSlug()
				];
			}
		}
		$video  = Section::where('type_id', 11)->with('translations')->first();
		$video_posts = Post::where('section_id', $model->id)->with('translations')->orderby('date', 'desc')->get();
		$organizations = Section::where('type_id', 9)->with('translations')->first(); 
		
			if(isset($model->organizations) && count($model->organizations) > 0){
				foreach($model->organizations as $key => $organizations){
					$service_organizations[] = Post::where('id', $organizations)->with('translations')->first();
					
				}
			}else{
				$service_organizations = '';
			}
			$question = Section::where('type_id' , 12)->with('translations')->first();
			$question_posts = Post::where('section_id', $model->id)->wherehas('translations',function($q){
			$q->where('active', 1);
			$q->where('locale', app()->getlocale());
			})->where('active_on_home', 1)->orderby('date', 'desc')->get();
		$state_service = Section::where('type_id', 6 )->with('translations')->orderby('created_at', 'asc')->first();
		$state_service_posts = Post::where('section_id', $model->id)
		
		->with('translations')
		->orderby('date', 'desc')
		->get();	
		
		$news = Section::where('type_id', 2)->with('translations', 'posts')->first();
		$news_posts = Post::where('section_id', $model->id)->wherehas('translations',function($q){
			$q->where('active', 1);
			$q->where('locale', app()->getlocale());
		})->where('active_on_home', 1)->orderby('date', 'desc')->get();
		$news->posts()->with('translations')->orderby('date' , 'desc')->get();
	
	
		$breadcrumbs = array_reverse($breadcrumbs);
		$post = Post::where('posts.id', $model->id)
			->join('post_translations', 'posts.id', '=', 'post_translations.post_id')
			->where('post_translations.locale', '=', app()->getLocale())
			->select('posts.*', 'post_translations.text', 'post_translations.desc',  'post_translations.title', 'post_translations.locale_additional', 'post_translations.slug')
			->with('files')->first();

	
			$news_slider = Post::where('section_id',$model->section_id)
			->wherehas('translations' ,function($q){
				$q->where('active', 1);
				$q->where('locale', app()->getlocale());
			}) 
			->where('posts.id' , '!=', $model->id)
			->orderby('date', 'desc')->limit(settings('news_slider'))
			
			->get(); 

			$video_slider = Post::where('section_id', $model->section_id)
			->with('translations') 
			->where('posts.id' , '!=', $model->id)
			->orderby('date', 'desc')->limit(settings('video_slider'))->get(); 
			
		$state_slider = Post::where('section_id', $model->section_id)
		->with('translations', function($q){
			$q->where('active', 1);
			$q->where('locale', app()->getlocale());
		}) 
		->where('posts.id' , '!=', $model->id)
		->orderby('date', 'desc')
		->take(2)
		->get();
		$model->views = $model->views + 1;
		$model->save();
		

		return view("website.pages.{$section->type['folder']}.show", [
			'model' => $model,
			'section' => $section,
			'post' => $post,
			'post' => $model,
			'breadcrumbs' => $breadcrumbs,
			'language_slugs' => $language_slugs,
			'news' => $news,
			'news_posts'=> $news_posts,
			'video_posts'=> $video_posts,
			'video' => $video,
			'news_slider' => $news_slider,
			'video_slider' => $video_slider,
			'state_service_posts' => $state_service_posts,
			'state_service' => $state_service,
			'state_slider' => $state_slider,
			'service_organizations' => $service_organizations,
			'question_posts' => $question_posts,
			'question' => $question,
			
			
			

		])->render();
	}


	public static function subscribe(Request $request)
	{
		
		$email = $request->validate([
			'email' => 'required|email',
			
		]);
		$subscriber = Subscription::where('email', $email)->first();
		
		$values = request()->all();
		
		if ($subscriber == null) {
			$subscription = new Subscription;
			$subscription->locale = app()->getLocale();
			$subscription->email = $email['email'];
			$subscription->name = $values['name'];
			
			$subscription->surname = $values['surname'];
			
			$subscription->save();
			
			// Mail::to($email['email'])->send(new SubscribeMail($email));
			return redirect()->back()->with([
				'subscribe' => trans('website.successfuly_subscribed'),
			]);
			
		}else{
			$subscriber !== null;
			return back()->with([
				'subscribe' => trans('website.allready_subscribed'),
			]);
		
		}
	
	}


	public static function search(Request $request)
	{
		$model = [];
		$language_slugs['ka'] = 'ka/search?que='.$request->que;
		$language_slugs['en'] = 'en/search?que='.$request->que;
		$language_slugs['ru'] = 'en/search?que='.$request->que;
		$validatedData = $request->validate([
			'que' => 'required',
		]);
		$searchText = $validatedData['que'];
		
		$postTranlations = PostTranslation::whereActive(true)->whereLocale(app()->getLocale())
			->where('title', 'LIKE', "%{$searchText}%")
			->orWhere('desc', 'LIKE', "%{$searchText}%")
			->orWhere('text', 'LIKE', "%{$searchText}%")
			->orWhere('keywords', 'LIKE', "%{$searchText}%")
			->orWhere('locale_additional', 'LIKE', "%{$searchText}%")->pluck('post_id')->toArray();
		$posts  = Post::whereIn('id', $postTranlations)->with('translations', 'parent', 'parent.translations')->paginate(settings('paginate'));
		$posts->appends(['que' => $searchText]);
		$data = [];
		foreach ($posts as $post) {
			$data[] = [
				'slug' => $post->getFullSlug() ?? '#',
				'title' => $post->translate(app()->getLocale())->title,
				'desc' => str_limit(strip_tags($post->translate(app()->getLocale())->desc)),
			];
		}
		
		return view('website.pages.search.index', compact('posts', 'language_slugs' ,'searchText'));
	}	

	// public static function sendmail(){ 
	// 	$subscribers = Subscription::all();  
	// 	$posts = Post::where('created_at', ">", DB::raw('NOW() - INTERVAL 2 WEEK'))->with('translation')->get(); 
	// 	$items =[];
	// 	foreach($posts as $post){
	// 		$items[] = [
	// 			'title' => $post->translate()->title,
	// 			'slug' => $post->getFullSlug(),
	// 			'date' => $post->date
	// 		];	
	// 	}  
	// 	Mail::to($subscribers)->send(new \App\Mail\mailLinksToSubscribers([$items])); 

	//   }
	
  }
