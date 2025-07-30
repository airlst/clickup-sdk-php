<?php

declare(strict_types=1);

namespace ClickUp\V2\SDKBuilder\Helpers;

use stdClass;

class SpecFixerHelper
{
    public static function fix(stdClass $spec): stdClass
    {
        $spec->paths->{'/v2/team/{team_Id}/time_entries'}->get->parameters = collect($spec->paths->{'/v2/team/{team_Id}/time_entries'}->get->parameters) // @phpstan-ignore-line
            ->map(function (stdClass $parameter): stdClass {
                if ($parameter->name === 'assignee') {
                    $parameter->schema = (object) [
                        'type' => ['string', 'number'],
                    ];
                }

                return $parameter;
            })
            ->toArray();

        return $spec;
    }
}
