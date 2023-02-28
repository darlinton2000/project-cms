<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if ($page){
            return view('site.page', [
                'page' => $page
            ]);
        } else {
            abort(404);
        }
    }
}
