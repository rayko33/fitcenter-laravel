<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExerciseRoutine
 * 
 * @property int $idexercise_routines
 * @property array $exercise_routinesc
 * 
 * @property Collection|ExerciseRoutinesAssociation[] $exercise_routines_associations
 *
 * @package App\Models
 */
class ExerciseRoutine extends Model
{
	protected $table = 'exercise_routines';
	protected $primaryKey = 'idexercise_routines';
	public $timestamps = false;

	protected $casts = [
		'exercise_routinesc' => 'json'
	];

	protected $fillable = [
		'exercise_routinesc'
	];

	public function exercise_routines_associations()
	{
		return $this->hasMany(ExerciseRoutinesAssociation::class, 'exercise_routines');
	}
}
