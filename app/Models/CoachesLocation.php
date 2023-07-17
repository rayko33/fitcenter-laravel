<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoachesLocation
 * 
 * @property int $idcoach_location
 * @property int $region
 * @property int $city
 * @property string|null $addres
 * 
 * @property Collection|Coach[] $coaches
 *
 * @package App\Models
 */
class CoachesLocation extends Model
{
	protected $table = 'coaches_location';
	protected $primaryKey = 'idcoach_location';
	public $timestamps = false;

	protected $casts = [
		'region' => 'int',
		'city' => 'int'
	];

	protected $fillable = [
		'region',
		'city',
		'addres'
	];

	public function city()
	{
		return $this->belongsTo(City::class, 'city');
	}

	public function region()
	{
		return $this->belongsTo(Region::class, 'region');
	}

	public function coaches()
	{
		return $this->hasMany(Coach::class, 'location');
	}
}
