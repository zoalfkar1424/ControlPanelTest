<?php

namespace App\Modules\TechnicalCharacteristic\Models;

use App\Modules\Catalog\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalCharacteristic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'category',
        'catalog_id'
    ];
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
}
