<?php

if (file_exists('../../controller.php')) {
  include('../../controller.php');
} else {
  $errorMessage = "";
  $errorMessage .= "PHP ERROR: controller.php does not exist.";
  echo $errorMessage;
  exit;
}
?>

<main class="service">
  <section class="service">
    <div class="service-wrapper">
      <h1>Klachten</h1>
      <p class="text no-padding">
        Het is natuurlijk vervelend als u een klacht heeft over de dienstverlening zoals u die ervaren heeft. 
        Toch vragen wij u vriendelijk om uw klacht via de e-mail aan de afdeling klantcontact door te geven. 
        Dit kan per e-mail, regulier post en/of telefonisch. 
        Onze medewerkers van de afdeling klantcontact zullen de klacht bekijken en 
        proberen naar ieders tevredenheid de klacht op te lossen.
      </p>
      <br>
      <p class="text no-padding">
        Na ontvangst van uw klacht ontvangt u van ons een bevestiging.
        Wij zullen uw klacht binnen 14 dagen na ontvangst beantwoorden, 
        mocht het meer tijd nodig hebben, dan zullen wij u hiervan op de hoogte stellen.
        Mocht u dit niet op prijs stellen, 
        dan kunt u ook altijd contact op nemen met de afdeling bemiddeling van Stichting Webshop Keurmerk waar 
        Bouwkledij bij is aangesloten. Mocht de bemiddelingspoging om enige reden niet tot een bevredigende oplossing leiden, 
        dan bestaat de mogelijkheid om uw geschil voor te leggen aan de Geschillencommissie (SGC).
      </p>
    </div>
  </section>
</main>

<?php

if ($_SESSION["sessionStatus"] == 1) {
  include "../../templates/footer-user.php";
} else if ($_SESSION["sessionStatus"] == 2) {
  include "../../templates/footer-admin.php";
} else {
  include "../../templates/footer.php";
}

?>