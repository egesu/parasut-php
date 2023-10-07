<?php

declare(strict_types=1);

namespace Leventcz\Parasut\Resources;

use Leventcz\Parasut\Exceptions\ClientException;
use Leventcz\Parasut\Resources\Concerns\ArchivesResource;
use Leventcz\Parasut\Resources\Concerns\DeletesResource;
use Leventcz\Parasut\Resources\Concerns\EditsResource;
use Leventcz\Parasut\Resources\Concerns\IndexesResources;
use Leventcz\Parasut\Resources\Concerns\ShowsResource;
use Leventcz\Parasut\Resources\Concerns\UnArchivesResource;
use Leventcz\Parasut\ValueObjects\Method;

class BankFee extends ApiResource
{
    use IndexesResources;
    use ShowsResource;
    use EditsResource;
    use DeletesResource;
    use ArchivesResource;
    use UnArchivesResource;

    /**
     * @var string
     */
    protected string $resource = 'bank_fees';

    /**
     * @param  string  $id
     * @param  array<string, string|array<string, string>>  $query
     * @param  array<string, string|array<string, string>>  $body
     * @return array<mixed>|null
     * @throws ClientException
     */
    public function pay(string $id, array $query = [], array $body = []): ?array
    {
        return $this
            ->getHttpClient()
            ->authenticatedRequest(
                method: Method::PATCH,
                uri: "{$this->getResource()}/$id/payments",
                query: $query,
                body: $body
            );
    }
}
