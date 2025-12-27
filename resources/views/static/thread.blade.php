@extends("layouts.main")

@section("content")
    @include("includes.header")

    <div class="grid grid-cols-6 gap-4">
        @include("includes.aside")
        <div class="col-span-5">
            <h1>{{ $thread->getText() }}</h1>
            <p>{{ $thread->getCreatedDate() }}</p>
            <h2>Posts</h2>
            @foreach ($messages as $m)
            <li>
                <a href="{{
                    route(
                    'reply_message.form',
                    [$topic_name, $thread->getID(), $m->getID()]
                    )
                    }}">
                    Reply
                </a>
                <h3>{{ $m->getID() }}</h3>
                @if ($m->getRepliedMessageID())
                    <p>>>{{ $m->getRepliedMessageID() }}</p>
                @endif
                <p>{{ $m->getText() }}</p>
                <p>{{ $thread->getCreatedDate() }}</p>
            </li>
            @endforeach
            <h2>Add message</h2>
            <form action="{{
            route('add_message',
            [$topic_name, $thread->getID()])
            }}" method="POST" class="flex flex-col">
                @include("includes.postForm")
            </form>
        </div>
    </div>
@endsection
