<div class="col-span-1">
    <h1>Topics</h1>
    @foreach ($topics->all() as $t)
        <li><a href="{{ route('topic', $t->name) }}">{{ $t->name }}</a></li>
    @endforeach
</div>
