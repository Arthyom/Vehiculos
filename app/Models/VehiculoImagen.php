<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VehiculoImagen
 * 
 * @property int $id
 * @property int $Vehiculo_Id
 * @property int $Imagen_Id
 * @property Carbon $Created_At
 * @property Carbon|null $Updated_At
 * 
 * @property Imagen $imagen
 * @property Vehiculo $vehiculo
 *
 * @package App\Models
 */
class VehiculoImagen extends Model
{
	protected $table = 'VehiculoImagen';
	public $timestamps = true;

	protected $casts = [
		'Vehiculo_Id' => 'int',
		'Imagen_Id' => 'int',
		'Created_At' => 'datetime',
		'Updated_At' => 'datetime'
	];

	protected $fillable = [
		'Vehiculo_Id',
		'Imagen_Id',
		// 'Created_At',
		// 'Updated_At'
	];

	public function imagen()
	{
		return $this->belongsTo(Imagen::class, 'Imagen_Id');
	}

	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class, 'Vehiculo_Id');
	}
}
