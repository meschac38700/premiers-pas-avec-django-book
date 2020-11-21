# 1. Introduction

Bienvenue dans *Premiers pas avec Django* où vous apprendrez par la pratique à créer des applications web professionnelles avec le framework web Django. Dans ce livre, nous créerons trois applications web progressivement complexes, en commençant par une simple application du style Hello World, en progressant vers une application Blog et en terminant avec une application de gestion d'évènements robuste touchant à la notion de formulaires, de comptes d'utilisateurs, de tests et bien plus.

À la fin de ce livre, vous vous sentirez en pleine confiance pour démarrer vos propres projets Django en utilisant les meilleures pratiques de devéloppement actuelles.

Django est un framework web gratuit et open-source écrit dans le célèbre langage de programmation Python et utilisé par des millions de programmeurs chaque année. Sa popularité est due à sa convivialité à la fois pour les programmeurs débutants et avancés : Django est suffisamment robuste pour être utilisé par les plus grands sites web du monde – [Instagram](https://instagram.com), [Udemy](https://udemy.com), [Coursera](https://coursera.org), [Pinterest](https://pinterest.com), [Bitbucket](https://bitbucket.org), [DropBox](https://dropbox.com), [Eventbrite](https://eventbrite.com) et [Disqus](https://disqus.com) – mais aussi suffisamment flexible pour être un bon choix pour les petites startups et pour le prototypage de projets personnels.

Ce livre est régulièrement mis à jour et utilise les dernières versions de Django (3.1) et Python (3.9). Il utilise également *Pipenv* pour gérer les packages Python et les environnements virtuels. Nous utiliserons tout au long de cet ouvrage les meilleures pratiques modernes des communautés Django, Python et de développement web, en particulier l'utilisation approfondie des tests.

## 1.1 Qu'est-ce que Django?

Django est ce qu'on appelle un framework web. De manière générale, un framework est un ensemble d'outils, un ensemble de librairies nous facilitant la création de quelque chose. Donc si l'on dit:

- *Framework CSS*, il s'agit d'un ensemble d'outils nous facilitant l'écriture de code CSS.
- *Framework JavaScript*, il s'agit d'un ensemble d'outils nous facilitant l'écriture de code JavaScript.
- *Framework web*, il s'agit d'un ensemble d'outils, d'un ensemble de librairies, nous facilitant la création d'applications web.

Django est donc une collection d'outils modulaires qui nous permettra de faire abstraction d'une grande partie des difficultés et des répétitions inhérentes au développement web. Par exemple, la plupart des sites web ont besoin des mêmes fonctionnalités de base: la possibilité de se connecter à une base de données, de gérer le routage des URLs de l'application, d'afficher des informations au niveau d'une page, de gérer correctement la sécurité, etc. Plutôt que de recréer tout cela à partir de zéro, les programmeurs ont créé au fil des années des frameworks web dans tous les principaux langages de programmation: [Django](https://www.djangoproject.com) et [Flask](https://palletsprojects.com/p/flask/) en Python, [Rails](https://rubyonrails.org/) en Ruby, [Laravel](https://laravel.com/) et [Symfony](https://symfony.com/) en PHP et [Express](https://expressjs.com/) en JavaScript parmi tant d'autres.

Django a hérité de l'approche «*batteries-included*» (*piles incluses*) de Python et inclut par défaut la prise en charge des tâches courantes du développement web:

- Le routage des URLs
- La gestion de templates
- La gestion de formulaires
- La prise en charge de plusieurs systèmes de gestion de base de données et un ORM (Object relational mapper)
- Une interface d'administration
- L'internationalisation (c'est-à-dire le support de plusieurs langues)
- La sécurité et bien plus encore.

Cette approche permet aux développeurs web de se concentrer sur ce qui rend leurs applications web uniques plutôt que d'avoir à réinventer la roue.

En revanche, plusieurs frameworks populaires -- notamment *Flask* en Python et *Express* en JavaScript -- adoptent une approche de « *microframework* ». Ils ne fournissent que le strict minimum requis pour une simple page web et laissent au développeur le soin d'installer et de configurer des packages tiers pour répliquer les fonctionnalités de base du site web. Cette approche offre plus de flexibilité au développeur mais peut laisser également le champ libre à des structures de projets difficilement maintenables (surtout lorsqu'il s'agit d'un développeur débutant) et ouvrir la porte à différents types de vulnérabilités de sécurité.

