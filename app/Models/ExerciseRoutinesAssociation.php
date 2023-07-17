<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExerciseRoutinesAssociation
 * 
 * @property int $id_excersise_assoc
 * @property int $exercise_routines
 * @property int $client
 * 
 * @property ExerciseRoutine $exercise_routine
 *
 * @package App\Models
 */
class ExerciseRoutinesAssociation extends Model
{
	protected $table = 'exercise_routines_association';
	protected $primaryKey = 'id_excersise_assoc';
	public $timestamps = false;

	protected $casts = [
		'exercise_routines' => 'int',
		'client' => 'int'
	];

	protected $fillable = [
		'exercise_routines',
		'client'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client');
	}

	public function exercise_routine()
	{
		return $this->belongsTo(ExerciseRoutine::class, 'exercise_routines');
	}
}
