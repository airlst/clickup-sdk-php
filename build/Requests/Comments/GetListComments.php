<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetListComments.
 *
 * View the comments added to a List. \
 *  \
 * If you do not include the `start` and `start_id` parameters,
 * this endpoint will return the most recent 25 comments.\
 *  \
 * Use the `start` and `start id` parameters
 * of the oldest comment to retrieve the next 25 comments.
 */
class GetListComments extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param int|null    $start   enter the `date` of a List info comment using Unix time in milliseconds
     * @param string|null $startId enter the Comment `id` of a List info comment
     */
    public function __construct(
        protected float|int $listId,
        protected ?int $start = null,
        protected ?string $startId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/list/{$this->listId}/comment";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['start' => $this->start, 'start_id' => $this->startId]);
    }
}
