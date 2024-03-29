<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries/IN/states/MH/cities',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_HTTPHEADER => array(
//     'X-CSCAPI-KEY: API_KEY'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

/*
TRUNCATE `notification`;

TRUNCATE `ordered_content_hyperlinks`;
TRUNCATE `order_contents`;
TRUNCATE `order_transections`;
TRUNCATE `order_updates`;
TRUNCATE `order_details`;

TRUNCATE `gp_package_order`;
TRUNCATE `gp_package_order_details`;
TRUNCATE `gp_package_order_links`;
TRUNCATE `gp_package_order_link_status`;
TRUNCATE `package_publish_links`;
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toggle Password Visibility</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= URL ?>/css/style.css" />
    <style>
    form i {
        margin-left: -30px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sign In</h1>
        <form method="post">
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" />
                <i class="bi bi-eye-slash" id="togglePassword"></i>
            </p>
            <button type="submit" id="submit" class="submit">Log In</button>
        </form>
    </div>
    <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });
    </script>
</body>

</html>