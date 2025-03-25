# Laboratoire 04

## Objectif

* Mettre en pratique la création et l'utilisation des fonctions
* Mettre en pratique la structure conditionnelle *switch*
* Réinvestir toutes les notions vues depuis le début de la session

## Prérequis

Clonez ce dépôt à la racine du répertoire contenant les fichiers Web de votre serveur Apache. Utilisez ensuite un navigateur Web pour accéder à l'adresse `/lab04` sur votre serveur local.

Vous devriez voir une page avec le titre « Laboratoire 04 ».

Ouvrez ensuite le dossier `lab04` dans votre IDE. Prenez connaissance des fichiers qu'il contient. Vous constaterez qu'il y a un fichier `index.php` (page d'accueil du laboratoire) ainsi que des sous-dossier `pages` et `fonctions` contenant plusieurs autres fichiers PHP.

## 1 - Création de la page d'accueil

Prenez connaissance du code du fichier `index.php`. Vous constaterez que celui-ci inclut les fichiers `fonctions/authentification.php` et `fonctions/menu.php` à l'aide de la fonction `require_once`. Vous verrez aussi qu'il appelle à différents endroits les fonctions `deconnecter`, `estAuthentifie`, `obtenirInfoUtilisateur`, `afficherFormulaireAuthentification` et `afficherMenu`. Ces différentes fonctions sont définies dans l'un ou l'autre des deux fichiers inclus. Elles sont présentement vides. Vous allez implémenter leurs corps dans les étapes qui suivent.

### 1.1 - Fonctions d'authentification

Ouvrez le fichier `fonctions/authentification.php`. Celui-ci contient quatre fonctions à compléter:

* `estAuthentifie`
* `obtenirInfoUtilisateur`
* `afficherFormulaireAuthentification`
* `deconnecter`

Complétez ces quatre fonctions en suivant la logique suivante pour chacune:

**Fonction `estAuthentifie` :**

* SI la variable de session `utilisateur` existe:
    
    * Retourner `true`

* SINON SI les champs de formulaire `utilisateur` et `mot_de_passe` ont été reçus:

    * SI l'utilisateur est `bob` et que le mot de passe est `abc123`:

        * Créer la variable de session `utilisateur` contenant le tableau associatif `['prenom' => 'Bob', 'nom' => "L'Éponge"]`
        * Retourner `true`
* Retourner `false`

**Fonction `obtenirInfoUtilisateur` :**

* SI `estAuthentifie()`:
    
    * Retourner la variable de session `utilisateur`

* Retourner `null`

**Fonction `afficherFormulaireAuthentification` :**

* SI le champ de formulaire `utilisateur` a été reçu et que `estAuthentifie()` est faux:

    * Afficher `Utilisateur ou mot de passe invalide.`

* Afficher le formulaire suivant:

    * ![](images-readme/formulaire-authentification.png)

**Fonction `deconnecter` :**

* Supprimer la variable de session `utilisateur`

Vous n'avez rien à modifier dans le fichier `index.php` pour le moment. Une fois que vous aurez implémenté correctement toutes les fonctions ci-dessus, vous obtiendrez le comportement suivant pour la page d'accueil:

![](images-readme/demo-authentification.gif)

Assurez-vous que vous obtenez bien les résultats ci-dessus avant de continuer.

### 1.2 - Fonction d'affichage du menu

Observez la structure conditionnelle dans le bas du fichier `index.php`. On peut y constater que si l'utilisateur est authentifié et que la variable `$_GET['page']` n'existe pas, alors la fonction `afficherMenu` est appelée.

La fonction `afficherMenu` est définie dans le fichier `fonctions/menu.php`, mais est présentement vide. Vous devez lui ajouter le code nécessaire pour afficher le menu ci-dessous:

![](images-readme/menu.png)

Plutôt que faire pointer chaque lien vers un fichier PHP différent, vous lui ferez recharger la page courante avec une valeur différente du paramètre d'URL `page`. Voici donc la cible (`href`) à utiliser pour chaque lien:

| Lien                        | Cible                         |
|-----------------------------|-------------------------------|
| Fibonacci                   | `?page=fibonacci`             |
| FizzBuzz                    | `?page=fizzbuzz`              |
| Étoiles                     | `?page=etoiles`               |
| Citations                   | `?page=citations`             |
| Calculs                     | `?page=calculs`               |
| Convertisseur de mesures    | `?page=conversion`            |
| Nombres aléatoires          | `?page=nombre-aleatoires`     |
| Filtre                      | `?page=filtre`                |
| Tri                         | `?page=tri`                   |
| Calendrier                  | `?page=calendrier`            |

Encore une fois, vous ne devez rien modifier dans le fichier `index.php`. Si vous implémentez la fonction `afficherMenu` correctement, le menu apparaîtra sur la page d'accueil.

### 1.3 - Chargement de la bonne page

Dans le `else if` de la structure conditionnelle dans le bas du fichier `index.php`, vous trouverez le commentaire suivant:

```php
/****** AJOUTEZ LE SWITCH CI-DESSOUS *******/
```

Sous ce commentaire, vous devez créer la structure conditionnelle `switch` nécessaire pour **inclure** le bon fichier PHP selon la valeur de `$_GET['page']`. C'est ce qui permettra de faire fonctionner les liens du menu créé à l'étape précédente.

Les fichiers à inclure se trouvent dans le dossier `pages`. Le cas `default` doit afficher le texte `ERREUR: Page inexistante.`.

Voici le comportement attendu une fois que votre `switch` sera entièrement fonctionnel:

![](images-readme/demo-switch.gif)

## 2 - Fibonacci

Ouvrez le fichier `pages/fibonacci.php`.

Vous constaterez que celui-ci ne contient qu'une balise `<h1>`. Les balises HTML de base (`html`, `head` et `body`) ne sont pas présentes. C'est parce qu'on n'accède pas à ce fichier directement: il est inclus dans le `body` du fichier `index.php`. On inclut donc seulement les balises qui doivent apparaître dans ce dernier. Souvenez-vous qu'inclure une page revient à faire un copier-coller de son contenu.

Dans ce fichier, ajoutez une fonction `afficherFibonacci` qui prend en paramètre le nombre de valeurs de la suite de Fibonacci à afficher. La fonction doit afficher ces valeurs dans une liste ordonnée (`ol`).

Créez aussi une fonction `afficherFormulaire` qui affiche le formulaire ci-dessous:

![](images-readme/formulaire-fibonacci.png)

Cette fonction doit prendre en paramètre la valeur maximale à inclure dans la liste déroulante, ainsi qu'une valeur par défaut.

Ajoutez ensuite la logique suivante pour générer le contenu de la page:

* SI le champ de formulaire `nombre` a été reçu:

    * Appeler `afficherFibonacci` en lui passant la valeur du champ `nombre`

* SINON:

    * Appeler `afficherFibonacci` en lui passant `10`

* Appeler `afficherFormulaire` avec la valeur maximale `50` et la valeur par défaut `10`

Il reste à valider le champ du formulaire. Pour ce faire, créez une fonction `validerNombreEntier` dans le fichier `fonctions/validation.php`. Cette fonction doit prendre en paramètre un nombre, une valeur minimale et une valeur maximale, et retourner `true` si le nombre est valide (est un nombre entier) et compris entre `min` et `max` inclusivement. Autrement, elle doit retourner `false`.

Ajoutez ensuite une inclusion de `fonctions/validation.php` dans le fichier `pages/fibonacci.php`, et utilisez la fonction `validerNombreEntier` pour valider le champ du formulaire. Voici la logique mise à jour pour la page:

* SI le champ de formulaire `nombre` a été reçu **et est un nombre entier compris entre 1 et 50**:

    * Appeler `afficherFibonacci` en lui passant la valeur du champ `nombre`

* SINON:

    * Appeler `afficherFibonacci` en lui passant `10`

* Appeler `afficherFormulaire` avec la valeur maximale `50` et la valeur par défaut `10`

## 3 - FizzBuzz

Ouvrez le fichier `pages/fizzbuzz.php`.

Dans ce fichier, ajoutez une fonction `fizzBuzz` qui prend en paramètre deux nombres entiers et affiche dans une liste ordonnée (`ol`) les valeurs de FizzBuzz comprises entre ces deux nombres.

Créez aussi une fonction `afficherFormulaire` qui affiche le formulaire ci-dessous :

![](images-readme/formulaire-fizzbuzz.png)

Utilisez ensuite ces fonctions pour produire le résultat ci-dessous. N'oubliez pas de valider les champs du formulaire. Les deux nombres doivent être compris entre 1 et 1000, et la valeur « De » doit être inférieure à la valeur « À ».

![](images-readme/demo-fizzbuzz.gif)

## 4 - Étoiles

Dans le fichier `pages/etoiles.php`, vous devez créer les 6 fonctions suivantes:

* `triangleHautGauche`
* `triangleHautDroite`
* `triangleBasGauche`
* `triangleBasDroite`
* `afficherMotif`
* `afficherFormulaire`

La fonction `triangleHautGauche` doit prendre en paramètre un nombre de lignes et **retourner** (et non afficher!) un triangle d'étoiles semblable à celui ci-dessous, selon le nombre de lignes (dans l'exemple, le nombre de lignes est de 5):

