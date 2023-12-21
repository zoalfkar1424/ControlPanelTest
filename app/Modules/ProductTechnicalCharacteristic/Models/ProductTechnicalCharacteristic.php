<?php

namespace App\Modules\ProductTechnicalCharacteristic\Models;

use App\Modules\Product\Models\Product;
use App\Modules\TechnicalCharacteristic\Models\TechnicalCharacteristic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTechnicalCharacteristic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'tech_char_id',
        'characteristic_value'
    ];
    protected $with = [

        'technicalCharacteristic'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function technicalCharacteristic()
    {
        return $this->belongsTo(TechnicalCharacteristic::class, 'tech_char_id');
    }
}
