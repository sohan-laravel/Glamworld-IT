<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\About;
use App\Model\Category;
use App\Model\Cta;
use App\Model\Footer;
use App\Model\Hero;
use App\Model\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $hero = Hero::where('status', 1)->orderBy('id', 'desc')->get();
        $about = About::where('status', 1)->orderBy('id', 'desc')->get();
        $service = Service::where('status', 1)->orderBy('id', 'desc')->get();
        $cta = Cta::where('status', 1)->orderBy('id', 'desc')->get();
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $footer = Footer::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.index', compact('hero', 'about', 'service', 'cta', 'category', 'footer'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function test()
    {
        return view('frontend.pages.test');
    }
}
