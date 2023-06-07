<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Section;
use App\Models\Banner;
use App\Models\User;
use Carbon\Carbon;
class WebsiteComposer
{

    private $sections;
    private $footerSections;
    private $contact;
    private $midlleBanner;
    private $mainBanner;
    private $disclaimer;
    private $organizations_post;
    
    public function __construct()
    {
        $this->sections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })
        ->whereHas('menuTypes', function($q){
            $q->where('menu_type_id', 1);
        })
        ->with([
            'children' => function ($query) {
                $query->whereHas('menuTypes', function($q){
                            $q->where('menu_type_id', 1);
                        })
                        ->whereHas('translations', function($q) {
                            $q->whereActive(true)->whereLocale(app()->getLocale());
                        })
                        ->with([
                            'children' => function ($query) {
                                $query->whereHas('menuTypes', function($q){
                                            $q->where('menu_type_id', 1);
                                        })
                                        ->whereHas('translations', function($q) {
                                            $q->whereActive(true)->whereLocale(app()->getLocale());
                                        })
                                        ->with([
                                            'children' => function ($query) {
                                                $query->whereHas('menuTypes', function($q){
                                                            $q->where('menu_type_id', 1);
                                                        })
                                                        ->whereHas('translations', function($q) {
                                                            $q->whereActive(true)->whereLocale(app()->getLocale());
                                                        });
                                            }
                                        ]);
                            }
                        ]);
            }
        ])
        ->where('parent_id', null)
        ->orderBy('order', 'asc')
        ->get();
         $this->footerSections = Section::whereHas('translations', function($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })
        ->whereHas('menuTypes', function($q){
            $q->where('menu_type_id', 2);
        })->with('children', function($query){
            $query->whereHas('menuTypes', function($q){
                $q->where('menu_type_id', 2 );
            });
        })
        ->where('parent_id', null)
        ->orderBy('order', 'asc')
        ->get();
        $this->contact = Section::where('type_id', sectionTypes()['contact' ]['id'])
        ->whereHas('translation', function ($q) {
            $q->whereActive(true)->whereLocale(app()->getLocale());
        })
        ->whereHas('menuTypes', function($q) {
            $q->where('menu_type_id', menuTypeByKey('mainMenu'));
        })
        ->first();
        
       
       
            $this->mainBanner = Banner::where('type_id', bannerTypes()['main_banner']['id'])->orderBy('date', 'desc')
            ->whereHas('translation', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })->orderBy('date', 'desc')->get();

            $this->midlleBanner = Banner::where('type_id', bannerTypes()['midlle_banner']['id'])->orderBy('date', 'desc')
            ->whereHas('translation', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })
            ->orderBy('date', 'desc')
            ->get();
            $this->organizations_post = Section::where('type_id', 9)->with('translations','posts')->first();
		    $this->disclaimer = Banner::where('type_id', bannerTypes()['disclaimer']['id'])->orderBy('date', 'desc')
            ->whereHas('translation', function ($q) {
                $q->where('active', 1)->whereLocale(app()->getLocale());
            })
            ->orderBy('date', 'desc')
            ->get();

    }
    public function compose(View $view)
    {
        $view->with([
			'sections' => $this->sections,
			'footerSections' => $this->footerSections,
			'mainBanner' => $this->mainBanner,
            'contact' => $this->contact,
            'midlleBanner' => $this->midlleBanner,
            'organizations_post' => $this->organizations_post,
	        'disclaimer' => $this->disclaimer
		]);
    }
}
