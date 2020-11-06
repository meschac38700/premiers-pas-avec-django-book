# 4. Application 2: Hello City Pro

*Une version améliorée de notre application Hello City*

## 5.1. Pipenv

## 5.2. Une application static_pages

### 5.2.1. Projet vs Applications

Il y a une élément très important que je vous ai caché jusque-là. Comme vous l'imaginez probablement, je l'ai fais afin de ne pas compliquer les choses.

Maintenant que vous êtes des pros Django, je me sens plus à l'aise à vous dévoiler ce secret :). Ce que vous devez savoir c'est que Django fait la distinction entre la notion de **projet** et la notion **d'applications**. Ce que nous avons eu à créer en utilisant la commande `django-admin startproject` est appelé en Django *un projet*. Mais un projet peut contenir un ensemble d'applications. Voyez une application comme un moyen structurée de regrouper chacune des fonctionnalités de votre projet: un blog, un forum, un système de commentaires, etc. L'avantage d'avoir des applications réside dans le fait que vous pourrez les réutiliser dans différents projets.

Tentons de récapituler. Si au niveau d'un *projet A*, vous avez besoin d'un *blog*, vous allez créer une application *blog*. Si quelques mois plus tard, vous travaillez sur un autre *projet B* et qu'au niveau ce projet également vous avez besoin d'un *blog*, vous pourrez en lieu et place réinventer la roue, réutiliser l'application *blog* du projet A tout en la modifiant légèrement afin de l'adapter aux besoins du projet B.

### 5.2.2. Une application static_pages

Afin d'avoir un code mieux structuré et beaucoup plus réutilisable, nous allons créé une application `static_pages` qui nous permettra de gérer l'ensemble des pages statiques de notre projet.

