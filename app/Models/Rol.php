<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $codigo
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'Rol';

	protected $fillable = [
		'codigo',
		'nombre',
		'descripcion'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'Rol_Id');
	}
}
