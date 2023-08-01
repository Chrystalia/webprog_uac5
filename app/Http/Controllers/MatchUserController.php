<?php

namespace App\Http\Controllers;

use App\Models\MatchUser;
use App\Http\Requests\StoreMatchUserRequest;
use App\Http\Requests\UpdateMatchUserRequest;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUserId = Auth::id();
        return view('dashboard',
        [
            'page' => 'home',
            'users' => User::where('id', '!=', $currentUserId)->get()
        ]);
    }

    public function like(int $id)
    {
        $user = auth()->user();
        $otherUser = User::find($id);

        Like::create([
            'user_one' => $user->id,
            'user_two' => $otherUser->id
        ]);

        return redirect('/dashboard');
    }

    public function dislike(int $id)
    {
        $user = auth()->user();
        $otherUser = User::find($id);

        Dislike::create([
            'user_one' => $user->id,
            'user_two' => $otherUser->id
        ]);

        return redirect('/dashboard');
    }

    public function match() {
        $userId = auth()->id();

        // Select all users where there is a match
        $matches = DB::table('likes as l1')
            ->join('likes as l2', function ($join) use ($userId) {
                $join->on('l1.user_one', '=', 'l2.user_two')
                    ->on('l1.user_two', '=', 'l2.user_one');
            })
            ->join('users', 'l1.user_two', '=', 'users.id')
            ->where('l1.user_one', '=', $userId)
            ->distinct()
            ->get(['linkedin_username', 'photo', 'gender', 'field_of_work_interests']);

        return view('/match', [
            'matches' => $matches,
            'page' => 'match'
        ]);
    }

    public function liked() {
        $userId = auth()->id();

        // Select all users where there is a match
        $likesMe = DB::table('likes as l1')
        ->join('users', 'l1.user_one', '=', 'users.id')
        ->where('l1.user_two', '=', $userId)
        ->distinct()
        ->get(['linkedin_username', 'photo', 'gender', 'field_of_work_interests']);

        return view('/liked', [
            'likesMe' => $likesMe,
            'page' => 'liked'
        ]);
    }

    public function chat(int $id){
        $user = auth()->user();
        $otherUser = User::find($id);

        return view('chat', [
            'user' => $user,
            'otherUser' => $otherUser,
            'page' => 'chat'
        ]);
    }
}
