<h1>Administration</h1>

<?php

$requete = 'SELECT id_utilisateur, nom, prenom, mail FROM utilisateurs';

$querySelect = new Sql();
$select = $querySelect->recup($requete);

// dump($select);

$html = "<table>
        <tr>
            <th>Noms</th>
            <th>Prénoms</th>
            <th>Mails</th>
        </tr>";

foreach ($select as $row) {
    $html .= "<tr>";
    $html .= '<td>' . $row['nom'] . "</td>";
    $html .= '<td>' . $row['prenom'] . "</td>";
    $html .= '<td>' . $row['mail'] . "</td>";
    $html .= "<td>" . '<button><a href="index.php?page=update&id=' . $row['id_utilisateur'] . '">Modifier</a></button>' . "</td>";
    $html .= "<td>" . '<button><a href="index.php?page=delete&id=' . $row['id_utilisateur'] . '">Supprimer</button>' . "</td>";
    $html .= "</tr>";
}

$html .= "</table>";

echo $html;
