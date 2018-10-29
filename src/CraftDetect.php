<?php
/**
 * Craft detect plugin for Craft CMS 3.x
 *
 * Mobile_Detect library implementation for Craft 3.
 *
 * @link      github.com/jorgeanzola
 * @copyright Copyright (c) 2018 Jorge Anzola
 */

namespace jorgeanzola\craftdetect;

use jorgeanzola\craftdetect\services\DetectService as DetectServiceService;
use jorgeanzola\craftdetect\variables\CraftDetectVariable;
use jorgeanzola\craftdetect\twigextensions\CraftDetectTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class CraftDetect
 *
 * @author    Jorge Anzola
 * @package   CraftDetect
 * @since     1.0.0
 *
 * @property  DetectServiceService $detectService
 */
class CraftDetect extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var CraftDetect
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new CraftDetectTwigExtension());

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('craftDetect', CraftDetectVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'craft-detect',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }
}
