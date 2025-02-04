<?php

namespace App\Services\Scramble;

use Dedoc\Scramble\Extensions\OperationExtension;
use Dedoc\Scramble\Support\Generator\Operation;
use Dedoc\Scramble\Support\Generator\Parameter;
use Dedoc\Scramble\Support\Generator\Schema;
use Dedoc\Scramble\Support\Generator\Types\StringType;
use Dedoc\Scramble\Support\RouteInfo;

class HeadersExtension extends OperationExtension
{
    public function handle(Operation $operation, RouteInfo $routeInfo): void
    {
        $operation->addParameters([
            Parameter::make('X-API-KEY', 'header')
                ->setSchema(
                    Schema::fromType(new StringType),
                )
                ->required(true)
                ->example('Enter X-API-KEY here'),
        ]);
    }
}
