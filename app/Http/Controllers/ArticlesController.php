<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class ArticlesController extends Controller
{

    private function is_login()
    {
        if(Auth::user()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function add()
    {
        if($this->is_login())
        {
            return view('add');
        }
 
        else
        {
           return redirect('/login');
        }
    }

    public function show()
    {
        $articles = DB::table('articles')->orderby('id', 'desc')->get();
        //dd($articles);
        return view('articles/show', ['article'=>$articles]);
    }



    public function add_articles(Request $article)
    {
        $user_id = Auth::user()->id;
        $foto = "";
        if($article->hasfile('image'))
        {
            $file = $article->file('image');
            $foto = time().'.'.$file->extension();
            $file->move(public_path().'/assets/images/', $foto);
        }

        DB::table('articles')->insert([
            'title'=>$article->title,
            'content'=>$article->content,
            'image'=>$article->image,
            'user_id'=>$user_id,
            'category_id'=>$article->category_id,
        ]);

        return redirect()->action('ArticlesController@show');

        /*$this->validate($article, [
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|file|max:5000',
        ]);

        //$lapangans = Lapangan::create($request->all());

        $foto = "";
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $foto = time().'.'.$file->extension();
            $file->move(public_path().'/template/images/', $foto);
        }

        $data = new Lapangan();

        $data->nama = $request->get('nama');
        $data->deskripsi = $request->get('deskripsi');
        $data->jenis = $request->get('jenis');
        $data->harga_sewa = $request->get('harga_sewa');
        $data->foto = $foto;*/
    }

    public function detail($id)
    {
        $articles = DB::table('articles')->where('id', $id)->first();
        //dd($articles);
        return view('articles/detail', ['article'=>$articles]);
    }

    public function show_by_admin()
    {
        if($this->is_login())
        {
            $articles = DB::table('articles')->orderby('id', 'desc')->get();
            return view('articles/adminshow', ['article'=>$articles]);
        }
        else
        {
           return redirect('/login');
        }
    }

    public function edit($id)
    {
        if($this->is_login())
        {
            $articles = DB::table('articles')->where('id', $id)->first();
            return view('articles/edit', ['article'=>$articles]);
        }
        else
        {
           return redirect('/login');
        }
    }

    public function edit_process(Request $article)
    {
        $user_id = Auth::user()->id;

        $id = $article->id;
        $title = $article->title;
        $content = $article->content;
        $image = $article->image;
        $category_id = $article->category_id;

        $foto = $article->image;
        if($article->hasfile('image'))
        {
            if (File::exists(public_path().'/assets/images/'.$foto)) {
                File::delete(public_path().'/assets/images/'.$foto);
            }

            $file = $article->file('foto');
            $foto = time().'.'.$file->extension();
            $file->move(public_path().'/assets/images/', $foto);
        }

        DB::table('articles')->where('id', $id)
                            ->update(['title' => $title, 'content' => $content, 'image' => $image, 'category_id' => $category_id]);
        Session::flash('success', 'Artikel berhasil diedit');
        return redirect()->action('ArticlesController@show_by_admin');
    }
    
    public function delete($id)
    {
        if($this->is_login())
        {
            //menghapus artikel dengan ID sesuai pada URL
            DB::table('articles')->where('id', $id)->delete();
     
            //membuat pesan yang akan ditampilkan ketika artikel berhasil dihapus
            Session::flash('success', 'Artikel berhasil dihapus');
            return redirect()->action('ArticlesController@show_by_admin');
        }
        else
        {
           return redirect('/login');
        }
    }
}
