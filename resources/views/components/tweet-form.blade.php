{{-- プロパティ追記 --}}
@props(['tags'])
<form action="{{ route('tweets.store') }}" method="POST" class="card card-body shadow-2 mb-3">
    @csrf
    <div class="mb-2">
        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">ぼやいったー</p>
        <div class="form-outline">
            <textarea class="form-control" id="text-area" rows="3" name="message" placeholder="ぼやきを入力"></textarea>
        </div>
    </div>
    {{-- タグ付け用チェックボックス ここから --}}
    <div class="mb-2">
        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">タグを選択</p>
        <div class="form-outline mb-2">
            @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tag-checkbox{{$tag->id}}" name="tags[]" value="{{$tag->id}}" />
                    <label class="form-check-label" for="tag-checkbox2">{{$tag->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
    {{-- タグ付け用チェックボックス ここまで --}}
    <button
        type="submit"
        class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold"
    >
        ぼやきを投稿
    </button>
</form>