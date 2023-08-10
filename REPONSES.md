## CORRECTION

<div style="display: flex; justify-content: space-between; width: fit-content; gap: 5%">
    <a href="https://github.com/teamflp/tutophp/blob/main/apprendre-php.pdf">
        <img src="https://img.shields.io/badge/Download the-support-green" alt="apprendre PHP"/>
    </a>
</div>

---

**Exercices**

---

**Exercice 1: Introduction**
1. Rédigez un bref résumé des principales raisons d'utiliser PHP en développement web.
2. Comparez PHP avec un autre langage que vous connaissez, en termes de facilité d'utilisation, flexibilité et écosystème.

**Correction**
**PHP en développement web :**
PHP est largement utilisé pour le développement web car, il est facile à apprendre, offre une intégration étroite avec les bases de données, dispose d'une large communauté et d'une vaste bibliothèque de ressources. De plus, il est efficace pour le développement d'applications web dynamiques.

**Comparaison avec Python :**

- **Facilité d'utilisation :** Tandis que PHP est spécifiquement conçu pour le web, Python est un langage plus généraliste qui est aussi utilisé pour le développement web avec des frameworks comme Django et Flask. Les deux langages ont leur propre syntaxe unique, mais beaucoup trouvent que Python a une syntaxe plus claire.

- **Flexibilité :** Les deux sont flexibles, mais Python est utilisé dans un plus grand nombre de domaines en dehors du web, comme la science des données et le développement de logiciels.

- **Écosystème :** PHP a un écosystème robuste autour du développement web avec de nombreux outils, CMS comme WordPress, et frameworks. Python a également un écosystème solide, mais il est plus varié, s'étendant à d'autres domaines en dehors du développement web.

---

**Exercice 2 : Syntaxe de Base de PHP**
1. Créez une variable pour stocker votre nom et l'afficher en utilisant `echo`.
2. Utilisez une structure conditionnelle pour vérifier si un nombre est pair ou impair.
3. Écrivez une boucle qui affiche les 10 premiers chiffres.

**1. Question 1 :** Créez une variable pour stocker votre nom et l'afficher en utilisant `echo`.

**Correction**
```php
$name = "John Doe";
echo $name;
```
**2. Question 2 :** Utilisez une structure conditionnelle pour vérifier si un nombre est pair ou impair.

**Correction**
```php
$nombre = 5;
if($nombre % 2 == 0) {
    echo "Le nombre est pair.";
} else {
    echo "Le nombre est impair.";
}
```
**3. Question 3 :** Écrivez une boucle qui affiche les 10 premiers chiffres.

**Correction**
```php
   for($i = 0; $i < 10; $i++) {
       echo $i . " ";
   }
```
---

**Exercice 3 : Formulaires et Entré Utilisateur**
1. Créez un formulaire simple HTML qui demande le nom, le prénom et l'âge d'un utilisateur.
2. Récupérez ces données en PHP et affichez-les.
3. Validez l'entrée pour vous assurer que l'âge est un nombre.

**Question 1 :** Créez un formulaire simple HTML qui demande le nom, le prénom et l'âge d'un utilisateur.

**Correction:**
```html
<form action="process.php" method="post">
    Nom : <input type="text" name="nom"><br>
    Prénom: <input type="text" name="prenom"><br>
    Âge : <input type="text" name="age"><br>
    <input type="submit" value="Envoyer">
</form>
```
**Question 2 :** Récupérez ces données en PHP et affichez-les.

**Correction :**
```php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];

    echo "Nom: " . $nom . "<br>";
    echo "Prénom: " . $prenom . "<br>";
    echo "Âge: " . $age . "<br>";
}
```
**Question 3 :** Validez l'entrée pour vous assurer que l'âge est un nombre.

**Correction :**
```php
if(!is_numeric($age)) {
    echo "Veuillez entrer un âge valide!";
} else {
    echo "Âge: " . $age . "<br>";
}
```
---

**Exercice 4 : Interactions avec les Bases de Données**
1. Établissez une connexion à une base de données MySQL.
2. Créez une table avec des colonnes pour le nom, le prénom et l'âge.
3. Insérez quelques entrées dans cette table et récupérez-les.

**Question 1 :** Établissez une connexion à une base de données MySQL.

