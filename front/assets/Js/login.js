// ===== MENU BURGER =====
const burger = document.getElementById("burger");
const navLinks = document.getElementById("nav-links");
const loginForm = document.getElementById("loginForm");
const loginEmail = document.getElementById("loginEmail");
const loginPassword = document.getElementById("loginPassword");

burger.addEventListener("click", () => {
  navLinks.classList.toggle("active");
  burger.classList.toggle("toggle");
});

loginEmail.addEventListener("input", () => {
  const regex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  document.getElementById("loginEmailError").style.display =
    regex.test(loginEmail.value) ? "none" : "block";
});

loginPassword.addEventListener("input", () => {
  document.getElementById("loginPasswordError").style.display =
    loginPassword.value.length >= 6 ? "none" : "block";
});

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if (!loginEmail.value || !loginPassword.value) {
    alert("Tous les champs doivent être remplis !");
    return;
  }
  if (document.querySelectorAll(".error[style='display: block;']").length > 0) {
    alert("Veuillez corriger les erreurs avant de continuer.");
    return;
  }
  alert("Connexion réussie !");
});
