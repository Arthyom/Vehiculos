<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Proveedor
 * 
 * @property int $id
 * @property string $Nombre
 * @property string|null $Alias
 * @property string $Descripcion
 * @property Carbon $Created_At
 * @property Carbon|null $Updated_At
 * 
 * @property Collection|Servicio[] $servicios
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	protected $table = 'Proveedor';
	public $timestamps = true;

	protected $casts = [
		'Created_At' => 'datetime',
		'Updated_At' => 'datetime'
	];

	protected $fillable = [
		'Nombre',
		'Alias',
		'Descripcion',
	];

	public function servicios()
	{
		return $this->hasMany(Servicio::class, 'Proveedor_Id');
	}
}
