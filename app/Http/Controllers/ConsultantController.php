<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Consultant;

class ConsultantController extends Controller
{
    //

    public function index(Request $request)
    {
        //

        $records = Consultant::whereNotNull('id');

        $records = $records->paginate(30);

        return view('consultant.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('consultant.create');
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
    		'name' => 'required',
    		'band_id' => 'required',
    		'manager_id' => 'required',
    		'override_for_manager' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('ConsultantController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$consultant = new Consultant;
        $consultant->name = ($inputs['name']) ? $inputs['name'] : null;
        $consultant->band_id = ($inputs['band_id']) ? $inputs['band_id'] : null;
        $consultant->manager_id = ($inputs['manager_id']) ? $inputs['manager_id'] : null;
        $consultant->override_for_manager = ($inputs['override_for_manager']) ? $inputs['override_for_manager'] : null;
    	$consultant->save();

    	return \Redirect::action('ConsultantController@edit', [$consultant->id]);
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
    	$consultant = Consultant::find($id);

    	if( !$consultant ) {
    		return \App::abort(404);
    	}

    	return view('consultant.edit')->with('record', $consultant);
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

        $consultant = Consultant::find($id);

    	if( !$consultant ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'name' => 'required',
    		'band_id' => 'required',
    		'manager_id' => 'required',
    		'override_for_manager' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('ConsultantController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $consultant->name = ($inputs['name']) ? $inputs['name'] : null;
        $consultant->band_id = ($inputs['band_id']) ? $inputs['band_id'] : null;
        $consultant->manager_id = ($inputs['manager_id']) ? $inputs['manager_id'] : null;
        $consultant->override_for_manager = ($inputs['override_for_manager']) ? $inputs['override_for_manager'] : null;
    	$consultant->save();

    	return \Redirect::action('ConsultantController@edit', [$consultant->id])->with('success', true);
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

    	$consultant = Consultant::find($id);

    	if( !$consultant ) {
    		return \App::abort(404);
    	}

    	$consultant->delete();
        
        return \Redirect::action('ConsultantController@index');
    }

}
