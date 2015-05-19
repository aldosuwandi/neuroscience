<?php namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Event;
use App\Home;
use Carbon\Carbon;
use Roumen\Sitemap;

class SitemapController extends Controller
{
    public function anyIndex()
    {
        $sitemap = \App::make("sitemap");
//        $sitemap->setCache('laravel.sitemap', 3600);

//        if (!$sitemap->isCached()) {
            /**
             * Home Banner
             */
            $homes = Home::all();
            $images = array();
            foreach ($homes as $home) {
                $images[] = array(
                    'url' => url() . '/uploads/' . $home->img_url,
                    'title' => $home->name,
                    'caption' => $home->caption
                );
            }
            $sitemap->add(url(), Carbon::now(), '1.0', 'monthly', $images);

            /**
             * Clinic, Category, Question, and Post
             */
            $clinics = \Cache::rememberForever('clinics', function () {
                return Clinic::all();
            });
            foreach ($clinics as $clinic) {
                $sitemap->add(url('clinic/' . $clinic->id . '/' . $clinic->slug),
                    $clinic->created_at, '1.0', 'monthly');
                foreach ($clinic->categories as $category) {
                    $sitemap->add(url('clinic/' . $clinic->id . '/' . $clinic->slug . '/' . $category->slug),
                        $category->created_at, '1.0', 'monthly');
                    foreach ($category->posts as $post) {
                        $sitemap->add(url('post/' . $post->id . '/' . $post->slug),
                            $post->created_at, '1.0', 'monthly');
                    }
                }
                foreach ($clinic->questions as $question) {
                    $sitemap->add(url('question/view/' . $clinic->id . '/' . $clinic->slug . '/' .
                        $question->id . '/' . str_slug($question->question_title)),
                        $question->created_at, '1.0', 'monthly');
                }
            }

            /**
             * Event
             */
            $events = Event::all();
            foreach ($events as $event) {
                $images = array();
                $images[] = array(
                    'url' => url() . '/uploads/' . $event->img_url,
                    'title' => $event->name,
                    'caption' => $event->caption
                );
                $sitemap->add(url('event/' . $event->id . '/' . str_slug($event->name)),
                    $event->created_at, '1.0', 'daily', $images);
            }

            /**
             * Doctor
             */
            $doctors = Doctor::all();
            foreach ($doctors as $doctor) {
                $images = array();
                $images[] = array(
                    'url' => url() . '/uploads/' . $doctor->img_url,
                    'title' => $doctor->name,
                    'caption' => $doctor->name
                );
                $sitemap->add(url('doctors/view/' . $doctor->id . '/' . str_slug($doctor->name)),
                    $doctor->created_at, '1.0', 'daily', $images);
            }
//        }

        return $sitemap->render();
    }
}