<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoachesRating
 * 
 * @property int $idrating
 * @property string $rating
 * @property string $coment
 * @property int $coach
 * @property int $clients
 * 
 * @property Client $client
 *
 * @package App\Models
 */
class CoachesRating extends Model
{
	protected $table = 'coaches_rating';
	protected $primaryKey = 'idrating';
	public $timestamps = false;

	protected $casts = [
		'coach' => 'int',
		'clients' => 'int'
	];

	protected $fillable = [
		'rating',
		'coment',
		'coach',
		'clients'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'clients');
	}

	public function coach()
	{
		return $this->belongsTo(Coach::class, 'coach');
	}
}
