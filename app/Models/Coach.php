<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Coach
 * 
 * @property int $idcoaches
 * @property string $namecoach
 * @property string $lastnamecoach
 * @property string $rutcoach
 * @property string $emailaddrescoach
 * @property string|null $phone
 * @property string $password
 * @property int|null $location
 * @property int|null $profile
 * 
 * @property CoachesLocation|null $coaches_location
 * @property CoachProfile|null $coach_profile
 * @property Collection|Client[] $clients
 * @property Collection|CoachesRating[] $coaches_ratings
 * @property Collection|ExerciseRoutine[] $exercise_routines
 * @property Collection|TrainerCategoryAssoc[] $trainer_category_assocs
 * @property Collection|TrainingSession[] $training_sessions
 *
 * @package App\Models
 */
class Coach extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;
	protected $table = 'coaches';
	protected $primaryKey = 'idcoaches';
	public $timestamps = false;

	protected $casts = [
		'location' => 'int',
		'profile' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'namecoach',
		'lastnamecoach',
		'rutcoach',
		'emailaddrescoach',
		'phone',
		'password',
		'location',
		'profile'
	];

	public function coaches_location()
	{
		return $this->belongsTo(CoachesLocation::class, 'location');
	}

	public function coach_profile()
	{
		return $this->belongsTo(CoachProfile::class, 'profile');
	}

	public function clients()
	{
		return $this->belongsToMany(Client::class, 'coach_client_association', 'coach', 'client')
					->withPivot('idcoach_client_assoc', 'status', 'start_at', 'end_at', 'create_at', 'update_at');
	}

	public function coaches_ratings()
	{
		return $this->hasMany(CoachesRating::class, 'coach');
	}

	public function exercise_routines()
	{
		return $this->hasMany(ExerciseRoutine::class, 'coach');
	}

	public function trainer_category_assocs()
	{
		return $this->hasMany(TrainerCategoryAssoc::class, 'trainer');
	}

	public function training_sessions()
	{
		return $this->hasMany(TrainingSession::class, 'coach');
	}
}
