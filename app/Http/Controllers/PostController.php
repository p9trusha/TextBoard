<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Message;
use App\Models\Thread;
use App\Models\Topic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function thread(Topic $topic, Thread $thread): View
    {
        $topics = Topic::paginate(Topic::paginationCount);
        $messages = $thread->messages;
        return view(
            "static.thread",
            compact("topics", "topic", "thread", "messages")
        );
    }

    public function addThread(PostRequest $request, Topic $topic): RedirectResponse
    {
        $thread = $topic->threads()->create([
            "text" => $request->input("text"),
        ]);

        $topics = Topic::paginate(Topic::paginationCount);
        $threads = Thread::whereNull("reply_to")->get()->all();

        return redirect()->route('topic', $topic)->with(
            compact("topics", "topic", "threads")
        );
    }

    public function addMessege(PostRequest $request, Topic $topic, Thread $thread): RedirectResponse
    {
        $message = $thread->messages()->create([
            "text" => $request->input("text"),
        ]);

        $topics = Topic::paginate(Topic::paginationCount);
        $messages = $thread->messages;

        return redirect()->route('thread', [$topic, $thread])
        ->with(
            compact("topics", "topic", "messages")
        );
    }

    public function showReplyForm(Topic $topic, Thread $thread, Message $message): View
    {
        return view(
            "static.replyMessageForm",
            compact("topic", "thread", "message")
        );
    }

    public function replyMessage(
        PostRequest $request, Topic $topic, Thread $thread, Message $message
        ): RedirectResponse
    {
       $message = $thread->messages()->create([
            "text" => $request->input("text"),
            "reply_to" => $message->id
        ]);

        $topics = Topic::paginate(Topic::paginationCount);
        $messages = $thread->messages;

        return redirect()->route('thread', [$topic, $thread])->
        with(
            compact("topics", "topic", "messages")
        );
    }

    public function replies(Topic $topic, Thread $thread, Message $message): View
    {
        $topics = Topic::paginate(Topic::paginationCount);
        $replies = $message->replies;
        return view(
            "static.replies",
            compact("topics", "topic", "thread", "message", "replies")
        );
    }
}
