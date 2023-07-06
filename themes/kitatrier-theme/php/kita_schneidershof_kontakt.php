<?php
/*
Template Name: KITA Schneidershof/Kontakt
*/

get_header();

?>

<div class="kita-schneidershof-kontakt">
    
    <div>
        <p>
            <strong>Kindertagesstätte Schneidershof</strong><br>
            Leitung Anita Gawenda<br>
            <br>
            Schneidershof<br>
            54293 Trier<br>
            Tel.: 0651/8103-235<br>
            Fax.: 0651/8103-591<br>
            gawenda@hochschule-trier.de<br>
        </p>
    </div>
    <div>
        <p>Bitte füllen Sie untenstehendes Formular aus. Wir melden uns umgehend bei Ihnen.</p>
    </div>
    <div>
        <form>
            <label for="name">Ihr Name:*</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="adresse">Ihre Adresse:</label>
            <input type="text" id="adresse" name="adresse"><br><br>

            <label for="email">Ihre E-Mail Adresse:*</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="telefon">Telefon:</label>
            <input type="tel" id="telefon" name="telefon"><br><br>

            <label for="nachricht">Ihre Nachricht:*</label>
            <textarea id="nachricht" name="nachricht" required></textarea><br><br>

            <input type="checkbox" id="anruf" name="anruf">
            <label for="anruf">Bitte rufen Sie mich an</label><br><br>

            <input type="checkbox" id="zustimmung" name="zustimmung" required>
            <label for="zustimmung">Ich stimme zu, dass meine Angaben aus dem Kontaktformular zur Beantwortung
                meiner Anfrage erhoben und verarbeitet werden.*</label><br><br>

            <input type="submit" value="Absenden">
        </form>
    </div>
    <div>
        <h2>Datenschutz</h2>
        <p>
            Die Daten werden nach abgeschlossener Bearbeitung Ihrer Anfrage gelöscht.?
            Hinweis: Sie können Ihre Einwilligung jederzeit für die Zukunft per E-Mail an
            kitas.hochschulen.trier(at)web.de widerrufen. Detaillierte Informationen zum Umgang mit Nutzerdaten
            finden Sie in unserer Datenschutzerklärung.
        </p>
    </div>

</div>

<?php

get_footer();