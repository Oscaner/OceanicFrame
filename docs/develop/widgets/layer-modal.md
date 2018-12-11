
弹出层类似于 Bootstrap 的 模态框（layer-modal），是覆盖在父窗体上的子窗体

目的是显示来自一个单独的源的内容，可以在不离开父窗体的情况下有一些互动。

令子窗体可提供信息、交互等。

### 用法

1、 在控制器元素（比如按钮或者链接）上设置属性 `class="layer-modal"`，同时设置 `title` 以及 `href`

2、 在需要展示的内容页头部，添加如下代码：

```php
<?php
$this -> context -> layout = '@basics/backend/views/layout/layer-modal';
?>
```

3、 视图以 `render()` 方式渲染返回

### 示例

1、 标签元素

```php
<a class="layui-btn layui-btn-normal layer-modal" title="添加新菜单" href="<?php echo Url::to(['edit', 'type' => $type]); ?>">
    <i class="layui-icon layui-icon-add-circle-fine"></i>添加新菜单
</a>
```

2、 视图源(edit.php)

```php
<?php
use yii\widgets\ActiveForm;

$this -> context -> layout = '@basics/backend/views/layout/layer-modal';
?>

<?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'layui-form layui-form-pane'
            ]
        ]); ?>

<div class="layui-form-item" pane>
    <label class="layui-form-label">单选框</label>
    <div class="layui-input-block">
        <input type="radio" name="sex" value="男" title="男">
        <input type="radio" name="sex" value="女" title="女" checked>
    </div>
</div>

<?php ActiveForm::end(); ?>
```

3、 控制器(controller)

```php
/**
 * 编辑|新增
 *
 * @return string [<description>]
 */
public function actionEdit()
{
    return $this -> render('edit', [

    ]);
}
```

![model-demo.png](https://image.oceanickang.com/typecho/2018/11/01/508423203367157/model-demo.png)
