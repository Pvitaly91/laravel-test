<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        News::create($data);
        return redirect()->route('news.index');
    }

    public function show(News $news): View
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news): View
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $news->update($data);
        return redirect()->route('news.show', $news);
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
