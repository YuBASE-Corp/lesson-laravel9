<form action="{{ route('tweets.store') }}" method="POST" class="card card-body shadow-2 mb-3">
    @csrf
    <div class="mb-2">
        <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">ぼやいったー</p>
        <div class="form-outline">
            <textarea class="form-control" id="text-area" rows="3" name="message" placeholder="ぼやきを入力"></textarea>
        </div>
    </div>
    <button
        type="submit"
        class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold"
    >
        ぼやきを投稿
    </button>
</form>