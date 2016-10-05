<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //

	public function plans() {
		return $this->hasMany('App\Plan', 'provider_id', 'id');
	}

	public static function getRecordsForSelect()
	{
		$select = [];
		$select[0] = '- Please Select -';

		foreach( self::orderBy('created_at', 'ASC')->get() as $record ) {
			$select[$record->id] = $record->name;
		}

		return $select;
	}

}
