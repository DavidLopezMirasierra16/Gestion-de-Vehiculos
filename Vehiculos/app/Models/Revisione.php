<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Revisione
 * 
 * @property int $id
 * @property int $vehiculo_id
 * @property Carbon $fecha
 * @property int $km_revision
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Vehiculo $vehiculo
 *
 * @package App\Models
 */
class Revisione extends Model
{
	protected $table = 'revisiones';

	protected $casts = [
		'vehiculo_id' => 'int',
		'fecha' => 'datetime',
		'km_revision' => 'int'
	];

	protected $fillable = [
		'vehiculo_id',
		'fecha',
		'km_revision'
	];

	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class);
	}
}
