<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author Maks
 */
class MyHelper
{


    public static function render($el, $url, $data, $title)
    {
        if (isset($_POST['async'])) {
            echo json_encode(array('status' => 'success', 'data' => $el->renderPartial($url, $data, true), 'title' => $title));
        } else {
            $el->pageTitle = $title;
            $el->render($url, $data);
        }
    }

    public static function sendMail($model)
    {
        $user = User::model()->findByPk('1');
        $params['recipient'] = $user->username;
        $params['model'] = $model;
        //public static function sendMail($view, $params) {
        $email = $params['recipient'];
        $view = 'mailebody';

        $mail_config = Yii::app()->params['smtp_params'];
        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        $mailer->SMTPAuth = TRUE;
        $mailer->IsSMTP();
        $mailer->Host = $mail_config['host']; //gmail.com
        $mailer->Username = $mail_config['user']; //user@gmail.com
        $mailer->Password = $mail_config['password']; //mypassword
        $mailer->From = $mail_config['user']; //user@gmail.com
        $mailer->AddAddress($email);
        $mailer->Subject = 'Уведомление';
        $mailer->FromName = 'Ваш сайт';
        $mailer->setPathViews('application.views.mailTemplates');
        $mailer->getView($view, $params);
        if (!$mailer->Send()) {
            Yii::log('Try to login with params: ' . print_r($mail_config, 1), 'warning');
            Yii::log($mailer->ErrorInfo, 'warning');
            return false;
        }
        Yii::log('Email send to ' . print_r($email, 1), 'warning');
        return true;
    }
}

?>
