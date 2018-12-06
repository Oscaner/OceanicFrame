<?php
namespace common\widgets;

use Yii;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class Alert2 extends \yii\bootstrap\Widget
{
    public $options = [
        'class' => 'layui-layer-dialog lay-breadcrumbs',
    ];
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - key: the name of the session flash variable
     * - value: the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $alertTypes = [

        'error'   => 'alert-danger',

        'danger'  => 'alert-danger',

        'success' => 'alert-success',

        'info'    => 'alert-info',

        'warning' => 'alert-warning'

    ];

    public $iconTypes = [

        // 'error'   => 'ali-icon-danger',

        // 'danger'  => 'ali-icon-danger',

        // 'success' => 'ali-icon-success',

        // 'info'    => 'ali-icon-warning',

        // 'warning' => 'ali-icon-warning'

        'error'   => 'layui-icon-face-cry',

        'danger'  => 'layui-icon-face-cry',

        'success' => 'layui-icon-face-smile',

        'info'    => 'layui-icon-tips',

        'warning' => 'layui-icon-tips'


    ];
    /**
     * @var array the options for rendering the close button tag.
     * Array will be passed to [[\yii\bootstrap\Alert::closeButton]].
     */
    public $closeButton = [];


    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $session = Yii::$app -> session;

        $flashes = $session -> getAllFlashes();

        $appendClass = isset($this -> options['class']) ? ' ' . $this -> options['class'] : '';

        foreach ($flashes as $type => $flash) {

            if (!isset($this -> alertTypes[$type])) {

                continue;

            }

            foreach ((array) $flash as $i => $message) {
                $id = $this -> getId() . '-' . $type . '-' . $i;

                $class = $this -> alertTypes[$type] . $appendClass;

                $iconType = $this -> iconTypes[$type];

                echo <<<HTML
                    <div id="{$id}" class="{$class}" style="margin-top: 5px; overflow: auto;">
                            <i class="layui-icon {$iconType}" style="vertical-align: middle;"></i> &nbsp;
                            {$message} 
                    </div>
                    <script type="text/javascript">
                        let closetimer = parseInt($('#alter_timer').text());
                        let t;
                        function countDown () {
                            $('#alter_timer').text(closetimer);
                            if (closetimer <= 0) {
                                $("#{$id}").empty().remove();
                                clearTimeout(t);
                            } else {
                                closetimer--;
                                t = setTimeout("countDown()", 1000);
                            }
                        }
                        $(countDown());
                    </script>
HTML;

                // echo \yii\bootstrap\Alert::widget([
                //     'body' => $message,
                //     'closeButton' => $this->closeButton,
                //     'options' => array_merge($this->options, [
                //         'id' => $this->getId() . '-' . $type . '-' . $i,
                //         'class' => $this->alertTypes[$type] . $appendClass,
                //     ]),
                // ]);
            }

            $session -> removeFlash($type);
        }
    }
}
