<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoServicio
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $Descripcion
 * @property int $Codigo
 *
 * @property Collection|Servicio[] $servicios
 *
 * @package App\Models
 */
class TipoServicio extends Model
{
	protected $table = 'TipoServicio';
    public $timestamps = true;

	protected $casts = [
		'Codigo' => 'int'
	];

	protected $fillable = [
		'Descripcion',
		'Codigo'
	];

	public function servicios()
	{
		return $this->hasMany(Servicio::class, 'TipoServicio_Id');
	}
}
