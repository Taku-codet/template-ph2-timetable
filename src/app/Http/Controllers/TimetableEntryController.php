<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;

class TimetableEntryController extends Controller
{
    public function index()
    {
        // 曜日順 → 同じ曜日の中では時限順 に並べて全件取得
        $entries = TimetableEntry::orderBy('day')
            ->orderBy('period')
            ->get();

        // resources/views/entries/index.blade.php に $entries を渡す
        return view('entries.index', ['entries' => $entries]);
    }

    // 登録フォームを表示する
    public function create()
    {
        return view('entries.create');
    }

    // フォームから送られた授業を保存する
    public function store(Request $request)
    {
        // 入力チェック。通った項目だけが $validated に入る
        $validated = $request->validate([
            'day' => ['required', 'integer', 'between:1,5'],
            'period' => ['required', 'integer', 'between:1,6'],
            'title' => ['required', 'string', 'max:255'],
            'room' => ['nullable', 'string', 'max:255'],
        ]);

        TimetableEntry::create($validated);

        return redirect('/entries');
    }
}
