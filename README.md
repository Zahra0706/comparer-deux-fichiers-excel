# 🧾 Comparateur de Fichiers Excel

Ce projet est une application web simple développée en **PHP** qui permet de **comparer deux fichiers Excel (.xlsx)** et de détecter les différences entre les cellules ligne par ligne et colonne par colonne.

## 🚀 Fonctionnalités

- Téléversement de deux fichiers Excel via une interface web.
- Lecture des fichiers Excel à l’aide de la bibliothèque [PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet).
- Comparaison automatique cellule par cellule.
- Affichage des différences trouvées sous forme de message détaillé.
- Support des fichiers `.xlsx`.

## 🔧 Technologies utilisées

- **Langage** : PHP
- **Frontend** : HTML, CSS
- **Librairie Excel** : PhpSpreadsheet (via Composer)

## 🖥️ Interface

Formulaire simple permettant d'importer deux fichiers Excel :

- `Fichier 1` (.xlsx)
- `Fichier 2` (.xlsx)
- Bouton `Comparer`

Les résultats de la comparaison sont affichés sur la même page.

## 📦 Installation

1. **Cloner le dépôt** :

   ```bash
   git clone https://github.com/Zahra0706/comparer-deux-fichiers-excel.git
   cd comparer-deux-fichiers-excel

2. **Installer les dépendances avec Composer** :

   ```bash
   composer install

3. **Structure du projet** :

   📂 votre-projet/<br>
    ├── compare_deux_fichiers_excel.php<br>
    ├── style.css<br>
    ├── PhpSpreadsheet-master/<br>
    ├── vendor/            # généré par Composer<br>
    ├── composer.json<br>
    ├── composer.lock<br>
    └── README.md<br>

