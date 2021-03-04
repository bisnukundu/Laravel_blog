<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post as PostModel;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class Post extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( "admin.post-show", ["posts" => PostModel::orderByDesc( 'created_at' )->paginate( 10 )] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( "admin.post-add", ["categorys" => Category::all()] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'PostTitle'      => 'required',
            'postDecription' => 'required',
            'postImage'      => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'postCategory'   => 'required',
        ] );
        $imageName = time() . "." . $request->postImage->extension();
        $createPost = PostModel::create( [
            'title'        => $request->PostTitle,
            'description'  => $request->postDecription,
            'images'       => $imageName,
            'categorie_id' => $request->postCategory,
            'slug'         => SlugService::createSlug( PostModel::class, 'slug', $request->PostTitle )
        ] );
        if ( $createPost ) {
            $request->postImage->move( public_path( 'images' ), $imageName );
            return back()->with( "message", "Post Create Success" );
        } else {
            return back()->with( "message", "Post Create Faild" );
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug ) {

        return view( "admin.edit-post", ["post" => PostModel::where( "slug", $slug )->get()->first(), "categorys" => Category::all()] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {

        $request->validate( [
            'PostTitle'      => 'required',
            'postDecription' => 'required',
            'postImage'      => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'postCategory'   => 'required',
        ] );
        $imageName = time() . "." . $request->postImage->extension();
        $createPost = PostModel::where( 'id', $id )->update( [
            'title'        => $request->PostTitle,
            'description'  => $request->postDecription,
            'images'       => $imageName,
            'categorie_id' => $request->postCategory,
            'slug'         => SlugService::createSlug( PostModel::class, 'slug', $request->PostTitle ),
        ] );
        if ( $createPost ) {
            $request->postImage->move( public_path( 'images' ), $imageName );
            return redirect( '/post' );
        } else {
            return back()->with( "message", "Post Update Faild" );
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        PostModel::where( "id", $id )->delete();
        return back()->with( "message", "Post Delete Succss" );
    }
}
