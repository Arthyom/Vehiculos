<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 * 
 * @property int $id
 * @property Carbon $Created_At
 * @property int $Vehiculo_Id
 * @property int $Proveedor_Id
 * @property int|null $Kilometraje
 * @property string|null $Descripcion
 * 
 * @property Proveedor $proveedor
 * @property Vehiculo $vehiculo
 *
 * @package App\Models
 */
class Servicio extends Model
{
	protected $table = 'Servicio';
	public $timestamps = false;

	protected $casts = [
		'Created_At' => 'datetime',
		'Vehiculo_Id' => 'int',
		'Proveedor_Id' => 'int',
		'Kilometraje' => 'int'
	];

	protected $fillable = [
		'Created_At',
		'Vehiculo_Id',
		'Proveedor_Id',
		'Kilometraje',
		'Descripcion'
	];

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'Proveedor_Id');
	}

	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class, 'Vehiculo_Id');
	}
}
