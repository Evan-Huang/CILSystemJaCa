<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    //

	public function primary_tr()
	{
		return $this->belongsTo('App\Consultant', 'primary_consultant_id', 'id');
	}

	public function secondary_tr()
	{
		return $this->belongsTo('App\Consultant', 'secondary_consultant_id', 'id');
	}

	public function provider()
	{
		return $this->belongsTo('App\Provider', 'provider_id', 'id');
	}

	public function plan()
	{
		return $this->belongsTo('App\Plan', 'plan_id', 'id');
	}

	public function client()
	{
		return $this->belongsTo('App\Client', 'client_id', 'id');
	}

}
