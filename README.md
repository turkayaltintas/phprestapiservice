
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)



<img src="https://i.hizliresim.com/mueukcy.png" />


## SQL File
###### /sql_file/`...`

## _SQL Querys_
###### -> Category Create DB
```
-- auto-generated definition
create table categories
(
    id          int auto_increment
        primary key,
    name        varchar(256)                        not null,
    description text                                not null,
    created     datetime                            not null,
    modified    timestamp default CURRENT_TIMESTAMP not null
)
    engine = InnoDB;
```

###### -> **Products** Create DB
```
-- auto-generated definition
create table products
(
    id          int auto_increment
        primary key,
    name        varchar(32)                         not null,
    description text                                not null,
    price       decimal                             not null,
    category_id int                                 not null,
    created     datetime                            not null,
    modified    timestamp default CURRENT_TIMESTAMP not null
)
    engine = InnoDB
    charset = latin1;
```

###### -> User Create DB
```
-- auto-generated definition
create table user
(
    id           int auto_increment
        primary key,
    email        varchar(250) null,
    password     varchar(250) not null,
    token        text         null,
    token_expire varchar(250) null
);


```

## Login
###### /api/login/login.php
###### Body -> Row - JSON
https://prnt.sc/22cgllt
```
    {
        "email" : "turkay@turkayaltintas.com",
        "password" : "1234"
    }
```
## Register
###### /api/login/register.php
###### Body -> Row - JSON
https://prnt.sc/22cgllt
```
    {
        "email" : "turkay@turkayaltintas.com",
        "password" : "1234"
    }
```

## Product Read
###### /api/product/read.php?token=1369e483c05d3cadea65a50ff0c2c920
https://prnt.sc/22ch14i
```
    token : 1369e483c05d3cadea65a50ff0c2c920
```

## Product Read One
###### api/product/read_one.php?id=3&token=1369e483c05d3cadea65a50ff0c2c920
https://prnt.sc/22ch494
```
    id=3
    token : 1369e483c05d3cadea65a50ff0c2c920
```

## Product Read Paging
###### api/product/read_one.php?id=3&token=1369e483c05d3cadea65a50ff0c2c920
https://prnt.sc/22ch9g6
```
    id=3
    token : 1369e483c05d3cadea65a50ff0c2c920
    page : 2
```
## Product Search Paging
###### /api/product/search.php?s=bez&token=1369e483c05d3cadea65a50ff0c2c920
https://prnt.sc/22chgi5
```
    s=bez
    token : 1369e483c05d3cadea65a50ff0c2c920
```

## Product Create
###### /api/product/create.php
###### Body -> Row - JSON
https://prnt.sc/22chkj8
```
    {
        "name" : "Bebek Bezi",
        "price" : "159",
        "description" : "Ultra yumuşak bebek bezi.",
        "category_id" : 2,
        "created" : "2021-12-08 00:35:07",
        "token" : "1369e483c05d3cadea65a50ff0c2c9202"
    }
```

## Product Delete
###### /api/product/delete.php
###### Body -> Row - JSON
https://prnt.sc/22chn3s
```
    {
        "id" : "71",
        "token" : "1369e483c05d3cadea65a50ff0c2c920"
    }
```

## Product Update
###### /api/product/update.php
###### Body -> Row - JSON
https://prnt.sc/22chrf6
```
    {
        "name" : "Bebek Bezi",
        "price" : "159",
        "description" : "Ultra yumuşak bebek bezi.",
        "category_id" : 2,
        "created" : "2021-12-08 00:35:07",
        "token" : "1369e483c05d3cadea65a50ff0c2c9202"
    }
```


## Category Read
###### /api/category/read.php?token=1369e483c05d3cadea65a50ff0c2c920
https://prnt.sc/22chui0
```
    token : 1369e483c05d3cadea65a50ff0c2c920
```
