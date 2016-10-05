<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Split;

class SplitController extends Controller
{
    //

	public function index(Request $request)
    {
        //

        $records = Split::whereNotNull('id');

        $records = $records->paginate(30);

        return view('split.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('split.create');
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
    		'slug' => 'required',
    		'name' => 'required',
    		'rate' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('SplitController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$split = new Split;
        $split->slug = ($inputs['slug']) ? $inputs['slug'] : null;
        $split->name = ($inputs['name']) ? $inputs['name'] : null;
        $split->rate = ($inputs['rate']) ? $inputs['rate'] : null;
    	$split->save();

    	return \Redirect::action('SplitController@edit', [$split->id]);
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
    	$split = Split::find($id);

    	if( !$split ) {
    		return \App::abort(404);
    	}

    	return view('split.edit')->with('record', $split);
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

        $split = Split::find($id);

    	if( !$split ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'slug' => 'required',
    		'name' => 'required',
    		'rate' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('SplitController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $split->slug = ($inputs['slug']) ? $inputs['slug'] : null;
        $split->name = ($inputs['name']) ? $inputs['name'] : null;
        $split->rate = ($inputs['rate']) ? $inputs['rate'] : null;
    	$split->save();

    	return \Redirect::action('SplitController@edit', [$split->id])->with('success', true);
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

    	$split = Split::find($id);

    	if( !$split ) {
    		return \App::abort(404);
    	}

    	$split->delete();
        
        return \Redirect::action('SplitController@index');
    }


}
