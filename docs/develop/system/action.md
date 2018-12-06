【注】以下方法均可在 controller 调用

#### 打印调试

1、调用方式

```php
$this -> p($error);
```

2、源码

```php
/**
 * 打印调试
 * @param $array
 */
public function p($array)
{
    echo "<pre>";
    print_r($array);
    exit();
}
```

#### 生成前台和微信端路由

```php
Yii::$app -> urlManagerFrontend -> createAbsoluteUrl(['index']); // 前台路由生成
Yii::$app -> urlManagerWechat -> createAbsoluteUrl(['index']);   // 微信路由生成
```

#### 后台 message 跳转提醒

1、调用方式

```php
return $this -> message('操作成功', $this -> redirect(['role']));               // 成功提示
return $this -> message('操作失败', $this -> redirect(['role']), 'error');      // 错误提示
return $this -> message('操作失败', $this -> redirect(['role']), 'warning');    // 警告提示
return $this -> message('操作失败', $this -> redirect(['role']), 'error', 500); // 设置 alert 持续时间，默认成功 3 秒，失败 5 秒
```

![message.png](https://image.oceanickang.com/typecho/2018/11/13/865763178704536/message.png)


2、源码

请查看 `vendor/oceanickang/oframe-basics/backend/controllers/BController.php`

#### 获取 Model 的第一条报错信息

1、调用方式

```php
$this -> analysisError($model -> getFirstErrors()); // 打印错误 
```

可以配合 message 跳转使用，如：

```php
/**
 * 编辑|新增
 * @return string [<description>]
 */
public function actionRoleEdit($id)
{
    $model = $this -> findModel($id);
    if (Yii::$app -> request -> isPost) {
        return ($model -> load(Yii::$app -> request -> post()) && $model -> save()) ?
                $this -> message('操作成功', $this -> redirect(['role'])) :
                $this -> message($this -> analysisError($model -> getFirstErrors()), $this -> redirect(['role']), 'error');
    }
    return $this -> render('role-edit', [
        'model' => $model
    ]);
}
```

2、源码

```php
/**
 * 解析Yii2错误信息
 * @param $errors
 * @return string
 */
public function analysisError($errors)
{
    $errors = array_values($errors)[0];
    return $errors ?? '操作失败';
}
```

#### 下载

1、调用方式

```php
$this -> download('文件路径(包括文件名)');
```

2、源码

```php
/**
 * 公共下载方式
 */
public function download($path)
{
    ob_end_clean();
    header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header ('Content-Description: File Transfer');
    header ('Content-Type: application/octet-stream; charset=utf8');
    header ('Content-Length: ' . filesize($path));
    header ('Content-Disposition: attachment; filename=' . basename($path));
    readfile($path);
}
```

#### 全局方法或参数

| 方法 | 说明 |
| :--- | :--- |
| Yii::$app -> request -> hostInfo | 当前域名 |
| Yii::$app -> request -> getUrl() | 除域名外的URL |
| Yii::$app -> request -> userIP | 用户IP |
| Yii::$app -> db -> getLastInsertId() | 最后插入id |
| Yii::$app -> user -> isGuest | 用户未登录为true |
| Yii::$app -> controller -> module -> id | 当前 module id（模块名称） |
| Yii::$app -> controller -> id | 当前 controller id（控制器名称） |
| Yii::$app -> controller -> action -> id | 当前 action id（方法名称） |
| $this -> _pageSize | 每页显示数据量 |

