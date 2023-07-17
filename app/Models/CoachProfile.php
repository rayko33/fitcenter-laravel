<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoachProfile
 * 
 * @property int $idprofile
 * @property Carbon|null $yearexperience
 * @property string|null $about_me
 * @property string|null $profile_picture
 * @property string|null $backward_picture
 * 
 * @property Collection|Coach[] $coaches
 *
 * @package App\Models
 */
class CoachProfile extends Model
{
	protected $table = 'coach_profile';
	protected $primaryKey = 'idprofile';
	public $timestamps = false;

	protected $casts = [
		'yearexperience' => 'datetime'
	];

	protected $fillable = [
		'yearexperience',
		'about_me',
		'profile_picture',
		'backward_picture'
	];

	public function coaches()
	{
		return $this->hasMany(Coach::class, 'profile');
	}
}
