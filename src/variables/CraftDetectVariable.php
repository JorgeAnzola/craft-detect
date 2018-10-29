<?php
/**
 * Craft detect plugin for Craft CMS 3.x
 *
 * Mobile_Detect library implementation for Craft 3.
 *
 * @link      github.com/jorgeanzola
 * @copyright Copyright (c) 2018 Jorge Anzola
 */

namespace jorgeanzola\craftdetect\variables;

use jorgeanzola\craftdetect\CraftDetect;

use Craft;

/**
 * @author    Jorge Anzola
 * @package   CraftDetect
 * @since     1.0.0
 */
class CraftDetectVariable
{
    // Public Methods
    // =========================================================================

	/**
	 * @param $variable
	 * @param null $args
	 * @return mixed
	 */
	public function get($variable, $args = null)
	{
		return CraftDetect::getInstance()->detectService->get($variable, $args);
	}
}
