<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(): View
    {
        //get posts
        $posts = Post::all();

        //render view with posts
        return view('posts.index', compact('posts'));
    }

      /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'     => 'required|min:5',
            'bidang_usaha'   => 'required',
            'persyaratan'   => 'required|min:10',
            'lowongan_pekerjaan'   => 'required',
            'tanggal_posting'   => 'required',
            'tanggal_deadline'   => 'required',
            'deskripsi'   => 'required|min:10',
            'lokasi'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'judul'     => $request->judul,
            'bidang_usaha'   => $request->bidang_usaha,
            'persyaratan'   => $request->persyaratan,
            'lowongan_pekerjaan'   => $request->lowongan_pekerjaan,
            'tanggal_posting'   => $request->tanggal_posting,
            'tanggal_deadline'   => $request->tanggal_deadline,
            'deskripsi'   => $request->deskripsi,
            'lokasi'   => $request->lokasi
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.show', compact('post'));
    }

        /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('posts.edit', compact('post'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul'     => 'required|min:5',
            'bidang_usaha'   => 'required',
            'persyaratan'   => 'required|min:10',
            'lowongan_pekerjaan'   => 'required',
            'tanggal_posting'   => 'required',
            'tanggal_deadline'   => 'required',
            'deskripsi'   => 'required|min:10',
            'lokasi'   => 'required'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'judul'     => $request->judul,
                'bidang_usaha'   => $request->bidang_usaha,
                'persyaratan'   => $request->persyaratan,
                'lowongan_pekerjaan'   => $request->lowongan_pekerjaan,
                'tanggal_posting'   => $request->tanggal_posting,
                'tanggal_deadline'   => $request->tanggal_deadline,
                'deskripsi'   => $request->deskripsi,
                'lokasi'   => $request->lokasi
            ]);

        } else {

            //update post without image
            $post->update([
                'judul'     => $request->judul,
                'bidang_usaha'   => $request->bidang_usaha,
                'persyaratan'   => $request->persyaratan,
                'lowongan_pekerjaan'   => $request->lowongan_pekerjaan,
                'tanggal_posting'   => $request->tanggal_posting,
                'tanggal_deadline'   => $request->tanggal_deadline,
                'deskripsi'   => $request->deskripsi,
                'lokasi'   => $request->lokasi
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

        /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
