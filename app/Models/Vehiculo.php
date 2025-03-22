<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 * 
 * @property int $id
 * @property Carbon $Created_At
 * @property string $Marca
 * @property string $Modelo
 * @property string $TipoNeumatico
 * @property double $PrecionNeumatico
 * @property int $Anio
 * @property string $Placa
 * @property string|null $Alias
 * @property int|null $Kilometraje
 * @property Carbon|null $Updated_At
 * 
 * @property Collection|Servicio[] $servicios
 * @property Collection|Imagen[] $imagenes
 *
 * @package App\Models
 */
class Vehiculo extends Model
{
	protected $table = 'Vehiculo';
	public $timestamps = true;

	protected $casts = [
		'Created_At' => 'datetime',
		'Anio' => 'int',
		'Kilometraje' => 'int',
		'Updated_At' => 'datetime'
	];

	protected $fillable = [
		'Marca',
		'Modelo',
		'Anio',
		'Placa',
		'Alias',
		'TipoNeumatico',
		'PrecionNeumatico',
		'Kilometraje'
	];

	public function servicios()
	{
		return $this->hasMany(Servicio::class, 'Vehiculo_Id');
	}

	public function imagenes()
	{
		return $this->belongsToMany(Imagen::class, 'VehiculoImagen', 'Vehiculo_Id', 'Imagen_Id')
					->withPivot('id', 'Created_At', 'Updated_At');
	}
}
