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
 * Class Client
 * 
 * @property int $idclient
 * @property string $nameclient
 * @property string $lastnameclient
 * @property string $rutclient
 * @property string $email_addres
 * @property string $password
 * @property int|null $client_location
 * 
 * @property ClientsLocation|null $clients_location
 * @property Collection|ClientsInfo[] $clients_infos
 * @property Collection|Coach[] $coaches
 * @property Collection|CoachesRating[] $coaches_ratings
 * @property Collection|ExerciseRoutinesAssociation[] $exercise_routines_associations
 * @property Collection|SessionMember[] $session_members
 *
 * @package App\Models
 */
class Client extends Model
{
	use HasApiTokens, HasFactory, Notifiable;
	protected $table = 'clients';
	protected $primaryKey = 'idclient';
	public $timestamps = false;

	protected $casts = [
		'client_location' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nameclient',
		'lastnameclient',
		'rutclient',
		'email_addres',
		'password',
		'client_location'
	];

	public function clients_location()
	{
		return $this->belongsTo(ClientsLocation::class, 'client_location');
	}

	public function clients_infos()
	{
		return $this->hasMany(ClientsInfo::class, 'client');
	}

	public function coaches()
	{
		return $this->belongsToMany(Coach::class, 'coach_client_association', 'client', 'coach')
					->withPivot('idcoach_client_assoc', 'status', 'start_at', 'end_at', 'create_at', 'update_at');
	}

	public function coaches_ratings()
	{
		return $this->hasMany(CoachesRating::class, 'clients');
	}

	public function exercise_routines_associations()
	{
		return $this->hasMany(ExerciseRoutinesAssociation::class, 'client');
	}

	public function session_members()
	{
		return $this->hasMany(SessionMember::class, 'client');
	}
}
