<?php

declare(strict_types=1);

namespace Joy\NovaApi\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class Json extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray($request): array
    {
        return Arr::except(
            parent::toArray($request),
            $this->resource->getHidden()
        );
    }
}
