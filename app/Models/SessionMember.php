<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SessionMember
 * 
 * @property int $idmembers
 * @property int $session
 * @property int $client
 * 
 * @property TrainingSession $training_session
 *
 * @package App\Models
 */
class SessionMember extends Model
{
	protected $table = 'session_members';
	protected $primaryKey = 'idmembers';
	public $timestamps = false;

	protected $casts = [
		'session' => 'int',
		'client' => 'int'
	];

	protected $fillable = [
		'session',
		'client'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client');
	}

	public function training_session()
	{
		return $this->belongsTo(TrainingSession::class, 'session');
	}
}
