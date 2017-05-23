<?php
namespace yuncms\feedback;

use Yii;
use yii\di\Instance;
use yii\caching\Cache;
use yii\helpers\Json;
use yii\base\InvalidConfigException;

/**
 * Class Module
 * @package yuncms\dns
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'yuncms\feedback\controllers';

    /**
     * @var string|Cache 缓存实例
     */
    public $cache = 'cache';


    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if ($this->cache !== null) {
            $this->cache = Instance::ensure($this->cache, Cache::className());
        }
        $this->registerTranslations();
    }

    /**
     * 注册语言包
     * @return void
     */
    public function registerTranslations()
    {
        if (!isset(Yii::$app->i18n->translations['feedback*'])) {
            Yii::$app->i18n->translations['feedback*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => __DIR__ . '/messages',
            ];
        }
    }
}
