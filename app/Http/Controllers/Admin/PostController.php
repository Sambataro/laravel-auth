<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\MailTest;
use Illuminate\Support\Facades\Mail; 


class PostController extends Controller
{
    private $postValidation = [
        'title' => 'required|max:100',
        'paragraph' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get(); /* l'utente loggato può vedere e modificare solo i suoi post*/

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required',
            'paragraph' => 'required',
        ]);

        $newPost = new Post();
        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::id();
        $data['image_path'] = Storage::disk('public')->put('images', $data['image_path']); 

        $newPost->fill($data); /*senza fillable nel model non funzina*/
        $saved = $newPost->save();

        if ($saved) {
            Mail::to('pippo@gmail.com')->send(new MailTest());
            return redirect()->route('admin.posts.index')
            ->with('message', 'Post ' . $newPost->title . ' creato correttamente');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data = $request->validate($this->postValidation);
        $name = $post->name;
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('message', 'il post'. ' '.  $name .' '.  ' è stato aggiornata correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $name = $post->name;
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'il post'. ' '.  $name .' '.  ' è stata cancellato correttamente');
    }
}
