<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//return type View
use Illuminate\View\View;

class TestimoniController extends Controller
{
    //
    public function index(): View
    {
        //get posts
        $testimoni = Testimoni::latest()->paginate(5);

        //render view with posts
        return view('testimoni.index', compact('testimoni'));
    }

      /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('testimoni.create');
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
            'nama'     => 'required|min:5',
            'deskripsi'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/testimoni', $image->hashName());

        //create post
        Testimoni::create([
            'image'     => $image->hashName(),
            'nama'     => $request->nama,
            'deskripsi'   => $request->deskripsi
        ]);

        //redirect to index
        return redirect()->route('testimoni.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $testimoni = Testimoni::findOrFail($id);

        //render view with post
        return view('testimoni.show', compact('testimoni'));
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
        $testimoni = Testimoni::findOrFail($id);

        //render view with post
        return view('testimoni.edit', compact('testimoni'));
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
            'nama'     => 'required|min:5',
            'deskripsi'   => 'required|min:10'
        ]);

        //get post by ID
        $testimoni = Testimoni::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/testimonis', $image->hashName());

            //delete old image
            Storage::delete('public/testimonis/'.$testimoni->image);

            //update post with new image
            $testimoni->update([
                'image'     => $image->hashName(),
                'nama'     => $request->nama,
                'deskripsi'   => $request->deskripsi
            ]);

        } else {

            //update post without image
            $testimoni->update([
                'nama'     => $request->nama,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('testimoni.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $testimoni = Testimoni::findOrFail($id);

        //delete image
        Storage::delete('public/testinomis/'. $testimoni->image);

        //delete post
        $testimoni->delete();

        //redirect to index
        return redirect()->route('testimoni.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}

