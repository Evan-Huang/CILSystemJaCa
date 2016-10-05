<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;

class ClientController extends Controller
{
    //

	public function index(Request $request)
    {
        //

        $records = Client::whereNotNull('id');

        $records = $records->paginate(30);

        return view('client.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('client.create');
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
    		'business_type' => 'required',
    		'full_name' => 'required',
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'consultant_id' => 'required',
    		'mobile_number' => 'required',
    		'email' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('ClientController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$client = new Client;
        $client->business_type = ($inputs['business_type']) ? $inputs['business_type'] : null;
        $client->full_name = ($inputs['full_name']) ? $inputs['full_name'] : null;
        $client->first_name = ($inputs['first_name']) ? $inputs['first_name'] : null;
        $client->last_name = ($inputs['last_name']) ? $inputs['last_name'] : null;
        $client->consultant_id = ($inputs['consultant_id']) ? $inputs['consultant_id'] : null;
        $client->gender = ($inputs['gender']) ? $inputs['gender'] : null;
        $client->nationality = ($inputs['nationality']) ? $inputs['nationality'] : null;
        $client->id_number = ($inputs['id_number']) ? $inputs['id_number'] : null;
        $client->passport_number = ($inputs['passport_number']) ? $inputs['passport_number'] : null;
        $client->birth_year = ($inputs['birth_year']) ? $inputs['birth_year'] : null;
        $client->birth_month = ($inputs['birth_month']) ? $inputs['birth_month'] : null;
        $client->birth_day = ($inputs['birth_day']) ? $inputs['birth_day'] : null;
        $client->mobile_number = ($inputs['mobile_number']) ? $inputs['mobile_number'] : null;
        $client->email = ($inputs['email']) ? $inputs['email'] : null;
        $client->home_address = ($inputs['home_address']) ? $inputs['home_address'] : null;
        $client->business_nature = ($inputs['business_nature']) ? $inputs['business_nature'] : null;
        $client->company = ($inputs['company']) ? $inputs['company'] : null;
        $client->office_phone_number = ($inputs['office_phone_number']) ? $inputs['office_phone_number'] : null;
    	$client->save();

    	return \Redirect::action('ClientController@edit', [$client->id]);
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
    	$client = Client::find($id);

    	if( !$client ) {
    		return \App::abort(404);
    	}

    	return view('client.edit')->with('record', $client);
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

        $client = Client::find($id);

    	if( !$client ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'business_type' => 'required',
    		'full_name' => 'required',
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'consultant_id' => 'required',
    		'mobile_number' => 'required',
    		'email' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('ClientController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $client->business_type = ($inputs['business_type']) ? $inputs['business_type'] : null;
        $client->full_name = ($inputs['full_name']) ? $inputs['full_name'] : null;
        $client->first_name = ($inputs['first_name']) ? $inputs['first_name'] : null;
        $client->last_name = ($inputs['last_name']) ? $inputs['last_name'] : null;
        $client->consultant_id = ($inputs['consultant_id']) ? $inputs['consultant_id'] : null;
        $client->gender = ($inputs['gender']) ? $inputs['gender'] : null;
        $client->nationality = ($inputs['nationality']) ? $inputs['nationality'] : null;
        $client->id_number = ($inputs['id_number']) ? $inputs['id_number'] : null;
        $client->passport_number = ($inputs['passport_number']) ? $inputs['passport_number'] : null;
        $client->birth_year = ($inputs['birth_year']) ? $inputs['birth_year'] : null;
        $client->birth_month = ($inputs['birth_month']) ? $inputs['birth_month'] : null;
        $client->birth_day = ($inputs['birth_day']) ? $inputs['birth_day'] : null;
        $client->mobile_number = ($inputs['mobile_number']) ? $inputs['mobile_number'] : null;
        $client->email = ($inputs['email']) ? $inputs['email'] : null;
        $client->home_address = ($inputs['home_address']) ? $inputs['home_address'] : null;
        $client->business_nature = ($inputs['business_nature']) ? $inputs['business_nature'] : null;
        $client->company = ($inputs['company']) ? $inputs['company'] : null;
        $client->office_phone_number = ($inputs['office_phone_number']) ? $inputs['office_phone_number'] : null;
    	$client->save();

    	return \Redirect::action('ClientController@edit', [$client->id])->with('success', true);
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

    	$client = Client::find($id);

    	if( !$client ) {
    		return \App::abort(404);
    	}

    	$client->delete();
        
        return \Redirect::action('ClientController@index');
    }

}
