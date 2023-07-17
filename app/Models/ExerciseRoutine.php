<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExerciseRoutine
 * 
 * @property int $idexercise_routines
 * @property array $exercise_routinesc
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property int $coach
 * 
 * @property Collection|ExerciseRoutinesAssociation[] $exercise_routines_associations
 *
 * @package App\Models
 */
class ExerciseRoutine extends Model
{
	protected $table = 'exercise_routines';
	protected $primaryKey = 'idexercise_routines';

	protected $casts = [
		'exercise_routinesc' => 'json',
		'coach' => 'int'
	];

	protected $fillable = [
		'exercise_routinesc',
		'coach'
	];

	public function coach()
	{
		return $this->belongsTo(Coach::class, 'coach');
	}

	public function exercise_routines_associations()
	{
		return $this->hasMany(ExerciseRoutinesAssociation::class, 'exercise_routines');
	}
}
