<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function thread($topic_name, $thread_id)
    {
        $topics = Topic::all();
        $thread = Post::find($thread_id);
        $messages = Post::where("parent_type", "post")->
        where("parent", $thread_id)->get();

        return view(
            "static.thread",
            compact("topics", "topic_name", "thread", "messages")
        );
    }

    public function add_thread(PostRequest $request, $topic_name)
    {
        $topics = Topic::all();

        $threads = Post::whereNull("reply_to")->get();

        $topic = Topic::where('name', $topic_name)->first();

        $thread = new Post();
        $thread->text = $request->input('text');
        $thread->parent = $topic->id;
        $thread->parent_type = "topic";
        $thread->save();


        return redirect()->route('topic', $topic_name)->with(
            compact("topics", "topic", "threads")
        );
    }

    public function add_messege(PostRequest $request, $topic_name, $thread_id)
    {
        $topics = Topic::all();
        $topic_name = Topic::where("name", $topic_name)->first()->name;
        $messages = Post::where("parent_type", "post")->
        where("parent", $thread_id)->get();


        $message = new Post();
        $message->text = $request->input('text');
        $message->parent = Post::find($thread_id)->id;
        $message->parent_type = "post";
        $message->save();

        return redirect()->route('thread', [$topic_name, $thread_id])
        ->with(
            compact("topics", "topic_name", "messages")
        );
    }

    public function showReplyForm($topic_name, $thread_id, $message_id)
    {
        return view(
            "static.reply_message_form",
            compact("topic_name", "thread_id", "message_id")
        );
    }

    public function replyMessage(
        PostRequest $request, $topic_name, $thread_id, $message_id
        )
    {
        $topics = Topic::all();
        $topic_name = Topic::where("name", $topic_name)->first()->name;
        $messages = Post::where("parent_type", "post")->
        where("parent", $thread_id)->get();

        $message = new Post();
        $message->text = $request->input('text');
        $message->parent = Post::find($thread_id)->id;
        $message->parent_type = "post";
        $message->reply_to = $message_id;
        $message->save();

        return redirect()->route('thread', [$topic_name, $thread_id])->
        with(
            compact("topics", "topic_name", "messages")
        );
    }
}
