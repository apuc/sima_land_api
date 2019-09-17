<?php

require_once('Wrapper/Items/CategoryItem.php');
require_once('Wrapper/Items/GoodsItem.php');
require_once('Wrapper/Items/GoodsInfo/Trademark.php');

class Wrapper
{
    public function GetCategoryPage(int $page)
    {
        if($page < 1)
            return null;

        $query = http_build_query([
            'page' => $page
        ]);

        $url = "https://www.sima-land.ru/api/v3/category/?".$query;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);

        return $json;
    }

    public function GetSingleCategoryById(int $id)
    {
        if($id < 1)
            return null;

        $url = "https://www.sima-land.ru/api/v3/category/".$id.'/';

        //'https://www.sima-land.ru/api/v3/category/<ID>/'
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);

        return $json;
    }

    public function GetItemByCategories(int $categoryId, int $page)
    {
        if($page < 1)
            return null;
        if($categoryId < 1)
            return null;

        $query = http_build_query([
            'category_id' => $categoryId,
            'page' => $page
        ]);
        $url = "https://www.sima-land.ru/api/v3/item/?".$query;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        curl_close($curl);

        return $json;
    }

    public function ParsePageToCategoryItem(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);
        $arr = array();

        foreach ($page['items'] as $item) {

            $elem = $this->CreateCategoryFromArr($item);

            array_push($arr, $elem);
        }

        return $arr;

    }

    public function ParsePageToGoodsItem(string $json)
    {
        if($json === '')
            return null;

        $page = json_decode($json, true);

        $arr = array();

        foreach ($page['items'] as $item)
        {
            //$elem = new GoodsItem();

            echo $item['id'];
            echo "\n";
            echo $item['name'];
            echo "\n";
            echo $item['slug'];
            echo "\n";
            echo $item['price'];
            echo "\n";
            echo $item['price_max'];
            echo "\n";
            echo $item['currency'];
            echo "\n";
            if(isset($item['trademark']))
            {
                echo $item['trademark']['id'];
                echo "\n";
                echo $item['trademark']['name'];
                echo "\n";
                echo $item['trademark']['slug'];
                echo "\n";
                echo $item['trademark']['photo'];
                echo "\n";
                echo $item['trademark']['image'];
                echo "\n";
                echo $item['trademark']['is_exclusive'];
                echo "\n";
            }
            if(isset($item['date_info']))
            {
                echo $item['date_info']['min_date'];
                echo "\n";
                echo $item['date_info']['max_date'];
                echo "\n";
                echo $item['date_info']['is_paid'];
                echo "\n";
            }
            if(isset($item['country']))
            {
                echo $item['country']['id'];
                echo "\n";
                echo $item['country']['name'];
                echo "\n";
                echo $item['country']['full_name'];
                echo "\n";
                echo $item['country']['alpha2'];
                echo "\n";
            }
            if(isset($item['qty_rules_data']))
            {
                if(isset($item['qty_rules_data']['from']))
                {
                    echo $item['qty_rules_data']['from'];
                    echo "\n";

                }
                if(isset($item['qty_rules_data']['on']))
                {
                    echo $item['qty_rules_data']['on'];
                    echo "\n";

                }
            }
            echo $item['category_id'];
            echo "\n";
            echo $item['img'];
            echo "\n";
            //echo $item[''];

            //array_push($arr, $elem);
        }

        //return $arr;
    }

    public function ParseSingleCategory(string $json)
    {
        if($json === '')
            return null;

        $category = json_decode($json, true);

        $elem = $this->CreateCategoryFromArr($category);

        return $elem;

    }

    /**
     * @param $category
     * @return CategoryItem
     */
    public function CreateCategoryFromArr($category): CategoryItem
    {
        $elem = new CategoryItem();

        if (isset($category['id'])) $elem->id = $category['id'];

        if (isset($category['sid'])) $elem->sid = $category['sid'];

        if (isset($category['name'])) $elem->name = $category['name'];

        if (isset($category['priority'])) $elem->priority = $category['priority'];

        if (isset($category['priority_home'])) $elem->priority_home = $category['priority_home'];

        if (isset($category['priority_menu'])) $elem->priority_menu = $category['priority_menu'];

        if (isset($category['is_hidden_in_menu'])) $elem->is_hidden_in_menu = $category['is_hidden_in_menu'];

        if (isset($category['level'])) $elem->level = $category['level'];

        if (isset($category['type'])) $elem->type = $category['type'];

        if (isset($category['path'])) $elem->path = $category['path'];

        if (isset($category['is_adult'])) $elem->is_adult = $category['is_adult'];

        if (isset($category['has_loco_slider'])) $elem->has_loco_slider = $category['has_loco_slider'];

        if (isset($category['has_design'])) $elem->has_design = $category['has_design'];

        if (isset($category['has_as_main_design'])) $elem->has_as_main_design = $category['has_as_main_design'];

        if (isset($category['is_item_description_hidden']))
            $elem->is_item_description_hidden = $category['is_item_description_hidden'];

        if (isset($category['is_adult'])) $elem->is_adult = $category['is_adult'];

        if (isset($category['is_for_mobile_app'])) $elem->is_for_mobile_app = $category['is_for_mobile_app'];

        if (isset($category['photo'])) $elem->photo = $category['photo'];

        if (isset($category['icon'])) $elem->icon = $category['icon'];

        if (isset($category['full_slug'])) $elem->full_slug = $category['full_slug'];
        return $elem;
    }
}
