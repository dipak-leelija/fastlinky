<?php
$pageName = $_SERVER['PHP_SELF'];

if (is_localhost())
    $remove = "/\/fastlinky\//i";
else
    $remove = "/\//i";


$pageName = preg_replace($remove, "", $pageName);
// echo $pageName;
$allQuestions = $faqs->getfaqqu($pageName);

?>

<section class=" index-faq-section">
    <div class="faq-small-text">FAQs</div>
    <h2 class="text-center mb-5">Frequently asked link building questions</h2>
    <div class="row">
        <div class="col-md-7">
            <div class="accordion accordion-flush faq-acc-flush pe-1" id="accordionFlushExample">


                <?php
                foreach($allQuestions as $eachQuestion){

                    $id = $eachQuestion['id'];
                    $ques = $eachQuestion['question'];
                    $ans = $eachQuestion['ans'];
                
                
                    echo '<div class="accordion-item faq-acc-item">
                            <a href="#'.$ques.'" class="faq-question accordion-header" id="'.$ques.'">
                                <button class="accordion-button faq-acc-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-'.$id.'" aria-expanded="false"
                                    aria-controls="flush-'.$id.'">
                                    '.$ques.'
                                </button>
                            </a>
                            <div id="flush-'.$id.'" class="accordion-collapse collapse"
                                aria-labelledby="'.$ques.'" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body faq-acc-body">'.$ans.'</div>
                            </div>
                        </div>';
                }
                ?>

            </div>
        </div>
        <div class="col-md-5 text-center ">
            <div class="">
                <div>
                    <img src="./images/FAQs.png.png" class="" alt="FAQs">
                </div>
            </div>
        </div>
    </div>
</section>