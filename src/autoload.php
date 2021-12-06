<?php

namespace FluxLegacyEnum;

use FluxAutoloadApi\Adapter\Autoload\Psr4Autoload;

Psr4Autoload::new(
    [
        __NAMESPACE__ => __DIR__
    ]
)
    ->autoload();
