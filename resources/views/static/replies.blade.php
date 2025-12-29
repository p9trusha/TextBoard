@extends("layouts.main")

@section("content")
    @include("includes.header")

    <div class="grid grid-cols-6 gap-4">
        @include("includes.aside")
        <div class="col-span-5">
            @include("includes.message", ["m" => $message])
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-1"></div>
                <div class="col-span-5">
                    @foreach ($replies as $r)
                    <li>
                        @include("includes.message", ["m" => $r])
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
