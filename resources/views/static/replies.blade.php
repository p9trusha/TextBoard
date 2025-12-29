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
                    @include("includes.messages", ["messages" => $replies])
                </div>
            </div>
        </div>
    </div>
@endsection
