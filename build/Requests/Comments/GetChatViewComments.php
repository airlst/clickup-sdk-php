<?php

declare(strict_types=1);

namespace ClickUp\V2\Requests\Comments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

use function is_null;

/**
 * GetChatViewComments.
 *
 * View comments from a Chat view. \
 *  \
 * If you do not include the `start` and `start_id` parameters,
 * this endpoint will return the most recent 25 comments.\
 *  \
 * Use the `start` and `start id` parameters
 * of the oldest comment to retrieve the next 25 comments.
 */
class GetChatViewComments extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param string      $viewId  105 (string)
     * @param int|null    $start   enter the `date` of a Chat view comment using Unix time in milliseconds
     * @param string|null $startId enter the Comment `id` of a Chat view comment
     */
    public function __construct(
        protected string $viewId,
        protected ?int $start = null,
        protected ?string $startId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/v2/view/{$this->viewId}/comment";
    }

    protected function defaultQuery(): array
    {
        return array_filter(['start' => $this->start, 'start_id' => $this->startId], fn (mixed $value): bool => ! is_null($value));
    }
}
