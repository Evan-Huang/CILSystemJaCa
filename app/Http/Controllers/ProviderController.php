<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Provider;

class ProviderController extends Controller
{
    //

	public function index(Request $request)
    {
        //

        $records = Provider::whereNotNull('id');

        $records = $records->paginate(30);

        return view('provider.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('provider.create');
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
    		'slug' => 'required|unique:providers,slug',
    		'process_days' => 'required|numeric',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('ProviderController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$provider = new Provider;
        $provider->name = ($inputs['name']) ? $inputs['name'] : null;
        $provider->slug = ($inputs['slug']) ? $inputs['slug'] : null;
        $provider->description = ($inputs['description']) ? $inputs['description'] : null;
        $provider->process_days = ($inputs['process_days']) ? $inputs['process_days'] : null;
    	$provider->save();

    	return \Redirect::action('ProviderController@edit', [$provider->id]);
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
    	$provider = Provider::find($id);

    	if( !$provider ) {
    		return \App::abort(404);
    	}

    	return view('provider.edit')->with('record', $provider);
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

        $provider = Provider::find($id);

    	if( !$provider ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'name' => 'required',
    		'slug' => 'required|unique:providers,slug,' . $id,
    		'process_days' => 'required|numeric',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('ProviderController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $provider->name = ($inputs['name']) ? $inputs['name'] : null;
        $provider->slug = ($inputs['slug']) ? $inputs['slug'] : null;
        $provider->description = ($inputs['description']) ? $inputs['description'] : null;
        $provider->process_days = ($inputs['process_days']) ? $inputs['process_days'] : null;
    	$provider->save();

    	return \Redirect::action('ProviderController@edit', [$provider->id])->with('success', true);
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

    	$provider = Provider::find($id);

    	if( !$provider ) {
    		return \App::abort(404);
    	}

    	$provider->delete();
        
        return \Redirect::action('ProviderController@index');
    }

}
