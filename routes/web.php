<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/show', function () {
    $post = Post::first();
    
    // return $post->fullname;
    return $post;
});

Route::get('/delete', function () {
    Post::destroy(27);

    $post = Post::get();

    return $post;
});

Route::get('/destroy', function () {
    //Post::destroy([1,2,3]);
    //Post::destroy(1,2,3);

    if (!$post = Post::where('id', 2)->first())
        return 'Page not found';

    dd($post->delete());
});

Route::get('/update', function (Request $request) {
    if (!$post = Post::find(1))
        return 'Post not found';
    
    // $post->title = 'Fala comigo';
    // $post->save();

    $post->update($request->all());

    dd($post);
});

Route::get('/insert', function (Request $request) { 
    $post = Post::create($request->all());
    
    // $post = Post::create([
    //     'user_id' => 1,
    //     'title' => 'Valor para Title',
    //     'body' => 'Valor do Body',
    //     'date' => date('Y-m-d'),        
    // ]);

    dd($post);

    $post = Post::get();

    return $post;
});

Route::get('/select', function () {
    // $users = User::all();
    // $users = User::where('id', 1)->get();
    // $user = User::where('id', 1)->first();
    // $user = User::first();
    // $user = User::find(10);
    // $user = User::findOrFail(101);
    // $user = User::findOrFail(request('id'));
    // $user = User::where('name', request('name'))firstOrFail();
    $user = User::firstWhere('name', request('name'));

    dd($user);
});

Route::get('/pagination', function (User $user) {
    $users = $user->paginate();
    
    return $users;
});