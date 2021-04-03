<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="/public/css/style.css">
    <link rel="stylesheet" href="../../public/css/style.css" />
</head>

<body>

    <div class="container">

        <div class="panel">
            <div>
                <?php echo 'User: ' . $_SESSION['user']->name ?>
            </div>
            <div>
                <a href="auth/logout">Logout</a>
            </div>
        </div>

        <form action="/products" method="GET" class="filter-form">
            <input type="text" name="category_filter" placeholder="Category" value="<?php echo $category_filter; ?>">
            <input type="text" name="warehouse_filter" placeholder="Warehouse address" value="<?php echo $warehouse_filter; ?>">
            <button type="submit">Search</button>
        </form>
        <div class="content-table">
            <table>
                <thead>
                    <tr>
                        <th>
                            <?php
                            if ($order_by == 'p.id' && stripos($order_type, 'asc') !== false) {
                                echo '<a href="?order_by=1&order_type=desc">⬇️</a>';
                            } else {
                                echo '<a href="?order_by=1&order_type=asc">⬆️</a>';
                            }
                            ?>
                            ID
                        </th>
                        <th>
                            <?php
                            if ($order_by == 'p.name' && stripos($order_type, 'asc') !== false) {
                                echo '<a href="?order_by=2&order_type=desc">⬇️</a>';
                            } else {
                                echo '<a href="?order_by=2&order_type=asc">⬆️</a>';
                            }
                            ?>
                            Name
                        </th>
                        <th>
                            <?php
                            if ($order_by == 'p.description' && stripos($order_type, 'asc') !== false) {
                                echo '<a href="?order_by=3&order_type=desc">⬇️</a>';
                            } else {
                                echo '<a href="?order_by=3&order_type=asc">⬆️</a>';
                            }
                            ?>
                            Description
                        </th>
                        <th>
                            <?php
                            if ($order_by == 'p.price' && stripos($order_type, 'asc') !== false) {
                                echo '<a href="?order_by=4&order_type=desc">⬇️</a>';
                            } else {
                                echo '<a href="?order_by=4&order_type=asc">⬆️</a>';
                            }
                            ?>
                            Price
                        </th>
                        <th>Category</th>
                        <th>Warehouse</th>
                        <th>In Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $item) {
                        // print_r($item);
                        echo "
                    <tr>
                        <td>$item->p_id</td>
                        <td>$item->p_name</td>
                        <td>$item->p_description</td>
                        <td>$item->p_price</td>
                        <td>$item->categories</td>
                        <td>$item->w_address</td>
                        <td>$item->i_amount_in_stock</td>
                    </tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>


</body>

</html>