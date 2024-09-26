# 

# Rapport de projet : 

# Gestion de bibliothèque en PHP POO

# 1- Introduction :

Ce projet, réalisé dans le cadre de la "Semaine SAS", vise à initier les participants à la programmation orientée objet (POO) en PHP. L’objectif est de développer une application console pour gérer un système de bibliothèque, tout en mettant en pratique les principes fondamentaux de la POO. Cette application permet de gérer les livres, les auteurs, les lecteurs, ainsi que le suivi des emprunts. En plus de l'apprentissage de la POO, le projet inclut l'utilisation de fichiers JSON pour la persistance des données et explore les techniques de déploiement d’une application PHP..

# 2- Context de projet : 

Ce programme est conçu pour enseigner aux étudiants les bases du développement logiciel, en particulier la programmation orientée objet (POO). Le choix de la gestion d'une bibliothèque comme thème permet d'aborder des concepts concrets tels que la gestion du cycle de vie des objets (livres, auteurs, lecteurs) et leur interaction au sein du système. Les participants apprennent ainsi à appliquer des principes de POO, tels que l'encapsulation, l'héritage et les relations entre classes.

L'application propose des fonctionnalités essentielles comme l'ajout, la modification et la suppression de livres et de lecteurs, ainsi que la gestion des emprunts. La persistance des données est assurée via des fichiers JSON, et le projet inclut un déploiement en PHP pour offrir une meilleure compréhension de l'ensemble du cycle de développement et de mise en production.

.

# 3- Développement agile  : 

Le développement Agile est une approche flexible et itérative qui vise à fournir des versions fonctionnelles du logiciel de manière régulière, en répondant aux besoins changeants des utilisateurs. Dans ce chapitre, nous allons d’abord expliquer les principes fondamentaux de l’Agilité, ses avantages et ses limites. Ensuite, nous allons nous concentrer sur Scrum, l’une des méthodes Agile les plus populaires, en expliquant ses rôles clés, ses événements, ses artefacts et les bonnes pratiques pour réussir un projet Scrum.

