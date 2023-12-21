<?php


namespace App\Modules\Auth\Log\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class LogDTO extends DataTransferObject
{

    /** @var string $key */
    public $name;

    public static function fromRequest($request)
    {
        return new self([
            'name' => $request['name']
        ]);
    }

    public static function fromRequestForUpdate($request, $Catalog)
    {
        return new self([
            'name' => isset($request['name']) ? $request['name'] : $Catalog->name
        ]);
    }
}
