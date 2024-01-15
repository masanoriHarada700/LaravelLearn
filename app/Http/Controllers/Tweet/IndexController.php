<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\TweetService;

// class IndexController extends Controller
// {
//     public function __invoke(Request $request)
//     {
//         return View::make('tweet.index', ['name' => 'laravel']);
//     }
// }


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        $tweets = $tweetService->getTweets();
        // dump($tweets);
        // app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dumpreport.'));
        // dd($tweets);
        return view('tweet.index')
            ->with('tweets', $tweets);
    }
}
