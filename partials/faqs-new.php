
<?php
$pageName = $_SERVER['PHP_SELF'];

$remove = "/\/fastlinky\//i";
// $remove = "/\//i";
$pageName = preg_replace($remove, "", $pageName);
// echo $pageName;
$allQuestions = $faqs->getfaqqu($pageName);

?>

<section class=" index-faq-section">
        <p class="faq-small-text">FAQs</p>
        <h1>Frequently asked link building questions</h1>
        <div class="row">
            <div class="col-md-7">
                <div class="accordion accordion-flush faq-acc-flush" id="accordionFlushExample">
                    

                <?php
                foreach($allQuestions as $eachQuestion){

                    $id = $eachQuestion['id'];
                    $ques = $eachQuestion['question'];
                    $ans = $eachQuestion['ans'];
                
                
                    echo '<div class="accordion-item faq-acc-item">
                            <h2 class="accordion-header" id="flush-heading'.$id.'">
                                <button class="accordion-button faq-acc-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-'.$id.'" aria-expanded="false"
                                    aria-controls="flush-'.$id.'">
                                    '.$ques.'
                                </button>
                            </h2>
                            <div id="flush-'.$id.'" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading'.$id.'" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body faq-acc-body">'.$ans.'</div>
                            </div>
                        </div>';
                }
                ?>

                </div>
            </div>
            <div class="col-md-5 text-center m-auto">
                <div class="">
                    <div>
                        <img src="./images/FAQs.png.png" class="" alt="FAQs">
                    </div>
                </div>
            </div>
        </div>
    </section>