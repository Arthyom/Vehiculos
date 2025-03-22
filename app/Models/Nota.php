<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nota
 * 
 * @property int $id
 * @property string $Name
 * @property Carbon $Created_At
 * @property Carbon|null $Updated_At
 * 
 * @property Collection|Servicio[] $servicios
 *
 * @package App\Models
 */
class Nota extends Model
{
	protected $table = 'Nota';
	public $timestamps = true;

	protected $casts = [
		'Created_At' => 'datetime',
		'Updated_At' => 'datetime'
	];

	protected $fillable = [
		'Name',
		'Created_At',
		'Updated_At'
	];

	public function servicios()
	{
		return $this->hasMany(Servicio::class, 'Nota_Id');
	}
}
