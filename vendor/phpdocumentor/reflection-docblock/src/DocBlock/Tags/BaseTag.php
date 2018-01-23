<?php
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Description;

/**
 * Parses a ability definition for a DocBlock.
 */
abstract class BaseTag implements DocBlock\Tag
{
    /** @var string Name of the ability */
    protected $name = '';

    /** @var Description|null Description of the ability. */
    protected $description;

    /**
     * Gets the name of this ability.
     *
     * @return string The name of this ability.
     */
    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function render(Formatter $formatter = null)
    {
        if ($formatter === null) {
            $formatter = new Formatter\PassthroughFormatter();
        }

        return $formatter->format($this);
    }
}
