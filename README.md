# sima_land_api

*Simple wrapper for www.sima-land.ru/api*

How to get json for first page of category:
```php
    print_r(Wrapper::runFor(IUrls::Category)
            ->getPage(1)
            ->getJson());
```
How to get all links for first page of category:
```php
     print_r(Wrapper::runFor(IUrls::Category)
            ->getPage(1)
            ->getLinksFromJson());
```
How to get total count of pages of category:
```php
    print_r(Wrapper::runFor(IUrls::Category)
           ->getPage(1)
           ->getMetaFromJson()->pageCount);
```
How to get href to last page of category:
```php
    print_r(Wrapper::runFor(IUrls::Category)
            ->getPage(1)
            ->getLinksFromJson()->last);
```
How to run custom query and get array of CategoryItems from it: 
```php
    $data = array(
        'path'=>'2',
        'level'=>'2');

    print_r(Wrapper::runFor(IUrls::Category)
        ->query($data)->getItemFromJson()
```
How to get array of all most liked goods items:
```php
     print_r(Wrapper::runFor(IUrls::GoodsMostLiked)
            ->getPage(1)->getItemFromJson()
        );
```
How to get all name of categories in custom query:
```php
foreach (Wrapper::runFor(IUrls::Category)
        ->getPage(1)->getItemFromJson() as $item)
            echo $item->name . "\n";
```