À ce jour, Django est en développement actif depuis plus de 15 ans, ce qui en fait un vétéran aux cheveux gris. Des millions de programmeurs ont déjà utilisé Django pour créer leurs sites web, ce qui est indéniablement une bonne chose. Le développement web est difficile. Cela n'a pas de sens de répéter le même code -- et les mêmes erreurs -- alors qu'une large communauté de développeurs brillants a déjà résolu ces problèmes pour nous.

Django reste en développement actif et a [un calendrier de sortie annuel](https://www.djangoproject.com/download/#supported-versions). La communauté Django ajoute constamment de nouvelles fonctionnalités et des améliorations de sécurité. Et surtout, il est écrit dans le très élégant et puissant langage de programmation Python. En bref, si vous souhaitez créer un site web professionel, Django est un excellent choix.

Pour terminer, sachez que Django est le framework web Python le plus populaire. Il existe d'autres frameworks web Python (comme [Pyramid](https://trypyramid.com/) et [TurboGears](https://www.turbogears.org/)) mais Django demeure depuis plusieurs années le plus utilisé au niveau de la communauté web Python. Grâce à ce livre, vous serez en mesure de faire maintenant partie de cette chaleureuse communauté.

### 1.1.1. Un framework MVC

Django est également un framework MVC, c'est-à-dire qu'il respecte l'architecture MVC (**M**odèle **V**ue **C**ontrôleur). Il s'agit d'un [patron de conception](https://fr.wikipedia.org/wiki/Patron_de_conception) (aussi appelé *design pattern*) qui va nous permettre de mieux structurer notre code, de mieux séparer les différentes parties (les données, la présentation et la logique).

1. Tout ce qui relève de *l'interaction avec la source de données* sera géré par le *modèle*. La source de données est généralement une base de données, mais cela aurait pu être également un fichier texte, un fichier Excel, etc.
2. La *vue* va se charger de *présenter/afficher les informations*.
3. Le contrôleur sera *le chef d'orchestre, le connecteur*. C'est le *contrôleur* qui va demander au *modèle* de récupérer des données depuis la base de données et ensuite demander à la *vue* de les afficher.

Dans le chapitre suivant, nous reviendrons un peu plus en détails sur le fonctionnement de l'architecture MVC. Ne vous inquiétez donc pas si cela à l'air flou à cette étape.

### 1.1.2. Ma fonctionnalité Django préférée

Personnellement, la fonctionnalité que j'aime le plus au niveau de Django c'est la rapidité avec laquelle il est possible de mettre sur pied une interface d'administration professionnelle. Je vous le montrerai dans un chapitre dédié. Ce sera fun!

### 1.1.3. Qui utilise Django?

Django est utilisé par un grand nombre de startups & grandes entreprises.

On peut lister entre autres:

- [Instagram](https://instagram.com/) qui est une application, un réseau social et un service de partage de photos et de vidéos.
- [Pinterest](https://pinterest.com/) qui est un site web mélangeant les concepts de réseautage social et de partage de photographies.
- [Eventbrite](https://eventbrite.com/) qui est un site web de gestion d'événements et de billetterie.
- [Disqus](https://disqus.com/) qui est un service web de discussion et de commentaires d'articles centralisé avec authentification unique.
- [Bitbucket](https://bitbucket.org/) qui est un service web d'hébergement et de gestion de développement logiciel utilisant les logiciels de gestion de versions Git et Mercurial.
- Le site officiel du navigateur web [Mozilla](https://mozilla.org/).

Comme vous pouvez le remarquer, Django n'est pas uniquement utilisé par de petites entreprises, c'est un framework utilisé pour concevoir des applications de grande envergure au même titre que [Ruby on Rails](https://rubyonrails.org/) et [Laravel](https://laravel.com/) qui sont respectivement des frameworks web Ruby et PHP.

## 1.2. Pourquoi ce livre?

J'ai écrit ce livre parce que même si Django est extrêmement bien documenté, il existe un manque criant de tutoriels en français adaptés aux débutants. Lorsque j'ai appris Django pour la première fois il y a des années, j'ai eu du mal à terminer le tutoriel sur les sondages présent au niveau du site officiel. Tout avait l'air tellement compliqué!

Avec plus d'expérience, je reconnais maintenant que les rédacteurs de la documentation de Django ont été confrontés à un choix difficile : ils pouvaient mettre l'accent sur la facilité d'utilisation de Django ou sa profondeur, mais pas les deux. Ils ont choisi la profondeur et aujourd'hui en tant que développeur professionnel, j'apprécie le choix, mais en tant que débutant, j'ai trouvé ce choix si… frustrant! Mon objectif avec ce livre est de combler ces lacunes et de montrer à quel point Django peut s'avérer très accessible aux débutants.

## 1.3. Formation vidéo

Certaines personnes préfèrent regarder des vidéos en lieu et place de lire. Si vous faites partie de ces personnes, vous serez heureux de savoir que tout le contenu dont regorge cet ouvrage est également disponible au format vidéo.

Chacune des vidéos dure moins de 30 minutes afin de vous permettre de mieux assimiler les différentes notions abordées dans ladite vidéo.

La formation est disponible à seulement *89$* via ce lien: [https://parlonscode.com/premiers-pas-avec-django](https://parlonscode.com/premiers-pas-avec-django).

## 1.4. Prérequis

Des connaissances de base en Python, HTML et CSS sont requises afin de mieux apprécier le contenu présenté dans ce livre. Une liste des ressources recommandées pour une étude plus approfondie de ces langages est présentée dans les sous-sections ci-dessous.

### 1.4.1. Python

Afin de profiter pleinement du contenu dont regorge ce bouquin, il vous faudra avoir des connaissances de base en Python.

Si vous n'avez jamais programmé en Python mais que vous avez déjà de l'expérience en programmation, vous pouvez regarder ma vidéo [Python en une vidéo](https://www.youtube.com/) dans laquelle je vous montre tout ce qu'il y a à savoir sur le langage Python en une seule vidéo. Le contenu présenté dans ladite vidéo suffira largement pour comprendre tout ce qui sera expliqué dans ce livre.

Si par contre vous êtes débutant en programmation, je vous recommanderai vivement de suivre dans un premier temps ma série de vidéos [Python Niveau Débutant](https://www.youtube.com/), parfaite pour les personnes qui n'ont jamais eu à faire de programmation auparavant. Grâce à cette série, vous saurez ce qu'est une variable, une fonction, une condition, une boucle, un module, un package, etc.

Vous pourrez ensuite passer à ma série [La Programmation Orientée Objet en Python](https://www.youtube.com/playlist?list=PLlxQJeQRaKDSB3VOLR8s0vEMHfvUzgqfW), qui vous permettra quant à elle de mieux comprendre le concept de programmation orientée objet en Python. Nous utiliserons abusivement ce concept dès le troisième chapitre, voyez donc cela comme un investissement pour le futur et ne cherchez surtout pas à bruler les étapes sinon vous risquez au contraire de vous brûler les ailes. Prenez ainsi tout le temps qu'il vous faudra et faites-moi signe lorsque vous aurez terminé. Je serai là à vous attendre. Bonne chance!

### 1.4.2. HTML/CSS

Les langages HTML et CSS sont les fondamentaux du web. Tous les sites web que vous trouverez sur la toile utilisent obligatoirement ces deux langages que ce soit de manière directe ou indirecte.

Si vous n'avez aucune idée de ce qu'est HTML ou encore CSS, je vous recommanderai vivement de visionner mes vidéos [HTML 5 en une vidéo](https://www.youtube.com/) et [CSS 3 en une vidéo](https://www.youtube.com/) dans lesquelles je vous montre respectivement tout ce qu'il y a à savoir sur le langage HTML et le langage CSS en une seule vidéo. Le contenu dont regorge ces vidéos suffira largement pour les notions abordées dans ce livre.

### 1.4.3. Git

Git est ce qu'on appelle un logiciel de gestion de versions. Il permet de tracker les différents changements apportés à votre code source. Vous pourrez par exemple en cas de problème sur une version X de votre site, revenir à une version précédente (disons X-1, jugée stable), le temps de corriger le bug sur la version X. Pour suivre ce livre, vous n'avez pas besoin d'être un expert Git, d'autant plus que je n'en suis pas un. Il vous faudra juste connaître quelques commandes de base et cela fera l'affaire. Nous utiliserons Git principalement pour versionner notre code source et lors du déploiement (c'est-à-dire lors de la mise en ligne de nos applications web). Si c'est la première fois que vous entendez parler de Git, je vous inviterai à regarder ma vidéo [Git en une vidéo](https://www.youtube.com/watch?v=zNxGgI6O5NE&list=PLlxQJeQRaKDRBd_FazeI7gLq5wyrt7f7J).

### 1.4.4. Un environnement de développement opérationnel

Pour ceux d'entre vous qui sont toujours là, je vais également supposer que vous avez déjà un environnement de développement opérationnel. Cela devrait normalement être le cas si vous avez déjà eu à écrire ne serait-ce que deux (2) ou trois (3) programmes en Python. [Le chapitre 2](#chapter-2) présente toutefois la procédure d'installation de l'interpréteur Python au niveau de Windows, Linux et macOS afin d'être sûr que nous soyons sur la même longueur d'onde.

Dans ce livre, j'utiliserai comme éditeur de code [Sublime Text 3](https://www.sublimetext.com/3), mais sentez-vous libre d'utiliser le logiciel (Editeur de code ou Environnement de développement intégré) avec lequel vous vous sentez le plus confortable: [PyCharm](https://www.jetbrains.com/pycharm/), [Visual Studio Code](https://code.visualstudio.com/), [Spyder](https://www.spyder-ide.org/), [PyDev](https://www.pydev.org/) ou même [Vim](https://www.vim.org/) en console suffirait pour les pros que vous êtes.

Mon choix s'est porté sur *Sublime Text* pour deux raisons:

1. Premièrement parce que c'est l'éditeur de code avec lequel je suis le plus familier.
2. Deuxièmement, parce qu'il dispose d'une interface assez simple à appréhender et qui suffira largement pour les différentes applications que nous aurons à concevoir.

## 1.5. Structure du livre

Nous commençons par expliquer comment correctement configurer un environnement de développement local au [Chapitre 2](#chapter-2). Nous utilisons des outils de pointe dans ce livre: la version la plus récente de Django (3.0), Python (3.9) et [Pipenv](https://pipenv-fork.readthedocs.io/en/latest/) pour gérer nos environnements virtuels. Nous présentons également la ligne de commandes et discutons de la façon de travailler avec un éditeur de code moderne.

Au [Chapitre 3](#chapter-3), nous construisons notre premier projet, une application Hello World minimale qui montre comment configurer de nouveaux projets Django. Parce qu'il est important d'établir de bonnes pratiques logicielles, nous allons également enregistrer notre travail avec Git et téléverser une copie dans un référentiel de code distant sur [GitHub](https://github.com/). Nous terminons en déployant notre application sur [Heroku](https://www.heroku.com/), qui dispose d'un plan gratuit que nous utiliserons tout au long de ce livre. Les solutions Paas (Plate-forme en tant que service) comme Heroku transforme le processus douloureux et long de déploiement en quelque chose qui ne prend que quelques clics de souris et quelques commandes.

Dans le [Chapitre 4](#chapter-4), nous construisons notre premier projet dialoguant avec une base de données, une application Blog. Django fournit un ORM puissant qui nous permet d'écrire du code Python concis pour dialoguer avec notre base de données. Nous allons explorer l'application d'administration intégrée qui fournit un moyen graphique d'interagir avec nos données et peut même être utilisée comme un système de gestion de contenu (CMS) similaire à [Wordpress](https://fr.wordpress.com/). Cette application présente également le concept de vues basées sur les classes (Class-based views). Les vues basées sur les classes sont assez puissantes tout en nécessitant une quantité minimale de code. Nous ajoutons également nos premiers tests, stockons une copie à distance de notre code source sur GitHub et déployons notre application sur Heroku.

Dans le [Chapitre 5](#chapter-5), nous sommes fin prêts pour entamer notre projet final : une application de gestion d'évènements robuste qui implémente les fonctionnalités CRUD (Create-Read-UpdateDelete). En utilisant les vues génériques basées sur les classes de Django, nous n'avons qu'à écrire une petite quantité de code réel pour cela. Ce sera le moment d'introduire également la gestion de formulaires et la validation de données avec Django.

Au cours des [Chapitres 6-8](#chapter-6), nous améliorons notre application de gestion d'évènements en introduisant la notion de modèle utilisateur personnalisé dans le [Chapitre 6](#chapter-6), une meilleure pratique Django qui est rarement abordée dans les tutoriels. Le [Chapitre 7](#chapter-7) couvre l'authentification des utilisateurs en utilisant le système d'authentification utilisateur intégré de Django pour les fonctionnalités d'inscription, de connexion et de déconnexion. Le [Chapitre 8](#chapter-8) ajoute le framework CSS Bootstrap pour la stylisation et les [Chapitres 9-10](#chapter-9) implémentent la réinitialisation et la modification du mot de passe par e-mail. Avec les [Chapitres 11-12](#chapter-11), nous ajoutons la possibilité de s'inscrire aux évènements et un système de commentaires à notre projet, ainsi que les permissions et autorisations appropriées. Nous apprenons même quelques astuces pour personnaliser l'interface d'administration pour afficher notre quantité de données croissante.

La [Conclusion](#conclusion) revient sur les principaux concepts introduits dans le livre et une liste de ressources recommandées pour un apprentissage ultérieur.

Bien que vous puissiez choisir les chapitres à lire dans un ordre quelconque, sachez qu'il y a eu beaucoup de reflexion derrière la structure finale du livre. Chaque application/chapitre introduit un nouveau concept et renforce les enseignements passés. Je vous recommande donc fortement de lire
le livre dans l'ordre, même si vous avez hâte de sauter. Les chapitres suivants ne couvriront pas le matériel précédent dans la même profondeur que les chapitres précédents.

À la fin de ce livre, vous aurez une solide compréhension du fonctionnement de Django, la capacité de créer des applications par vous-même et du contexte nécessaire pour tirer pleinement parti des ressources supplémentaires pour l'apprentissage des techniques Django intermédiaires et avancées.

## 1.6. Conventions

Il existe de nombreux exemples de code dans ce livre, qui sont présentés comme suit:

```python
# Ceci est un code Python
print('Hello, Django')
```

Par souci de concision, nous utiliserons les points de suspension "`...`" pour désigner le code existant qui reste inchangé, par exemple, dans une fonction que nous mettons à jour.

```python
def index(request):
    ...
    return render(request, 'home.html', {'posts': posts})
```

Nous utiliserons également fréquemment la ligne de commande (à partir du [Chapitre 2: Installation des logiciels et outils de développement](#chapter-2)) pour exécuter des commandes, qui prennent la forme d'un préfixe `$` dans le style Unix traditionnel.

```console
$ echo "Hello, Django"
```

Le résultat de cette commande particulière sera présenté sous la forme suivante:

```console
Hello, Django
```

Nous combinerons généralement une commande et sa sortie. La commande sera toujours précédée d'un `$` et la sortie ne le sera pas. Par exemple, la commande et le résultat ci-dessus seront représentés comme suit :

```console
$ echo "Hello, Django"
Hello, Django
```

## 1.7. Codes sources

Les codes sources des différents exemples proposés dans ce livre sont disponibles sur Github à cette adresse [https://github.com/parlonscode/premiers-pas-avec-django](https://github.com/parlonscode/premiers-pas-avec-django).

N'hésitez surtout pas à les explorer, les commenter et les améliorer via Github!

## 1.8. Corrections et suggestions

Nul n'est parfait, surtout lorsqu'il s'agit d'écrire un document technique. Si vous trouvez des fautes d'orthographe ou de grammaire, des erreurs de programmation etc, je vous prie de bien vouloir me le notifier par mail. Si l'erreur s'avère verifiée, une modification sera apportée au document afin de corriger ladite erreur. 

Mon adresse e-mail personnelle: [honore@parlonscode.com](mailto:honore@parlonscode.com).

Merci.

## 1.9. Résumé

Dans ce premier chapitre, nous avons appris que:

- Django est le framework web Python le plus populaire.
- Un framework est un ensemble d'outils/librairies nous facilitant la création de quelque chose.
- Un framework web est un ensemble d'outils/librairies nous facilitant la conception d'applications web.
- Django utilise le patron de conception MVC.
- L'architecture MVC nous permet d'avoir un code bien structuré, donc facilement maintenable et extensible.
- Django n'est pas uniquement utilisé par de petites entreprises, c'est un framework utilisé pour concevoir des applications de grande envergure au même titre que Ruby on Rails ou encore Laravel.
- Django est un excellent choix pour tout développeur qui souhaite créer des applications web modernes et robustes avec une quantité minimale de code. Il est populaire, en développement actif et minutieusement testé par les plus grands sites web au monde.
- Il faut avoir des connaissances de base en Python, HTML et CSS pour utiliser Django.

Dans le chapitre suivant, nous allons apprendre à configurer n'importe quel ordinateur pour un développement Django propice.
