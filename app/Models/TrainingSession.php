<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TrainingSession
 * 
 * @property int $idsession
 * @property string $title
 * @property Carbon $start
 * @property Carbon $end
 * @property int $max_members
 * @property string $location
 * @property string $status
 * @property int $coach
 * 
 * @property Collection|SessionMember[] $session_members
 *
 * @package App\Models
 */
class TrainingSession extends Model
{
	protected $table = 'training_sessions';
	protected $primaryKey = 'idsession';
	public $timestamps = false;

	protected $casts = [
		'start' => 'datetime',
		'end' => 'datetime',
		'max_members' => 'int',
		'coach' => 'int'
	];

	protected $fillable = [
		'title',
		'start',
		'end',
		'max_members',
		'location',
		'status',
		'coach'
	];

	public function coach()
	{
		return $this->belongsTo(Coach::class, 'coach');
	}

	public function session_members()
	{
		return $this->hasMany(SessionMember::class, 'session');
	}
}
