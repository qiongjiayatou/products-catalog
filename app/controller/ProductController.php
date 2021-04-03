<?php

class ProductController
{
    private $db;


    public function __construct()
    {
        Auth::check();
        $this->db = DatabaseFactory::getFactory()->getConnection();
    }

    public static function index()
    {
        if (isset($_GET['order_by'])) {
            $order_by = (new self)->getOrderBy($_GET['order_by']);
        } else {
            $order_by = (new self)->getOrderBy();
        }


        if (isset($_GET['order_type'])) {
            $order_type = (new self)->getOrderType($_GET['order_type']);
        } else {
            $order_type = (new self)->getOrderType();
        }

        $category_filter = null;
        $warehouse_filter = null;

        if (isset($_GET['category_filter']) && !empty($_GET['category_filter'])) {
            $category_filter = $_GET['category_filter'];
            $_SESSION['category_filter'] = $_GET['category_filter'];
        }

        if (isset($_GET['warehouse_filter']) && !empty($_GET['warehouse_filter'])) {
            $warehouse_filter = $_GET['warehouse_filter'];
            $_SESSION['warehouse_filter'] = $_GET['warehouse_filter'];
        }

        $sql = "
            SELECT 
                p.id as p_id, p.name as p_name, p.description as p_description, p.price as p_price, p.created_at as p_created_at, 
                c.id as c_id, c.name as c_name , c.parent_id as c_parent_id,
                i.amount_in_stock as i_amount_in_stock,
                w.id as w_id, w.address as w_address, w.phone as w_phone
            FROM products p 
            LEFT JOIN categories c ON 
                c.id = p.category_id
            LEFT JOIN inventories i ON
                i.product_id = p.id 
            LEFT JOIN warehouses w ON
                w.id = i.warehouse_id
            ORDER BY $order_by $order_type
        ";

        $query = (new self)->db->prepare($sql);


        $query->execute();


        $products = [];

        while ($row = $query->fetch()) {
            $row->categories = (new self)->getCategories($row->c_name, $row->c_parent_id);
            $products[] = $row;
        }


        if ($category_filter) {
            $products = (new self)->filterBy('categories', $products, $category_filter);
        }
        if ($warehouse_filter) {
            $products = (new self)->filterBy('w_address', $products, $warehouse_filter);
        }

        $category_value = isset($_SESSION['category_filter']) ? $_SESSION['category_filter'] : '';
        $warehouse_value = isset($_SESSION['warehouse_filter']) ? $_SESSION['warehouse_filter'] : '';

        unset($_SESSION['category_value'], $_SESSION['warehouse_value']);

        require '../app/views/products.php';
    }

    private function getOrderBy($field = null)
    {
        $order_by = 'p.id';

        switch ($field) {
            case 1:
                $order_by = 'p.id';
                break;
            case 2:
                $order_by = 'p.name';
                break;
            case 3:
                $order_by = 'p.description';
                break;
            case 4:
                $order_by = 'p.price';
                break;
        }

        return $order_by;
    }

    private function getOrderType($type = null)
    {
        $order_type = 'ASC';

        switch ($type) {
            case 'asc':
                $order_type = 'ASC';
                break;
            case 'desc':
                $order_type = 'DESC';
                break;
        }

        return $order_type;
    }

    private function filterBy($field, $data, $find)
    {
        return array_filter($data, function ($value) use ($field, $find) {
            return stripos($value->{$field}, $find) !== false;
        }, ARRAY_FILTER_USE_BOTH);
    }

    private function getCategories($category_name, $parent_id)
    {
        $categories = [$category_name];

        while (!is_null($parent_id)) {
            $query = (new self)->db->prepare("SELECT * FROM categories where id = :parent_id");
            $query->execute([':parent_id' => $parent_id]);
            if ($query->rowCount() === 1) {
                $res = $query->fetch();
                $categories[] = $res->name;
            } else {
                $res = null;
            }

            $parent_id = $res->parent_id;
        }

        return implode(', ', $categories);
    }
}
