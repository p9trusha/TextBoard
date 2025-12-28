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
        $messages = $thread->messages;

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
        $thread->setAttributes($request->input("text"), $topic->getID());
        $topic->threads()->save($thread);

        return redirect()->route('topic', $topic_name)->with(
            compact("topics", "topic", "threads")
        );
    }

    public function add_messege(PostRequest $request, $topic_name, $thread_id)
    {
        $topics = Topic::all();
        $thread = Thread::find($thread_id);
        $messages = $thread->messages;


        $message = new Message();
        $message->setAttributes($request->input("text"), Post::find($thread_id)->id);
        $thread->messages()->save($message);

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
        $thread = Thread::find($thread_id);
        $messages = $thread->messages;
        $reepliedMessage = Message::find($message_id);

        $message = new Message();
        $message->setAttributes(
            $request->input("text"), $reepliedMessage->getID(), $message_id
        );
        $thread->messages()->save($message);

        return redirect()->route('thread', [$topic_name, $thread_id])->
        with(
            compact("topics", "topic_name", "messages")
        );
    }

    public function replies($topic_name, $thread_id, $message_id) {
        $topics = Topic::all();
        $thread = Thread::find($thread_id);
        $message = Message::find($message_id);
        $replies = $message->replies;
        return view(
            "static.replies",
            compact("topics", "topic_name", "thread", "message", "replies")
        );
    }
}
