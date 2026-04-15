document.getElementById('form-inscription').addEventListener('submit', function(event) {
  const mdp = document.getElementById('password').value;
  const confirmMdp = document.getElementById('confirm_password').value;
  const messageErreur = document.getElementById('message-erreur');

  if (mdp !== confirmMdp) {
    // On empêche le formulaire de s'envoyer
    event.preventDefault(); 
    
    // On affiche le message d'erreur
    messageErreur.textContent = "Les mots de passe ne correspondent pas !";
    messageErreur.style.display = "block";
  } else {
    // Tout va bien, on cache l'erreur (au cas où) et le formulaire s'envoie
    messageErreur.style.display = "none";
  }
});