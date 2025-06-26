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
 * @property Carbon|null $Updated_At
 * @property float|null $Total
 * @property int|null $Nota_Id
 * @property bool $Pagado
 * @property bool $Subsidiado
 * @property string|null $Detalles
 * @property int|null $TipoServicio_Id
 *
 * @property Nota|null $notum
 * @property Proveedor $proveedor
 * @property TipoServicio|null $tipo_servicio
 * @property Vehiculo $vehiculo
 *
 * @package App\Models
 */
class Servicio extends Model
{
	protected $table = 'Servicio';
	public $timestamps = true;

	protected $casts = [
		'Created_At' => 'datetime',
		'Vehiculo_Id' => 'int',
		'Proveedor_Id' => 'int',
		'Kilometraje' => 'int',
		'Updated_At' => 'datetime',
		'Total' => 'float',
		'Nota_Id' => 'int',
		'Pagado' => 'bool',
		'Subsidiado' => 'bool',
		'TipoServicio_Id' => 'int'
	];

	protected $fillable = [
		'Created_At',
		'Vehiculo_Id',
		'Proveedor_Id',
		'Kilometraje',
		'Descripcion',
		'Updated_At',
		'Total',
		'Nota_Id',
		'Pagado',
		'Subsidiado',
		'Detalles',
		'TipoServicio_Id'
	];

	public function nota()
	{
		return $this->belongsTo(Nota::class, 'Nota_Id');
	}

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'Proveedor_Id');
	}

	public function tipo_servicio()
	{
		return $this->belongsTo(TipoServicio::class, 'TipoServicio_Id');
	}

	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class, 'Vehiculo_Id');
	}
}
