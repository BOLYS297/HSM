<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <link rel="stylesheet" href="assets/CSS/register.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script defer src="assets/Js/register.js"></script>
</head>

<body>
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

  <!-- ====== FORMULAIRE ====== -->
  <div class="form-container">
    <form id="registerForm" class="loginForm"  method="POST"  action="../app/controller/controllerUsers.php?action=create"  enctype="multipart/form-data">

      <h2>Inscription</h2>

      <div class="group">
        <div class="form-group">
          <label>Nom complet</label>
          <i class="fas fa-user icon"></i>
          <input type="text" id="fullName" name="nom_complet" required placeholder="DOUANLA Faarel">
        </div>
        <div class="form-group">
          <label>Email</label>
          <i class="fas fa-envelope icon"></i>
          <input type="email" id="email" name="email" required placeholder="jiy@gmail.com">
        </div>
      </div>

      <div class="group">
        <div class="form-group">
          <label>Téléphone</label>
          <i class="fas fa-phone icon"></i>
          <input type="text" id="phone" name="telephone" required placeholder="+237-655-345-458">
        </div>
        <div class="form-group">
          <label>Adresse</label>
          <i class="fa-solid fa-location-dot icon"></i>
          <input type="text" id="location" name="adresse" required placeholder="Gare-routière">
        </div>
      </div>

      <div class="form-group">
        <label>CNI (À jour) </label>
        <input type="file" id="cni" name="cni" accept="image/*" required>
      </div>

      <div class="form-group">
        <label>Photo de profil</label>
        <input type="file" id="profil" name="profil" accept="image/*" required>
      </div>

      <div class="form-group">
        <label>Rôle</label>
        <select name="role" id="role" required>
          <option value="">-- Sélectionnez --</option>
          <option value="Client">Client</option>
          <option value="Prestataire">Prestataire</option>
          <!-- <option value="Admin">Admin</option> -->
        </select>
      </div>

      <!-- Champs qui apparaissent seulement si rôle = Prestataire -->
      <div class="form-group" id="domaineTechGroup" style="display:none;">
        <label>Domaine technique</label>
        <select name="domaine_tech" id="domaine_tech">
          <option value="">-- Choisissez votre domaine --</option>
          <option value="Plomberie">Plomberie</option>
          <option value="Électricité">Électricité</option>
          <option value="Informatique">Informatique</option>
          <option value="Menuiserie">Menuiserie</option>
          <option value="Mécanique">Mécanique</option>
          <option value="Climatisation">Climatisation</option>
          <option value="Soudure">Soudure</option>
          <option value="Autre">Autre</option>
        </select>
      </div>

      <div class="form-group" id="attestationCvGroup" style="display:none;">
        <label>Attestation ou CV (PDF)</label>
        <input type="file" name="attestation_cv" id="attestation_cv" accept="application/pdf">
      </div>

      <div class="form-group">
        <label>Mot de passe</label>
        <i class="fas fa-lock icon"></i>
        <input type="password" id="password" name="password" required placeholder="Home@458">
      </div>

      <input type="submit" value="S'inscrire">

      <div class="connexion">
        <p>Déjà inscrit ? <a href="login.php" class="connexion1">Connectez-vous</a></p>
      </div>
    </form>
  </div>

  <!-- ====== FOOTER ====== -->
  <footer>
    <div class="container footer-top">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="#" class="brand" style="color:#fff">
            <span>HOME SERVICES</span><span class="highlight">&nbsp;MAINTENANCE</span>
          </a>
          <p style="margin-top:12px">
            Plateforme développée par des jeunes 100% camerounais permettant de faciliter les besoins sur place
            (à domicile ou sur le lieu d'intervention)
          </p>
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
            <span>dev_project_2025@yahoo.com</span>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      Copyright © 2025 Agence. All rights reserved.
    </div>
  </footer>

  <!-- Petit script JS pour afficher les champs du prestataire -->
  <!-- <script>
    document.getElementById('role').addEventListener('change', function () {
      if (this.value === 'Prestataire') {
        document.getElementById('domaineTechGroup').style.display = 'block';
        document.getElementById('attestationCvGroup').style.display = 'block';
      } else {
        document.getElementById('domaineTechGroup').style.display = 'none';
        document.getElementById('attestationCvGroup').style.display = 'none';
      }
    });
  </script> -->
</body>
</html>
