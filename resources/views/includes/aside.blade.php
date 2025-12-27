<div class="col-span-1">
    <h1>Topics</h1>
    @foreach ($topics as $t)
        <li><a href="{{ route('topic', $t->getName()) }}">{{ $t->getName() }}</a></li>
    @endforeach
</div>
