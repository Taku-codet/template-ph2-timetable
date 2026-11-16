<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>授業の登録</title>
</head>
<body>
    <h1>授業の登録</h1>

    @php
        $dayNames = [1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金'];
    @endphp

    {{-- 入力チェックで弾かれたときのエラー表示 --}}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/entries">
        @csrf

        <p>
            <label>曜日
                <select name="day">
                    @foreach ($dayNames as $value => $name)
                        <option value="{{ $value }}" @selected(old('day') == $value)>{{ $name }}</option>
                    @endforeach
                </select>
            </label>
        </p>

        <p>
            <label>時限
                <select name="period">
                    @for ($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}" @selected(old('period') == $i)>{{ $i }}限</option>
                    @endfor
                </select>
            </label>
        </p>

        <p>
            <label>授業名
                <input type="text" name="title" value="{{ old('title') }}">
            </label>
        </p>

        <p>
            <label>教室（空欄可）
                <input type="text" name="room" value="{{ old('room') }}">
            </label>
        </p>

        <button type="submit">登録する</button>
    </form>

    <p><a href="/entries">一覧に戻る</a></p>
</body>
</html>
