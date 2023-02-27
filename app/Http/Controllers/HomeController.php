<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Contagem de Visitantes
        $visitsCount = Visitor::count();
        
        // Contagem de Usuários Online
        $datelimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlineList = Visitor::select('ip')->where('date_access', '>=', $datelimit)->groupBy('ip')->get();
        $onlineCount = count($onlineList);

        // Contagem de Páginas
        $pageCount = Page::count();

        // Contagem de Usuários
        $userCount = User::count();

        return view('home', [
            'visitsCount' => $visitsCount,
            'onlineCount' => $onlineCount,
            'pageCount'   => $pageCount,
            'userCount'   => $userCount
        ]);
    }
}
