# sima_land_api

*Simple wrapper for www.sima-land.ru/api*

How to get json for first page of category:
```php
    print_r(Category::run()
        ->getPage(1)
        ->getJson());
```
How to get item of category with id = 1:
```php
     print_r(Category::run()
         ->getById(1)
         ->getLinksFromJson());
```
How to get total count of pages of category:
```php
    print_r(Category::run()
        ->getPage(1)
        ->getMetaFromJson()->totalCount);
```
How to get href to last page of category:
```php
    print_r(Category::run()
        ->getPage(1)
        ->getLinksFromJson()->last);
```
