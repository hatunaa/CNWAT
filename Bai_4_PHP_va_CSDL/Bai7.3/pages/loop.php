<body>
    <div class="loop-container">
        <div class="loop-container-child">
            <div class="loop-for">
                <p>For:</p>
                <div>
                    <?php
                        for($i = 0; $i < 10; $i ++) {
                            for($j = (10 - $i); $j < 10; $j ++) {
                                echo "* ";
                            }
                            echo "<br>";
                        }
                    ?>
                </div>
            </div>
            <div class="loop-while">
                <p>while:</p>
                <div>
                    <?php
                        $i = 0;
                        while ( $i < 10 ) {
                            $j = (10 - $i);
                            while ( $j < 10 ) {
                                echo "* ";
                                $j ++;
                            }
                            $i ++;
                            echo "<br>";
                        }
                    ?>
                </div>
            </div>
            <div class="loop-do-whilr">
                <p>Do-While:</p>
                <div>
                    <?php
                        $i = 0;
                        do {
                            $j = (10 - $i);
                            while ( $j < 10 ) {
                                echo "* ";
                                $j ++;
                            }
                            $i ++;
                            echo "<br>";
                        }
                        while($i < 10 )
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>