<?php

namespace FluxLegacyEnum;

require_once __DIR__ . "/../libs/flux-autoload-api/autoload.php";

use FluxLegacyEnum\Libs\FluxAutoloadApi\Adapter\Autoload\Psr4Autoload;
use FluxLegacyEnum\Libs\FluxAutoloadApi\Adapter\Checker\PhpExtChecker;
use FluxLegacyEnum\Libs\FluxAutoloadApi\Adapter\Checker\PhpVersionChecker;

PhpVersionChecker::new(
    ">=8.1"
)
    ->checkAndDie(
        __NAMESPACE__
    );
PhpExtChecker::new(
    [
        "json"
    ]
)
    ->checkAndDie(
        __NAMESPACE__
    );

Psr4Autoload::new(
    [
        __NAMESPACE__ => __DIR__
    ]
)
    ->autoload();
