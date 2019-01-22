<?php
/**
 * @copyright © TMS-Plugins. All rights reserved.
 * @licence   See COPYING.md for license details.
 */

namespace AmeliaBooking\Infrastructure\Routes\Notification;

use AmeliaBooking\Application\Controller\Notification\GetNotificationsController;
use AmeliaBooking\Application\Controller\Notification\SendScheduledNotificationsController;
use AmeliaBooking\Application\Controller\Notification\SendTestEmailController;
use AmeliaBooking\Application\Controller\Notification\UpdateNotificationController;
use AmeliaBooking\Application\Controller\Notification\UpdateNotificationStatusController;
use Slim\App;

/**
 * Class Notification
 *
 * @package AmeliaBooking\Infrastructure\Routes\Notification
 */
class Notification
{
    /**
     * @param App $app
     */
    public static function routes(App $app)
    {
        $app->get('/notifications', GetNotificationsController::class);

        $app->post('/notifications/{id:[0-9]+}', UpdateNotificationController::class);

        $app->post('/notifications/status/{id:[0-9]+}', UpdateNotificationStatusController::class);

        $app->post('/notifications/email/test', SendTestEmailController::class);

        $app->get('/notifications/scheduled/send', SendScheduledNotificationsController::class);
    }
}