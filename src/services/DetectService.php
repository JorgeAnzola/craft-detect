<?php
/**
 * Craft detect plugin for Craft CMS 3.x
 *
 * Mobile_Detect library implementation for Craft 3.
 *
 * @link      github.com/jorgeanzola
 * @copyright Copyright (c) 2018 Jorge Anzola
 */

namespace jorgeanzola\craftdetect\services;

use Craft;
use Mobile_Detect;
use craft\base\Component;
use jorgeanzola\craftdetect\CraftDetect;

/**
 * @author    Jorge Anzola
 * @package   CraftDetect
 * @since     1.0.0
 */
class DetectService extends Component
{
    // Public Methods
    // =========================================================================

	private $_mobileDetect = null;

	public function getMobileDetect()
	{
		if ($this->_mobileDetect === null) {
			$this->_mobileDetect = new Mobile_Detect;
		}

		return $this->_mobileDetect;
	}

	public function get($service, $args)
	{
		return $this->getMobileDetect()->{$service}($args);
	}

	public function device()
	{
		$mobileDetect = $this->getMobileDetect();

		if ($mobileDetect->isMobile() && ! $mobileDetect->isTablet()) {
			$device = 'mobile';
		} elseif ($mobileDetect->isTablet()) {
			$device = 'tablet';
		} else {
			$device = 'desktop';
		}

		return $device;
	}
}
