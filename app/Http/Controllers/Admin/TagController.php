<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Tag;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        try
        {
            $tagData = $request->all();
            $request->validated();

            $tag = new Tag();
            $tag->create($tagData);
            flash('Tag criada com sucesso')->success();
        }
        catch( Exception $e)
        {
            flash('Erro ao tentar criar tag<br>' . $e->getMessage())->error();
        }
        return redirect()->route('tag.index');
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
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        try
        {
            $tagData = $request->all();
            $request->validated();
            $user = Tag::findOrFail($id);
            $user->update($tagData);

            flash('Tag editada com sucesso')->success();
        }
        catch( Exception $e)
        {
            flash('Error ao tentar editar tag<br>' . $e->getMessage())->error();
        }
        return redirect()->route('tag.index');
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
            $tag = Tag::findOrFail($id);
            $tag->posts()->detach();
            $tag->delete();

            flash('Tag deletada com sucesso')->success();
        }
        catch(Exception $e)
        {
            flash('Error ao tentar deletar tag<br>' . $e->getMessage())->error();
        }

        return redirect()->route('tag.index');
    }
}