```
        * 
      * * 
    * * * 
  * * * * 
* * * * *
```

Les fonctions `triangleHautDroite`, `triangleBasGauche` et `triangleBasDroite` prennent le même paramètre et retournent respectivement des triangles semblables à ceux-ci:

```
*
* *
* * *
* * * *
* * * * * 
```

```
* * * * * 
  * * * * 
    * * * 
      * * 
        *
```

```
* * * * *
* * * *
* * *
* *
* 
```

La fonction `afficherMotif` prend en paramètre le nombre de lignes par triangle, et appelle les quatre fonctions ci-dessus pour **afficher** (et non retourner) les quatre triangles dans un tableau HTML de 2x2. La page contient déjà du CSS pour désactiver les bordures du tableau. Le résultat doit ressembler à ceci:

![](images-readme/motif-etoiles.png)

La fonction `afficherFormulaire` doit prendre en paramètre un nombre de lignes par défaut, et afficher le formulaire suivant (dans l'exemple, le nombre de lignes par défaut est 5):

![](images-readme/formulaire-etoiles.png)

La logique de la page doit appeler la fonction `afficherMotif` avec la bonne valeur de paramètre (soit le nombre saisi dans le formulaire, soit la valeur par défaut de 5), puis afficher le formulaire. Le formulaire doit utiliser comme valeur par défaut la valeur précédémment saisie, ou bien 5 si aucune valeur n'a été saisie.

> Astuce: utilisez un opérateur ternaire pour appeler la fonction `afficherFormulaire` avec le bon paramètre, par exemple: `afficherFormulaire(isset($_POST['nombreLignes']) ? $_POST['nombreLignes'] : 5);
`

Voici le résultat attendu:

![](images-readme/demo-etoiles.gif)

## 5 - Citations

Dans le fichier `pages/citations.php`, créez une fonction qui retourne une citation au hasard. Utilisez cette fonction pour créer une page semblable à celle-ci:

![](images-readme/demo-citations.gif)

Pour rappel, voici comment récupérer une valeur au hasard dans un tableau:

```php
$tableau[array_rand($tableau)]
```

Voici un tableau de citations que vous pouvez utiliser dans votre fonction (gracieuseté d'une intelligence artificielle générative 😉):

```php
$citations = [
    'La vie, c\'est comme une boîte de chocolats, on ne sait jamais sur quoi on va tomber. - Forrest Gump',
    'Il n\'y a qu\'une façon d\'échouer, c\'est d\'abandonner avant d\'avoir réussi. - Olivier Lockert',
    'La seule limite à notre épanouissement de demain sera nos doutes d\'aujourd\'hui. - Franklin D. Roosevelt',
    'L\'imagination est plus importante que le savoir. - Albert Einstein',
    'La meilleure façon de prédire l\'avenir est de le créer. - Peter Drucker',
    'Le succès n\'est pas final, l\'échec n\'est pas fatal : c\'est le courage de continuer qui compte. - Winston Churchill',
    'La créativité, c\'est l\'intelligence qui s\'amuse. - Albert Einstein',
    'Ne jugez pas chaque jour à la récolte que vous faites, mais aux graines que vous plantez. - Robert Louis Stevenson'
];
```