<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerKnvvoxf\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerKnvvoxf/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerKnvvoxf.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerKnvvoxf\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerKnvvoxf\appProdProjectContainer(array(
    'container.build_hash' => 'Knvvoxf',
    'container.build_id' => '469fe472',
    'container.build_time' => 1527243353,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerKnvvoxf');
