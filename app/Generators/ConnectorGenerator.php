<?php

declare(strict_types=1);

namespace ClickUp\V2\SDKBuilder\Generators;

use Crescat\SaloonSdkGenerator\Data\Generator\ApiSpecification;
use Crescat\SaloonSdkGenerator\Data\Generator\Endpoint;
use Crescat\SaloonSdkGenerator\Generator;
use Crescat\SaloonSdkGenerator\Helpers\NameHelper;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

use function sprintf;

class ConnectorGenerator extends Generator
{
    public function generate(ApiSpecification $specification): PhpFile|array
    {
        return $this->generateConnectorClass($specification) ?? [];
    }

    protected function generateConnectorClass(ApiSpecification $specification): ?PhpFile
    {
        $classType = new ClassType($this->config->connectorName);
        $classType->setExtends(Connector::class)
            ->addTrait(AlwaysThrowOnErrors::class);

        if ($specification->name !== null && $specification->name !== '' && $specification->name !== '0') {
            $classType->addComment($specification->name);
        }

        if ($specification->description !== null && $specification->description !== '' && $specification->description !== '0') {
            $classType->addComment($specification->name !== null && $specification->name !== '' && $specification->name !== '0' ? "\n{$specification->description}" : $specification->description);
        }

        $classFile = new PhpFile();

        $constructor = $classType->addMethod('__construct');
        $constructor->addPromotedParameter('personalToken')
            ->setType('string')
            ->setProtected()
            ->setReadOnly();

        $classType->addMethod('resolveBaseUrl')
            ->setReturnType('string')
            ->setBody(sprintf('return "%s";', $specification->baseUrl));

        $classType->addMethod('defaultAuth')
            ->setReturnType(TokenAuthenticator::class)
            ->setProtected()
            ->setBody('return new TokenAuthenticator($this->personalToken, "");');

        $namespace = $classFile
            ->addNamespace("{$this->config->namespace}")
            ->addUse(Connector::class)
            ->addUse(TokenAuthenticator::class)
            ->addUse(AlwaysThrowOnErrors::class);

        $collections = collect($specification->endpoints)
            ->map(fn (Endpoint $endpoint): string => NameHelper::connectorClassName($endpoint->collection !== null && $endpoint->collection !== '' && $endpoint->collection !== '0' ? $endpoint->collection : $this->config->fallbackResourceName)) // @phpstan-ignore-line
            ->unique()
            ->sort()
            ->all();

        foreach ($collections as $collection) {
            $resourceClassName = NameHelper::connectorClassName($collection);
            $resourceFQN = "{$this->config->namespace}\\{$this->config->resourceNamespaceSuffix}\\{$resourceClassName}";

            $namespace->addUse($resourceFQN);

            // TODO: method names like "authenticate" will cause name collision with the Connector class methods,
            //  add a list of reserved method names and find a way to rename the method to something else, or add a pre/suffix

            $classType
                ->addMethod(NameHelper::safeVariableName($collection))
                ->setReturnType($resourceFQN)
                ->setBody(sprintf('return new %s($this);', $resourceClassName));
        }

        $namespace->add($classType);

        return $classFile;
    }
}
