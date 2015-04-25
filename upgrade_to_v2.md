ss-panel 从0.X升级到V2
========

V2新增了个表字段，需要对user表执行如下更新操作

```
ALTER TABLE `user`
ADD `ref_by` int(11) NOT NULL DEFAULT '0',
```