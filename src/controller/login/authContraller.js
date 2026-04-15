// Dans authController.js

exports.inscription = async (req, res) => {
  // On récupère les données envoyées par le formulaire HTML
  const { email, mot_de_passe, confirmation_mdp, role } = req.body;

  // 1. VÉRIFICATION DE SÉCURITÉ
  if (mot_de_passe !== confirmation_mdp) {
    // Si ça ne correspond pas, on renvoie la vue d'inscription avec une erreur
    return res.status(400).send("Erreur : Les mots de passe ne correspondent pas.");
    // Note : Dans un vrai projet, tu renverrais plutôt la page HTML avec le message intégré.
  }

  // 2. LA SUITE DU TRAITEMENT (Si tout est bon)
  try {
    // Ici tu haches le mot de passe (avec bcrypt par exemple)
    // const mdpHache = await bcrypt.hash(mot_de_passe, 10);

    // Puis tu appelles ton Modèle pour sauvegarder l'utilisateur dans la base de données
    // User.create({ email: email, mot_de_passe: mdpHache, role: role });

    res.send("Inscription réussie !");
    
  } catch (erreur) {
    res.status(500).send("Erreur du serveur");
  }
};