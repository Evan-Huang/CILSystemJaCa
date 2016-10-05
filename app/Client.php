<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

	public static function getRecordsForSelect()
	{
		$select = [];
		$select[0] = '- Please Select -';

		foreach( self::orderBy('created_at', 'ASC')->get() as $record ) {
			$select[$record->id] = $record->full_name;
		}

		return $select;
	}

}
