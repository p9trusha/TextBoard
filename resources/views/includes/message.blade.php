<h3>{{ $m->id }}</h3>
@if ($m->reply_to)
    <p>>>{{ $m->reply_to }}</p>
@endif
<a href="{{
    route(
    'replyMessage.form',
    [$topic, $thread, $m]
    )
    }}">
    Reply
</a>
<p>{{ $m->text }}</p>
<p>{{ $m->created_at }}</p>
<a href="{{ route('replies', [$topic, $thread, $m]) }}">
    Replies
</a>
