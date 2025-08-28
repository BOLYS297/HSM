// ===== MENU BURGER =====
const burger = document.getElementById("burger");
const navLinks = document.getElementById("nav-links");
const form = document.getElementById("registerForm");
const fullName = document.getElementById("fullName");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const cni = document.getElementById("cni");
const password = document.getElementById("password");

// Regex
const nameRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
const phoneRegex = /^\+?[0-9\s-]+$/;
const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{6,}$/;

burger.addEventListener("click", () => {
  navLinks.classList.toggle("active");
  burger.classList.toggle("toggle");
});

// Validation en direct
fullName.addEventListener("input", () => {
  document.getElementById("nameError").style.display =
    nameRegex.test(fullName.value) ? "none" : "block";
});

email.addEventListener("input", () => {
  document.getElementById("emailError").style.display =
    emailRegex.test(email.value) ? "none" : "block";
});

phone.addEventListener("input", () => {
  document.getElementById("phoneError").style.display =
    phoneRegex.test(phone.value) ? "none" : "block";
});

password.addEventListener("input", () => {
  document.getElementById("passwordError").style.display =
    passwordRegex.test(password.value) ? "none" : "block";
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  // Vérifie si tous les champs sont remplis
  if (!fullName.value || !email.value || !phone.value || !cni.value || !password.value) {
    alert("Tous les champs doivent être remplis !");
    return;
  }

  // Vérifie s’il y a encore des erreurs visibles
  if (document.querySelectorAll(".error[style='display: block;']").length > 0) {
    alert("Veuillez corriger les erreurs avant de continuer.");
    return;
  }

  // Récupère le rôle choisi au moment de la soumission
  const role = document.getElementById("role").value;

  if (role === "Client") {
    alert("Utilisateur ajouté avec succès ✅");
  } else if (role === "Prestataire") {
    // Redirection vers une autre page
    window.location.href = "domaine.html";
    return;
  }
});
