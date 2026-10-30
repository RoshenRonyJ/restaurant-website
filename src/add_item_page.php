<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Menu Item</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: orange;
            padding: 20px;
            text-align: center;
            color: white;
        }

        nav {
            background-color: black;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, textarea {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid lightgrey;
            width: 100%;
        }

        button {
            background-color: darkorange;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            opacity: 0.9;
        }

        .info-note {
            font-size: 14px;
            color: grey;
            margin-top: 10px;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: black;
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <h1>CroMaccy's</h1>
        <p>Add New Menu Item</p>
    </header>

    <nav>
        <a href="Home.html">Home</a>
        <a href="menu_display_page.php">Menu</a>
        <a href="add_item_page.php">Add Item</a>
        <a href="#contact">Contact</a>
    </nav>

    <div class="container">
        <h2>Add a New Menu Item</h2>
<?php
include("db_connect.php");

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $cat = $_POST['category_id'];

    $sql = "INSERT INTO menu_items (name, description, price, category_id)
            VALUES ('$name', '$desc', '$price', '$cat')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; font-weight: bold;'>Item added successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>


       <form action="" method="POST">

    <label>Item Name</label>
    <input type="text" name="name" placeholder="Enter name" required>

    <label>Description</label>
    <textarea name="description" placeholder="Enter description" required></textarea>

    <label>Price (€)</label>
    <input type="number" name="price" step="0.01" placeholder="Enter price" required>

    <label>Category</label>
    <select name="category_id" required>
        <option value="">-- Select Category --</option>
        <option value="1">Burgers</option>
		<option value="2">Spice Bags</option>
        <option value="3">Sides</option>
        <option value="4">Drinks</option>
		<option value="5">Desserts</option>
    </select>

    <button type="submit" name="submit">Add Item</button>
</form>


       
    </div>

    <footer>
        <p><strong>Contact Us</strong></p>
        <p>Email: CroMaccy's@gmail.com | Phone: +30 690 000 0000</p>
        <p>&copy; 2025 CroMaccy's Takeaway. All rights reserved.</p>
        <a id="contact"></a>
    </footer>
</body>
</html>
