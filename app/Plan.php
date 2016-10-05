<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //

    public static function getRecordsForSelect()
	{
		$select = [];
		$select[0] = '- Please Select -';

		foreach( self::orderBy('created_at', 'ASC')->get() as $record ) {
			$select[$record->id] = $record->name;
		}

		return $select;
	}

	public function plan_category()
	{
		return $this->belongsTo('App\PlanCategory', 'plan_category_id', 'id');
	}

	public function provider()
	{
		return $this->belongsTo('App\Provider', 'provider_id', 'id');
	}

}
