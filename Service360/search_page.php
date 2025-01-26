<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_wishlist'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM wishlist WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_wishlist_numbers) > 0){
        $message[] = 'already added to wishlist';
    }elseif(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($conn, "INSERT INTO wishlist(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
        $message[] = 'product added to wishlist';
    }

}

if(isset($_POST['add_to_cart'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{

        $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM wishlist WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_wishlist_numbers) > 0){
            mysqli_query($conn, "DELETE FROM wishlist WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        }

        mysqli_query($conn, "INSERT INTO cart(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>search page</h3>
    <p> <a href="home.php">home</a> / search </p>
</section>

<section class="search-form">
    <form action="" method="POST">
        <input type="text" class="box" placeholder="search products..." name="search_box">
        <input type="text" class="box" placeholder="enter location..." name="location"> <!-- Location input -->
        <input type="submit" class="btn" value="search" name="search_btn">
    </form>
</section>


<section class="products" style="padding-top: 0;">

   <div class="box-container">

   <?php
if(isset($_POST['search_btn'])){
    $search_box = mysqli_real_escape_string($conn, $_POST['search_box']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);  // Capture location input

    // Updated query to include cart, wishlist, and location filter
    $select_products = mysqli_query($conn, "
    SELECT products.*, 
           cart.quantity AS cart_quantity, 
           wishlist.id AS wishlist_id
    FROM products
    LEFT JOIN cart ON products.id = cart.pid AND cart.user_id = '$user_id'
    LEFT JOIN wishlist ON products.id = wishlist.pid AND wishlist.user_id = '$user_id'
    WHERE products.name LIKE '%{$search_box}%' 
    AND products.location LIKE '%{$location}%'
") or die('query failed');
    
    if(mysqli_num_rows($select_products) > 0){
        while($fetch_products = mysqli_fetch_assoc($select_products)){
?>
        <form action="" method="POST" class="box">
            <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
            <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <input type="number" name="product_quantity" value="1" min="0" class="qty">
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

            <?php if ($fetch_products['wishlist_id']) { ?>
                <button class="option-btn" disabled>In Wishlist</button>
            <?php } else { ?>
                <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
            <?php } ?>

            <?php if ($fetch_products['cart_quantity']) { ?>
                <button class="btn" disabled>In Cart (<?php echo $fetch_products['cart_quantity']; ?>)</button>
            <?php } else { ?>
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            <?php } ?>
        </form>
<?php
        }
    } else {
        echo '<p class="empty">No result found!</p>';
    }
} else {
    echo '<p class="empty">Search something!</p>';
}
?>


   </div>

</section>

<?php @include 'footer.php'; ?>



</body>
</html>