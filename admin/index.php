<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Old+Standard+TT&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"/>

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <?php 
    include("header.php");
    ?>

    <div class="container">
      <section>
        <form
          action=""
          method="post"
          class="add-product-form"
          style="color: rgb(81, 81, 81)"
        >
          <h3>add a new product</h3>
          <input
            type="text"
            name="p_name"
            placeholder="enter the product name"
            class="box"
            required
          />
          <input
            type="number"
            name="p_price"
            min="0"
            placeholder="enter the product price"
            class="box"
            required
          />
          <input
            type="number"
            name="p_price"
            placeholder="enter the product quantity"
            class="box"
            required
          />
          <input
            type="file"
            name="p_image"
            accept="image/png, image/jpg, image/jpeg"
            class="box"
            required
          />
          <input
            type="submit"
            value="add the product"
            name="add_product"
            class="btn"
          />
        </form>
      </section>
    </div>

    <script src="script.js"></script>
  </body>
</html>
