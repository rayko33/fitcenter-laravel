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
 * @property string $city
 * @property string $region
 * @property string|null $address
 * 
 * @property Collection|Client[] $clients
 *
 * @package App\Models
 */
class ClientsLocation extends Model
{
	protected $table = 'clients_locations';
	protected $primaryKey = 'idclients_locations';
	public $timestamps = false;

	protected $fillable = [
		'city',
		'region',
		'address'
	];

	public function clients()
	{
		return $this->hasMany(Client::class, 'client_location');
	}
}
