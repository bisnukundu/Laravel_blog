<?php

namespace App\Http\Controllers;
use App\Models\Category as CategoryModel;
use Illuminate\Http\Request;

class Category extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'admin.show-category', ['categorys' => CategoryModel::orderByDesc( 'created_at' )->paginate( 10 )] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( "admin.add-category" );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'category' => 'required',
        ] );
        $create_category = CategoryModel::create( [
            'category_name' => $request->category,
        ] );
        if ( $create_category ) {
            return back()->with( "message", "Category Create Success" );
        } else {
            return back()->with( "message", "Category Create Faild" );
        }
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
    public function edit( $id ) {
        return view( 'admin.edit-category', ['category' => CategoryModel::where( 'id', $id )->get()->first()] );
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
            'category' => 'required',
        ] );
        $update_category = CategoryModel::where( 'id', $id )->update( [
            'category_name' => $request->category,
        ] );
        if ( $update_category ) {
            return redirect('/category')->with( "message", "Category Update Success" );
        } else {
            return back()->with( "message", "Category Update Faild" );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        CategoryModel::where( "id", $id )->delete();
        return back()->with( "message", "Category Delete Success" );
    }
}
