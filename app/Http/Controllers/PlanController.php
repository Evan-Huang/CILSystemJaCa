<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Plan;

class PlanController extends Controller
{
    //

	public function index(Request $request)
    {
        //

        $records = Plan::whereNotNull('id');

        $records = $records->paginate(30);

        return view('plan.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('plan.create');
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
    		'plan_category_id' => 'required',
    		'provider_id' => 'required',
    		'name' => 'required',
    		'code' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('PlanController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$plan = new Plan;
        $plan->plan_category_id = ($inputs['plan_category_id']) ? $inputs['plan_category_id'] : null;
        $plan->provider_id = ($inputs['provider_id']) ? $inputs['provider_id'] : null;
        $plan->name = ($inputs['name']) ? $inputs['name'] : null;
        $plan->code = ($inputs['code']) ? $inputs['code'] : null;
        $plan->term = ($inputs['term']) ? $inputs['term'] : null;
        $plan->requirement = ($inputs['requirement']) ? $inputs['name'] : null;
        $plan->description = ($inputs['description']) ? $inputs['description'] : null;
        $plan->rate_monthly = ($inputs['rate_monthly']) ? $inputs['rate_monthly'] : null;
        $plan->rate_yearly = ($inputs['rate_yearly']) ? $inputs['rate_yearly'] : null;
        $plan->annual_premium = ($inputs['annual_premium']) ? $inputs['annual_premium'] : null;
        
        for( $i = 1; $i <= 10; $i++ ) {

        	$property_name_basic = 'rate_' . $i . '_basic';
        	$property_name_override = 'rate_' . $i . '_override';
        	$property_name_bonus = 'rate_' . $i . '_bonus';

	        $plan->$property_name_basic = ($inputs['rate_' . $i . '_basic']) ? $inputs['rate_' . $i . '_basic'] : null;
	        $plan->$property_name_override = ($inputs['rate_' . $i . '_override']) ? $inputs['rate_' . $i . '_override'] : null;
	        $plan->$property_name_bonus = ($inputs['rate_' . $i . '_bonus']) ? $inputs['rate_' . $i . '_bonus'] : null;
        }

        $plan->rate_11up_basic = ($inputs['rate_11up_basic']) ? $inputs['rate_11up_basic'] : null;
        $plan->rate_11up_override = ($inputs['rate_11up_override']) ? $inputs['rate_11up_override'] : null;
        $plan->rate_11up_bonus = ($inputs['rate_11up_bonus']) ? $inputs['rate_11up_bonus'] : null;

    	$plan->save();

    	return \Redirect::action('PlanController@edit', [$plan->id]);
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
    	$plan = Plan::find($id);

    	if( !$plan ) {
    		return \App::abort(404);
    	}

    	return view('plan.edit')->with('record', $plan);
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

        $plan = Plan::find($id);

    	if( !$plan ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'plan_category_id' => 'required',
    		'provider_id' => 'required',
    		'name' => 'required',
    		'code' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('PlanController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $plan->plan_category_id = ($inputs['plan_category_id']) ? $inputs['plan_category_id'] : null;
        $plan->provider_id = ($inputs['provider_id']) ? $inputs['provider_id'] : null;
        $plan->name = ($inputs['name']) ? $inputs['name'] : null;
        $plan->code = ($inputs['code']) ? $inputs['code'] : null;
        $plan->term = ($inputs['term']) ? $inputs['term'] : null;
        $plan->requirement = ($inputs['requirement']) ? $inputs['name'] : null;
        $plan->description = ($inputs['description']) ? $inputs['description'] : null;
        $plan->rate_monthly = ($inputs['rate_monthly']) ? $inputs['rate_monthly'] : null;
        $plan->rate_yearly = ($inputs['rate_yearly']) ? $inputs['rate_yearly'] : null;
        $plan->annual_premium = ($inputs['annual_premium']) ? $inputs['annual_premium'] : null;
        
        for( $i = 1; $i <= 10; $i++ ) {

        	$property_name_basic = 'rate_' . $i . '_basic';
        	$property_name_override = 'rate_' . $i . '_override';
        	$property_name_bonus = 'rate_' . $i . '_bonus';

	        $plan->$property_name_basic = ($inputs['rate_' . $i . '_basic']) ? $inputs['rate_' . $i . '_basic'] : null;
	        $plan->$property_name_override = ($inputs['rate_' . $i . '_override']) ? $inputs['rate_' . $i . '_override'] : null;
	        $plan->$property_name_bonus = ($inputs['rate_' . $i . '_bonus']) ? $inputs['rate_' . $i . '_bonus'] : null;
        }

        $plan->rate_11up_basic = ($inputs['rate_11up_basic']) ? $inputs['rate_11up_basic'] : null;
        $plan->rate_11up_override = ($inputs['rate_11up_override']) ? $inputs['rate_11up_override'] : null;
        $plan->rate_11up_bonus = ($inputs['rate_11up_bonus']) ? $inputs['rate_11up_bonus'] : null;

    	$plan->save();

    	return \Redirect::action('PlanController@edit', [$plan->id])->with('success', true);
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

    	$plan = Plan::find($id);

    	if( !$plan ) {
    		return \App::abort(404);
    	}

    	$plan->delete();
        
        return \Redirect::action('PlanController@index');
    }

}
