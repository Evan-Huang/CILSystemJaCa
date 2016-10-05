<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Band;

class BandController extends Controller
{
    //

    public function index(Request $request)
    {
        //

        $records = Band::whereNotNull('id');

        $records = $records->paginate(30);

        return view('band.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('band.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'rank' => 'required',
    		'name' => 'required',
    		'profit_sharing' => 'required',
    		'promotion_income_achievement' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('BandController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$band = new Band;
        $band->rank = ($inputs['rank']) ? $inputs['rank'] : null;
        $band->name = ($inputs['name']) ? $inputs['name'] : null;
        $band->profit_sharing = ($inputs['profit_sharing']) ? $inputs['profit_sharing'] : null;
        $band->promotion_income_achievement = ($inputs['promotion_income_achievement']) ? $inputs['promotion_income_achievement'] : null;
        $band->is_channel = isset($inputs['is_channel']) ? $inputs['is_channel'] : null;
    	$band->save();

    	return \Redirect::action('BandController@edit', [$band->id]);
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
    public function edit($id)
    {
        //
    	$band = Band::find($id);

    	if( !$band ) {
    		return \App::abort(404);
    	}

    	return view('band.edit')->with('record', $band);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $band = Band::find($id);

    	if( !$band ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'rank' => 'required',
    		'name' => 'required',
    		'profit_sharing' => 'required',
    		'promotion_income_achievement' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('BandController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $band->rank = ($inputs['rank']) ? $inputs['rank'] : null;
        $band->name = ($inputs['name']) ? $inputs['name'] : null;
        $band->profit_sharing = ($inputs['profit_sharing']) ? $inputs['profit_sharing'] : null;
        $band->promotion_income_achievement = ($inputs['promotion_income_achievement']) ? $inputs['promotion_income_achievement'] : null;
        $band->is_channel = isset($inputs['is_channel']) ? $inputs['is_channel'] : null;
    	$band->save();

    	return \Redirect::action('BandController@edit', [$band->id])->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    	$band = Band::find($id);

    	if( !$band ) {
    		return \App::abort(404);
    	}

    	$band->delete();
        
        return \Redirect::action('BandController@index');
    }

}
