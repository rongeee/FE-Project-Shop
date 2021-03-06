<body>
    <?php
    require "./includes/db.php";
    ?>

    <section class="section-add">
        <div class="section-add-imgwrap"><img src="media/add_2x.png" alt=""></div>
    </section>

    <section class="categories">
    <?php
    require './category/categoriesForm.php';
    ?>
        <?php
        $sql = "SELECT * FROM category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = "";
        echo $categories;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $name = htmlspecialchars($row["name"]);
            $image = htmlspecialchars($row["image"]);
            $ID = htmlspecialchars($row['ID']);

            $name = strtoupper($name);

            $categories .= "
                    <div class='cat-container' id='cat-{$ID}'>
                        <div class='cat-container__img-container' onclick='editCategory($ID)'>
                            <img src='./images/{$image}' class='cat-container__img'>
                            <p class='cat-container__edit-text'>EDIT</p>
                            <h2 class='cat-container__text'>{$name}</h2>
                        </div>
                        <div class='cat-container__buttons' method='POST'>
                            <button onclick='deleteCategory($ID)' class='btn btn--del'></button>
                        </div>
                        
                    </div>
                    ";
        }
        echo $categories;
        ?>
        </section>