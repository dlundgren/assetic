<?php

namespace Assetic\Filter\Yui;

use Assetic\Asset\AssetInterface;

/*
 * This file is part of the Assetic package.
 *
 * (c) Kris Wallsmith <kris.wallsmith@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * CSS YUI compressor filter.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class CssCompressorFilter extends BaseCompressorFilter
{
    public function filterDump(AssetInterface $asset, $targetUrl = null)
    {
        $asset->setContent($this->compress($asset->getContent(), 'css'));
    }
}