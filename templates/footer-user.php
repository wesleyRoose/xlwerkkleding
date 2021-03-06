    <footer>
        <div class="floating-btn">
            <button class="shopping-cart-btn">
                <a href="<?php echo ROOT_URL ?>modules/shopping-cart/index.php" class="btn-link">
                    <i class="fas fa-shopping-cart cart-btn"></i>
                </a>
            </button>
            <div class="notification">
                <?php if (isset($_SESSION["shoppingCart"])) {
                    echo count($_SESSION["shoppingCart"]);
                } else {
                    echo "0";
                } ?> </div>
        </div>
        <div class="upper">
            <div class="block">
                <h3>Menu</h3>
                <a class="footer-link lower" href="<?php echo ROOT_URL ?>">Home</a>
                <a class="footer-link lower" href="<?php echo ROOT_URL ?>modules/webshop/index.php">Webshop</a>
                <a class="footer-link lower" href="<?php echo ROOT_URL ?>modules/account/index.php">Account</a>
            </div>
            <div class="block">
                <h3>Contact</h3>
                <div class="adress">Synagogestraat 7</div>
                <div class="adress">7941 LZ Meppel</div>
                <div class="adress">
                    <a class="footer-link lower" href="tel:+31 (0)6 120 55775">+31 (0)6 120 55775</a>
                </div>
                <div class="adress">
                    <a class="footer-link lower" href="mailto:info@bouwkledij.nl">info@bouwkledij.nl</a>
                </div>
            </div>
            <div class="block">
                <h3>Klantenservice</h3>
                <a class="footer-link lower" href="<?php echo ROOT_URL ?>modules/service/tos.php">Algemene Voorwaaden</a>
                <a class="footer-link lower" href="<?php echo ROOT_URL ?>modules/service/send-deliver.php">Verzenden & Leveren</a>
                <a class="footer-link lower" href="<?php echo ROOT_URL ?>modules/service/complaints.php">Klachten</a>
                <a class="footer-link lower" href="<?php echo ROOT_URL ?>modules/service/disclaimer.php">Disclaimer</a>
            </div>
            <div class="block">
                <h3>Betaalmethoden</h3>
                <div class="payment-options">
                    <img src="<?php echo ROOT_URL ?>img/betaal.png" alt="Payment Options Photo">
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="full-width">
                <p class="footer_text">&copy; XLwerkkleding -
                    <script>
                        var date = new Date();
                        var year = date.getFullYear();
                        document.write(year);
                    </script> - Alle rechten voorbehouden
                </p>
                <div class="footer-icons">
                    <a href="https://www.facebook.com/bouwkledij" target="_blank" class="footer-link"><i class="fab fa-facebook m-left"></i></a>
                    <a href="https://www.linkedin.com/company/bouwkledij/" target="_blank" class="footer-link"><i class="fab fa-linkedin m-left"></i></a>
                    <a href="https://www.instagram.com/webshopbouwkledij/" target="_blank" class="footer-link"><i class="fab fa-instagram m-left"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!--Load main JS file-->
    <script src="<?php echo ROOT_URL ?>js/script.js"></script>
    </div>
    </body>

    </html>