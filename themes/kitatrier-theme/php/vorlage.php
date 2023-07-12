<?php
/*
Template Name: Vorlage
*/
get_header();
?>

<div class="contentmain">
    <div class="content-wrap">

        <?php the_content(); ?>
        
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