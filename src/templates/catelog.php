<?php
    function get_catelog() {
        $sql="SELECT * FROM danhmuc ORDER BY name_dm";
        return get_all($sql);// trả về ds chứa các Danh mục
    }
    function showDm($catelog, $activeCategory){// Hiển thị sản phẩm theo danh mục được chọn (Active)
        $category="";
        foreach ($catelog as $item) {  
            // Kiểm tra xem đã chọn danh mục nào
            $isActive = ($item['sort_name'] === $activeCategory) ? ' caterory-item--active' : '';
    
            $category .= '<li class="caterory-item' . $isActive . '">
                            <form action="" method="post">
                            <button type="submit" name="catelog" class="btn-dm caterory-item__link" value="'.$item['sort_name'].'">'.$item['name_dm'].'</button>
                            </form>
                        </li>';
        } 
        return $category;
    } 
    
?>
