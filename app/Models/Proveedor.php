<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $id
 * @property string $Nombre
 * @property string|null $Alias
 * @property string $Descripcion
 * @property int $Created_At
 * 
 * @property Collection|Servicio[] $servicios
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	protected $table = 'Proveedor';
	public $timestamps = false;

	protected $casts = [
		'Created_At' => 'int'
	];

	protected $fillable = [
		'Nombre',
		'Alias',
		'Descripcion',
		'Created_At'
	];

	public function servicios()
	{
		return $this->hasMany(Servicio::class, 'Proveedor_Id');
	}
}
