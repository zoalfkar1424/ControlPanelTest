<?php


namespace App\Modules\TechnicalCharacteristic\DTO;

use Illuminate\Validation\Rules\Enum;
use Spatie\DataTransferObject\DataTransferObject;


class TechnicalCharacteristicDTO extends DataTransferObject
{

    /** @var string $name */
    public $name;

    /** @var enum $category */
    public $category;
    /** @var int $catalog_id */
    public $catalog_id;
    public static function fromRequest($request)
    {
        return new self([
            'name' => $request['name'],
            'category' => $request['category'],
            'catalog_id' => $request['catalog_id']
        ]);
    }

    public static function fromRequestForUpdate($request, $TechnicalCharacteristic)
    {
        return new self([
            'name' => isset($request['name']) ? $request['name'] : $TechnicalCharacteristic->name,
            'category' => isset($request['category']) ? $request['category'] : $TechnicalCharacteristic->category,
            'catalog_id' => isset($request['catalog_id']) ? $request['catalog_id'] : $TechnicalCharacteristic->key
        ]);
    }
}
