<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Exception;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts;

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $message = 'Post criado com sucesso';

        try
        {
            $postData = $request->all();
            $request->validated();

            if($postData['tags'] === null)
                return new \Exception();

            // criação do post e anexo das tags
            $user = Auth::user();
            $createPost = $user->posts()
                ->create($postData);

            $createPost->tags()
                ->attach($postData['tags']);

            // anexo de fotos
            foreach ($request->file('photos') as $photo)
            {
                $newName = $photo->getClientOriginalName();
                $photo->move(public_path('images'), $newName);

                $createPost->photos()
                    ->create([
                    'photo' => $newName
                ]);
            }

            flash($message)->success();
        }
        catch (Exception $e)
        {
            $message = 'Erro ao tentar criar post<br>' . $e->getMessage();
            flash($message)->error();
        }

        return response()->json([
            'error' => false,
            'message'  => $message,
        ], 200);
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
    public function edit(Post $post)
    {
        $post_tags = $post->tags;
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'tags', 'post_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try
        {
            // mensagem de retorno
            $message = 'Post atualizado com sucesso';

            $postData = $request->all();
            $request->validated();
            $post = Post::find($id);

            $post->update($postData);

            $post->tags()->sync($postData['tags']);

            // anexo de fotos
            if ($request->hasFile('photos') && $request->file('photo')->isValid())
            {
                foreach ($request->file('photos') as $photo)
                {
                    $newName = $photo->getClientOriginalName();
                    $photo->move(public_path('images'), $newName);

                    $post->photos()
                        ->create([
                        'photo' => $newName
                    ]);
                }

                $message .= '<br> adição de imagem bem sucedida';
            }
            else
            {
                $message .= '<br> Nenhuma imagem adicionada';
            }

            flash($message)->success();
        }
        catch (Exception $e)
        {
            flash('Erro ao tentar atualiza o post<br>' . $e->getMessage())->error();
        }

        return response()->json([
            'error' => false,
            'message' => $message
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $post = Post::findOrFail($id);
            $post->tags()->detach();

            // deleta foto no diretorio: error
            //Storage::delete('/public/images/' . $post->photos()->photo);

            $post->photos()->delete();
            $post->delete();
            flash('Post deletado com sucesso')->success();
        }
        catch (Exception $e)
        {
            flash('Erro ao tentar deletar o post<br>' . $e->getMessage())->error();
        }
        return redirect()->route('post.index');
    }
}
