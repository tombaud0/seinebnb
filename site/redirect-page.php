<?php
include './load_data.php';

$status = $_GET['status'] ?? '';
$message = $_GET['message'] ?? '';

switch ($status) {
    case 'success':
        header("Location: new-account-login.php");
        exit();
    case 'exists':
        $outputMessage = "L'Email est déjà utilisé";
        $outputDescription = "Veuillez en entrez un nouveau ou vous connecter.";
        $outputType1 ="creation-bnb.php";
        $outputText1 = "Recommencer";

        $outputType2 = "connecter-bnb.php";
        $outputText2 = "Me connecter";

        break;
    case 'error':
        $outputMessage = "An error occurred: " . htmlspecialchars($message);
        $outputDescription = "Il y a eut une erreur veuillez recommencer.";
        $outputType1 ="creation-bnb.php";
        $outputText1 = "Recommencer";

        $outputType2 = "connecter-bnb.php";
        $outputText2 = "Me connecter";

        break;
    case 'login_error':
        $outputMessage = "Invalid email or password.";
        $outputDescription = "Veuillez recommencer, en cas d'oublie contactez nous.";
        $outputType1 ="connecter-bnb.php";
        $outputText1 = "Recommencer";
        $outputType2 = "synchbnb.php#contact";
        $outputText2 = "Nous contacter";
        break;
    case 'copyright':
        $outputMessage = "Copyright";
        $outputDescription = "<hr> Tous les contenus présents sur ce site web et dans l'application de '" . ($gerant ?? 'gerant non disponible') . "', '" . ($titre ?? 'titre non disponible') . "' y compris mais sans s'y limiter, les textes, graphiques, logos, icônes, images, clips audio, vidéos, et logiciels, sont la propriété exclusive de BDR ou de ses concédants de licence et sont protégés par les lois internationales sur le droit d'auteur.<hr>";
        $outputType1 ="indexx.php";
        $outputText1 = "Retour menu";

        $outputType2 = "indexx.php#contact";
        $outputText2 = "Nous contacter";

        break;
    case 'privacy':
        $outputMessage = "Politique de Confidentialité";
        $outputDescription = "<hr> Nous recueillons des informations personnelles telles que votre nom, adresse email et informations de paiement lorsque vous utilisez notre site web et application. Nous mettons en œuvre des mesures de sécurité appropriées pour protéger vos informations personnelles contre tout accès non autorisé, altération, divulgation ou destruction. <hr>";
        $outputType1 ="indexx.php";
        $outputText1 = "Retour menu";

        $outputType2 = "indexx.php#contact";
        $outputText2 = "Nous contacter";

        break;
    default:
        $outputMessage = "Invalid request.";
        $outputDescription = "Il y a eut une erreur veuillez recommencer.";
        $outputType1 ="creation-bnb.php";
        $outputText1 = "Recommencer";

        $outputType2 = "synchbnb.php#contact";
        $outputText2 = "Nous contacter";

        break;
}
?>


<?php
session_start();

// Initialize the message variable
$message = '';

if (isset($_GET['status']) && $_GET['status'] == 'account_created') {
    $message = "Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Connect to SQLite database
        $db = new PDO('sqlite:bnb.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute query to fetch user
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and password is correct
        if ($user && password_verify($password, $user['password_hash'])) {
            // Password is correct, start session
            $_SESSION['user_id'] = $user['users_id'];
            $_SESSION['name'] = $user['name']; // Store name in session
            
            // Redirect to a protected page
            header("Location: dashbord-bnb.php");
            exit();
        } else {
            // Invalid login
            $message = "Invalid email or password.";
        }
    } catch (PDOException $e) {
        $message = "An error occurred: " . htmlspecialchars($e->getMessage());
    }
} else {
    $message = "Invalid request method.";
}
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Crafto - The Multipurpose HTML5 Template</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 48+ ready demos.">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        <!-- google fonts preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- style sheets and font icons -->
        <link rel="stylesheet" href="../files/css/vendors.min.css"/>
        <link rel="stylesheet" href="../files/css/icon.min.css"/>
        <link rel="stylesheet" href="../files/css/style.css"/>
        <link rel="stylesheet" href="../files/css/responsive.css"/>
        <link rel="stylesheet" href="../files/demos/it-business/it-business.css" />
        <link rel="stylesheet" href="../files/demos/interactive-portfolio/interactive-portfolio.css" />
    </head>
    <body data-mobile-nav-style="classic">  

        <!-- end header -->  
        <section class="d-flex align-items-center full-screen cover-background ipad-top-space-margin bg-black"  style="background-image: url();">
        <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-9 col-md-9 sm-mb-40px sm-mt-30px text-center text-md-start">
                        <span class="sm-fs-45 fs-90 lh-90 d-block text-white fw-500 ls-minus-3px mb-15px w-100 lg-w-100"><?php echo $outputMessage; ?></span>
                        <p class="w-75 lg-w-100 "><?php echo $outputDescription; ?></p>
                        <a href="<?php echo $outputType1; ?>" class="btn btn-small btn-transparent-white-light btn-rounded text-transform-none border-1 mx-2">
                            <span>
                                <span class="btn-double-text" data-text="Une Question ?"><?php echo $outputText1; ?></span>
                            </span>
                        </a>
                        <a href="<?php echo $outputType2; ?>" class="btn btn-small btn-transparent-white-light btn-rounded text-transform-none border-1">
                            <span>
                                <span class="btn-double-text" data-text="Une Question ?"><?php echo $outputText2; ?></span>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-lg-7 col-md-6">
                        <img class="border-radius-8px" src="" alt="">
                    </div>
                </div>
                
            </div>
            
        </section>
        <!-- end section -->
        
        
        <!-- javascript libraries -->
        <script type="text/javascript" src="../files/js/jquery.js"></script>
        <script type="text/javascript" src="../files/js/vendors.min.js"></script>
        <script type="text/javascript" src="../files/js/main.js"></script>
    </body>
</html>
