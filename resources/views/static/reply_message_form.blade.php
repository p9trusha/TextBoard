@extends("layouts.main")

@section("content")
    <form action="{{
    route('reply_message.submit', [$topic_name, $thread_id, $message_id])
    }}" method="POST" class="flex flex-col">
        @include("includes.postForm")
    </form>
@endsection
