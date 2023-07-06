<?php
/*
Template Name: Vorlage
*/
get_header();
?>

<div class="contentmain">
    <div class="content-wrap">

        <div id="col-normal">
            <div>
                <?php
                //$zitate = file_get_contents('http://kitatemp.local/wp-content/uploads/2023/06/telefonnummer.txt');
                //echo $zitate;
                /*echo ord($zitate[1]);
                echo '---------------';
                echo ord($zitate[7]);
                echo '---------------';
                if($zitate[1]==$zitate[7]){
                    echo 'true';
                }else{
                    echo 'false';
                }*/
                /*$head = true;
                echo '<b>';
                for ($i = 0; $i < strlen($zitate); $i++) {

                    if (ord($zitate[$i]) == 13) {
                        echo '<br>';
                        if ($head) {
                            echo '</b>';
                            $head = false;
                        }
                    } else {
                        echo $zitate[$i];
                    }
                }*/


                ?>

                <?php
                //erzeuge_html_inhalt_variante_1();
                erzeuge_html_inhalt_variante_2();

                ?>
            </div>
        </div>

        <div id="col-right">

            <div>
                <div id="cr-1" class="frame-beigebox">
                    <?php
                    global $schneidershof;
                    erzeuge_Kitainfo($schneidershof);
                    ?>
                </div>
            </div>

            <div>
                <div id="cr-2" class="frame-beigebox">
                    <?php
                    global $imTreff;
                    erzeuge_Kitainfo($imTreff);
                    ?>
                </div>
            </div>

            <div>
                <div id="download"><!--Download-->
                    <?php
                    erzeuge_html_pdf_inhalt();
                    ?>
                </div>
            </div>

        </div>
        <div style="clear:both;"></div>
    </div>

</div>

<?php
get_footer();