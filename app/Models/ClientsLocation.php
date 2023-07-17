<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientsLocation
 * 
 * @property int $idclients_locations
 * @property int $city
 * @property int $regio
 * @property string|null $address
 * 
 * @property Region $region
 * @property Collection|Client[] $clients
 *
 * @package App\Models
 */
class ClientsLocation extends Model
{
	protected $table = 'clients_locations';
	protected $primaryKey = 'idclients_locations';
	public $timestamps = false;

	protected $casts = [
		'city' => 'int',
		'regio' => 'int'
	];

	protected $fillable = [
		'city',
		'regio',
		'address'
	];

	public function city()
	{
		return $this->belongsTo(City::class, 'city');
	}

	public function region()
	{
		return $this->belongsTo(Region::class, 'regio');
	}

	public function clients()
	{
		return $this->hasMany(Client::class, 'client_location');
	}
}
