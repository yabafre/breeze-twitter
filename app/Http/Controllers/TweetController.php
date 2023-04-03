<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTweetRequest;
use App\Models\Tweet;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    //
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tweets = Tweet::with('user')->latest()->paginate(3);

        return view('tweets.index', compact('tweets'));
    }

    public function store(StoreTweetRequest $request): \Illuminate\Http\RedirectResponse
    {
        $tweet = new Tweet($request->validated());
        $tweet->user_id = auth()->id();
        $tweet->save();

        return redirect()->route('tweets.index')->with('success', 'Tweet créé avec succès.');
    }
    /**
     * @throws AuthorizationException
     */
    public function destroy(Tweet $id): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $id);
        $id->delete();
        return redirect()->route('tweets.index')->with('success', 'Tweet supprimé avec succès.');
    }
    public function destroyProfile(Tweet $id): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $id);
        $id->delete();
        return redirect()->route('profile.user', $id->user->username)->with('success', 'Tweet supprimé avec succès.');
    }

}
