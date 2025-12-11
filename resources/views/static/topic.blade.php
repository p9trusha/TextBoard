@extends("layouts.main")

@section("content")
@include("includes.header")
<h1>Topic name</h1>
<div class="grid grid-cols-6 gap-4">
    @include("includes.aside")
    <div class="col-span-5">
        <h2>Threads</h2>
        @foreach ($threads->all() as $th)
            <li>
                <a href="{{ route('thread',
                 [$topic->name, $th->id]) }}">
                    {{ $th->text }}
                </a>
            </li>
        @endforeach
        <h1>Add thread</h1>
        <form action="{{ route('add_thread', $topic->name) }}"
            method="POST" class="flex flex-col">
            @include("includes.postForm")
        </form>
    </div>
</div>
@endsection
