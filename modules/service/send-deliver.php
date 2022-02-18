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
      <h1>Verzenden & Leveren</h1>
      <div class="small-bar"></div>
      <p class="text no-padding">
        Op deze pagina vindt u alle informatie over verzenden en leveren.
      </p>
      <br>
      <p class="text no-padding">
        <b>Verzenden & Leveren</b><br>
        Uw bestelling leveren wij op het adres van uw keuze. Standaard bestellingen worden binnen 1-3 werkdagen geleverd, 
        voor zover op voorraad bij Bouwkledij of leverancier. 
        Lukt het een keer niet? Dan informeren wij u natuurlijk op tijd.
        Heeft u voor uw bestelling behoefte aan maatwerk, 
        bijvoorbeeld naar verschillende afleveradressen?
        Laat het ons weten. Ook dat is onze service.
        Wij hanteren tijdelijk ook geen verzendkosten bij bestellingen vanaf  €100,-. 
        Bij bestellingen onder €100,- rekenen wij €8,95 verzendkosten voor levering in Nederland.
      </p>
      <br>
      <p class="text no-padding">
        <b>Retour Sturen</b><br>
        Het kan een keer gebeuren dat een artikel toch niet voldoet aan de verwachting. 
        U stuurt in dat geval een e-mail met uw retouraanvraag naar het onderstaande adres. 
        Na beoordeling ontvangt u de instructies voor retournering binnen 24 uur.
        Het recht op retourneren vervalt 14 dagen na ontvangst van het individuele artikel.
        Het artikel dient ongedragen te zijn en in de originele verpakking, inclusief de labels en stickers. 
        Indien het artikel zich niet meer in de originele staat bevindt, 
        behoudt Bouwkledij het recht u hiervoor aansprakelijk te stellen. Gemaakte kosten, 
        met een minimum van 35% van het aankoopbedrag, zullen in mindering worden gebracht op het retourbedrag.
        De kosten voor het retour sturen zijn voor uw eigen rekening.
        In onze algemene voorwaarden leest u hierover meer.
        Maatwerk-bestellingen: Artikelen die speciaal voor u, en in overleg met u besteld zijn kunnen niet geretourneerd worden. 
      </p>
      <br>
      <p class="text no-padding">
        <b>Heeft u vragen?</b><br>
        Mocht u nog vragen hebben dan kunt u contact met ons opnemen via info@bouwkledij.nl.
      </p>
      <br>
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