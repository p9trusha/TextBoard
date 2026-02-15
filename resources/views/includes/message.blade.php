<h3>{{ $m->getID() }}</h3>
@if ($m->getRepliedMessageID())
    <p>>>{{ $m->getRepliedMessageID() }}</p>
@endif
<a href="{{
    route(
    'replyMessage.form',
    [$topic, $thread, $m]
    )
    }}">
    Reply
</a>
<p>{{ $m->getText() }}</p>
<p>{{ $m->getCreatedDate() }}</p>
<a href="{{ route('replies', [$topic, $thread, $m]) }}">
    Replies
</a>