**Correction :**
```php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSE = "";
$DB_NAME = "db_name";

try {
    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSE);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connecté avec succès"; 
}
catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
```

**Question 2 :** Créez une table avec des colonnes pour le nom, le prénom et l'âge.

**Correction :**
```php
try {
    $sql = "CREATE TABLE Utilisateurs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL
    )";
    $conn->exec($sql);
    echo "Table Utilisateurs créée avec succès";
} catch(PDOException $e) {
    echo "Erreur lors de la création de la table : " . $e->getMessage();
}

$conn = null;
```

**Question 3 :** Insérez quelques entrées dans cette table et récupérez-les.

**Correction :**
```php
try {
    // Insérer des entrées
    $sql = "INSERT INTO Utilisateurs (nom, prenom, age) VALUES ('Dupont', 'Jean', 30), ('Martin', 'Marie', 25)";
    $conn->exec($sql);
    echo "Nouvelles données insérées avec succès";

    // Récupérer les entrées
    $stmt = $conn->prepare("SELECT id, nom, prenom, age FROM Utilisateurs");
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    
    foreach($result as $row) {
        echo "id: " . $row["id"]. " - Nom: " . $row["nom"]. " - Prénom: " . $row["prenom"]. " - Âge: " . $row["age"]. "<br>";
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

$conn = null;
```
---

**Exercice 5 : PHP et les Sessions**
1. Créez une session pour mémoriser le nom de l'utilisateur.
2. Affichez un message de bienvenue avec le nom de l'utilisateur s'il est connecté, sinon demandez-lui de se connecter.

**Question 1 :** Créez une session pour mémoriser le nom de l'utilisateur.

**Correction :**
```php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nom"])) {
    $_SESSION["nom"] = $_POST["nom"];
}
```

**Question 2 :** Affichez un message de bienvenue avec le nom de l'utilisateur s'il est connecté, sinon demandez-lui de se connecter.

**Correction :**
```php
session_start();

if (isset($_SESSION["nom"])) {
    echo "Bienvenue " . $_SESSION["nom"] . "!";
} else {
    echo "<form method='post' action=''>
          Nom: <input type='text' name='nom'>
          <input type='submit' value='Se connecter'>
          </form>";
}
```
---

**Exercice 6 : Création d'un Petit Projet**
1. Créez un petit site qui permet de gérer une liste de tâches.
2. Les utilisateurs peuvent ajouter, supprimer et marquer les tâches comme terminées.

**Question 1 :** Créez un petit site qui permet de gérer une liste de tâches.

**Correction :**

index.php
```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Gestionnaire de Tâches</title>
</head>
<body>

<h1>Liste de Tâches</h1>

<ul id="taskList">
    <?php
    foreach ($tasks as $task) {
        echo '<li>' . $task['name'];
        if (!$task['done']) {
            echo ' [<a href="?done=' . $task['id'] . '">Marquer comme terminée</a>]';
        }
        echo ' [<a href="?delete=' . $task['id'] . '">Supprimer</a>]';
        echo '</li>';
    }
    ?>
</ul>

<form method="post" action="">
    <input type="text" name="newTask" placeholder="Nouvelle tâche">
    <input type="submit" value="Ajouter">
</form>

</body>
</html>
```
**Question 2 :** Les utilisateurs peuvent ajouter, supprimer et marquer les tâches comme terminées.

**Correction :**

tasks.php
```php
<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

$tasks = &$_SESSION['tasks'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["newTask"])) {
    $tasks[] = ['id' => uniqid(), 'name' => $_POST['newTask'], 'done' => false];
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    foreach ($tasks as $index => $task) {
        if ($task['id'] == $id) {
            unset($tasks[$index]);
        }
    }
}

if (isset($_GET['done'])) {
    $id = $_GET['done'];
    foreach ($tasks as &$task) {
        if ($task['id'] == $id) {
            $task['done'] = true;
        }
    }
}
?>
```
---

**Exercice 7 : Bonnes Pratiques et Sécurité en PHP**
1. Écrivez un code PHP qui utilise des préparations pour empêcher les injections SQL.
2. Créez une classe pour représenter un utilisateur avec des propriétés comme le nom, le prénom et l'âge.

