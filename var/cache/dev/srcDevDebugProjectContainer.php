<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXlPpL1x\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXlPpL1x/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerXlPpL1x.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerXlPpL1x\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerXlPpL1x\srcDevDebugProjectContainer([
    'container.build_hash' => 'XlPpL1x',
    'container.build_id' => '498aea4b',
    'container.build_time' => 1580920198,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXlPpL1x');
