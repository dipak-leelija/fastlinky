 <style>
.auto-popup-feedback {
    border-radius: 8px;
    font-family: "Poppins", sans-serif;
    display: none;
    z-index: 99;
    position: fixed;
    margin-top: 3rem;
    left: 0;
    right: 0;
    margin: 0 auto;
}

.closing-icon {
    text-align: end;
    font-size: 1.65rem;
    padding-right: .4rem;
    cursor: pointer;
    color: #ff0000ab;
}

.auto-popup-feedback h2 {
    margin-top: -20px;
}

.auto-popup-feedback p {
    font-size: 14px;
    text-align: justify;
    margin: 20px 0;
    line-height: 25px;
}

.popoup-wrapper {
    background: #80808099;
    padding: 3.4rem;

}

.my-buttons-hover {
    width: 140px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 10px;
    height: 45px;
    text-align: center;
    border: none;
    background-size: 300% 100%;
    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.my-buttons-hover:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.my-buttons-hover:focus {
    outline: none;
}

.my-buttons-hover.bn21 {
    background-image: linear-gradient(to right,
            #fc6076,
            #ff9a44,
            #ef9d43,
            #e75516);
    box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
}

.feedback-main-card {
    max-width: 27rem;
    margin: auto;
    border: none;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.starting-column{
    padding: 0 2rem 1rem;
}
.required-field {
    color: var(--black) !important;
}

div.stars {
    display: flex;
    margin: auto;
    justify-content: center;
}

input.star {
    display: none;
}

label.star {
    float: right;
    padding: 2px 8px 0px !important;
    font-size: 30px;
    /* color: #4A148C; */
    color: var(--mustard) !important;
    transition: all .2s;
}

input.star:checked~label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
}

input.star-5:checked~label.star:before {
    color: #FE7;
    text-shadow: 0 0 10px #952;
}

input.star-1:checked~label.star:before {
    color: #F62;
}

label.star:hover {
    transform: rotate(-15deg) scale(1.3);
}

label.star:before {
    content: '\f006';
    font-family: FontAwesome;
}
form .form-group input, form .form-group textarea {
    font-size: 15px !important;
}
@media(max-width:991px) {
    .submit-divclass {
        text-align: center;
    }
}

@media(max-width:490px) {
    .required-field {
        font-size: .9rem;
    }

    .popoup-wrapper {
        padding: 4.2rem 0rem;
    }
    .starting-column{
    padding: 0 1rem 1rem;
}
}
@media(max-width:390px) {
    label.star {
        font-size: 25px;
    }

    .login-div-below-card {
        padding: 1rem 1rem;
    }

    .my-buttons-hover {
        width: 130px !important;
        height: 40px !important;

    }
    .starting-column{
    padding: 0 .8rem 1rem;
}
}
 </style>

 <style media="screen">



 </style>
 <div class="auto-popup-feedback">
     <div class="popoup-wrapper">
         <div class="card feedback-main-card">
             <div class="text-end">
                 <i id="close" class="fa-sharp fa-solid fa-circle-xmark closing-icon pt-2"></i>
             </div>
             <div class="row no-gutters  m-auto">
                 <div class="col starting-column ">
                     <form method="post" class=" needs-validation" novalidate>
                         <div class="row">
                             <div class="col-sm-12 mb-0">
                                 <div class="form-group pb-2">
                                     <label class="required-field" for="firstname">How Satisfied were you with
                                         your recent visit in the following areas?</label>
                                     <div class="stars">
                                         <form action="">
                                             <div>
                                                 <input class="star star-5" id="star-5" type="radio" name="star" />
                                                 <label class="star star-5" for="star-5"></label>
                                                 <input class="star star-4" id="star-4" type="radio" name="star" />
                                                 <label class="star star-4" for="star-4"></label>
                                                 <input class="star star-3" id="star-3" type="radio" name="star" />
                                                 <label class="star star-3" for="star-3"></label>
                                                 <input class="star star-2" id="star-2" type="radio" name="star" />
                                                 <label class="star star-2" for="star-2"></label>
                                                 <input class="star star-1" id="star-1" type="radio" name="star" />
                                                 <label class="star star-1" for="star-1"></label>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 mb-0">
                                 <div class="form-group pb-2">
                                     <label class="required-field" for="firstname">Full Name</label>
                                     <input type="text" minlength="4" class="form-control mb-2" id="firstname"
                                         name="firstname" placeholder="John" required>
                                     <div class="invalid-feedback">
                                         Please Enter your first Name!
                                     </div>
                                     <div class="valid-feedback">
                                         Looks good!
                                     </div>
                                 </div>
                             </div>

                             <div class="col-sm-12 mb-0">
                                 <div class="form-group pb-2">
                                     <label class="required-field" for="email">Email</label>
                                     <input type="email" class="form-control mb-2" id="email" name="email"
                                         placeholder="example@gmail.com" required>
                                     <div class="invalid-feedback">
                                         Please enter your email!
                                     </div>
                                     <div class="valid-feedback">
                                         Email is valid!
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 mb-0">
                                 <div class="form-group pb-2">
                                     <label class="required-field" for="message">What feature can we add to
                                         improve?</label>
                                     <textarea class="form-control mb-0" minlength="10" id="message" name="message"
                                         rows="2" placeholder="Hi there, I would like to....." required></textarea>
                                     <div class="invalid-feedback">
                                         Please enter your queries!
                                     </div>
                                     <div class="valid-feedback">
                                         We will solve this soon!
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 mb-0 submit-divclass text-center">
                                 <a href="/">
                                     <button class="my-buttons-hover bn21">Submit <i class="fas fa-comments"
                                             style="font-size: 1.2rem;"></i></button>
                                 </a>
                             </div>
                         </div>
                     </form>
                 </div>

             </div>
         </div>
     </div>
 </div>
 </div>

 <script type="text/javascript">
    window.addEventListener("load", function() {
        setTimeout(
            function open(event) {
                document.querySelector(".auto-popup-feedback").style.display = "block";
            },
            7000
        )
    });
    document.querySelector("#close").addEventListener("click", function() {
        document.querySelector(".auto-popup-feedback").style.display = "none";
    });
    </script>