<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\TopicRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view("static.home")->with("topics", $topics);
    }

    public function topic($topic_name)
    {
        $topics = Topic::all();

        $topic = $topics->where("name", $topic_name)->first();
        $threads = Post::where("parent_type", "topic")->
        where("parent", $topic->id)->whereNull("reply_to")->get();

        return view("static.topic",
        compact("topics", "topic", "threads"));
    }

    public function add_topic(TopicRequest $request)
    {
        $topics = Topic::all();

        $topic = new Topic();
        $topic->name = $request->input('name');
        $topic->save();

        return redirect()->route('home')->with("topics", $topics);
    }
}
