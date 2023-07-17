<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $idregion
 * @property string $region
 * 
 * @property Collection|City[] $cities
 * @property Collection|ClientsLocation[] $clients_locations
 * @property Collection|CoachesLocation[] $coaches_locations
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'regions';
	protected $primaryKey = 'idregion';
	public $timestamps = false;

	protected $fillable = [
		'region'
	];

	public function cities()
	{
		return $this->hasMany(City::class, 'region');
	}

	public function clients_locations()
	{
		return $this->hasMany(ClientsLocation::class, 'regio');
	}

	public function coaches_locations()
	{
		return $this->hasMany(CoachesLocation::class, 'region');
	}
}
