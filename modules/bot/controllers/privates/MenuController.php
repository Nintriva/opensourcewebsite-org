<?php

namespace app\modules\bot\controllers\privates;

use Yii;
use app\modules\bot\components\Controller;
use app\modules\bot\components\helpers\Emoji;

/**
 * Class MenuController
 *
 * @package app\modules\bot\controllers\privates
 */
class MenuController extends Controller
{
    /**
     * @return array
     */
    public function actionIndex()
    {
        return $this->getResponseBuilder()
            ->editMessageTextOrSendMessage(
                $this->render('index'),
                [
                    [
                        [
                            'callback_data' => SAdController::createRoute(),
                            'text' => Yii::t('bot', 'Ads'),
                            'visible' => YII_ENV_DEV,
                        ],
                    ],
                    [
                        [
                            'callback_data' => SJobController::createRoute(),
                            'text' => Yii::t('bot', 'Jobs'),
                            'visible' => YII_ENV_DEV,
                        ],
                    ],
                    [
                        [
                            'callback_data' => GroupController::createRoute(),
                            'text' => Yii::t('bot', 'Telegram groups'),
                        ],
                    ],
                    [
                        [
                            'callback_data' => ServicesController::createRoute(),
                            'text' => '🏗 ' . Yii::t('bot', 'Development'),
                        ],
                    ],
                    [
                        [
                            'callback_data' => MyAccountController::createRoute(),
                            'text' => Yii::t('bot', 'Account'),
                        ],
                    ],
                    [
                        [
                            'url' => 'https://github.com/opensourcewebsite-org/opensourcewebsite-org/blob/master/DONATE.md',
                            'text' => Emoji::DONATE . ' ' . Yii::t('bot', 'Donate'),
                        ],
                        [
                            'url' => 'https://github.com/opensourcewebsite-org/opensourcewebsite-org/blob/master/CONTRIBUTING.md',
                            'text' => Emoji::CONTRIBUTE . ' ' . Yii::t('bot', 'Contribute'),
                        ],
                    ],
                    [
                        [
                            'callback_data' => StartController::createRoute(),
                            'text' => Emoji::GREETING,
                        ],
                        [
                            'callback_data' => LanguageController::createRoute(),
                            'text' => Emoji::LANGUAGE . ' ' . strtoupper(Yii::$app->language),
                        ],
                    ],
                ]
            )
            ->build();
    }
}
