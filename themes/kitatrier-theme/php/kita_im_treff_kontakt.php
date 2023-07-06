<?php
/*
Template Name: KITA im Treff/Kontakt
*/

get_header();

?>

<div class="kita-im-treff-kontakt">
  <div>
    <div>
      <h2>Kita im Treff</h2>
      <p>
        <strong>Kindertagesstätte Im Treff</strong><br />
        Leitung Katja Andree<br />
        <br />
        Im Treff 7<br />
        54296 Trier<br />
        Tel.: 0651/17599<br />
        Fax.: 0651/9956080<br />
        kitas.hochschulen.trier@web.de<br />
      </p>
    </div>
    <div>
      <p>
        Bitte füllen Sie untenstehendes Formular aus. Wir melden uns umgehend
        bei Ihnen.
      </p>
    </div>
    <div>
      <form>
        <label for="name">Ihr Name:*</label>
        <input type="text" id="name" name="name" required /><br /><br />

        <label for="adresse">Ihre Adresse:</label>
        <input type="text" id="adresse" name="adresse" /><br /><br />

        <label for="email">Ihre E-Mail Adresse:*</label>
        <input type="email" id="email" name="email" required /><br /><br />

        <label for="telefon">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" /><br /><br />

        <label for="nachricht">Ihre Nachricht:*</label>
        <textarea id="nachricht" name="nachricht" required></textarea
        ><br /><br />

        <input type="checkbox" id="anruf" name="anruf" />
        <label for="anruf">Bitte rufen Sie mich an</label><br /><br />

        <input type="checkbox" id="zustimmung" name="zustimmung" required />
        <label for="zustimmung"
          >Ich stimme zu, dass meine Angaben aus dem Kontaktformular zur
          Beantwortung meiner Anfrage erhoben und verarbeitet werden.*</label
        ><br /><br />

        <input type="submit" value="Absenden" />
      </form>
    </div>
    <div>
      <h2>Datenschutz</h2>
      <p>
        Die Daten werden nach abgeschlossener Bearbeitung Ihrer Anfrage
        gelöscht.? Hinweis: Sie können Ihre Einwilligung jederzeit für die
        Zukunft per E-Mail an kitas.hochschulen.trier(at)web.de widerrufen.
        Detaillierte Informationen zum Umgang mit Nutzerdaten finden Sie in
        unserer Datenschutzerklärung.
      </p>
    </div>
  </div>
</div>


<?php

get_footer();