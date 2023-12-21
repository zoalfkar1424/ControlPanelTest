<?php


namespace App\Modules\Product\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductDTO extends DataTransferObject
{

    /** @var string $key */
    public $name;

    /** @var float $price */
    public $price;

    /** @var int $catalog_id */
    public $catalog_id;

    /** @var int $workarea_id*/
    public $workarea_id;

    /** @var technicalCharacteristicsidsWIthValues[] $technicalCharacteristics_vals*/
    public $technicalCharacteristics_vals;

    public static function fromRequest($request)
    {
        return new self([
            'name' => $request['name'],
            'price' => $request['price'],
            'catalog_id' => $request['catalog_id'],
            'workarea_id' => $request['workarea_id'],
            'technicalCharacteristics_vals' => $request['technicalCharacteristics_vals']
        ]);
    }

    public static function fromRequestForUpdate($request, $Product)
    {
        return new self([
            'name' => isset($request['name']) ? $request['name'] : $Product->name,
            'price' => isset($request['price']) ? $request['price'] : $Product->price,
            'catalog_id' => isset($request['catalog_id']) ? $request['catalog_id'] : $Product->catalog_id,
            'workarea_id' => isset($request['workarea_id']) ? $request['workarea_id'] : $Product->workarea_id,
            'technicalCharacteristics_vals' => isset($request['technicalCharacteristics_vals']) ? $request['technicalCharacteristics_vals'] : $Product->technicalCharacteristics_vals
        ]);
    }
}
