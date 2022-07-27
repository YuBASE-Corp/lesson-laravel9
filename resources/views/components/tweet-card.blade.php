@props(['tweet'])
<div class="card card-body shadow-2 mb-2">
    <div class="d-flex justify-content-between">
        <p>
            <span class="font-weight-bold mr-2">{{ $tweet->user->name }}</span>
            <span style="font-size: 0.8rem;">{{ $tweet->created_at }}</span>
        </p>
    </div>
    <p class="card-text">
        {{ $tweet->message }}
    </p>
    {{-- 追記 --}}
    <div>
        @foreach($tweet->tags as $tag)
            <span class="badge badge-pill badge-primary">{{$tag->name}}</span>
        @endforeach
    </div>
    {{-- 追記完了 --}}
</div>