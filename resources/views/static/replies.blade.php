@extends("layouts.main")

@section("content")
    @include("includes.header")

    <div class="grid grid-cols-6 gap-4">
        @include("includes.aside")
        <div class="col-span-5">
            <h3>{{ $message->getID() }}</h3>
            @if ($message->getRepliedMessageID())
                <p>>>{{ $message->getRepliedMessageID() }}</p>
            @endif
            <a href="{{ route(
                            'reply_message.form',
                            [$topic_name, $thread->getID(), $message->getID()]
                        )}}">
                    Reply
            </a>
            <p>{{ $message->getText() }}</p>
            <p>{{ $message->getCreatedDate() }}</p>>
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-1"></div>
                <div class="col-span-5">
                    @foreach ($replies as $r)
                    <li>
                        <h3>{{ $r->getID() }}</h3>
                        @if ($r->getRepliedMessageID())
                            <p>>>{{ $r->getRepliedMessageID() }}</p>
                        @endif
                        <a href="{{
                            route(
                            'reply_message.form',
                            [$topic_name, $thread->getID(), $r->getID()]
                            )
                            }}">
                            Reply
                        </a>
                        <p>{{ $r->getText() }}</p>
                        <p>{{ $r->getCreatedDate() }}</p>
                        <a href="{{ route('replies', [$topic_name, $thread->getID(), $r->getID()]) }}">
                            Replies
                        </a>
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
