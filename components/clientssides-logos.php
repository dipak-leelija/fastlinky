<!-- <section class="clientsides-item" id="clientslogo">
    <div class="containering">
        <div>
            <h2 class="px-3 px-md-0">Our clients earned brand mentions from <strong>publications like...</strong></h2>
        </div>

        <div class="row clientside-logo-row">
            <div class="clientsides-logo-wrap col-sm-6 col-md-3">
                <img src="images/clients-logos/cc1.png" class="img-responsive w-100" alt="">
            </div>
            <div class="clientsides-logo-wrap  col-sm-6 col-md-3">
                <img src="images/clients-logos/icademy1.png" class="img-responsive" alt="">
            </div>

            <div class="clientsides-logo-wrap  col-sm-6 col-md-3">
                <img src="images/clients-logos/specscart3.png " class="img-responsive" alt="">
            </div>

            <div class="clientsides-logo-wrap  col-sm-6 col-md-3">
                <img src="images/clients-logos/ISB3.png" class="img-responsive" alt="">
            </div>

            <div class="clientsides-logo-wrap col-sm-6 col-md-3">
                <img src="images/clients-logos/cs1.png" class="img-responsive" alt="">
            </div>

            <div class="clientsides-logo-wrap  col-sm-6 col-md-3">
                <img src="images/clients-logos/khatabook3.png" class="img-responsive" alt="">
            </div>

            <div class="clientsides-logo-wrap col-sm-6 col-md-3 ">
                <img src="images/clients-logos/namecheap1.png" class="img-responsive " alt="">
            </div>

            <div class="clientsides-logo-wrap  col-sm-6 col-md-3 ">
                <img src="images/clients-logos/recovery3.png" class="img-responsive" alt="">
            </div>

        </div>
    </div>
</section> -->



<section class="clientsides-item" id="clientslogo">
    <div class="containering">
        <div>
            <h2 class="px-3 px-md-0">Our clients earned brand mentions from <strong>publications like...</strong></h2>
        </div>
        <div id="carouselExampleAutoplaying" class="carousel slide carouselLogo" data-bs-ride="carousel">
            <div class=" carousel-inner">
                <div class="d-flex">
                    <div class=" carousel-item active col-sm-6 col-md-3">
                        <img src="images/clients-logos/cc1.png" class="img-responsive" alt="">
                    </div>
                    <div class=" carousel-item  col-sm-6 col-md-3">
                        <img src="images/clients-logos/icademy1.png" class="img-responsive " alt="">
                    </div>

                    <div class=" carousel-item  col-sm-6 col-md-3">
                        <img src="images/clients-logos/specscart3.png " class="img-responsive " alt="">
                    </div>
                    <div class=" carousel-item  col-sm-6 col-md-3">
                        <img src="images/clients-logos/ISB3.png" class="img-responsive " alt="">
                    </div>

                    <div class=" carousel-item col-sm-6 col-md-3">
                        <img src="images/clients-logos/cs1.png" class="img-responsive " alt="">
                    </div>

                    <div class=" carousel-item  col-sm-6 col-md-3">
                        <img src="images/clients-logos/khatabook3.png" class="img-responsive " alt="">
                    </div>

                    <div class=" carousel-item col-sm-6 col-md-3 ">
                        <img src="images/clients-logos/namecheap1.png" class="img-responsive " alt="">
                    </div>

                    <div class=" carousel-item  col-sm-6 col-md-3 ">
                        <img src="images/clients-logos/recovery3.png" class="img-responsive " alt="">
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">
                    <i class="fa-solid fa-arrow-left-long iconbutton"></i>
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true">
                <i class="fa-solid fa-arrow-right-long iconbutton"></i>
                </span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</section>

<script>
    var items = document.querySelectorAll('.carousel .carousel-inner .carousel-item');
    items.forEach((e)=>{
        const slide = 4;
        let next = e.nextElementSibling;
        for(var i=0;i<slide;i++){
            if(!next){
                next = items[0]
            }
            let clonechild = next.cloneNode(true);
            e.appendChild(clonechild.children[0])
            next = next.nextElementSibling
        }
    })
</script>
