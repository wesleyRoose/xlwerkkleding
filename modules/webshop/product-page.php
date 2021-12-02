<?php
include("../../config.php");
include("../../functions.php");

include("../../templates/header.php");?>

<main class="product-page">
    <section class="product-page">
        <div class="page-wrapper">
            <div class="flex">
                <div class="product-image">

                </div>
                <div class="product-info">
                    <ul class="info-list">
                        <li class="product-list-item"><h3>Leren Jas Bouw</h3></li>
                        <li class="product-list-item smaller">Jassen</li>
                        <li class="product-list-item smaller">Bouw</li>
                        <li class="product-list-item smaller">Merk</li>
                        <li class="product-list-item smaller">$25</li>
                        <div class="selects">
                            <select name="sizes">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select name="Kleuren">
                                <option value="Blauw">Blauw</option>
                                <option value="Rood">Rood</option>
                                <option value="Geel">Geel</option>
                                <option value="Groen">Groen</option>
                            </select>
                        </div>
                        <button><a href="#" class="product-order-link">Bestel</a></button>
                        <div class="description">
                            <h3 class="desc-title">Beschrijving</h3>
                            <li class="product-list-item smaller">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                Quae possimus magni provident 
                                commodi saepe harum fuga facere 
                                atque aspernatur dolore, 
                                nostrum totam adipisci expedita, 
                                veniam molestias. 
                                Eius, totam fugiat! Delectus?
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                Quae possimus magni provident 
                                commodi saepe harum fuga facere 
                                atque aspernatur dolore, 
                                nostrum totam adipisci expedita, 
                                veniam molestias. 
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include("../../templates/footer.php");?>