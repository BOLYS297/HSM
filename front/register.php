<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/CSS/register.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script defer src="assets/Js/register.js"></script>
</head>
<body>
      <!-- ====== NAVBAR ====== -->
     <!-- ====== NAVBAR ====== -->
  <header>
    <nav class="navbar">
      <!-- Burger menu -->
      <div class="burger" id="burger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="logo">
        <div class="logo-HSM">
          <img src="assets/image/logo_HSM_2.png" alt="logo">
        </div>
        Home Services <span class="highlight">&nbsp;Maintenance</span>
      </div>
      <ul class="nav-links" id="nav-links">
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="register.php" class="active">Besoin prestataire</a></li>
        <li><a href="about us.php">À propos de nous</a></li>
        <li><a href="page contact.php">Contactez-nous</a></li>
        <li class="social">
          <a href="login.php"><i class="fas fa-user"></i></a>
          <abbr title="recherche et classement des technicien(ne)s"><a href="page de classement.php"><i class="fas fa-search"></i></a></abbr>
        </li>
      </ul>
    </nav>
  </header>
  <div class="form-container">
    <form id="registerForm" class="loginForm" novalidate method="POST" action="../app/controller/controllerUsers.php?action=create" enctype="multipart/form-data">
      <h2>Inscription</h2>
      <div class="group">
        <div class="form-group">
           <label>Nom complet</label>
           <i class="fas fa-user icon"></i>
           <input type="text" id="fullName" name="nom_complet" required placeholder="DOUANLA Faarel">
           <div class="error" id="nameError">Le nom ne peut contenir que des lettres.</div>
        </div>
        <div class="form-group">
           <label>Email</label>
           <i class="fas fa-envelope icon"></i>
           <input type="email" id="email" name="email" required placeholder="jiy@gmail.com">
           <div class="error" id="emailError">Veuillez entrer un email valide.</div>
         </div>
      </div>
      <div class="group">
          <div class="form-group">
             <label>Téléphone</label>
             <i class="fas fa-phone icon"></i>
             <input type="text" id="phone" name="telephone" required placeholder="+237-655-345-458">
             <div class="error" id="phoneError">Le numéro doit contenir uniquement des chiffres et éventuellement le signe +.</div>
           </div>
           <div class="form-group">
           <label>Adresse</label>
           <i class="fa-solid fa-location-dot icon"></i>
           <input type="text" id="location" name="adresse" required placeholder="Gare-routière">
         </div>
      </div>
      <div class="form-group">
        <label>CNI (À jour)[pdf recto-verseau]</label>
        <input type="file" id="cni" name="cni" required>
        <div class="error" id="cniError">Veuillez uploader une copie de la CNI.</div>
      </div>
      <div class="form-group">
        <label>Photo de profil&nbsp;[Renseigner une photo réel de vous]</label>
        <input type="file" id="profil" name="profil" required>
        <div class="error" id="cniError">Veuillez uploader une photo de vous même par mesure d'identification.</div>
      </div>
      <div class="form-group">
        <label>Rôle</label>
        <select name="role" id="role">
          <option value="Client">Client</option>
          <option value="Prestataire">Prestataire</option>
        </select>
      </div>
      <div class="form-group">
        <label>Password</label>
        <i class="fas fa-lock icon"></i>
        <input type="password" id="password" name="password" required placeholder="Home@458">
        <div class="error" id="passwordError">Le mot de passe doit contenir min. 6 caractères, dont une majuscule, un chiffre et un caractère spécial[@$!%*?&].</div>
      </div>
      <button type="submit">S'inscrire</button>
      <div class="connexion">
      <p>Déjà inscrit ? <a href="login.php" class="connexion1">Connectez-vous</a></p>
      </div>
    </form>
  </div>
   <footer>
    <div class="container footer-top">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="#" class="brand" style="color:#fff"><span>HOME SERVICES</span><span class="highlight">&nbsp;MAINTENANCE</span></a>
          <p style="margin-top:12px">Plateforme développée par des jeunes 100% camerounais permattant de faciliter les besoins sur place(à domicile ou sur le lieu d'intervention)</p>
          <div class="footer-social">
            <a href="#" aria-label="Facebook">H</a>
            <a href="#" aria-label="Twitter">S</a>
            <a href="#" aria-label="Instagram">M</a>
            <a href="#" aria-label="YouTube">▶</a>
          </div>
        </div>
        <div>
          <h4 class="footer-title">Useful Links</h4>
          <nav class="footer-links">
            <a href="about us.php">About us</a>
            <a href="register.php">Inscription</a>
            <a href="login.php">Connexion</a>
            <a href="#">Notice légale</a>
          </nav>
        </div>
        <div>
          <h4 class="footer-title">Support</h4>
          <nav class="footer-links">
            <a href="page contact.php">Contact Us</a>
          </nav>
        </div>
        <div>
          <h4 class="footer-title">Contact information</h4>
          <div class="footer-links">
            <span>Douala, CAMEROUN</span>
            <!--<span>+1(456)657-887, 0215899 12</span>-->
            <span>dev_project_2025@yahoo.com</span>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      Copyright © 2025 Agence. All rights reserved.
    </div>
  </footer>
  
</body>
</html>