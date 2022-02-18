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
      <h1>Disclaimer</h1>
      <div class="small-bar"></div>
      <p class="text no-padding">
      Op deze pagina vindt u de disclaimer van www.bouwkledij.nl, zoals deze beschikbaar is gesteld door Bouwkledij. In deze disclaimer geven wij aan onder welk voorbehoud wij de informatie op onze website aan u aanbieden.<br>
      </p>
      <br>
      <p class="text no-padding">
      <b>Intellectueel eigendom</b><br>
        Het gebruik van de informatie op deze website is gratis zolang u deze informatie niet kopieert, 
        verspreidt of op een andere manier gebruikt of misbruikt. 
        U mag de informatie op deze website alleen hergebruiken volgens de regelingen van het dwingend recht.
        Zonder uitdrukkelijke schriftelijke toestemming van 
        Bouwkledij is het niet toegestaan tekst of andere materialen op deze website her te gebruiken. 
        Het intellectueel eigendom berust bij Bouwkledij.
        <br>
      </p>
      <br>
      <p class="text no-padding">
        <b>Cookies</b><br>
        Het gebruik van cookies op deze website is uitsluitend bedoeld om u een zo goed mogelijk werkende website aan te bieden. 
        Bouwkledij garandeert dat uw gegevens nooit aan derden worden doorverkocht of aangeboden. 
        Uw privacy staat op de eerste plaats.
        <br>
        </p>
      <br>
      <p class="text no-padding">
        <b>Geen garantie op juistheid</b><br>
        Voor de prijzen die op onze website staan, geldt dat wij streven naar een zo zorgvuldig mogelijke weergave van de realiteit en de bedoelde prijzen. Fouten die daarbij ontstaan en herkenbaar zijn als programmeer dan wel typefouten, vormen nooit een aanleiding om een contract dan wel overeenkomst met Bouwkledij te mogen claimen of te veronderstellen.
       Bouwkledij streeft naar een zo actueel mogelijke website. Mocht ondanks deze inspanningen de informatie van of de inhoud op deze website onvolledig en of onjuist zijn, dan kunnen wij daarvoor geen aansprakelijkheid aanvaarden.
        De informatie en producten op deze website worden aangeboden zonder enige vorm van garantie en of aanspraak op juistheid. Wij behouden ons het recht voor om deze materialen te wijzigen, te verwijderen of opnieuw te plaatsen zonder enige voorafgaande mededeling. Bouwkledij aanvaardt geen aansprakelijkheid voor enige informatie die op websites staat waarnaar wij via hyperlinks verwijzen.
        <br>
      </p>
      <br>
      <p class="text no-padding">
        <b>Wijzigingen</b><br>
        Mocht deze disclaimer wijzigen, dan vindt u de meest recente versie van de disclaimer van <a href="xlwerkkleding.nl" style="color: var(--main-color);">XLwerkkleding.nl</a> op deze pagina.
        <br>
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