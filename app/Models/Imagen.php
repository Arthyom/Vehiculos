<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Imagen
 * 
 * @property int $id
 * @property string $Name
 * @property Carbon $Created_At
 * @property Carbon|null $Updated_At
 *
 * @package App\Models
 */
class Imagen extends Model
{
	protected $table = 'Imagen';
	public $timestamps = true;

	protected $casts = [
		'Created_At' => 'datetime',
		'Updated_At' => 'datetime'
	];

	protected $fillable = [
		// 'Name',
		// 'Created_At',
		// 'Updated_At'
	];
}
