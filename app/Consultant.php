<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
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

	public function manager()
	{
		return $this->belongsTo('App\Consultant', 'manager_id', 'id');
	}

	public function band()
	{
		return $this->belongsTo('App\Band', 'band_id', 'id');
	}

}
