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
 * @property string $matricula
 * @property int $modelo_id
 * @property int $km
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Modelo $modelo
 * @property Collection|Revisione[] $revisiones
 *
 * @package App\Models
 */
class Vehiculo extends Model
{
	protected $table = 'vehiculos';

	protected $casts = [
		'modelo_id' => 'int',
		'km' => 'int'
	];

	protected $fillable = [
		'matricula',
		'modelo_id',
		'km'
	];

	public function modelo()
	{
		return $this->belongsTo(Modelo::class);
	}

	public function revisiones()
	{
		return $this->hasMany(Revisione::class);
	}
}
