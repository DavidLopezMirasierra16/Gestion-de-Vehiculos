<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Modelo
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Vehiculo[] $vehiculos
 *
 * @package App\Models
 */
class Modelo extends Model
{
	protected $table = 'modelos';

	protected $fillable = [
		'nombre'
	];

	public function vehiculos()
	{
		return $this->hasMany(Vehiculo::class);
	}
}