![Enter image alt description](https://d3gf5wsgt7m4.cloudfront.net/FREE_LICENSE/ypK_Image_1.png)


# 4- Processus de développement  : ( 2TUP )

Le processus 2TUP ( 2 Track Unified Process ) est une méthodologie de développement logiciel qui s'appuie sur le Processus Unifié. Il débute par une étude préliminaire qui inclut :

- L'identification des acteurs interagissant avec le système à développer.

- L'élaboration d'un cahier des charges.

- La modélisation du contexte.

Le processus se décompose ensuite en trois phases essentielles :

1. **Branche fonctionnelle** : Cette phase consiste à modéliser et à créer des maquettes pour clarifier les besoins fonctionnels.

2. **Branche technique** : Elle recense toutes les contraintes à respecter pour réaliser le système et définit les composants nécessaires à la construction de l'architecture technique.

3. **Phase de réalisation** : Cette étape intègre les deux branches, permettant de concevoir l'application et de livrer une solution adaptée aux besoins identifiés. Elle se conclut par une étape de codage suivie d'une phase de recette, visant à valider les fonctionnalités du système développé.

![Enter image alt description](https://d3gf5wsgt7m4.cloudfront.net/FREE_LICENSE/6di_Image_2.png)

# 5- Planification : 

Dans le cadre de notre projet, nous avons mis en place un tableau de gestion pour organiser les différentes tâches à réaliser. Ce tableau, structuré par jour de la semaine, a permis de suivre l'avancement des activités de manière efficace. ce qui facilite la priorisation et la répartition des efforts tout au long du projet. Cette approche méthodique a été cruciale pour garantir le respect des délais et la bonne exécution des différentes étapes du projet.

## Tableau de Gestion des tâches :

| Vendredi | — | OOP | OOP |
|---|---|---|---|
| Mercredi | Autoformation | Veille | Autoformation |
| Jeudi | Autoformation | veille | Analyse/Conception |
| Vendredi | Autoformation | Prototype | logo/groupe name/veille list
 |
| Lundi | Prototype | Prototype | Prototype |
| Mardi | Deployment | Deployment | Deployment |
| Mercredi | Réalisation | Réalisation | Réalisation |
| Jeudi | Réalisation | Réalisation | Réalisation |
| Vendredi | Réalisation | Réalisation | Réalisation |

# 5- Branche fonctionnelle : 

Ce chapitre se concentre sur la branche fonctionnelle, essentielle dans le développement logiciel, où l'analyse des besoins et les cas d'utilisation jouent un rôle clé. L'objectif est de comprendre comment un système doit fonctionner pour répondre aux attentes des utilisateurs. En identifiant les acteurs, leurs objectifs et les interactions avec le système, nous pouvons définir clairement les fonctionnalités nécessaires. Cette approche permet de s'assurer que le produit final est en adéquation avec les besoins réels des utilisateurs, constituant ainsi une étape fondamentale dans le processus de développement.

## cas d'utilisation :

![Enter image alt description](https://d3gf5wsgt7m4.cloudfront.net/FREE_LICENSE/OkR_Image_3.png)

# 6- Branche technique : 

La branche technique est essentielle pour la mise en œuvre des fonctionnalités définies lors de l'analyse fonctionnelle. Elle comprend l'analyse technique, où nous avons évalué les connaissances requises pour le projet et entrepris une autoformation afin de maîtriser les compétences nécessaires. Ce chapitre aborde également le prototype, qui permet de valider les choix techniques avant la réalisation complète du système. En explorant les langages de programmation, les frameworks et l'architecture logicielle, nous poserons les bases pour transformer les spécifications fonctionnelles en une solution opérationnelle, tout en garantissant performance et sécurité.

## -analyse technique :

L'analyse technique constitue une étape clé dans le développement de notre projet, où nous avons exploré les concepts fondamentaux de la programmation orientée objet (POO). Nous avons examiné l'encapsulation, l'héritage et le polymorphisme, ainsi que les relations entre objets, ce qui nous a permis de structurer efficacement notre code. La sérialisation en PHP a également été abordée, facilitant la gestion des données. En parallèle, nous avons développé une application console en PHP pour appliquer ces concepts dans un contexte pratique. Cette phase d'analyse a été renforcée par une autoformation visant à acquérir les connaissances requises pour le déploiement et l'implémentation du système. Ainsi, cette démarche nous a permis de poser des bases solides pour la réalisation du prototype.

## -prototype :

Dans le cadre de notre projet, nous avons réalisé un prototype d'application de gestion de livres qui permet à un utilisateur, en l'occurrence l'administrateur, d'effectuer plusieurs opérations essentielles. Ce programme offre des fonctionnalités permettant d'afficher la liste des livres disponibles et d'ajouter de nouveaux livres à la base de données. L'interface utilisateur est conçue pour être intuitive, facilitant ainsi la navigation et l'interaction. En utilisant une architecture orientée objet, le prototype garantit une séparation claire des préoccupations entre les différentes couches de l'application, notamment la gestion des données, la présentation des informations et les opérations de service. Ce prototype constitue une base solide pour le développement futur d'un système de gestion de bibliothèque complet, intégrant des fonctionnalités supplémentaires telles que la gestion des emprunts et des lecteurs.

![Enter image alt description](https://d3gf5wsgt7m4.cloudfront.net/FREE_LICENSE/n19_Image_4.png)

cas d’utilisation prototype

# 7-Conception :

Le chapitre de conception est essentiel pour transformer les exigences fonctionnelles et techniques en une architecture claire. Nous avons identifié les classes, leurs attributs, leurs méthodes et leurs relations, établissant ainsi une structure solide pour le système. En utilisant des diagrammes de classes, nous avons pu visualiser les interactions entre les différents composants, garantissant la qualité et la maintenabilité du logiciel, tout en facilitant les étapes de développement et de déploiement à venir.

- diagramme de class :

![Enter image alt description](https://d3gf5wsgt7m4.cloudfront.net/FREE_LICENSE/kQO_Image_5.png)

# 8-Réalisation :

Dans la phase de réalisation de notre projet, nous avons adopté une approche orientée objet (POO) pour concevoir une application de gestion de bibliothèque. En utilisant une architecture 3 tiers, nous avons séparé les responsabilités entre la couche de présentation, la couche métier et la couche d'accès aux données, ce qui a permis une meilleure maintenabilité et évolutivité de notre système. Pour l'analyse, nous avons utilisé l'extension PlantUML afin de créer des diagrammes d'utilisation qui illustrent les interactions des utilisateurs avec le système. De plus, pour la conception, nous avons employé l'outil Mermaid, qui nous a permis de générer des diagrammes de classe, facilitant ainsi la visualisation des relations entre les différentes entités. Nous avons également utilisé une extension dédiée pour simplifier la création de méthodes getter et setter, garantissant ainsi une encapsulation efficace des données au sein de nos classes.

# 9-Conclusion : 

En conclusion, notre projet de gestion de bibliothèque a permis de développer une application fonctionnelle et intuitive, intégrant les principes de la programmation orientée objet et une architecture 3 tiers. Au cours de ce projet, nous avons mis en œuvre des outils et des techniques modernes, tels que PlantUML et Mermaid, pour visualiser et concevoir notre système de manière efficace. Le prototype que nous avons réalisé démontre notre capacité à gérer les livres, en offrant des fonctionnalités clés telles que l'affichage et l'ajout de livres par l'administrateur.

Ce projet nous a également permis d'approfondir notre compréhension des concepts fondamentaux de la POO et d'améliorer nos compétences en développement logiciel. À l'avenir, nous envisageons d'étendre les fonctionnalités de l'application pour inclure la gestion des emprunts et des lecteurs, ainsi que d'autres améliorations visant à enrichir l'expérience utilisateur.

Globalement, ce projet représente une étape significative dans notre parcours d'apprentissage et illustre notre engagement à créer des solutions logicielles robustes et adaptées aux besoins des utilisateurs.
