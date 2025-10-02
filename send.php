<?php
// Lire l'email envoyé depuis le formulaire
$data = json_decode(file_get_contents("php://input"), true);
$email = $data["email"] ?? "";

// Vérifier si un email est présent
if (!$email) {
    http_response_code(400);
    echo json_encode(["error" => "Email manquant"]);
    exit;
}

// Appel API MailerSend
$ch = curl_init("https://api.mailersend.com/v1/email");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer mlsn.08196e78b40103f46b4c3f231fa1ad475a532a24276218a30f39e1a9a1de2932",
    "Content-Type: application/json"
]);

$body = [
    "from" => ["email" => "ton_email@tondomaine.com"], 
    "to" => [["email" => $email]],
    "subject" => "Lien pour rejoindre le groupe WhatsApp 🚀",
    "text" => "Merci d’avoir rejoint le Cercle des Futurs Millionnaires ! Voici ton lien : https://whatsapp.com/channel/0029VbBFnvUDDmFShb548K1U"
];

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
$response = curl_exec($ch);

if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}

http_response_code(200);
echo $response;
curl_close($ch);
?>