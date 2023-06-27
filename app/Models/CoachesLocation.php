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
 * @property string $city
 * @property string $region
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

	protected $fillable = [
		'city',
		'region',
		'addres'
	];

	public function coaches()
	{
		return $this->hasMany(Coach::class, 'location');
	}
}
