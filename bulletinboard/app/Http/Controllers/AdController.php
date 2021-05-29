<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{

    public function index()
    {
        Paginator::useBootstrap();
        $ads = Ad::paginate(5);
        return view('ad.index')->with('ads', $ads);
    }

    public function create()
    {
        if (!Auth::check()) {
            abort(403);
        }
        return view('ad.create')->with('user_name');
    }

    public function store(AdRequest $request)
    {
        if (!Auth::check()) {
            abort(403);
        }
        $request->validated();

        $ad = Ad::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_name' => $request->input('author_name'),
            'user_id' => auth()->id()
        ]);
        return redirect('/' . $ad->id);
    }

    public function show($id)
    {
        $ad = Ad::find($id);
        if (!$ad)
            abort(404);
        return view('ad.show')->with('ad', $ad);
    }

    public function edit($id)
    {
        $ad = Ad::find($id);
        if (!$ad)
            abort(404);
        if (!Auth::check() || Auth::id() !== $ad->user_id)
            abort(403);
        return view('ad.edit')->with('ad', $ad);
    }

    public function update(AdRequest $request, $id)
    {
        $ad = Ad::find($id);
        if (!$ad)
            abort(404);
        if (!Auth::check() || Auth::id() !== $ad->user_id) {
            abort(403);
        }
        $request->validated();
        Ad::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $ad = Ad::find($id);
        if (!$ad)
            abort(404);
        if (!Auth::check() || Auth::id() !== $ad->user_id) {
            abort(403);
        }
        $ad->delete();
        return redirect('/');
    }
}
