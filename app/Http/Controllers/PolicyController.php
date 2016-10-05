<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Policy;

class PolicyController extends Controller
{
    //

	public function index(Request $request)
    {
        //

        $records = Policy::whereNotNull('id');

        $records = $records->paginate(30);

        return view('policy.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('policy.create');
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
    		'client_id' => 'required',
    		'policy_number' => 'required',
    		'primary_consultant_id' => 'required',
    		'primary_consultant_split' => 'required',
    		'provider_id' => 'required',
    		'plan_id' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('PolicyController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$policy = new Policy;
        $policy->client_id = ($inputs['client_id']) ? $inputs['client_id'] : null;
        $policy->policy_number = ($inputs['policy_number']) ? $inputs['policy_number'] : null;
        $policy->primary_consultant_id = ($inputs['primary_consultant_id']) ? $inputs['primary_consultant_id'] : null;
        $policy->primary_consultant_split = ($inputs['primary_consultant_split']) ? $inputs['primary_consultant_split'] : null;
        $policy->secondary_consultant_id = ($inputs['secondary_consultant_id']) ? $inputs['secondary_consultant_id'] : null;
        $policy->secondary_consultant_split = ($inputs['secondary_consultant_split']) ? $inputs['secondary_consultant_split'] : null;
        $policy->provider_id = ($inputs['provider_id']) ? $inputs['provider_id'] : null;
        $policy->plan_id = ($inputs['plan_id']) ? $inputs['plan_id'] : null;
        $policy->effective_date = ($inputs['effective_date']) ? $inputs['effective_date'] : null;
        $policy->investment_insured_amount_usd = ($inputs['investment_insured_amount_usd']) ? $inputs['investment_insured_amount_usd'] : null;
        $policy->investment_insured_amount_hkd = ($inputs['investment_insured_amount_hkd']) ? $inputs['investment_insured_amount_hkd'] : null;
        $policy->payment_frequency = ($inputs['payment_frequency']) ? $inputs['payment_frequency'] : null;
        $policy->delivered_date = ($inputs['delivered_date']) ? $inputs['delivered_date'] : null;
        $policy->cooling_off_expiry_date = ($inputs['cooling_off_expiry_date']) ? $inputs['cooling_off_expiry_date'] : null;
        $policy->next_premium_due_date = ($inputs['next_premium_due_date']) ? $inputs['next_premium_due_date'] : null;
        $policy->submission_date = ($inputs['submission_date']) ? $inputs['submission_date'] : null;
        $policy->completion_date = ($inputs['completion_date']) ? $inputs['completion_date'] : null;
        $policy->payment_status = ($inputs['payment_status']) ? $inputs['payment_status'] : null;
        
    	$policy->save();

    	return \Redirect::action('PolicyController@edit', [$policy->id]);
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
    	$policy = Policy::find($id);

    	if( !$policy ) {
    		return \App::abort(404);
    	}

    	return view('policy.edit')->with('record', $policy);
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

        $policy = Policy::find($id);

    	if( !$policy ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'client_id' => 'required',
    		'policy_number' => 'required',
    		'primary_consultant_id' => 'required',
    		'primary_consultant_split' => 'required',
    		'provider_id' => 'required',
    		'plan_id' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('PolicyController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $policy->client_id = ($inputs['client_id']) ? $inputs['client_id'] : null;
        $policy->policy_number = ($inputs['policy_number']) ? $inputs['policy_number'] : null;
        $policy->primary_consultant_id = ($inputs['primary_consultant_id']) ? $inputs['primary_consultant_id'] : null;
        $policy->primary_consultant_split = ($inputs['primary_consultant_split']) ? $inputs['primary_consultant_split'] : null;
        $policy->secondary_consultant_id = ($inputs['secondary_consultant_id']) ? $inputs['secondary_consultant_id'] : null;
        $policy->secondary_consultant_split = ($inputs['secondary_consultant_split']) ? $inputs['secondary_consultant_split'] : null;
        $policy->provider_id = ($inputs['provider_id']) ? $inputs['provider_id'] : null;
        $policy->plan_id = ($inputs['plan_id']) ? $inputs['plan_id'] : null;
        $policy->effective_date = ($inputs['effective_date']) ? $inputs['effective_date'] : null;
        $policy->investment_insured_amount_usd = ($inputs['investment_insured_amount_usd']) ? $inputs['investment_insured_amount_usd'] : null;
        $policy->investment_insured_amount_hkd = ($inputs['investment_insured_amount_hkd']) ? $inputs['investment_insured_amount_hkd'] : null;
        $policy->payment_frequency = ($inputs['payment_frequency']) ? $inputs['payment_frequency'] : null;
        $policy->delivered_date = ($inputs['delivered_date']) ? $inputs['delivered_date'] : null;
        $policy->cooling_off_expiry_date = ($inputs['cooling_off_expiry_date']) ? $inputs['cooling_off_expiry_date'] : null;
        $policy->next_premium_due_date = ($inputs['next_premium_due_date']) ? $inputs['next_premium_due_date'] : null;
        $policy->submission_date = ($inputs['submission_date']) ? $inputs['submission_date'] : null;
        $policy->completion_date = ($inputs['completion_date']) ? $inputs['completion_date'] : null;
        $policy->payment_status = ($inputs['payment_status']) ? $inputs['payment_status'] : null;
        
    	$policy->save();

    	return \Redirect::action('PolicyController@edit', [$policy->id])->with('success', true);
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

    	$policy = Policy::find($id);

    	if( !$policy ) {
    		return \App::abort(404);
    	}

    	$policy->delete();
        
        return \Redirect::action('PolicyController@index');
    }


}
