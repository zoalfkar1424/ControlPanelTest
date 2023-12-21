<?php


namespace App\Modules\Workarea\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class WorkareaDTO extends DataTransferObject
{

    /** @var string $name */
    public $name;

    /** @var int $catalog_id */
    public $catalog_id;
    public static function fromRequest($request)
    {
        return new self([
            'name' => $request['name'],
            'catalog_id' => $request['catalog_id'] ? (int)$request['catalog_id'] : null
        ]);
    }

    public static function fromRequestForUpdate($request, $Workarea)
    {
        return new self([
            'name' => isset($request['name']) ? $request['name'] : $Workarea->name,
            'catalog_id' => isset($request['catalog_id']) ? $request['catalog_id'] : $Workarea->catalog_id
        ]);
    }
}
