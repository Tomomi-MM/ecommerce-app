<?php

namespace App\Http\Controllers;

use App\Services\RakutenService;
use Illuminate\Http\Request;

class RakutenController extends Controller
{
    protected $rakutenService;

    public function __construct(RakutenService $rakutenService)
    {
        $this->rakutenService = $rakutenService;
    }

    // 検索フォームの表示
    public function index()
    {
        return view('search.index');
    }

    // 楽天市場APIで検索
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $genreId = $request->input('genreId');

        $results = $this->rakutenService->searchItems($keyword, ['genreId' => $genreId]);

        return view('search.results', compact('results'));
    }
}
