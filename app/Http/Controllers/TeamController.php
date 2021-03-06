<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( "admin.teams", ['teams' => Team::orderByDesc( "created_at" )->paginate( 10 )] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( "admin.team_add" );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name'           => "required",
            'profession'     => "required",
            'facebook'       => "required",
            'twitter'        => "required",
            'google_plus'    => 'required',
            'teamDecription' => 'required',
            'teamImage'      => 'required',

        ] );
        $image_name = time() . "." . $request->teamImage->extension();
        $create_team = Team::create( [
            "name"        => $request->name,
            "profession"  => $request->profession,
            "facebook"    => $request->facebook,
            "twitter"     => $request->twitter,
            "google_plus" => $request->google_plus,
            "about"       => $request->teamDecription,
            "image"       => $image_name,
        ] );
        if ( $create_team ) {
            $request->teamImage->move( public_path( 'images/team' ), $image_name );
            return back()->with( "message", "Team Create Succfully" );
        } else {
            return back()->with( "message", "Team Create Faild" );
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
        return view( 'admin.edit_team', ['team' => Team::where( 'id', $id )->get()->first()] );
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
            'name'           => "required",
            'profession'     => "required",
            'facebook'       => "required",
            'twitter'        => "required",
            'google_plus'    => 'required',
            'teamDecription' => 'required',
            'teamImage'      => 'required|image',

        ] );
        $image_name = time() . "." . $request->teamImage->extension();
        $create_team = Team::where( 'id', $id )->update( [
            "name"        => $request->name,
            "profession"  => $request->profession,
            "facebook"    => $request->facebook,
            "twitter"     => $request->twitter,
            "google_plus" => $request->google_plus,
            "about"       => $request->teamDecription,
            "image"       => $image_name,
        ] );
        if ( $create_team ) {
            $request->teamImage->move( public_path( 'images/team' ), $image_name );
            return redirect('/team')->with( "message", "Team Update Succfully" );
        } else {
            return back()->with( "message", "Team Update Faild" );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $delete_team = Team::where( 'id', $id )->delete();
        if ( $delete_team ) {
            return back()->with( "message", "Team Member Delete Success" );
        } else {
            return back()->with( "message", "Team Member Delete Faild" );
        }
    }
}
