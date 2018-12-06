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
class Alert extends \yii\bootstrap\Widget
{
    public $options = [
        'class' => 'layui-layer layui-layer-dialog layui-layer-border layui-layer-msg',
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

        'error'   => 'layui-layer-ico5',

        'danger'  => 'layui-layer-ico2',

        'success' => 'layui-layer-ico1',

        'info'    => 'layui-layer-ico3',

        'warning' => 'layui-layer-ico0'

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
                    <div id="{$id}" class="{$class}" style="position: absolute; z-index: 19891016; top: 40%; left: 50%; transform: translate(-50%, -50%);">
                        <div class="layui-layer-content layui-layer-padding">
                            <i class="layui-layer-ico {$iconType}"></i>
                            {$message} 
                        </div>
                        <span class="layui-layer-setwin"></span>
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
