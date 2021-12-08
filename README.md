
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

## Login
###### /api/login/login.php
###### Body -> Row - JSON
```
    {
        "email" : "turkay@turkayaltintas.com",
        "password" : "1234"
    }
```


## Product Read
###### /api/product/read.php?token=1369e483c05d3cadea65a50ff0c2c920
```
    token : 1369e483c05d3cadea65a50ff0c2c920
```

## Product Read One
###### api/product/read_one.php?id=3&token=1369e483c05d3cadea65a50ff0c2c920
```
    id=3
    token : 1369e483c05d3cadea65a50ff0c2c920
```

## Product Read Paging
###### api/product/read_one.php?id=3&token=1369e483c05d3cadea65a50ff0c2c920
```
    id=3
    token : 1369e483c05d3cadea65a50ff0c2c920
    page : 2
```
## Product Read Paging
###### /api/product/search.php?s=bez&token=1369e483c05d3cadea65a50ff0c2c920
```
    s=bez
    token : 1369e483c05d3cadea65a50ff0c2c920
```

## Product Create
###### /api/product/create.php
###### Body -> Row - JSON
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
```
    {
        "id" : "71",
        "token" : "1369e483c05d3cadea65a50ff0c2c920"
    }
```

## Product Update
###### /api/product/update.php
###### Body -> Row - JSON
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
```
    token : 1369e483c05d3cadea65a50ff0c2c920
```
