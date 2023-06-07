<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Submission;
use Illuminate\Support\Facades\Config;
class DashboardComposer

{
    public $locales = [];

    public function __construct()
    {
        $this->notifications = Submission::where('seen', 0)->with('post.parent')->orderBy('created_at', 'desc')->get();

        foreach (Config::get('app.locales') as $locale) {
           
            $currentLocale = "/".app()->getLocale()."/";
            $thisLocale = "/".$locale."/";
            $this->locales[$locale] = str_replace($currentLocale,$thisLocale,url()->full());
            
        }
    }


    public function compose(View $view)
    {

        $view->with([
            'notifications' => $this->notifications,
            "locales" => $this->locales
        ]);
    }
}
