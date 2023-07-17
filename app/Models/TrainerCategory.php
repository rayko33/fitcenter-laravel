<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TrainerCategory
 * 
 * @property int $idcategory
 * @property string $category
 * 
 * @property Collection|TrainerCategoryAssoc[] $trainer_category_assocs
 *
 * @package App\Models
 */
class TrainerCategory extends Model
{
	protected $table = 'trainer_category';
	protected $primaryKey = 'idcategory';
	public $timestamps = false;

	protected $fillable = [
		'category'
	];

	public function trainer_category_assocs()
	{
		return $this->hasMany(TrainerCategoryAssoc::class, 'category');
	}
}
