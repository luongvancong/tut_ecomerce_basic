<?php

class Sort {

    /**
     * Mảng đầu vào
     * @var array
     */
    protected $categories = [];

    /**
     * Mảng đầu ra sau khi đã sắp xếp
     * @var array
     */
    protected $sortCategories = [];


    /**
     * Hàm khởi tạo
     * @param array $categories [description]
     */
    public function __construct(array $categories) {
        $this->categories = $this->group($categories);
    }

    /**
     * Nhóm những danh mục con vào danh mục cha
     * @param  array $tempCategories
     * @return void
     */
    public function group($tempCategories) {
        $categories = [];
        foreach($tempCategories as $item) {
            foreach($tempCategories as $cat) {
                if($cat['parent_id'] == $item['id']) {
                    $categories[$item['id']][$cat['id']] = $cat;
                } elseif($cat['parent_id'] == 0) {
                    $categories[0][$cat['id']] = $cat;
                }
            }
        }

        return $categories;
    }


    /**
     * Hàm sắp xếp
     * @return array
     */
    public function sort(array $categories, $parentId = 0, $level = -1) {
        if(array_key_exists($parentId, $categories)) {
            $level ++;
            foreach($categories[$parentId] as $child) {
                $child['level'] = $level;
                $this->sortCategories[] = $child;
                $this->sort($categories, $child['id'], $level);
            }
        }
    }


    /**
     * Lấy danh mục đã sắp xếp
     * @return [type] [description]
     */
    public function getCategories() {
        $this->sortCategories = [];
        $this->sort($this->categories);
        return $this->sortCategories;
    }
}