Ouvrez donc sans plus tard un nouvel onglet au niveau de votre terminal afin de ne pas avoir à couper le serveur Web de développement que nous avons et à démarrer précédemment et déplacez vous par la suite à la racine de votre projet (c'est-à-dire le dossier où se trouve le fichier `manage.py`).

Une fois à la racine du projet, exécutez la commande suivante:

```console
(hello-city-venv)$ python manage.py startapp static_pages
```

Vous devriez normalement trouver un nouveau dossier  `static_pages` à la racine du projet représentant l'application `static_pages` nouvellement créée.

Avouez que c'est simple! Pour créer un projet, on utilise la commande `django-admin startproject` et pour créer une application on utilise la commande `python manage.py startapp`.

```bash
.
├── db.sqlite3
├── hello_city
│   ├── __init__.py
│   ├── __pycache__
│   ├── asgi.py
│   ├── settings.py
│   ├── urls.py
│   ├── views.py
│   └── wsgi.py
├── manage.py
├── static_pages # <--- Notre première application static_pages
│   ├── __init__.py
│   ├── admin.py
│   ├── apps.py
│   ├── migrations
│   │   └── __init__.py
│   ├── models.py
│   ├── tests.py
│   └── views.py
└── templates
    └── pages
        ├── about.html
        └── home.html
```

### 5.2.3. Structure d'une application Django

Une application Django n'est rien d'autre qu'un package Python contenant les fichiers et dossiers suivants:

- `admin.py`: Ce fichier va nous permettre de gérer la partie administration de notre application. Nous y reviendrons lorsqu'on parlera de l'administration d'un projet Django. Il s'agit de mon feature préféré de Django.
- `apps.py`: Ce fichier va nous permettre de configurer notre application. Le code présent par défaut permet de configurer le nom de notre application.
- `migrations`: Ce package va contenir l'ensemble des migrations de cette application. Pour faire simple, voyez les migrations comme un moyen de versionner les différents changements apportés à votre base de données. Nous y reviendrons dans le chapitre suivant.
- `models.py`: Ce fichier va contenir l'ensemble des modèles de cette application.
- `tests.py`: Ce fichier va contenir l'ensemble des tests de cette application. Nous parlerons brièvement de la notion de tests dans la section *3.10.* de ce chapitre.
- `views.py`: Ce fichier va contenir l'ensemble des vues de cette application. On peut voir que dans le code de départ qui est présent dans ce fichier, la fonction `render` a déjà été importée pour nous, car Django sait que nous allons probablement l'utiliser afin de retourner des templates au niveau de nos vues.

### 5.2.4. Restructuration de notre projet 

Commencez par supprimer le fichier `views.py` se trouvant dans le package `hello_city` et le dossier `templates` présent à la racine de notre projet. Toutes les pages statiques seront gérées par l'application `static_pages`. Nous l'avons créée pour qu'elle puisse servir à quelque chose n'est-ce pas?

La structure de votre projet devrait ressembler à ceci:

```bash
.
├── db.sqlite3
├── hello_city
│   ├── __init__.py
│   ├── __pycache__
│   ├── asgi.py
│   ├── settings.py
│   ├── urls.py
│   └── wsgi.py
├── manage.py
├── static_pages
│   ├── __init__.py
│   ├── admin.py
│   ├── apps.py
│   ├── migrations
│   │   └── __init__.py
│   ├── models.py
│   ├── tests.py
│   └── views.py
└── templates
    └── pages
        ├── about.html
        └── home.html
```

Ouvrez ensuite le fichier `urls.py` présent au niveau du package `hello_city`. Modifiez son contenu pour qu'il puisse ressembler à ceci:

```python
from django.contrib import admin
from django.urls import include, path # <--- remarquez qu'on importe aussi include

urlpatterns = [
    path('', include('static_pages.urls')), # <--- 
    path('admin/', admin.site.urls),
]
```

Expliquer include sert à quoi..

À ce stade erreur: ModuleNotFoundError: No module named 'static_pages.urls' 

créer le module urls.py dans notre application:

rajoutez

```python
from django.urls import path

from . import views

urlpatterns = [
    path('', views.home),
    path('about/', views.about),
]
```

expliquer le point sert à quoi. (maybe montrer avant qu'on aurait pu remplacer le hello_city par un point, ce sera donc plus simple rendu à cette étape)

créer ensuite un dossier templates dans notre app.

indiquer que par défaut django cherche automatiquement les templates dans les app `('APP_DIRS': True)`

refresh browser, ne marche pas car nous n'avons pas register notre app, donc django n'a aucune idée qu'elle existe.

go dans settings, INSTALLED\_APPS, rajouter en haut, `static_pages.apps.StaticPagesConfig`, 

refresh et bang tout marche!

montrer si on mettait, `path('pages/', include('static_pages.urls'))`, puis `path('home/', views.home)`, et `path('about/', views.about)`, ce que ça allait faire et expliquer.

montrer ensuite qu'à cause de cela on a plus de pages d'accueil. revenir à ce qu'on avait précédemment.

## 5.3. Une navigation beaucoup plus flexible

## 5.4. Ajout de fichiers statiques

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente culpa quos ratione delectus tenetur nisi animi ullam, sit excepturi saepe dignissimos iste aliquam eos maxime, est velit rerum id necessitatibus.

## 5.5. Nos premiers tests

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente culpa quos ratione delectus tenetur nisi animi ullam, sit excepturi saepe dignissimos iste aliquam eos maxime, est velit rerum id necessitatibus.

## 5.6. Déploiement avec Heroku

Avant de déployer votre application en production, vous devez parcourir la liste de contrôle de déploiement de Django afin de vous assurer que vos configurations sont convenables.

https://docs.djangoproject.com/en/3.0/howto/deployment/checklist/
./manage.py check --deploy

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente culpa quos ratione delectus tenetur nisi animi ullam, sit excepturi saepe dignissimos iste aliquam eos maxime, est velit rerum id necessitatibus.

## 5.7. Intégration Continue (CI)

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente culpa quos ratione delectus tenetur nisi animi ullam, sit excepturi saepe dignissimos iste aliquam eos maxime, est velit rerum id necessitatibus.

## 5.8. Class-based views

Et voilà l'avantage d'avoir des tests et de l'intégration continue.

## 5.9. Résumé

Dans ce quatrième chapitre, nous avons appris que:

- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi odit iure tempore repellat autem nihil quas mollitia tenetur iste quos, dolorum, porro sit. Architecto eum officiis, esse dignissimos deleniti ducimus!
