### 状态枚举类

使项目的所有状态值统一化，便于后期维护

命名空间：`namespace common\enums`

调用方式：`use common\enums\StatusEnum;`

> 状态启用（1）： `StatusEnum::STATUS_ON` <br>
> 状态禁用（0）： `StatusEnum::STATUS_OFF` <br>
> 状态删除（-1）： `StatusEnum::STATUS_DEL` <br>

其他状态可根据实际开发自行补充
