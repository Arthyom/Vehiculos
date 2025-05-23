<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $id
 * @property string $Nombre
 * @property string|null $Alias
 * @property string $Descripcion
 * @property Carbon $Created_At
 * @property Carbon|null $Updated_At
 * @property string|null $Direccion
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
		'Created_At',
		'Updated_At',
		'Direccion'
	];

	public function servicios()
	{
		return $this->hasMany(Servicio::class, 'Proveedor_Id');
	}
}
