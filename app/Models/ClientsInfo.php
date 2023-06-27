<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientsInfo
 * 
 * @property int $idclients_info
 * @property int $client
 * @property float|null $height
 * @property float|null $weight
 * @property Carbon|null $birthday
 * @property array|null $addicional_info
 * @property Carbon $created_at
 * @property Carbon|null $update_at
 * 
 *
 * @package App\Models
 */
class ClientsInfo extends Model
{
	protected $table = 'clients_info';
	protected $primaryKey = 'idclients_info';
	public $timestamps = false;

	protected $casts = [
		'client' => 'int',
		'height' => 'float',
		'weight' => 'float',
		'birthday' => 'datetime',
		'addicional_info' => 'json',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'client',
		'height',
		'weight',
		'birthday',
		'addicional_info',
		'update_at'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client');
	}
}
