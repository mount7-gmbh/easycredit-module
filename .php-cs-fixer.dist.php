<?php

declare(strict_types=1);


$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->ignoreVCSIgnored(true)
    ->exclude('Application/views')
    ->exclude('metadata.php')
    ->exclude('source');
/**
 * Copyright (C) OXID eSales AG 2003-2021
 * This software is licensed under the GNU GPL v3.
 * See LICENSE.txt for details.
 */
return (new PhpCsFixer\Config())
    ->setRules([
        '@PER-CS' => true,
        '@PHP82Migration' => true,
        'header_comment' => ['header' => <<<'EOF'
            This file is part of Mount7 GmbH EasyCredit module

            Copyright (C) Mount7 GmbH
            Portions Copyright (C) OXID eSales AG 2003-2022

            Licensed under the GNU GPL v3 - See the file LICENSE for details.
            EOF],
        'numeric_literal_separator' => true,

    ])
    ->setFinder($finder);
