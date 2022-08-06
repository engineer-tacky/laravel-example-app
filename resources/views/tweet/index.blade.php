<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>つぶやきアプリ</title>
</head>

<body>
    <h1>つぶやきアプリ</h1>
    <div>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color: green;">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweet.create') }}" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力"></textarea>
            <button type="submit">投稿</button>
            @error('tweet')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </form>

        @foreach ($tweets as $tweet)
            <details>
                <summary>{{ $tweet->content }}</summary>
                <div>
                    <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                </div>
                <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </details>
        @endforeach
    </div>
</body>

</html>
