<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TopicController extends Controller
{
    public function index(): View
    {
        $topics = Topic::all();
        return view("static.home")->with("topics", $topics);
    }

    public function topic(Topic $topic): View
    {
        $topics = Topic::paginate(Topic::paginationCount);
        $threads = $topic->threads;

        return view("static.topic",
        compact("topics", "topic", "threads"));
    }

    public function addTopic(TopicRequest $request): RedirectResponse
    {
        Topic::create([
            "name" => $request->input('name')
        ]);

        $topics = Topic::paginate(Topic::paginationCount);

        return redirect()->route('home')->with("topics", $topics);
    }
}
