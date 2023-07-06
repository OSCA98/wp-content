<?php
/*
Template Name: Home
*/
get_header();
?>

<div class="home">
  <!-- Wordpress Default Editor -->
  <div>
      <?php
        echo get_the_content();
      ?>
  </div>

  <div>
    <div>
      <p><b>KITA Schneidershof</b></p>
      <p>Hochschule Trier</p>
      <p>54293 Trier</p>
      <p>Tel. 0651 8103-235</p>
    </div>
    <div>
      <p><b>KITA im Treff</b></p>
      <p>Im Treff 7</p>
      <p>54296 Trier</p>
      <p>Tel. 0651 17599</p>
    </div>
  </div>

  <div>
    <h2>Zwei KITAS, ein Konzept</h2>
    <p>
      Für Kinder ist die Kindergartenzeit ein sehr wichtiger Lebensabschnitt.
      Wir wollen, dass dies eine schöne Zeit für sie ist. Unsere Einrichtungen
      (KITA Schneidershof und KITA im Treff) sind weltanschaulich und
      konfessionell neutral. Im Mittelpunkt unseres pädagogischen Konzepts steht
      das Kind: Wir bieten ihm - zusätzlich zu seiner Familie - den Raum, sich
      mit all seiner Lebendigkeit auszuleben.
    </p>
  </div>

  <div>
    <h2>Anmelden bei Kitaportal</h2>
    <p>
      Über das KITA PORTAL DER STADT TRIER können Eltern ihre Kinder online
      anmelden und damit ihr Interesse an einem Betreuungsplatz in unserer
      Einrichtung bekunden. Über diese Plattform kann auch per Mail ein
      Anmeldegespräch vereinbart werden.
    </p>
  </div>

  <div>
    <h2>Aktuelle Termine</h2>
    <b>Kita im Treff</b>
    <div><i>Keine aktuellen Termine</i></div>
    <b>Kita Schneidershof</b>
    <div><i>Keine aktuellen Termine</i></div>
  </div>
</div>

	

<?php

get_footer();