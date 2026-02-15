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

    public function topic($topic_name): View
    {
        $topics = Topic::all();
        $topic = Topic::where("name", $topic_name)->first();
        $threads = $topic->threads;

        return view("static.topic",
        compact("topics", "topic", "threads"));
    }

    public function add_topic(TopicRequest $request): RedirectResponse
    {
        $topics = Topic::all();

        $topic = new Topic();
        $topic->setName($request->input('name'));
        $topic->save();

        return redirect()->route('home')->with("topics", $topics);
    }
}
