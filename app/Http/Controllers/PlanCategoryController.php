<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PlanCategory;

class PlanCategoryController extends Controller
{
    //

	public function index(Request $request)
    {
        //

        $records = PlanCategory::whereNotNull('id');

        $records = $records->paginate(30);

        return view('plan_category.index')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('plan_category.create');
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
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('PlanCategoryController@create')->withInput($inputs)->withErrors($validator);
    	}

    	$plan_category = new PlanCategory;
        $plan_category->name = ($inputs['name']) ? $inputs['name'] : null;
    	$plan_category->save();

    	return \Redirect::action('PlanCategoryController@edit', [$plan_category->id]);
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
    	$plan_category = PlanCategory::find($id);

    	if( !$plan_category ) {
    		return \App::abort(404);
    	}

    	return view('plan_category.edit')->with('record', $plan_category);
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

        $plan_category = PlanCategory::find($id);

    	if( !$plan_category ) {
    		return \App::abort(404);
    	}

    	$inputs = \Request::all();

    	$validator = \Validator::make($inputs, [
    		'name' => 'required',
    	]);

    	if( $validator->fails() ) {
    		return \Redirect::action('PlanCategoryController@edit', [$id])->withInput($inputs)->withErrors($validator);
    	}

        $plan_category->name = ($inputs['name']) ? $inputs['name'] : null;
    	$plan_category->save();

    	return \Redirect::action('PlanCategoryController@edit', [$plan_category->id])->with('success', true);
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

    	$plan_category = PlanCategory::find($id);

    	if( !$plan_category ) {
    		return \App::abort(404);
    	}

    	$plan_category->delete();
        
        return \Redirect::action('PlanCategoryController@index');
    }

}
