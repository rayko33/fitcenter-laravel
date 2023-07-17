<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $idcity
 * @property string $city
 * @property int $region
 * 
 * @property Collection|ClientsLocation[] $clients_locations
 * @property Collection|CoachesLocation[] $coaches_locations
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	protected $primaryKey = 'idcity';
	public $timestamps = false;

	protected $casts = [
		'region' => 'int'
	];

	protected $fillable = [
		'city',
		'region'
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'region');
	}

	public function clients_locations()
	{
		return $this->hasMany(ClientsLocation::class, 'city');
	}

	public function coaches_locations()
	{
		return $this->hasMany(CoachesLocation::class, 'city');
	}
}
