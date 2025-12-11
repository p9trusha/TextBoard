@extends("layouts.main")

@section("content")
    @include("includes.header")

    <div class="grid grid-cols-6 gap-4">
        @include("includes.aside")
        <div class="col-span-5">
            <h1>{{ $thread->text }}</h1>
            <p>{{ $thread->created_at }}</p>
            <h2>Posts</h2>
            @foreach ($messages->all() as $m)
            <li>
                <a href="{{
                    route(
                    'reply_message.form',
                    [$topic_name, $thread->id, $m->id]
                    )
                    }}">
                    Reply
                </a>
                <h3>{{ $m->id }}</h3>
                @if ($m->reply_to)
                    <p>>>{{ $m->reply_to }}</p>
                @endif
                <p>{{ $m->text }}</p>
                <p>{{ $thread->created_at }}</p>
            </li>
            @endforeach
            <h2>Add message</h2>
            <form action="{{
            route('add_message',
            [$topic_name, $thread->id])
            }}" method="POST" class="flex flex-col">
                @include("includes.postForm")
            </form>
        </div>
    </div>
@endsection
