<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photos = Photo::all();
        return view('photos.index', compact('photos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('photos.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimetypes:image/jpeg,image/png',
        ]);
        //画像ファイルの保存
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . "." . $ext;
        $file->storeAs('public/images', $filename);
        // 投稿内容をDBに保存
        $photo = \Auth::user()->photos()->create([
            'filename' => $filename,
        ]);


        $photo->tags()->attach(request()->tags);
        return redirect()->route('photos.index')->with('success', '新規登録完了しました');
    }

    //

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);
        $tags = $photo->tags->pluck('id')->toArray();
        $tagList = Tag::all();
        return view('photos.edit', compact('photo', 'tags', 'taglist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'filename' => $request->filename,
        ];
        Photo::where('id', $id)->update($update);
        $photo = Photo::find($id);
        $photo->tags()->sync(request()->tags);
        return back()->with('success', '編集完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        $photo->tags()->detach();
        return redirect()->route('photos.index')->with('success', '削除完了しました');
    }
}
