
应用 Yii2.0 的分页类方法，并进行了适当重写，兼容 Yii2.0 原生配置

文件位置：`/common/replace/widgets/LinkPager.php`，可根据自己实际需求进行适当修改

官方文档：

[《Class yii\data\Pagination》](https://www.yiichina.com/doc/api/2.0/yii-data-pagination)

[《Class yii\widgets\LinkPager》](https://www.yiichina.com/doc/api/2.0/yii-widgets-linkpager)

### 示例

#### 1、Controller 层

请先调用 `use yii\data\Pagination;`

```php
public function actionIndex()
{
    $data = Manager::find();

    $pages = new Pagination(['totalCount' => $data -> count(), 'pageSize' => $this -> _pageSize]);

    $models = $data
            -> offset($pages -> offset)
            -> limit($pages -> limit)
            -> all();

    return $this -> render('index', [
        'models' => $models,
        'pages' => $pages,
    ]);
}
```

#### 2、View 层

请先调用 `use yii\widgets\LinkPager;`

```php
<?= LinkPager::widget([
        'pagination'        => $pages,
        'maxButtonCount'    => 5,
        'firstPageLabel'    => '首页',
        'lastPageLabel'     => '尾页',
        'nextPageLabel'     => '下一页',
        'prevPageLabel'     => "上一页",
        'activeLinkOptions' => ['style' => 'background-color:#1E9FFF;'],
    ]);?>
```

![LinkPager.png](https://image.oceanickang.com/typecho/2018/11/25/483371367285525/LinkPager.png)

【注】每页显示的数据量可在 【侧边栏】-【系统设置】-【网站设置】 中进行调整

