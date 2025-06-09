<?php 
    include('./partials-frontend/header.php')
?>
    <section class="header-menu">
        <div class="top-filler">
        <img src="./images/filler/ramevespa1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover; ">
        </div>
    </section>

    <div class="faq">
        <div class="container">
            <h1 class="text-center padding-title">FAQ</h1>
            <div class="row">
                <div class="col-6">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h5>What types of bikes are available for rent?</h5>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We offer a variety of bikes including scooters, motorbikes, and bicycles to suit your needs and preferences.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h5>Do I need a license to rent a bike?</h5>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Yes, you need a valid international driving permit (IDP) for motorbikes or a local Indonesian license. For bicycles, no license is required.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h5>What is included in the rental fee?</h5>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>The rental fee includes the bike, helmet, and a full tank of fuel. We also provide a phone holder in the bike to ensure easy access to your google maps your trip.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <h5>What should I do in case of an accident or breakdown?</h5>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>In case of an accident or breakdown, contact our 24/7 support hotline immediately. We will assist you with repairs or provide a replacement bike if necessary.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <h5>Is insurance included with the rental?</h5>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Basic insurance is included with all rentals. Additional coverage options are available for purchase.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <h5>What payment methods are accepted?</h5>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We accept cash, credit cards, and online payments. A security deposit may be required and will be refunded upon safe return of the bike.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php 
    include('./partials-frontend/footer.php')
?>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var accordionItems = document.querySelectorAll('.accordion-button');
            
                accordionItems.forEach(function (button) {
                    button.addEventListener('click', function () {
                        // Get all collapse elements except the one clicked
                        var otherItems = document.querySelectorAll('.accordion-collapse.collapse');
                        
                        otherItems.forEach(function (item) {
                            if (item !== button.nextElementSibling) {
                                var bsCollapse = new bootstrap.Collapse(item, {
                                    toggle: false
                                });
                                bsCollapse.hide();
                            }
                        });
                    });
                });
            });
            </script>