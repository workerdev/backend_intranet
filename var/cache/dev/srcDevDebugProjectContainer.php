<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container5IxEe8U\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container5IxEe8U/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/Container5IxEe8U.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\Container5IxEe8U\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \Container5IxEe8U\srcDevDebugProjectContainer([
    'container.build_hash' => '5IxEe8U',
    'container.build_id' => '9bf230bb',
    'container.build_time' => 1572390978,
], __DIR__.\DIRECTORY_SEPARATOR.'Container5IxEe8U');
