<h3>{{ $m->getID() }}</h3>
@if ($m->getRepliedMessageID())
    <p>>>{{ $m->getRepliedMessageID() }}</p>
@endif
<a href="{{
    route(
    'reply_message.form',
    [$topic_name, $thread->getID(), $m->getID()]
    )
    }}">
    Reply
</a>
<p>{{ $m->getText() }}</p>
<p>{{ $m->getCreatedDate() }}</p>
<a href="{{ route('replies', [$topic_name, $thread->getID(), $m->getID()]) }}">
    Replies
</a>