**Question 1 :** Écrivez un code PHP qui utilise des préparations pour empêcher les injections SQL.

**Correction :**
```php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSE = "";
$DB_NAME = "db_name";
$charset = 'utf8mb4';

$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Requête préparée
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, age) VALUES (?, ?, ?)");

    // Liaison des paramètres et exécution de la requête
    $stmt->execute(['Dupont', 'Jean', 25]);

    echo "Données insérées avec succès!";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
```

**Question 2 :** Créez une classe pour représenter un utilisateur avec des propriétés comme le nom, le prénom et l'âge.

**Correction :**
```php
class Utilisateur {
    private $nom;
    private $prenom;
    private $age;

    public function __construct($nom, $prenom, $age) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAge() {
        return $this->age;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAge($age) {
        if ($age > 0) {  // Assurez-vous que l'âge est positif
            $this->age = $age;
        }
    }
}

// Création d'une instance d'utilisateur
$utilisateur = new Utilisateur("Dupont", "Jean", 25);
echo "Nom: " . $utilisateur->getNom();
echo "Prénom: " . $utilisateur->getPrenom();
echo "Age: " . $utilisateur->getAge() . " ans";
```
---

**Exercice 8 : Utilisation de PHP avec les CMS**
1. Installez WordPress localement.
2. Créez un thème enfant à partir d'un thème par défaut.
3. Ajoutez une nouvelle fonctionnalité à votre thème, comme un widget personnalisé.

**Question 1 :** Installez WordPress localement.

Resource : [Installation de WordPress](https://www.codeur.com/tuto/wordpress/creer-site-wordpress-local/)

**Question 2 :** Créez un thème enfant à partir d'un thème par défaut.

Resource : [Créer un thème enfant](https://developer.wordpress.org/themes/advanced-topics/child-themes/)

**Question 3 :** Ajoutez une nouvelle fonctionnalité à votre thème, comme un widget personnalisé.

Resource : [Créer un widget personnalisé](https://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/)

---

**Exercice 9 : Conclusion et Perspectives**
1. Listez trois choses que vous avez apprises et trouvées les plus intéressantes dans ce cours.
2. Recherchez une technologie émergente en PHP et écrivez un court paragraphe dessus.

**Question 1 :** Listez trois choses que vous avez apprises et trouvées les plus intéressantes dans ce cours.

**Trois choses apprises et intéressantes :**

- **Syntaxe et Structure :** J'ai appris la syntaxe de base de PHP, ce qui m'a permis de comprendre comment fonctionnent les variables, les boucles et les structures conditionnelles en PHP. J'ai trouvé particulièrement intéressant de voir comment PHP est similaire, mais aussi différent des autres langages que je connais.


- **Interactions avec les bases de données :** Avant ce cours, je ne savais pas comment PHP interagissait avec les bases de données. J'ai appris comment établir des connexions, comment récupérer des données et comment insérer des informations dans une base de données. La facilité avec laquelle PHP peut interagir avec MySQL m'a impressionné.


- **Programmation orientée objet en PHP :** Bien que j'aie eu une expérience antérieure avec la programmation orientée objet, c'était fascinant de voir comment elle est mise en œuvre en PHP. Les concepts tels que les classes, les objets et l'héritage ont pris un nouveau sens pour moi dans le contexte du développement web.

**Question 2 :** Recherchez une technologie émergente en PHP et écrivez un court paragraphe dessus.

**Technologie émergente en PHP :**

- **JIT (Just-In-Time) Compilation pour PHP :**
  Avec l'arrivée de PHP 8, une des caractéristiques les plus discutées est le JIT (Just-In-Time) Compiler. Le JIT est une technologie qui compile des parties de code à la volée, convertissant le code intermédiaire en code machine, permettant ainsi de l'exécuter directement par le matériel de l'ordinateur, plutôt que de l'interpréter. Cela a le potentiel d'accélérer considérablement les applications PHP, surtout pour les tâches non-web comme le calcul ou le traitement de données. Bien que le JIT puisse ne pas améliorer significativement les performances pour de nombreuses applications web standard, il ouvre la porte à l'utilisation de PHP dans de nouveaux domaines et scénarios où la performance brute est critique.

---

