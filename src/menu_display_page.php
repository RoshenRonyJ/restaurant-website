<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu Items</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('spicebag2.jpg');
			background-repeat: no-repeat;
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

        .data-placeholder {
            padding: 160px;
            border: 2px dashed lightgrey;
            border-radius: 8px;
            text-align: center;
            color: grey;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: black;
            color: white;
            margin-top: 40px;
        }
		/* Make table bigger & full width */
.table-wrapper {
    max-width: 1000px;      /* Increase total width */
    margin: 0 auto;         /* Keep it centered */
}

table {
    width: 100%;            /* Full width inside wrapper */
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;        /* Larger text */
    background: white;
    border-radius: 10px;
    overflow: hidden;
}

/* Header styling */
table th {
    background-color: #f26c3b; 
    color: white;
    padding: 14px;
    font-size: 18px;
    text-align: center;
}

/* Table cells */
table td {
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

/* Hover effect */
table tr:hover {
    background-color: #fff5ef;
}

/* Last row no border */
table tr:last-child td {
    border-bottom: none;
}

    </style>
</head>
<body>
    <header>
        <h1>CroMaccy's</h1>
        <p>Menu Display Page</p>
    </header>

    <nav>
        <a href="Home.html">Home</a>
        <a href="menu_display_page.php">Menu</a>
        <a href="add_item_page.php">Add Item</a>
        <a href="#contact">Contact</a>
    </nav>

   <div class="container">
    <h2>Our Menu</h2>

    <div class="data-placeholder">
        <?php
        include("db_connect.php");

        $sql = "
            SELECT menu_items.item_id, menu_items.name, menu_items.description,
                   menu_items.price, categories.name AS category_name
            FROM menu_items
            INNER JOIN categories ON menu_items.category_id = categories.category_id
            ORDER BY categories.category_id;
        ";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {

            echo "<div class='table-wrapper'><table>";
            echo "<tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price (€)</th>
                    <th>Category</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td>€{$row['price']}</td>
                        <td>{$row['category_name']}</td>
                      </tr>";
            }

            echo "</table></div>";

        } else {
            echo "<p>No menu items found.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

    </footer>
</body>
</html>
