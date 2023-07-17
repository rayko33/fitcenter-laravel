<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TrainerCategoryAssoc
 * 
 * @property int $idtrainer_category_assoc
 * @property int $category
 * @property int $trainer
 * 
 * @property TrainerCategory $trainer_category
 * @property Coach $coach
 *
 * @package App\Models
 */
class TrainerCategoryAssoc extends Model
{
	protected $table = 'trainer_category_assoc';
	protected $primaryKey = 'idtrainer_category_assoc';
	public $timestamps = false;

	protected $casts = [
		'category' => 'int',
		'trainer' => 'int'
	];

	protected $fillable = [
		'category',
		'trainer'
	];

	public function trainer_category()
	{
		return $this->belongsTo(TrainerCategory::class, 'category');
	}

	public function coach()
	{
		return $this->belongsTo(Coach::class, 'trainer');
	}
}
