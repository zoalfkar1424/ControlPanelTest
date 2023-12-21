<?php

namespace App\Modules\Workarea\Models;

use App\Modules\Catalog\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workarea extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'catalog_id'
    ];
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
