@extends("layouts.main")

@section("content")
    <h1>Topics</h1>
    @foreach ($topics as $topic)
        <li>
            <a href="{{ route('topic', $topic->name) }}">
                {{ $topic->name }}
            </a>
        </li>
    @endforeach
    <h1>Add topic</h1>
    <form action="{{ route('add_topic') }}" method="POST" class="flex flex-col">
                @csrf
                <div class="flex flex-col">
                    <label for="text">Name</label>
                    <input type="text" placeholder="Enter name of topic:"
                    name="name" id="name">
                    </input>
                </div>
                <button type="submit">Add</button>
            </form>
@endsection
