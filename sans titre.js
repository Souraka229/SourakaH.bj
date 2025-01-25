// Fonction pour changer le message au clic du bouton
document.getElementById('changeMessageBtn').addEventListener('click', function() {
  const messages = [
    'Bonjour, bienvenue sur le site !',
    'Merci de visiter notre site dynamique.',
    'Le contenu change à chaque interaction!',
  ];

  const randomMessage = messages[Math.floor(Math.random() * messages.length)];
  document.getElementById('message').textContent = randomMessage;
});

// Fonction pour saluer l'utilisateur
document.getElementById('greetBtn').addEventListener('click', function() {
  const userName = document.getElementById('userName').value;
  const greetingMessage = userName ? `Bonjour, ${userName}! Bienvenue sur notre site.` : 'Veuillez entrer votre nom pour être salué.';
  document.getElementById('greetingMessage').textContent = greetingMessage;
});