<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoachClientAssociation
 * 
 * @property int $idcoach_client_assoc
 * @property int $coach
 * @property int $client
 * @property string $status
 * @property Carbon $start_at
 * @property Carbon|null $end_at
 * @property Carbon|null $create_at
 * @property Carbon|null $update_at
 * 
 *
 * @package App\Models
 */
class CoachClientAssociation extends Model
{
	protected $table = 'coach_client_association';
	protected $primaryKey = 'idcoach_client_assoc';
	public $timestamps = false;

	protected $casts = [
		'coach' => 'int',
		'client' => 'int',
		'start_at' => 'datetime',
		'end_at' => 'datetime',
		'create_at' => 'datetime',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'coach',
		'client',
		'status',
		'start_at',
		'end_at',
		'create_at',
		'update_at'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client');
	}

	public function coach()
	{
		return $this->belongsTo(Coach::class, 'coach');
	}
}
