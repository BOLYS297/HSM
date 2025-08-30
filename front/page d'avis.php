<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page des commentaires</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/CSS/page d'avis.css">
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
        <li><a href="creationtache.php">Créer une tâche</a></li>
        <li><a href="about us.php">À propos de nous</a></li>
        <li><a href="page contact.php">Contactez-nous</a></li>
        <li><a href="page d'avis.php" class="active">Avis et commentaires</a></li>
        <li class="social">
          <a href="login.php"><i class="fas fa-user"></i></a>
          <abbr title="recherche et classementtechnicien"><a href="page de classement.php"><i class="fas fa-search"></i></a></abbr>
        </li>
      </ul>
    </nav>
  </header>
    <div class="container"></div>

        <section class="hero">
            <div class="header">
               <h1>Vos avis nous importent</h1>
               <p>Partagez votre expérience avec nos services de maintenance et consultez les avis d'autres clients</p>
           </div>
        </section>

        <div class="main-content">
           
            <div class="stats-panel">

                <div class="overall-rating">
                    <div class="rating-number" id="overall-rating">4.2</div>
                    <div class="rating-stars" id="overall-stars">★★★★☆</div>
                    <div class="total-reviews">Basé sur <span id="total-reviews">0</span> avis</div>
                </div>

                <div class="stars-breakdown">
                    <h3>Répartition des notes</h3>

                    <div class="star-row" data-stars="5">

                        <div class="star-label">5★</div>

                        <div class="star-bar">
                            <div class="star-bar-fill" data-percentage="0"></div>
                        </div>

                        <div class="star-count">0</div>

                    </div>

                    <div class="star-row" data-stars="4">

                        <div class="star-label">4★</div>

                        <div class="star-bar">
                            <div class="star-bar-fill" data-percentage="0"></div>
                        </div>

                        <div class="star-count">0</div>

                    </div>

                    <div class="star-row" data-stars="3">

                        <div class="star-label">3★</div>

                        <div class="star-bar">
                            <div class="star-bar-fill" data-percentage="0"></div>
                        </div>

                        <div class="star-count">0</div>

                    </div>

                    <div class="star-row" data-stars="2">

                        <div class="star-label">2★</div>

                        <div class="star-bar">
                            <div class="star-bar-fill" data-percentage="0"></div>
                        </div>

                        <div class="star-count">0</div>
                    </div>

                    <div class="star-row" data-stars="1">

                        <div class="star-label">1★</div>

                        <div class="star-bar">
                            <div class="star-bar-fill" data-percentage="0"></div>
                        </div>

                        <div class="star-count">0</div>
                    </div>

                </div>

                <button class="add-review-btn" onclick="openModal()">✍️ Écrire un avis</button>
            </div>   
        </div>

        <div class="reviews-panel">

            <h2>Tous les avis</h2>

            <div id="reviews-container">
                <div class="no-reviews">Aucun avis pour le moment. Soyez le premier à laisser un avis !</div>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter un avis -->

    <div id="reviewModal" class="modal">

        <div class="modal-content">

            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Rédiger votre avis</h2>
           
            <form id="reviewForm" method="POST" action="../app/controller/controllerAvis.php?action=create">
        
                <div class="form-group">
                    <label for="reviewer-name">Votre identifiant</label>
                    <input type="number" id="reviewer-name" required>
                </div>

                <div class="form-group">
                    <label for="reviewer-title">Titre *</label>
                    <input type="text" id="reviewer-name" required name="intitule">
                </div>

                <div class="form-group">

                    <label>Votre note *</label>
                    <div class="star-rating" id="star-rating" name="note">
                        <span class="star" data-rating="1">★</span>
                        <span class="star" data-rating="2">★</span>
                        <span class="star" data-rating="3">★</span>
                        <span class="star" data-rating="4">★</span>
                        <span class="star" data-rating="5">★</span>
                    </div>

                </div>

                <div class="form-group">
                    <label for="review-comment">Votre commentaire *</label>
                    <textarea id="review-comment" placeholder="Partagez votre expérience..." required name="commentaires"></textarea>
                </div>

                <button type="submit" class="submit-btn">Publier l'avis</button>
            </form>
        </div>
    </div>

    <script>
        // Array pour stocker les avis
        let reviews = [
            {
                id: 1,
                name: "Alice Martin",
                title : "remerciement",
                rating: 5,
                comment: "Service excellent ! Je recommande vivement. L'équipe était très professionnelle et le travail a été effectué dans les temps.",
                date: "2024-08-25"
            },
            {
                id: 2,
                name: "Pierre Dubois",
                title: "remerciement",
                rating: 4,
                comment: "Très satisfait du service. Quelques petits détails à améliorer mais dans l'ensemble très bien.",
                date: "2024-08-20"
            },
            {
                id: 3,
                name: "Marie Leroy",
                title: "remerciement",
                rating: 5,
                comment: "Parfait ! Exactement ce que j'attendais. Service rapide et efficace.",
                date: "2024-08-15"
            },
            {
                id: 4,
                name: "Jean Moreau",
                title: "remerciement",
                rating: 3,
                comment: "Service correct, sans plus. Le travail a été fait mais j'attendais un peu mieux.",
                date: "2024-08-10"
            }
        ];

        let currentRating = 0;

        // Initialisation au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            displayReviews();
            updateStatistics();
            setupStarRating();
            setupForm();
        });

        // Configuration du système d'étoiles dans le modal
        function setupStarRating() {
            const stars = document.querySelectorAll('.star');
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    currentRating = parseInt(this.dataset.rating);
                    updateStarDisplay();
                });
            });
        }

        function updateStarDisplay() {
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < currentRating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

        // Configuration du formulaire
        function setupForm() {
            document.getElementById('reviewForm').addEventListener('submit', function(e) {
                e.preventDefault();
                addReview();
            });
        }

        // Affichage des avis
        function displayReviews() {
            const container = document.getElementById('reviews-container');
           
            if (reviews.length === 0) {
                container.innerHTML = '<div class="no-reviews">Aucun avis pour le moment. Soyez le premier à laisser un avis !</div>';
                return;
            }

            container.innerHTML = reviews.map(review => `
                <div class="review-item">
                    <div class="review-header">
                        <span class="reviewer-name">${review.name}</span>
                        <span class="review-date">${formatDate(review.date)}</span>
                    </div>
                    <div class="review-stars">${getStars(review.rating)}</div>
                    <div class="review-text">${review.comment}</div>
                </div>
            `).join('');
        }

        // Mise à jour des statistiques
        function updateStatistics() {
            if (reviews.length === 0) {
                document.getElementById('overall-rating').textContent = '0.0';
                document.getElementById('overall-stars').textContent = '☆☆☆☆☆';
                document.getElementById('total-reviews').textContent = '0';
                return;
            }

            // Calcul de la moyenne
            const totalRating = reviews.reduce((sum, review) => sum + review.rating, 0);
            const averageRating = (totalRating / reviews.length).toFixed(1);
           
            // Mise à jour de l'affichage
            document.getElementById('overall-rating').textContent = averageRating;
            document.getElementById('overall-stars').textContent = getStars(Math.round(averageRating));
            document.getElementById('total-reviews').textContent = reviews.length;

            // Mise à jour de la répartition par étoiles
            updateStarsBreakdown();
        }

        function updateStarsBreakdown() {
            const starCounts = [0, 0, 0, 0, 0]; // Index 0 = 1 étoile, Index 4 = 5 étoiles
           
            reviews.forEach(review => {
                starCounts[review.rating - 1]++;
            });

            const total = reviews.length;
           
            for (let i = 0; i < 5; i++) {
                const starLevel = 5 - i; // 5, 4, 3, 2, 1
                const count = starCounts[starLevel - 1];
                const percentage = total > 0 ? (count / total) * 100 : 0;
               
                const row = document.querySelector(`[data-stars="${starLevel}"]`);
                const fill = row.querySelector('.star-bar-fill');
                const countElement = row.querySelector('.star-count');
               
                fill.style.width = percentage + '%';
                countElement.textContent = count;
            }
        }

        // Génération des étoiles visuelles
        function getStars(rating) {
            let stars = '';
            for (let i = 1; i <= 5; i++) {
                stars += i <= rating ? '★' : '☆';
            }
            return stars;
        }

        // Formatage de la date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        // Ajout d'un nouvel avis
        function addReview() {
            const name = document.getElementById('reviewer-name').value.trim();
            const comment = document.getElementById('review-comment').value.trim();
           
            if (!name || !comment || currentRating === 0) {
                alert('Veuillez remplir tous les champs et donner une note.');
                return;
            }

            const newReview = {
                id: reviews.length + 1,
                name: name,
                rating: currentRating,
                comment: comment,
                date: new Date().toISOString().split('T')[0]
            };

            reviews.unshift(newReview); // Ajouter en début de liste
            displayReviews();
            updateStatistics();
            closeModal();
            resetForm();
           
            alert('Merci pour votre avis ! Il a été publié avec succès.');
        }

        // Ouverture du modal
        function openModal() {
            document.getElementById('reviewModal').style.display = 'block';
        }

        // Fermeture du modal
        function closeModal() {
            document.getElementById('reviewModal').style.display = 'none';
        }

        // Réinitialisation du formulaire
        function resetForm() {
            document.getElementById('reviewForm').reset();
            currentRating = 0;
            updateStarDisplay();
        }

        // Fermeture du modal en cliquant à l'extérieur
        window.onclick = function(event) {
            const modal = document.getElementById('reviewModal');
            if (event.target === modal) {
                closeModal();
            }
        }
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