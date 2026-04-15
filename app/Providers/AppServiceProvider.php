<?php

namespace App\Providers;

use App\Models\AllPage;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\YogaClass;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrap();

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('front.layouts.main', function ($view) {
            $setting = Setting::first();
            $yogaClass = YogaClass::select('title', 'slug')->orderBy('id', 'asc')->take(6)->get();
            $allPages = AllPage::select('title', 'slug')->orderBy('order', 'asc')->get();
            $faqs = Faq::all();

            $schemaList = [];
            foreach ($faqs as $faq) {
                foreach ($faq->faq_content as $list) {
                    $schemaList[] = [
                        "@type" => "Question",
                        "name" => $list['question'], // Assuming $list['question'] holds the question text
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => strip_tags($list['answer']) // Assuming $list['answer'] holds the answer text
                        ]
                    ];
                }
            }
            $faqSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => $schemaList,
            ];


            $view->with(compact('setting', 'yogaClass', 'allPages', 'faqs', 'faqSchema'));
        });
    }
}