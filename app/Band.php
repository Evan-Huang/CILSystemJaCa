<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
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
	
}
