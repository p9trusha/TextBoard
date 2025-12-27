<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Message;
use App\Models\Post;
use App\Models\Thread;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function thread($topic_name, $thread_id)
    {
        $topics = Topic::all();
        $thread = Thread::find($thread_id);
        $messages = $thread->getMessages();

        return view(
            "static.thread",
            compact("topics", "topic_name", "thread", "messages")
        );
    }

    public function add_thread(PostRequest $request, $topic_name)
    {
        $topics = Topic::all();

        $threads = Thread::whereNull("reply_to")->get()->all();

        $topic = Topic::where('name', $topic_name)->first();

        $thread = new Thread();
        $thread->setAttributes($request->input("text"), $topic->getID(), "topic");
        $thread->save();

        return redirect()->route('topic', $topic_name)->with(
            compact("topics", "topic", "threads")
        );
    }

    public function add_messege(PostRequest $request, $topic_name, $thread_id)
    {
        $topics = Topic::all();
        $messages = Message::where("parent_type", "post")->
        where("parent", $thread_id)->get()->all();


        $message = new Message();
        $message->setAttributes($request->input("text"), Post::find($thread_id)->id);
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
        $messages = Message::where("parent_type", "post")->
        where("parent", $thread_id)->get()->all();

        $message = new Message();
        $message->setAttributes(
            $request->input("text"), Post::find($thread_id)->getID(), $message_id
        );
        $message->save();

        return redirect()->route('thread', [$topic_name, $thread_id])->
        with(
            compact("topics", "topic_name", "messages")
        );
    }
}
