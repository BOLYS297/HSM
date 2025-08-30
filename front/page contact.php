<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Contact</title>
    <link rel="stylesheet" href="assets/CSS/page contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
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
        <li><a href="domaine.php">Besoin Prestataire</a></li>
        <li><a href="about us.php">À propos de nous</a></li>
        <li><a href="page contact.php" class="active">Contactez-nous</a></li>
        <li class="social">
          <a href="login.php"><i class="fas fa-user"></i></a>
          <abbr title="recherche et classement des technicien(ne)s"><a href="page de classement.php"><i class="fas fa-search"></i></a></abbr>
        </li>
      </ul>
    </nav>
  </header>
    <section class="hero">
        <div class="header">
            <h1>Contactez-nous</h1>
            <p>Notre équipe est à votre disposition pour toute question concernant la maintenance de vos appareils électroniques et ménagers.</p>
        </div>
    </section>

    <section class="contact-section">

        <div class="container">

            <div class="contact-grid">

                <div class="contact-info">

                    <h2>Nos coordonnées</h2>
                   
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="info-content">
                            <h3>Adresse</h3>
                            <p>Douala, AKWA</p>
                        </div>
                    </div>
                   
                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <div class="info-content">
                            <h3>Téléphone</h3>
                            <p>+237 671 394 910</p>
                            <p>+237 690 744 225 (Urgences)</p>
                        </div>
                    </div>
                   
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p>support@reparoservices.fr</p>
                            <p>urgences@reparoservices.fr</p>
                        </div>
                    </div>
                   
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <div class="info-content">
                            <h3>Horaires d'ouverture</h3>
                            <p>Lun-Ven: 8h-19h</p>
                            <p>Sam: 9h-18h</p>
                            <p>Dim: 10h-16h (Urgences seulement)</p>
                        </div>
                    </div>
                   
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
               
                <div class="contact-form">

                    <h2>Envoyez-nous un message</h2>

                    <form id="contactForm" action="../API/mailer.php" method="POST">

                        <div class="form-group">
                            <label for="name">Nom complet</label>
                            <input type="text" id="name" class="form-control" name="nom_complet" placeholder="Votre nom complet" required>
                        </div>
                         
                        <div class="form-group">
                            <label for="phone">Objet</label>
                            <input type="text" id="objet" class="form-control" name="objet" placeholder="Votre objet">
                        </div>
                       
                        
                        <div class="form-group">
                            <label for="message">Description</label>
                            <textarea id="description" class="form-control" name="description" placeholder="Renseignez une description" required></textarea>
                        </div>
                       
                        <button type="submit" class="btn">Envoyer le message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Merci pour votre message! Nous vous contacterons bientôt.');
            this.reset();
        });
    </script>
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