<?php

namespace App\Modules\Product\Models;

use App\Modules\Catalog\Models\Catalog;
use App\Modules\ProductTechnicalCharacteristic\Models\ProductTechnicalCharacteristic;
use App\Modules\Workarea\Models\Workarea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price',
        'workarea_id',
        'catalog_id'
    ];
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
    public function workarea()
    {
        return $this->belongsTo(Workarea::class, 'workarea_id');
    }
    public function productTechnicalCharacteristic()
    {
        return $this->hasMany(ProductTechnicalCharacteristic::class);
    }
}
