<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources\Concerns;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\ValueObjects\Method;

trait ShowsResource
{
    use InteractsWithAPI;

    /**
     * @param  int  $id
     * @param  array  $query
     * @return array|null
     * @throws ClientException
     */
    public function show(int $id, array $query = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::GET,
                uri: "{$this->getResource()}/$id",
                query: $query,
            );
    }
}
