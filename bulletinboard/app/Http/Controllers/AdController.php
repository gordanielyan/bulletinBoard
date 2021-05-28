<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth', ['create', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        Paginator::useBootstrap();
        $ads = Ad::paginate(5);
        return view('ad.index')->with('ads', $ads);
    }

    public function create()
    {
        $user_name = Auth::user()->name;
        return view('ad.create')->with('user_name', $user_name);
    }

    public function store(AdRequest $request)
    {
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
        return view('ad.show')->with('ad', $ad);
    }

    public function edit($id)
    {
        $ad = Ad::find($id);

        return view('ad.edit')->with('ad', $ad);
    }

    public function update(AdRequest $request, $id)
    {
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
        Ad::find($id)->delete();

        return redirect('/');
    }
}
