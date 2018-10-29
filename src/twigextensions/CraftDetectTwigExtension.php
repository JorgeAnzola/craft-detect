<?php
/**
 * Craft detect plugin for Craft CMS 3.x
 *
 * Mobile_Detect library implementation for Craft 3.
 *
 * @link      github.com/jorgeanzola
 * @copyright Copyright (c) 2018 Jorge Anzola
 */

namespace jorgeanzola\craftdetect\twigextensions;

use jorgeanzola\craftdetect\CraftDetect;

use Craft;

/**
 * @author    Jorge Anzola
 * @package   CraftDetect
 * @since     1.0.0
 */
class CraftDetectTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'CraftDetect';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('someFilter', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('someFunction', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function someInternalFunction($text = null)
    {
        $result = $text . " in the way";

        return $result;
    }
}
