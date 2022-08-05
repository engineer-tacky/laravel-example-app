<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>つぶやきアプリ</title>
</head>

<body>
    <h1>つぶやきを編集する</h1>
    <div>
        <a href="{{ route('tweet.index') }}">戻る</a>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
            @method('PUT')
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力">{{ $tweet->content }}</textarea>
            <button type="submit">投稿</button>
            @error('tweet')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </form>
    </div>
</body>

</html>