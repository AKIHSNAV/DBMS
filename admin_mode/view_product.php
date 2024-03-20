<h2 class="text-center text-success">All Products</h2>
<table class="table table-bordered mt-5">
    <thead class="table-info text-center text-white">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Stock</th>
            <th>Brand Name</th>
            <th>Quantity Bought</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-secondary text-white"> 
        <?php
        $fetch_products = "SELECT * FROM product";
        $result_fetch = mysqli_query($con, $fetch_products);
        while($fetch_row = mysqli_fetch_assoc($result_fetch)) {
            $product_id = $fetch_row["productID"];
            $product_name = $fetch_row["name"];
            $product_image = $fetch_row["prod_image"];
            $product_price = $fetch_row["price"];
            $product_stock = $fetch_row["stock"];
            $product_brand = $fetch_row["brand"];
            $product_bought = $fetch_row["qty_bought"];
            $product_cat = $fetch_row["categoryID"];
            echo "<tr class='text-center'>
            <!-- static data for the moment -->
            <td>$product_id</td>
            <td>$product_name</td>
            <td><img src='./images/$product_image' alt='$product_name image'/> </td>
            <td>₹$product_price</td>
            <td>$product_stock</td>
            <td>$product_brand</td>
            <td>$product_bought</td>
            <td>$product_cat</td>
            <td><a href='' class='text-success'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>            
        </tr>";
            
        }

        ?>
        
        </tbody>
</table>