

Yii NoSQL 配置均在 `common/config/main.php`

系统默认为文件缓存，根据实际情况进行相应修改

## Memcached

#### 1、Yii 配置

```php
// memcached 缓存
'memcached' => [
    'class' => 'yii\caching\MemCache',
    'servers' => [
        // 分布式 连接池
        [
            'host' => 'localhost', // ip 地址
            'port' => 11211,       // 端口 11211
            'weight' => 60,        // 权重
        ],
        [
            'host' => 'localhost', // ip 地址
            'port' => 11211,       // 端口 11211
            'weight' => 40,        // 权重
        ],
    ],
    // 'keyPrefix' => '',     // key 的前缀
    // 'hashKey' => false,    // 对 key 进行 hash 操作
    // 'serializer' => false, // value 的序列化
    'useMemcached' => true,   // 使用 memcached 而不是 memcache
],
```

#### 2、常用方法

## Redis

Redis 安装及配置可查看：[https://www.oceanickang.com/search/Redis/](https://www.oceanickang.com/search/Redis/)

Yii2.0 的 Redis 使用教程：[《Yii2.0 yii2-redis 扩展详解》](https://www.yiichina.com/doc/guide/2.0/yii2-redis)

#### 1、Yii 配置

```php
// redis 缓存
'redis' => [
    'class' => 'yii\redis\Connection',
    'hostname' => 'localhost', // 服务器 IP
    'port' => 6379,            // 端口
    'database' => 0,           // 默认数据库
    'password' => 'abcdef',    // 密码
],
// 若想用 redis 接管系统缓存，还要进行如下配置
// 只是部分业务使用 redis，可不配置
'cache' => [
    'class' => 'yii\redis\Cache', // redis接管系统缓存
    // 'class' => 'yii\caching\FileCache',
    // 'cachePath' => '@common/runtime/cache',
],
```

> 若想用 redis 接管系统的 session 会话，可进入相应应用系统的 `main.php` 文件进行修改

```php
// 如我想让 redis 接管 backend 的 session
// 方便分布式部署情况下，后台的 session 可以共用
// 进入 backend/config/main.php，将 session 配置修改如下
'session' => [
    // this is the name of the session cookie used for login on the backend
    'name' => 'oframe-backend',
    'timeout' => 60 * 60 * 2,
    'class' => 'yii\redis\Session' // 使用 redis 存储 session，实现跨服务器共用 session
],
```

#### 2、常用方法

Yii Redis 的命令其实和 Redis 的原生命令基本一致，这里只列举几个常用的

其他命令可查阅这份文档：[《Redis 教程》](http://www.runoob.com/redis/redis-strings.html)

```php
Yii::$app -> redis -> exists('key');     // 判断 key 是否存在
Yii::$app -> redis -> expire('key', 60); // 给 key 设置过期时间 60s
Yii::$app -> redis -> flushall();        // 清空 redis
Yii::$app -> redis -> del('key');        // 删除某个键值
Yii::$app -> redis -> ttl('key');        // 获取某键的到期时间

// String
Yii::$app -> redis -> set('key', 'value');       // 设置指定 key 的值
Yii::$app -> redis -> setex('key', 30, 'value'); // 设置一个带有效期(秒)的键值对
Yii::$app -> redis -> get('key');                // 获取指定 key 的值
Yii::$app -> redis -> getrange('key', 0, 1);     // 返回 key 中字符串值 0 到 1 的子字符
Yii::$app -> redis -> getset('key', 'value');    // 将给定 key 的值设为 value ，并返回 key 的旧值(old value)
Yii::$app -> redis -> incr('key');               // 对 key 的 value + 1，仅对数值有效
Yii::$app -> redis -> decr('key');               // 对 key 的 value - 1，仅对数值有效
Yii::$app -> redis -> incrby('key', 10);         // 对 key 的 value + 10，仅对数值有效
// Hash
Yii::$app -> redis -> hmset('hash_name', 'k1', 'v1', 'k2', 'v2'); // 创建名为 hash_name 的 hash 表，并存储相应键值对
Yii::$app -> redis -> hmget('hash_name', 'k1');                   // 获取 hash_name 表中的键名为 k1 的键值
Yii::$app -> redis -> hdel('hash_name', 'k1');                    // 删除 hash_name 表中的 k1 键值对
Yii::$app -> redis -> hgetall('hash_name');                       // 获取 hash_name 表中的所有键值对
Yii::$app -> redis -> hincrby('hash_name', 'k1');                 // 对 hash_name 表中的 k1 的 value + 1，仅对数值有效
// Set
Yii::$app -> redis -> sadd('key', 'v1', 'v2', 'v3'); // 向集合添加一个或多个成员
Yii::$app -> redis -> scard('key');                  // 获取集合的成员数
Yii::$app -> redis -> sdiff('k1', 'k2', 'k3');       // 返回给定所有集合的差集
Yii::$app -> redis -> sinter('k1', 'k2', 'k3');      // 返回给定所有集合的交集
Yii::$app -> redis -> sunion('k1', 'k2', 'k3');      // 返回所有给定集合的并集
Yii::$app -> redis -> smembers('key');               // 返回集合中的所有成员
Yii::$app -> redis -> spop('key', 2);                // 移除并返回集合中的一个或多个随机元素
// ZSet
Yii::$app -> redis -> zadd('key', 1, 'name1', 2, 'name2'); // 向有序集合添加一个或多个成员，或者更新已存在成员的分数
Yii::$app -> redis -> zscore('key', 'name1');              // 返回有序集中，成员的分数值
Yii::$app -> redis -> zcard('key');                        // 获取有序集合的成员数
Yii::$app -> redis -> zcount('key', 60, 90);               // 计算在有序集合中指定区间分数的成员数
Yii::$app -> redis -> zrevrange('key', 60, 90);            // 返回有序集中指定区间内的成员，分数从高到底，返回索引和分数
Yii::$app -> redis -> zrevrangebyscore('key', 60, 90);     // 返回有序集中指定区间内的成员，分数从高到底，仅返回索引
Yii::$app -> redis -> zrevrank('key', 'name1');            // 返回有序集中指定成员的排名，有序集成员按分数值递减(从大到小)排序
Yii::$app -> redis -> zincrby('key', '12', 'name1');       // 有序集合中对指定成员的分数加上增量 12
Yii::$app -> redis -> zrank('key', 'name1');               // 返回有序集合中指定成员的索引
Yii::$app -> redis -> zrem('key', 'name1', 'name2');       // 移除有序集合中的一个或多个成员

// 直接使用 redis cli 命令
// 等价于 HMSET test_collection key1 "val1" key2 "val2"
Yii::$app -> redis -> executeCommand('hmset', ['test_collection', 'key1', 'val1', 'key2', 'val2']);
```


> 示例

```php
$redis = Yii::$app -> redis;
$key = 'username';
// 判断 key 为 username 的缓存是否存在，有则打印，没有则复制
if ($redis -> exists($key)) {
    var_dump($redis -> get($key));
} else {
    $redis -> set($key, 'OceanicKang', 60); // 写入 string 类型缓存
}

```

## MongoDB

【注】默认是关闭 MongoDB 的，若要使用 MongoDB，请按如下操作进行

1、安装好 PHP MongoDB 扩展（必须）

2、在 `composer.json` 中添加 ``"yiisoft/yii2-mongodb": "~2.0.0",``

3、命令行执行 `composer update`

#### 1、Yii 配置

```php
'mongodb' => [
    'class' => '\yii\mongodb\Connection',
    // developer: 用户名
    // password: 密码
    // localhost: 服务器地址
    // 27017: 端口
    // mydatabase: 数据库名
    'dsn' => 'mongodb://developer:password@localhost:27017/mydatabase', 
],
```

#### 2、常用方法



