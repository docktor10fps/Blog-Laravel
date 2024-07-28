<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\BaseController;
use App\Services\Home\Service;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Service $service)
    {
        parent::__construct($service);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $data = $this->service->show($userId);

        $posts = $data['posts'];
        $comments = $data['comments'];
        $tags = $data['tags'];

        return view('home', compact('posts', 'comments', 'userId', 'tags'));
    }
}
