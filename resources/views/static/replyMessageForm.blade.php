@extends("layouts.main")
@section("content")
    <form action="{{
    route('replyMessage.submit', [$topic, $thread, $message])
    }}" method="POST" class="flex flex-col">
        @include("includes.postForm")
    </form>
@endsection
