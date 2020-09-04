<?php

    include 'application/config.php';

    $sql = "SELECT *  FROM `quest`";
    $result = mysqli_query($db_link, $sql);

    $quests = array();
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        $quests[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quest Board</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>

        <div class="questboard">
        <?php
            foreach($quests as $quest)
            {
                echo '
                <details class="quest" data-open="false">
                    <summary class="quest__summary">
                        <img class="quest__image" src="'. QUEST_IMG .'/'. $quest['image'] .'" alt="'. $quest['image'] .'"></img>
                        <div>
                            <h2>'. $quest['title'] .'</h2>
                        </div>
                    </summary>
                    
                    <p class="quest__description"><strong>Description: </strong>'. $quest['description'] .'
                    <button class="quest__accept" data-questid="'. $quest['id'] .'">Accept Quest</button>
                    </p>
                    
                </details>
                ';
            }
        ?>
        </div>


        <script src="assets/js/app.js"></script>

    </body>
</html>