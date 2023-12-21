<?php


namespace App\Modules\LogType\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class LogTypeDTO extends DataTransferObject
{

    /** @var string $key */
    public $key;

    public static function fromRequest($request)
    {
        return new self([
            'key' => $request['key']
        ]);
    }

    public static function fromRequestForUpdate($request, $LogType)
    {
        return new self([
            'key' => isset($request['key']) ? $request['key'] : $LogType->key
        ]);
    }
}
