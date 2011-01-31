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
 * Javascript YUI compressor filter.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class JsCompressorFilter extends BaseCompressorFilter
{
    private $nomunge;
    private $preserveSemi;
    private $disableOptimizations;

    public function setNomunge($nomunge = true)
    {
        $this->nomunge = $nomunge;
    }

    public function setPreserveSemi($preserveSemi)
    {
        $this->preserveSemi = $preserveSemi;
    }

    public function setDisableOptimizations($disableOptimizations)
    {
        $this->disableOptimizations = $disableOptimizations;
    }

    public function filterDump(AssetInterface $asset, $targetUrl = null)
    {
        $options = array();

        if ($this->nomunge) {
            $options[] = '--nomunge';
        }

        if ($this->preserveSemi) {
            $options[] = '--preserve-semi';
        }

        if ($this->disableOptimizations) {
            $options[] = '--disable-optimizations';
        }

        $asset->setContent($this->compress($asset->getContent(), 'js', $options));
    }
}