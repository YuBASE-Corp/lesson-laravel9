<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Tweet::with(['user','tags'])->orderBy('created_at', 'desc')->get();
        $tags = Tag::all();

        return view('tweets', [
            'tweets' => $tweets,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|max:255'
        ]);

        $tweet = Tweet::create([
            'message' => $validated['message'],
            'user_id' => auth()->user()->id
        ]); // データを新規作成
        $tweet->tags()->attach($request->tags);
        return redirect()->route('tweets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        $this->authorize('update', $tweet);

        $tags = Tag::all();
        $selectedTags = $tweet->tags->pluck('id')->all();
        return view('edit', [
            'tweet' => $tweet,
            'tags' => $tags,
            'selectedTags' => $selectedTags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        $this->authorize('update', $tweet);

        $tweet->update([
            'message' => $request->message
        ]);

        $tweet->tags()->sync($request->tags);
        return redirect()->route('tweets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $this->authorize('delete', $tweet);

        $tweet->tags()->detach();
        $tweet->delete();
        return redirect()->route('tweets.index');       
    }

    public function search(Request $request)
    {
        if(!$request->has('keyword')) {
            return redirect('/tweets');
        }

        $keyword = $request->keyword;
        $tweets = Tweet::with(['user','tags'])
            ->where('message', 'LIKE', "%{$keyword}%")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('search', [
            'tweets' => $tweets,
            'keyword' => $keyword
        ]);
    }
}
