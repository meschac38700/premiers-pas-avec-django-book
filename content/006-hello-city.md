# 3. Application 1: Hello City

Dans ce troisième chapitre, nous verrons comment créer notre premier projet web Django. Il s'agira d'une application web assez simple permettant d'afficher l'heure actuelle dans votre ville de résidence. À la fin de ce chapitre, les notions de vues, de templates, de routage d'URLs et de layouts n'auront plus aucun secret pour vous.

## 3.1. Présentation du projet

Il est maintenant temps de commencer les choses sérieuses. Dans ce chapitre, nous créerons notre premier projet Django: **Hello City**. Ce sera un petit projet du style _"Hello World"_ qui ressemblera à ceci:

![Projet Hello City: Page d'accueil](assets/images/ch03/final-application-homepage-deployed.png)

![Projet Hello City: À Propos](assets/images/ch03/final-application-about-deployed.png)

Comme vous pouvez le voir, notre projet sera composé de deux pages.

1. La page d'accueil affichera:

- Le drapeau de votre ville de résidence.
- Le message _"Hello from [NOM DE VOTRE VILLE DE RÉSIDENCE]"_.
- L'heure actuelle dans votre ville de résidence.
- Le copyright. Ex: _Copyright 2020_.
- Un lien vers la page _À Propos_.

2. La page _À Propos_ quant à elle affichera:

- Votre photo.
- Votre nom.
- Un lien vers la page d'accueil.
- Le copyright.

Parce qu'il est important dès le début d'établir de bonnes pratiques logicielles, nous allons également versionner notre travail avec Git et téléverser une copie dans un référentiel de code distant sur [GitHub](https://github.com). Nous terminons en déployant notre projet sur [Heroku](https://heroku.com), qui dispose d'un plan gratuit que nous utiliserons tout au long de ce livre. Les solutions Paas (Plate-forme en tant que service) comme Heroku transforme le processus douloureux et long de déploiement en quelque chose qui ne prend que quelques clics de souris et quelques commandes. Une fois votre projet déployé, vous pourrez ensuite le partager avec des ami(e)s ou des membres de votre famille afin de leur montrer le fabuleux travail que vous avez eu à effectuer.

Ce premier projet, bien que simple, nous permettra de toucher à plusieurs notions incontournables lorsque l'on fait du développement web, notamment:

- La création de vues;
- La création de templates;
- La navigation entre différentes pages;
- La gestion des layouts avec le moteur de templates Django (DTL: Django Template Language) et plein d'autres choses!

Alors prêt(e)? C'est parti!

## 3.2. Installation de Django

Dans cette section, nous allons procéder à l'installation de Django. Wouhou!

Juste pour que tout soit clair dans votre esprit, **Django n'a rien de magique!** Django n'est rien d'autre qu'une librairie Python. Nous pourrons donc l'installer très facilement via `pip`.

### 3.2.1. Environnements virtuels

Le projet _Hello City_ sur lequel nous allons travailler va dépendre de Django. Django sera donc **une dépendance** de notre projet.

Pour installer _Django_, nous pouvons donc normalement exécuter la commande suivante:

```bash
$ pip3 install Django
```

**Mais je vais vous demander de ne jamais procéder ainsi!**

En effet, si vous procédez de cette manière, Django sera installé globalement sur votre système.

<blockquote class="notice">
    <p><strong>Pas de panique!</strong><br>Si vous étiez trop pressé et que vous avez installé Django globalement sur votre système, il suffira d'exécuter la commande <code>pip3 uninstall Django</code> afin de le désinstaller.</p>
</blockquote>

Imaginons par exemple que vous avez deux (2) projets Django:

- `projet-django-1` qui dépend de la version `2.2` de Django;
- et `projet-django-2` qui dépend de la version `3.1` de Django.

Si vous installez Django globalement sur votre système, il sera difficile pour vous de naviguer entre ces deux projets.

- Le jour où vous souhaitez travailler sur le projet `projet-django-1`, il vous faudra désinstaller Django version `3.1` et installer Django version `2.2`.
- De la même manière, le jour où vous souhaitez travailler sur le projet `projet-django-2`, il vous faudra désinstaller Django version `2.2` et installer Django version `3.1`.

Si vous avez d'autres dépendances, le problème se complexifie.

[Pillow](https://pypi.org/project/Pillow/) est une librairie Python très populaire permettant de faire du traitement d'images.

Imaginez par exemple que:

- le projet `projet-django-1` dépende de Pillow version `5.0`;
- et que le projet `projet-django-2` dépende de Pillow version `6.2`.

Ça va très vite devenir un enfer!

Pour résoudre ce genre de problème, on utilise ce qu'on appelle des **environnements virtuels**.
Les environnements virtuels sont des environnements isolés au niveau desquels vous pourrez installer des versions spécifiques de vos librairies. Lorsque vous souhaitez utiliser des librairies installées dans un environnement virtuel donné, il vous suffira d'activer cet environnement virtuel. Et voilà!

![Environnements virtuels](assets/images/ch03/virtual-envs.png)

Si nous souhaitons donc résoudre le problème précédent, nous n'aurons qu'à créer deux environnements virtuels:

- Un environnement virtuel pour le projet `projet-django-1` au niveau duquel nous installerons Django version `2.2` et Pillow version `5.0`. Nous l'appelerons `projet-django-1-venv`.
- Un environnement virtuel pour le projet `projet-django-2` au niveau duquel nous installerons Django version `3.1` et Pillow version `6.2`. Nous l'appelerons `projet-django-2-venv`.

Tout est maintenant simple!

- Le jour où nous souhaitons travailler sur le `projet projet-django-1`, nous n'aurons qu'à activer l'environnement `projet-django-1-venv` et automatiquement Django version `2.2` et Pillow version `5.0` seront disponibles.
- Le jour où nous souhaitons travailler sur le projet `projet-django-2`, nous n'aurons qu'à activer l'environnement `projet-django-2-venv` et automatiquement Django version `3.1` et Pillow version `6.2` seront disponibles.

Aucun conflit! Génial!

<blockquote class="notice">
    <p><strong>Note:</strong> Vous pouvez nommer vos environnements virtuels comme bon vous semble, mais généralement il est recommandé de choisir des noms significatifs afin de pouvoir se retrouver un peu plus facilement plus tard.</p>
</blockquote>

### 3.2.2. Création d'un environnement virtuel

Maintenant que vous avez connaissance de l'utilité des environnements virtuels, créons un environnement virtuel pour notre projet _Hello City_. Nous l'appelerons `hello-city-venv`.

Il va falloir dans un premier temps se déplacer dans le dossier dans lequel nous souhaitons créer notre environnement virtuel. Ouvrez donc la ligne de commande et tapez la commande `cd` suivie du chemin menant à votre dossier.

```bash
$ cd /Users/freedev/Code/PremiersPasAvecDjango
```

<blockquote class="notice">
    <p><strong>Astuce:</strong> Comme nous l'avons vu dans le chapitre précédent, vous pouvez simplement taper <code>cd</code> et faire ensuite un glisser-déposer de votre dossier dans la ligne de commande, le chemin sera généré automatiquement pour vous.</p>
</blockquote>

<blockquote class="notice">
    <p><strong>Note:</strong> Sous Windows, le chemin ressemblera à quelque chose comme: <code>C:\Users\freedev\Code\PremiersPasAvecDjango</code>.</p>
</blockquote>

Dans mon cas, tous les projets créés dans ce livre se trouveront dans le dossier:

```bash
/Users/freedev/Code/PremiersPasAvecDjango
```

Une fois dans ce dossier, il suffit d'utiliser la commande `python` comme suit afin de créer l'environnement virtuel:

#### Sous Windows

```bash
$ python -m venv hello-city-venv
```

#### Sous macOS

```bash
$ python3 -m venv hello-city-venv
```

#### Sous Linux

```bash
$ python3.9 -m venv hello-city-venv
```

<blockquote class="notice">
    <p><strong>Note:</strong> Je vais dans le reste du livre utiliser la commande <code>python3</code> pour faire référence à <code>python</code> (vu que j'utilise un Mac), mais il vous faudra remplacer <code>python3</code> par l'exécutable approprié en fonction de votre système d'exploitation (<code>python</code> sous Windows, <code>python3</code> sous macOS et <code>python3.9</code> sous Linux).</p>
</blockquote>

```bash
$ python3 -m venv hello-city-venv
```

1. L'option `-m` permet d'exécuter un module Python comme un script. En d'autres termes, ici on indique que l'on souhaite exécuter un module python nommé `venv`. Ce module `venv` permet de faire plein de choses, entre autres créer des environnements virtuels.

2. Nous demandons donc à `python3` de charger le module `venv` afin de nous créer un environnement virtuel nommé `hello-city-venv`. Nous aurions pu appeler notre environnement virtuel n'importe comment (par exemple `projet-hello-city-venv`). Par contre, le module spécifié après l'option `-m` doit obligatoirement être `venv`, étant donné que nous souhaitons utiliser le module `venv` pour la création de notre environnement virtuel.

<blockquote class="notice">
    <p><strong>Note:</strong> Le module <code>venv</code> est un module présent au niveau de la librairie standard de Python: <a href="https://docs.python.org/3/library/venv.html">https://docs.python.org/3/library/venv.html</a>. Auparavant pour créer des environnements virtuels, on utilisait des librairies comme <code>virtualenv</code> mais aujourd'hui ce n'est plus vraiment nécessaire. D'autres développeurs continuent toutefois d'utiliser <code>virtualenv</code> pour question de familiarité.</p>
</blockquote>

Notre environnement `hello-city-venv` devrait avoir été créé. On peut le prouver en exécutant la commande `ls`.

```bash
$ ls
hello-city-venv
```

### 3.2.3. Activation de l'environnement virtuel

Maintenant que l'environnement virtuel `hello-city-venv` est créé, il va falloir l'activer avant de pouvoir l'utiliser.

### Activation sous Windows

```bash
$ hello-city-venv\Scripts\activate.bat
(hello-city-venv) $
```

ou

```bash
$ hello-city-venv\Scripts\activate
(hello-city-venv) $
```

### Activation sous macOS ou Linux

```bash
$ source hello-city-venv/bin/activate
(hello-city-venv)$
```

Comme vous pouvez le voir, pour activer notre environnement virtuel `hello-city-venv` , nous ne faisons qu'exécuter un script `activate.bat` (sous Windows) ou `activate` (sous macOS/Linux) présent dans le sous-dossier `Scripts` (sous Windows) ou `bin` (sous macOS/Linux) du dossier `hello-city-venv` représentant notre environnement virtuel.

<blockquote class="notice">
    <p><strong>Comment désactiver l'environnement virtuel?</strong><br>Pour désactiver l'environnement virtuel courant, il suffit de taper la commande <code>deactivate</code> (c'est <code>deactivate</code> et non <strike><code>desactivate<code></strike>). C'est la même commande que vous soyez sous Windows, macOS ou Linux.</p>
</blockquote>

Le texte `(hello-city-venv)` présent au tout début de l'invite de commande permet d'indiquer que votre environnement virtuel `hello-city-venv` est bel et bien activé. Si vous utilisez la commande `deactivate` (ou que vous fermez la console ou que vous éteignez votre ordinateur), votre environnement virtuel `hello-city-venv` sera désactivé et le texte `(hello-city-venv)` ne se plus présent au tout début de l'invite de commandes. Il vous faudra donc activer l'environnement virtuel de nouveau si vous souhaitez l'utiliser.

### 3.2.4. Versions de Python et de pip à l'intérieur de l'environnement virtuel

Vu que notre environnement virtuel a été créé avec la version `3.9` de Python, Python sait que nous souhaitons utiliser la version `3.9` à l'intérieur de notre environnement virtuel. Ainsi, lorsque l'environnement virtuel `hello-city-venv` est activé, taper `python` correspond à la même chose que taper `python3` ou `python3.9`. **Très important, ceci n'est vrai que si l'environnement est activé!**

```bash
(hello-city-venv)$ python -V
Python 3.9.0
(hello-city-venv)$ python3 -V
Python 3.9.0
(hello-city-venv)$ python3.9 -V
Python 3.9.0
(hello-city-venv)$ deactivate
$ python -V
Python 2.7.18
```

Il en est de même pour `pip`. Vu que notre environnement virtuel a été créé avec la version `3.9` de Python, Python sait que nous souhaitons utiliser l'exécutable de `pip` associé à la version `3.9` de Python à l'intérieur de notre environnement virtuel. Ainsi, lorsque l'environnement virtuel `hello-city-venv` est activé, taper `pip` correspond à la même chose que taper `pip3` ou `pip3.9`.

```bash
(hello-city-venv)$ pip -V
pip 20.2.3 from /Users/freedev/Code/PremiersPasAvecDjango/hello-city-venv/lib/python3.9/site-packages/pip (python 3.9)
(hello-city-venv)$ pip3 -V
pip 20.2.3 from /Users/freedev/Code/PremiersPasAvecDjango/hello-city-venv/lib/python3.9/site-packages/pip (python 3.9)
(hello-city-venv)$ pip3.9 -V
pip 20.2.3 from /Users/freedev/Code/PremiersPasAvecDjango/hello-city-venv/lib/python3.9/site-packages/pip (python 3.9)
(hello-city-venv)$ deactivate
$ pip -V
pip 20.0.2 from /Library/Frameworks/Python.framework/Versions/2.7/lib/python2.7/site-packages/pip (python 2.7)
```

### 3.2.5. Installation de Django

Maintenant que notre environnement virtuel `hello-city-venv` a été créé et activé, nous pouvons procéder à l'installation de Django. Une fois installé, Django sera disponible uniquement dans cet environnement virtuel. Il faudra donc activer notre environnement virtuel `hello-city-venv` à chaque fois que nous souhaitons utiliser Django.

Pour installer la dernière version en date de Django, exécutez la commande suivante:

```bash
(hello-city-venv)$ pip install Django
```

Vous devriez voir quelque chose comme ceci s'afficher:

```bash
Collecting Django
  Downloading https://files.pythonhosted.org/packages/a9/4f/8a247eee2958529a6a805d38fbacd9764fd566462fa0016aa2a2947ab2a6/Django-3.0.5-py3-none-any.whl (7.5MB)
     |████████████████████████████████| 7.5MB 4.5MB/s
Collecting sqlparse>=0.2.2 (from Django)
  Using cached https://files.pythonhosted.org/packages/85/ee/6e821932f413a5c4b76be9c5936e313e4fc626b33f16e027866e1d60f588/sqlparse-0.3.1-py2.py3-none-any.whl
Collecting asgiref~=3.2 (from Django)
  Downloading https://files.pythonhosted.org/packages/68/00/25013f7310a56d17e1ab6fd885d5c1f216b7123b550d295c93f8e29d372a/asgiref-3.2.7-py2.py3-none-any.whl
Collecting pytz (from Django)
  Using cached https://files.pythonhosted.org/packages/e7/f9/f0b53f88060247251bf481fa6ea62cd0d25bf1b11a87888e53ce5b7c8ad2/pytz-2019.3-py2.py3-none-any.whl
Installing collected packages: sqlparse, asgiref, pytz, Django
Successfully installed Django-3.0.5 asgiref-3.2.7 pytz-2019.3 sqlparse-0.3.1
WARNING: You are using pip version 20.2.3, however version 20.0.2 is available.
You should consider upgrading via the 'pip install --upgrade pip' command.
```

<blockquote class="notice">
    <p><strong>Note:</strong> Il est possible d'installer une version spécifique de Django, par exemple la version <code>3.0</code> en procédant comme suit: <code>pip install Django==3.0</code>.</p>
</blockquote>

Exécutez la commande `pip install --upgrade pip` pour mettre à jour `pip` si vous avez ce message de warning: **WARNING: You are using pip version x.y.z, however version a.b.c is available. You should consider upgrading via the 'pip install --upgrade pip' command**.

<blockquote class="notice">
    <p><strong>Note:</strong> Si dans le chapitre précédent, vous avez eu à utiliser la commande <code>pip install --upgrade pip</code> afin de mettre à jour <code>pip</code>, sachez que la version de <code>pip</code> qui a été mise à jour est la version globale installée au niveau de votre système. Rappelez-vous, un environnement virtuel est un environnement isolé. La version de <code>pip</code> présente donc au niveau de votre environnement virtuel <code>hello-city-venv</code> est une version locale et celle-ci n'a pas jamais été mise à jour vu que cet environnement virtuel vient d'être nouvellement créé.</p>
</blockquote>

Vérifions que `Django` est bel et bien installé:

```bash
(hello-city-venv)$ python
Python 3.9.0 (v3.9.0:7b3ab5921f, Feb 24 2020, 17:52:18)
[Clang 6.0 (clang-600.0.57)] on darwin
Type "help", "copyright", "credits" or "license" for more information.
>>> import django
>>> print(django.get_version())
3.0.5
>>> exit()
(hello-city-venv)$
```

1. On démarre le shell interactif de Python avec la commande `python`.
2. On importe ensuite le package `django` avec l'instruction `import django`.
3. On affiche après la version de Django installée au sein de notre environnement virtuel avec `print(django.get_version())`.
4. On quitte le shell interactif de Python avec `exit()`.

Et voilà!

Félicitations!

1. Vous avez créé un environnement virtuel `hello-city-venv`.
2. Vous l'avez ensuite activé.
3. Au niveau de cet environnement virtuel, vous avez installé la dernière version en date de `Django`.

## 3.3. Création d'un projet Django

Maintenant que Django est installé, nous allons l'utiliser afin de créer un nouveau projet que nous appelerons `hello_city`.

Une fois Django installé, vous avez accès à une commande `django-admin` que vous pouvez utiliser afin de créer des projets Django.

La syntaxe est la suivante:

`django-admin startprojet [nom_du_projet]`

<blockquote class="notice">
    <p><strong>Note:</strong> Le nom d'un projet Django ne doit pas contenir de tirets. Si le nom de votre projet n'est pas valide, vous aurez droit à cette belle erreur: Exemple: <code>CommandError: 'hello-django' is not a valid project name. Please make sure the name is a valid identifier.</code>.</p>
</blockquote>

Assurez-vous d'être dans le dossier dans lequel vous souhaitez créer votre projet et exécutez la commande suivante:

```bash
(hello-city-venv)$ django-admin startproject hello_city
```

En exécutant la commande `ls`, nous devrions normalement nous retrouver avec quelque chose qui ressemble à ceci:

```bash
(hello-city-venv)$ ls
hello_city hello-city-venv
```

<blockquote class="warning">
    <p><strong>Attention:</strong> Si l'environnement virtuel au niveau duquel Django a été installé n'a pas été activé, la commande <code>django-admin</code> ne sera pas disponible et vous aurez droit à une erreur. Il vous suffira donc d'activer votre environnement virtuel au niveau duquel Django a été installé et ensuite utiliser la commande <code>django-admin</code> afin de créer votre projet.</p>
</blockquote>

<blockquote class="notice">
    <p><strong>Note:</strong> Vous n'êtes pas obligé d'avoir votre environnement virtuel et votre projet dans le même dossier. Le plus important est que l'environnement virtuel soit créé et activé. Pour question de simplicité, j'ai préféré les mettre dans le même dossier.</p>
</blockquote>

<blockquote class="notice">
    <p><strong>Astuce:</strong> Il est généralement recommandé d'utiliser un environnement virtuel différent pour chacun de vos projets. En d'autres termes, il n'est pas recommandé d'avoir deux projets Django utilisant le même environnement virtuel.</p>
</blockquote>

## 3.4. Démarrage du serveur

Il est à présent temps d'afficher quelque chose au niveau du navigateur.

Nous allons démarrer un petit serveur web de développement qui vient avec Django afin de vérifier que tout fonctionne comme on le souhaite.

<blockquote class="notice">
    <p><strong>Note:</strong> Le serveur web de développement qui vient avec Django n'est pas un serveur web à utiliser en production, c'est-à-dire lorsque vous voudrez plus tard mettre votre projet en ligne afin de le rendre accessible à tous. Il faudra utiliser un autre serveur comme <code>Gunicorn</code>. Nous en reparlerons dans la section 3.12 sur le déploiement.</p>
</blockquote>

Pour démarrer le serveur web de développement, nous allons nous déplacer dans un premier temps dans le dossier `hello_city` représentant notre projet en utilisant la commande `cd`. Nous pourrons par la suite exécuter la commande `python manage.py runserver` afin de démarrer le serveur web de développement à proprement dit.

```bash
(hello-city-venv)$ cd hello_city
(hello-city-venv)$ python manage.py runserver
Watching for file changes with StatReloader
Performing system checks...

System check identified no issues (0 silenced).

You have 17 unapplied migration(s). Your project may not work properly until you apply the migrations for app(s): admin, auth, contenttypes, sessions.
Run 'python manage.py migrate' to apply them.

April 23, 2020 - 16:08:25
Django version 3.0.5, using settings 'hello_city.settings'
Starting development server at http://127.0.0.1:8000/
Quit the server with CONTROL-C.
```

<blockquote class="notice">
    <p><strong>Comment faire si j'ai une erreur UnicodeDecodeError?</strong><br>Si en exécutant la commande <code>python manage.py runserver</code>, vous avez une erreur <code>UnicodeDecodeError: 'utf8' codec can't decode byte...</code>, il vous suffira de <b>changer le nom de votre ordinateur sur le réseau</b> afin qu'il ne contienne aucun caractère accentué et aucun espace. Très important, il ne s'agit pas de changer votre nom d'utilisateur, mais simplement le nom de votre ordinateur sur le réseau. Un redémarrage de l'ordinateur est nécessaire. Voici une <a href="https://www.youtube.com/watch?time_continue=53&v=7v-st8NgILc">vidéo</a> montrant comment le faire pour ceux qui ont Windows 7 & 8 et <a href="https://www.youtube.com/watch?v=ZpIAFmddHGo">une autre</a> pour ceux qui ont Windows 10.</p>
</blockquote>

Vous pouvez pour l'instant ignorer les messages de warning en rapport avec les migrations affichés au niveau du terminal. Nous y reviendrons.

<blockquote class="notice">
    <p><strong>Astuce:</strong> Sous Linux ou macOS, vous pouvez juste taper <code>./manage.py runserver</code> ou <code>manage.py runserver</code> en lieu et place de préfixer ceci de <code>python</code>. En effet, le fichier <code>manage.py</code> est un fichier Python et la première ligne qu'on y retrouve est <code>#!/usr/bin/env python</code> qui permet d'indiquer qu'il faudra utiliser l'interpréteur Python pour exécuter le fichier <code>manage.py</code> si celui-ci est exécuté directement. C'est ce qui nous donne la flexibilité d'omettre le <code>python</code> au tout début de la commande.</p>
</blockquote>

Ouvrez ensuite votre navigateur favori et tapez dans la barre d'adresse [http://127.0.0.1:8000](http://127.0.0.1:8000).

**((( Image manquante )))**

Wouhou! Bien joué!

Pour arrêter le serveur, vous n'aurez qu'à faire `CTRL + C`.

Le serveur de développement est redémarré automatiquement si vous apportez des modifications à votre code. Vous n'avez donc pas besoin de redémarrer le serveur manuellement pour que les modifications de code prennent effet. Cependant, certaines actions telles que l'ajout de fichiers ne déclenchent pas de redémarrage. Vous devrez donc redémarrer le serveur manuellement dans ces cas là.

<blockquote class="notice">
    <p><strong>Note:</strong> Il est possible de demander au serveur d'écouter sur un port autre que le port <code>8000</code> utilisé par défaut. Par exemple, pour demander au serveur d'écouter sur le port <code>3000</code>, il suffira de taper: <code>python manage.py runserver 3000</code>.</p>
</blockquote>

## 3.5. Structure d'un projet Django

Ouvrons à présent notre projet `hello_city` au niveau de notre editeur de code afin d'expliquer l'utilité de chacun des fichiers et dossiers présents au niveau de notre projet.

**((( Image manquante de Sublime Text with project )))**

Déjà pour commencer, avouez que la structure de notre projet semble un peu bizarre. Nous avons un dossier `hello_city` qui contient un autre dossier `hello_city`.

```bash
hello_city # premier dossier hello_city
├── db.sqlite3
├── hello_city # second dossier hello_city
│   ├── __init__.py
│   ├── __pycache__
│   ├── asgi.py
│   ├── settings.py
│   ├── urls.py
│   └── wsgi.py
└── manage.py

2 directories, 7 files
```

Le premier dossier `hello_city` n'a rien de spécial. Étant donné qu'en utilisant la commande `django-admin`, j'avais précisé `hello_city` comme nom de projet, Django m'a créé un dossier ayant pour nom `hello_city`. Mais sachez que vous êtes libre de changer le nom de ce dossier. Juste pour vous le prouver, je vais le renommer en `hello_city_project`.

```bash
(hello-city-venv)$ cd ..
(hello-city-venv)$ mv hello_city hello_city_project
```

Vous pouvez le renommer via l'interface graphique si vous le souhaitez.

Je redémarre mon serveur et génial aucune erreur!

```bash
(hello-city-venv)$ cd hello_city_project
(hello-city-venv)$ python manage.py runserver
```

**((( Image manquante )))**

Revenons au nom précédent:

```bash
(hello-city-venv)$ cd ..
(hello-city-venv)$ mv hello_city_project hello_city
```

Le second dossier `hello_city` par contre ne peut pas être renommé. En vrai, vous pouvez le renommer mais je ne vous recommande pas de le faire car cela vous obligera à modifier le code de plein de fichiers, sans quoi vous aurez droit à des erreurs.

Si vous jettez un coup d'oeil par exemple au code présent au niveau du fichier `manage.py`, vous verrez qu'à la ligne **8**, le nom du package `hello_city` est utilisé afin de précisier une valeur par défaut (`'hello_city.settings'`) pour la variable d'environnement `DJANGO_SETTINGS_MODULE` si celle-ci n'a pas déjà été définie:

```python
os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'hello_city.settings')
```

`'hello_city.settings'` permet de faire référence au module `settings` se trouvant au niveau du package `hello_city`.

Rappelez-vous qu'en Python, tout fichier est un module. Le nom du module est le nom du fichier sans l'extension `.py`. Un module est un fichier Python permettant de regrouper un ensemble de variables, de constantes, de fonctions, de classes, etc qui ont un rapport entre elles. Par exemple, si vous avez plein de fonctions et variables en rapport avec l'arithmétique, vous pouvez les regrouper dans un fichier `arithmetique.py` et vous obtiendrez un module nommé `arithmetique`.

Le fichier `settings.py` est donc un module et le nom de ce module est `settings`.

En Python, un package est un dossier. Les packages vous permettent de regrouper un ensemble de modules (un ensemble de fichiers Python) ayant un rapport entre eux. Un package peut également contenir d'autres packages. On peut par exemple imaginer un package `supermath` qui contient les modules `arithmetique`, `trigonometrie`, `probabilite`, etc.

Les packages peuvent contenir un fichier spécial `__init__.py` qui servira de script d'initialisation lorsque le package ou l'un de ses modules ou sous-packages sont importés. Depuis Python 3.3 et plus, la présence du fichier `__init__.py` n'est pas **obligatatoire** si le fichier `__init__.py` est censé ne rien contenir (en d'autres termes s'il est VIDE). Cela est dû au fait que Python 3.3+ prend en charge les packages d'espace de noms implicites qui lui permettent de créer un package sans fichier `__init__.py`. Donc si on résume:

1. Les fichiers `__init__.py` vides ne sont plus nécessaires et peuvent être omis.
2. Si vous souhaitez par contre exécuter un code d'initialisation particulier lorsque le package ou l'un de ses modules ou sous-packages sont importés, vous avez toujours besoin d'un fichier `__init__.py`.

Le second dossier `hello_city` est donc un package car c'est un dossier qui contient différents modules (`asgi`, `settings`, `urls`, `wsgi`) et ce fichier spécial `__init__.py` même si vous savez maintenant que celui-ci n'est pas nécessaire dans ce cas vu qu'il est présentement vide.

Le dossier `__pycache__` contient le bytecode Python compilé et prêt à être exécuté. Vous pouvez l'ignorer car il est généré automatiquement par Python.

Revenons à nos moutons. Si vous changez donc le nom du package `hello_city`, vous serez obligé de modifier également la fameuse ligne **8** du fichier `manage.py`. Vous ferez de même au niveau du fichier `settings.py` aux lignes 52 et 70, pareil au niveau du fichier `wsgi.py` à la ligne 14, etc.

Maintenant que tout est clair. Expliquons le rôle de chacun des fichiers présents au niveau de notre projet.

La structure de notre projet est la suivante:

```bash
hello_city
├── db.sqlite3
├── hello_city
│   ├── __init__.py
│   ├── __pycache__
│   ├── asgi.py
│   ├── settings.py
│   ├── urls.py
│   └── wsgi.py
└── manage.py

2 directories, 7 files
```

- Le fichier `db.sqlite3` représente notre base de données SQLite. Nous y reviendrons.
- Le dossier `hello_city` est un package python dans lequel nous allons passer la majeure partie de notre temps.
- Le fichier `manage.py` va nous aider à exécuter différentes commandes. Pour créer notre projet, on a eu à utiliser la commande `django-admin`. C'est la seule fois que nous allons utiliser la commande `django-admin`. Une fois le projet créé, nous allons maintenant utiliser `manage.py` afin d'exécuter d'autres tâches. Vous vous souvenez de `python manage.py runserver`? Essayez de taper uniquement `python manage.py` et vous serez ébloui par la liste de commandes disponibles.

**((( Image manquante )))**

Parlons à présent des fichiers et dossiers contenus dans le package `hello_city`.

- Le fichier vide `__init__.py` permet d'indiquer le dossier `hello_city` représente un package Python. Sa présence n'est ici pas obligatoire vu qu'il est vide.
- Le dossier `__pycache__` contiendra le bytecode Python compilé et prêt à être exécuté. Vous pouvez l'ignorer car il est généré automatiquement par Python.
- Le fichier `settings.py` représente le fichier de configuration de notre projet.
- Le fichier `urls.py` contiendra l'ensemble des routes (urls) de notre projet. Ex: `/admin`, `/contact`, `/evenements`, etc.
- Les fichiers `asgi.py` et `wsgi.py` sont en rapport avec notre serveur web. _WSGI_ est le standard Python pour les serveurs et applications web. _ASGI_ est le nouveau standard Python pour les serveurs et applications web **asynchrones**. Ces deux fichiers nous permettront de faire un déploiement en se basant sur les spécifications _WSGI_ ou _ASGI_. Si vous n'avez rien compris de tout ce que je viens de dire sur _WSGI_ et _ASGI_, ne vous inquiétez surtout pas, nous y reviendrons.

Amusons-nous à modifier le fichier `settings.py`. À la ligne **106**, remplacez:

```python
LANGUAGE_CODE = 'en-us'
```

par

```python
LANGUAGE_CODE = 'fr'
```

Rafraîchissez la page au niveau du navigateur.

**((( Image manquante )))**

Et bang! Tout est maintenant en français.

Vous parlez allemand?

```python
LANGUAGE_CODE = 'de'
```

**((( Image manquante )))**

Et bang! Tout est maintenant en allemand.

Pour ma part, je vais revenir à l'anglais.

```python
LANGUAGE_CODE = 'en-us'
```

<blockquote class="notice">
    <p><strong>Note:</strong> Les valeurs possibles sont listées ici: <a href="https://github.com/django/django/blob/master/django/conf/global_settings.py">https://github.com/django/django/blob/master/django/conf/global_settings.py</a>. Voir la constante <code>LANGUAGES</code>.</p>
</blockquote>

## 3.6. De notre vue à notre template

Ouf! Nous avons vu beaucoup de théorie. Je pense qu'il est grand temps de remplacer la page d'accueil par quelque chose de plus personnalisé. Et si on affichait un petit `h1` ayant comme contenu `Hello from Quebec!`. Sentez-vous libre de remplacer `Quebec` par le nom de votre ville de résidence.

### 3.6.1. Configuration d'une url pour la page d'accueil

Ouvrez le fichier `urls.py` présent dans le package `hello_city`, et rajoutez-y la ligne de code suivante:

```python
from django.contrib import admin
from django.urls import path

urlpatterns = [
    path('', views.home), # <--- Nouvelle ligne de code
    path('admin/', admin.site.urls),
]
```

On indique que si l'utilisateur demande la page d'accueil [http://127.0.0.1:8000](http://127.0.0.1:8000) (symbolisée par la chaîne vide `''`), on souhaite exécuter le code qui se trouve au niveau de `views.home`.

Si on voulait indiquer l'url `contact-us`, on aurait rajouté quelque chose comme:

```python
path('contact-us/', views.contact_us),
```

Ce qui signifie si l'utilisateur demande la page [http://127.0.0.1:8000/contact-us/](http://127.0.0.1:8000/contact-us/) (symbolisée par la chaîne `'contact-us/'`), l'on souhaite exécuter le code qui se trouve au niveau de `views.contact_us`.

À ce stade, notre code est brisé. Le navigateur n'affiche plus rien.

**((( Image manquante )))**

Si vous jetez par contre un coup d'oeil au niveau de la console, vous verrez que nous avons beaucoup plus d'informations sur la cause du problème.

```bash
File "/Users/freedev/Code/PremiersPasAvecDjango/hello_city/hello_city/urls.py", line 20, in <module>
    path('', views.home),
NameError: name 'views' is not defined
```

En gros, Python nous indique qu'il n'a pas connaissance de ce fameux `views`.

Désolé, en mettant `views.home`, je voulais faire référence à une fonction `home`, se trouvant dans un module `views` qui lui se trouve dans le package `hello_city`. Empressons-nous donc de créer un fichier `views.py` dans le package `hello_city`.

Notre package devrait maintenant ressembler à cela:

```bash
.
├── __init__.py
├── __pycache__
├── asgi.py
├── settings.py
├── urls.py
├── views.py # <--- Nouveau fichier créé
└── wsgi.py
```

Rajoutez ensuite une fonction `home` au niveau du fichier `views.py` nouvellement créé comme suit:

```python
def home():
    pass
```

<blockquote class="notice">
    <p><strong>Note:</strong> L'instruction <code>pass</code> permet d'indiquer à Python que la fonction n'a pas de contenu pour l'instant. Sans ce <code>pass</code>, nous aurions eu droit à une belle erreur.</p>
</blockquote>

<blockquote class="notice">
    <p><strong>Note:</strong> Il se peut que le serveur de développement soit arrêté de manière brusque si vous avez des erreurs dans votre code.</p>
</blockquote>

Maintenant que nous avons notre module `views` et que ce dernier contient bel et bien notre fonction `home`, il va falloir l'importer correctement au niveau du fichier `urls.py`.

Rajoutez donc la ligne d'importation suivante:

```python
from django.contrib import admin
from django.urls import path

# Depuis le package hello_city on importe le module views.
from hello_city import views # <--- Nouvelle ligne de code

urlpatterns = [
    # On fait ensuite référence à la fonction home
    # présente dans le module views.
    path('', views.home),
    path('admin/', admin.site.urls),
]
```

À ce stade, nous n'avons plus d'erreurs au niveau de la console, notre serveur a été redémarré correctement.

Mais si nous raffraîchissons notre page, nous voyons une autre erreur s'afficher:

**((( Image manquante )))**

On nous indique que lorsque nous avons défini la fonction `home`, nous avons indiqué qu'elle ne prenait aucun argument mais lors de l'appel de cette fonction un argument a été passé.

Ici, c'est notre ami `Django` qui nous joue des tours étant donné que c'est lui qui a eu à appeler la fonction `home`.

Essayons donc de lui rendre visite afin de lui demander des explications.

### 3.6.2. Principe de fonctionnement du web

La fonction `home` que nous avons créée est ce qu'on appelle une **vue** en Django.

Ce n'est pas parce que nous avons eu à la créer dans le module `views` qu'elle est appelée _vue_, mais c'est parce que c'est une fonction qui est appelée **en réponse à une requête faite par l'utilisateur** vers une **url** de notre application.

Vous vous souvenez de cette ligne de code?

```python
path('', views.home),
```

La fonction `home` sera appelée à chaque fois qu'un utilisateur demandera la page d'accueil.

Afin que vous puissiez mieux comprendre le concept de vue avec Django, je dois vous faire un petit rappel sur le principe de fonctionnement du web et vous parler de l'architecture MVC.

Commençons par le principe de fonctionnement du web.

Le principe de fonctionnement du web est très simple! On fait une requête et on s'attend à avoir une réponse.

1. Requête -->
2. <-- Réponse

**((( Image manquante )))**

Lorsque nous tapons [https://google.com](https://google.com) dans la barre d'adresse, le navigateur (Google Chrome, Firefox, Microsoft Edge, Opera, Safari, etc) fera une requête vers le serveur de Google. En réponse à notre requête, le serveur de Google nous retournera la page suivante (code HTML + CSS + JavaScript).

**((( Image manquante )))**

Donc vous voyez? Assez simple! Nous avons eu à faire une **requête** vers le serveur de Google et ce dernier a eu à nous retourner une **réponse**.

### 3.6.3. L'architecture MVC

Je vous avais promis que nous allions revenir sur l'architecture MVC n'est-ce pas? Eh oui, je tiens toujours mes promesses.

MVC signifie **M**odèle **V**ue **C**ontrôleur (En anglais, **M**odel **V**iew **C**ontroller).

Au niveau de l'architecture MVC:

- Tout ce qui est en rapport avec les _données_ sera géré par le **modèle**. En d'autres termes, tout ce qui sera interaction avec votre source de données sera géré par le modèle. Très souvent l'on utilise une base de données comme source de données mais sachez que ça aurait pu bien être un fichier excel, un fichier texte, etc. C'est à vous de décider de la manière dont vous souhaitez stocker vos données. Donc dès à présent, si vous entendez _données_, pensez _modèle_.
- Tout ce qui est _affichage_ ou _présentation_ des informations sera géré par la **vue**.
- Et pour terminer, le **contrôleur** c'est un peu comme le _Big Boss_, le _chef d'orchestre_. C'est le contrôleur qui va demander au modèle de récupérer des données depuis notre base de données et une fois ces données récupérées par le modèle, les passer à la vue pour qu'elle puisse les afficher au niveau de notre page web.

Afin que les choses soient plus simples à comprendre, faisons une petite analogie avec le monde de l'entreprise:

- Le modèle c'est un peu comme **l'administrateur**. C'est l'administrateur qui gère les données de l'entreprise.
- La vue c'est un peu comme **le marketing**. C'est le marketing qui présente/vend votre entreprise. C'est la vue qui va présenter/vendre votre application. Donc il faudra faire en sorte que votre vue soit attrayante afin que les utilisateurs aient envie d'utiliser votre application.
- Et le contrôleur c'est comme **le CEO de l'entreprise**, le Big Boss. C'est lui qui donnera les directives.

Afin d'être sûr que nous sommes tous sur la même longueur d'onde, je vous invite à faire une dernière analogie avec un scénario concret.

Je vais me rendre dans un premier temps sur le site officiel de Parlons Code [https://parlonscode.com](https://parlonscode.com).

Pour ce faire, j'ouvre mon navigateur et je tape dans la barre d'adresse: [https://parlonscode.com](https://parlonscode.com).

Mon navigateur fera une requête vers le serveur de Parlons Code et ce dernier se chargera de nous retourner cette jolie réponse.

**((( Image manquante )))**

Derrière, vous pouvez imaginer qu'il y a un contrôleur en charge de gérer les requêtes vers la page d'accueil. Lorsqu'une requête est donc faite vers la page d'accueil de Parlons Code, ce contrôleur va se charger de demander à la vue d'afficher la page d'accueil. Mais avant d'afficher la page d'accueil, nous avons besoin de récupérer en base de données, les données associées aux formations disponibles sur Parlons Code (Devenez Swag avec Swing, Symfony 5 en une semaine, Devenez un pro Symfony 5, etc). Afin de récupérer ces informations, le contrôleur fera appel au modèle en lui disant quelque chose comme _"Mon ami le modèle, stp pourrais-tu me récupérer en base de données les informations associées aux cours disponibles sur la plateforme?"_. Le modèle répondra _"Okidoki Capitaine"_. Le modèle ira ensuite récupérer les données en base de données et les transmettra au contrôleur. Le contrôleur répondra _"Merci Modèle. Tu es adorable!"_. Maintenant que le contrôleur a les données en sa possession, il contactera la vue en lui disant _"Le moment est maintenant venu pour toi de briller ma belle vue. Affiches-moi toutes ces données que le modèle a gentillement récupérées au niveau de la base de données"_. La vue répondra _"Okidoki Big Boss"_ et affichera les données.

Tout ce travail a eu lieu en coulisses afin de nous permettre de voir afficher la page d'accueil avec les différentes formations disponibles.

Je vais ensuite cliquer sur le lien _Se connecter_ présent au niveau du menu de haut. Ce lien pointe vers [https://parlonscode.com/login](https://parlonscode.com/login). Le navigateur fera donc une autre requête vers le serveur de Parlons Code afin de lui demander le contenu de la page de connexion. Le serveur répondra avec cette magnifique page de connexion.

**((( Image manquante )))**

Derrière en coulisses, vous pouvez imaginer qu'il y a un contrôleur en charge de gérer les requêtes vers la page de connexion. Lorsqu'une requête est donc faite vers la page de connexion, ce contrôleur va se charger de demander à la vue d'afficher la page de connexion. C'est ce qui nous permet d'avoir ce formulaire affiché.

Au niveau du formulaire de connexion, je vais entrer comme adresse email `johndoe@example.com` et comme mot de passe `l@VieESTB31le`. Pour information, ces identifiants de connexion sont invalides. Lorsque je vais donc remplir le formulaire et cliquer sur le bouton _Se connecter_, qu'est-ce qui va se passer?

Une requête sera effectuée vers le serveur de Parlons Code. On peut imaginer qu'il y a un contrôleur en charge des demandes de connexion. Ce contrôleur va récupérer l'adresse email et le mot de passe entrés depuis la requête et va ensuite demander au modèle de vérifier en base de données s'il existe un utilisateur ayant cette combinaison d'adresse email et mot de passe. Le modèle ira ensuite vérifier en base de données et dans ce cas-là répondra au contrôleur en lui disant qu'il n'a trouvé aucun utilisateur avec cette combinaison adresse email/mot de passe. Le contrôleur répondra _"Merci Modèle. Super Boulot"_. Maintenant que le contrôleur sait que la combinaison email/mot de passe entrée est invalide, il demandera à la vue d'afficher le message _"Vos identifiants de connexion sont invalides. Veuillez réessayer."_. La vue répondra _"Okidoki Big Boss"_ et affichera le message d'erreur.

**((( Image manquante )))**

Par contre, si au niveau du formulaire de connexion, j'entre une combinaison email/mot de passe valide, une requête sera effectuée vers le serveur de Parlons Code. Le contrôleur en charge des demandes de connexion va récupérer l'adresse email et le mot de passe entrés depuis la requête et va ensuite demander au modèle de vérifier en base de données s'il existe un utilisateur ayant cette combinaison d'adresse email et mot de passe. Le modèle ira ensuite vérifier en base de données et cette fois-ci répondra au contrôleur en lui disant qu'il a réussi à trouver un utilisateur avec cette combinaison email/mot de passe. Le contrôleur répondra _"Merci Modèle. Que ferais-je sans toi?"_. Maintenant que le contrôleur sait que la combinaison email/mot de passe entrée est valide, il demandera à la vue d'afficher le tableau de bord de l'utilisateur. La vue répondra _"Okidoki Big Boss"_ et affichera le tableau de bord.

**((( Image manquante )))**

J'ose espérer qu'avec tous ces exemples, vous comprenez un peu mieux le rôle de chacune des composantes de l'architecture MVC.

### 3.6.4. L'architecture MVT

Au niveau de Django, en lieu et place de parler d'architecture MVC, on parle plutôt d'architecture MVT.

MVT signifie **M**odèle **V**ue **T**emplate.

C'est la même chose que l'architecture MVC, simplement que ce que le contrôleur au niveau de l'architecture _MVC_ est maintenant appelé **Vue** au niveau de l'architecture _MVT_ et la vue au niveau de l'architecture _MVC_ est maintenant appelée **Template** au niveau de l'architecture _MVT_.

Donc si on récapitule, au niveau de l'architecture MVT:

- Le Modèle reste le Modèle.
- La Vue, c'est ce qu'on appelle contrôleur au niveau de l'architecture MVC.
- Le Template, c'est ce qu'on appelle vue au niveau de l'architecture MVC.

Je sais que ça peut paraître un tant soit peu compliqué mais croyez-moi c'est la seule fois où Django nous rend la vie difficile. Après seulement quelques heures, on commence à s'y faire, pas besoin donc de paniquer.

```python
def home():
    pass
```

Donc la fonction `home` qu'on avait créée est une _vue_ (c'est-à-dire le _contrôleur_ dans le monde MVC) qui se chargera de répondre aux requêtes vers la page d'accueil.

### 3.6.5. Ajout d'un paramètre pour symboliser la requête entrante

Revenons à présent à notre erreur précédente:

**((( Image manquante )))**

On nous indique que lorsque nous avons défini la vue `home`, nous avons indiqué qu'elle ne prenait aucun argument mais lors de l'appel de cette fonction un argument a été passé.

Ici, c'est notre ami `Django` qui essaie de nous passer la requête de l'utilisateur, au cas où on aurait besoin d'y extraire des informations. Dans l'exemple du formulaire de connexion, on aurait pu extraire par exemple l'email et le mot de passé entrés par l'utilisateur.

**Quelque chose de très important!** Lorsque nous concevons un projet Django, nous nous trouvons du côté du serveur. C'est donc nous qui recevons la requête de l'utilisateur et c'est à nous de retourner la réponse appropriée à cette requête.

Vu que dans certains cas, nous aurons besoin de récupérer des informations depuis la requête, Django va toujours passer la requête entrante à nos vues (rappelez-vous c'est-à-dire nos contrôleurs dans le monde MVC).

Même si vous ne voulez rien faire avec cette requête, vous êtes tout de même obligé de la récupérer en rajoutant un paramètre à votre vue étant donné que Django va toujours la passer en argument.

Modifiez donc la fonction `home` présente au niveau du fichier `views.py` et rajoutez-y un paramètre `request`.

```python
def home(request):
    pass
```

Django va automatiquement passer la requête entrante à ce paramètre.

<blockquote class="notice">
    <p><strong>Note:</strong> Le nom du paramètre importe peu. Le plus important est qu'il soit présent. On aurait pu donc l'appeler <code>tete_de_noeud</code> et cela aurait fonctionné. Mais pourquoi l'appeler <code>tete_de_noeud</code> si cela représente la requête?</p>
</blockquote>

Raffraîchissez la page afin de voir ce que nous obtenons à présent comme résultat:

**((( Image manquante )))**

Ici on nous indique que la vue `hello_city.views.home` ne retourne pas de réponse. Elle retourne présentement `None`.

L'erreur est assez simple à comprendre. Nous avons reçu une requête de l'utilisateur, nous nous devons donc côté serveur de retourner une réponse.

Imaginons que nous souhaitons retourner comme réponse `Hello from Quebec!`. Comment procéder?

Commençons par ce qu'il y a de plus logique en retournant une chaîne de caractères contenant le texte `Hello from Quebec!`.

```python
def home(request):
    return 'Hello from Quebec'
```

**((( Image manquante )))**

Ouuups encore une erreur!

Les vues doivent toujours retourner comme réponse un objet de type `HttpResponse` mais pour l'instant nous retournerons une chaîne de caractères (un objet de type `str`) d'où cette erreur.

Je sais que l'erreur précédente était explicite:

`The view hello_city.views.home didn't return an HttpResponse object. It returned None instead.`

mais j'ai voulu attirer votre attention sur ce point. Il faudra toujours retourner comme réponse un objet de type `HttpResponse` au niveau de vos vues.

En effet, si vous scrollez un peu plus bas (du côté du _Traceback_), vous verrez Django tente d'appeler la méthode `get` sur notre réponse alors que les objets de type `str` n'ont pas de méthode `get`, mais un objet de type `HttpResponse` lui oui. D'où le message d'erreur `'str' object has no attribute 'get'`.

```python
def process_response(self, request, response):
        # Don't set it if it's already in the response
    if response.get('X-Frame-Options') is not None: # <--- C'EST ICI
                return response
        # Don't set it if they used @xframe_options_exempt
        if getattr(response, 'xframe_options_exempt', False):
                return response
```

### 3.6.6. Une réponse valide

Modifions donc notre vue `home` en y rajoutant le code suivant:

```python
def home(request):
    # On retourne un objet de type HttpResponse avec le contenu souhaité.
    return HttpResponse('Hello from Quebec!')
```

Raffraîchissons la page:

**((( Image manquante )))**

Nous avons cette erreur parce que nous avons oublié d'importer la classe `HttpResponse`.

Rajoutez donc la ligne d'importation suivante:

```python
# On importe la classe HttpResponse depuis django.http
from django.http import HttpResponse # <--- Nouvelle ligne de code


def home(request):
    return HttpResponse('Hello from Quebec!')
```

Ouvrez à présent votre navigateur et contemplez!

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Note:</strong> Au fur et à mesure que vous allez concevoir vos projets Django, vous allez sans le savoir retenir cette ligne d'importation et plein d'autres. Mais si vous l'oubliez, sachez que vous pouvez toujours revenir au niveau du bouquin ou revoir tout simplement la documentation de Django.</p>
</blockquote>

Ouf! Ça été long mais croyez-moi maintenant vous êtes fin prêt à démystifier Django. Bien joué!

### 3.6.7. Retourner du contenu JSON

JSON (**J**ava**S**cript **O**bject **N**otation) est un format de stockage et d'échange de données. Un code JSON est juste du texte mais écrit avec une notation d'objet JavaScript. C'est un format qui est très populaire dans le monde des APIs (Application Programming Interface).

Pour retourner du JSON, modifiez votre vue `home` en rajoutant le code suivant:

```python
# On importe la classe JsonResponse depuis django.http
from django.http import JsonResponse


def home(request):
    return JsonResponse({'version': '1.0', 'message': 'Hello from Quebec!'})
```

**((( Image manquante )))**

Vous remarquerez que nous n'avons eu aucune erreur même si nous avons retourné un objet de type `JsonResponse` en lieu et place d'un objet de type `HttpResponse`. La raison est toute simple, un objet de type `JsonResponse` est également un objet de type `HttpResponse`. En effet, la classe `JsonResponse` hérite de la classe `HttpResponse`.

```python
class HttpResponse:
    # du code python


class JsonResponse(HttpResponse):
    # encore du code python
```

Ce qui revient donc à dire qu'implicement nous retournons également un objet de type `HttpResponse`. Du moment où la réponse retournée est un objet de type `HttpResponse` que ce soit de façon explicite ou implicite, Django est satisfait et ne grogne pas.

<blockquote class="notice">
    <p><strong>Note:</strong> Pour ceux qui sont curieux, voici le code du module <code>response</code>  au niveau duquel les définitions des classes <code>HttpResponse</code> et <code>JsonResponse</code> sont faites. <a href="https://github.com/django/django/blob/master/django/http/response.py">https://github.com/django/django/blob/master/django/http/response.py</a></p>
</blockquote>

### 3.6.8. Retourner du contenu HTML

Nous allons à présent voir comment retourner du code HTML. Pour l'instant, nous savons comment retourner du texte brut et du JSON.

Pour retourner du HTML, il suffit de passer le code HTML que l'on souhaite retourner comme argument au constructeur de la classe `HttpResponse` comme suit:

```python
from django.http import HttpResponse


def home(request):
    return HttpResponse('<h1>Hello from Quebec!</h1>')
```

**((( Image manquante )))**

Pour l'instant, ce n'est pas du code HTML5 valide car il manque le `<!DOCTYPE>` et les balises `html`, `head` et `body`, mais avouez qu'écrire tout ceci au niveau de la vue sera très pénible et de moins en moins lisible.

Essayons tout de même:

```python
from django.http import HttpResponse


def home(request):
    return HttpResponse("""<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>
</body>
</html>""")
```

Oh My God! Que c'est laid!

<blockquote class="notice">
    <p><strong>Note:</strong> J'utilise ici les triples double quotes afin de pouvoir avoir ma chaîne de caractères sur plusieurs lignes. Nous aurions pu utiliser également les triples simples quotes <code>''' '''</code>.</p>
</blockquote>

**((( Image manquante )))**

### 3.6.9 Rendre un template HTML

Au niveau de la section précédente, nous avons vu comment retourner du code HTML5 valide. Toutefois, le code était vraiment laid. Lorsqu'on commence à ne pas respecter l'architecture MVT, eh bien on se retrouve avec un code de ce genre.

Ici notre vue `home` (c'est-à-dire notre contrôleur `home` dans l'architecture MVC) se charge lui-même de retourner ce qui devrait être affiché à l'utilisateur. Pour des cas simples comme lorsqu'on retourne du code JSON cela s'avère pratique, mais lorsqu'on souhaite retourner du HTML, il est préférable de faire appel à la partie Template au niveau de l'architecture MVT (autrement dit la partie vue au niveau de l'architecture MVC).

Modifiez votre fichier `views.py` en y rajoutant le code suivant:

```python
# Importation de la fonction render
from django.shortcuts import render # <-- Nouvelle ligne de code


def home(request):
    return render(request, 'home.html') # <-- Nouvelle ligne de code
```

Ici on indique que lorsque la vue `home` sera appelée, elle devra se charger de rendre un template `home.html`. Tout ce qui est affichage sera maintenant géré du côté du template `home.html`.

Comme vous pouvez le remarquer, nous avons eu à importer dans un premier temps la fonction `render` depuis le module `django.shortcuts`. Ce module contient plein de fonctions utilitaires.

La fonction `render` permet de rendre un template (généralement du HTML). Elle va dans un premier temps charger le contenu du fichier template indiqué en second argument, ici `home.html` et ensuite l'envelopper dans un objet de type `HttpResponse` vu que toutes les vues en Django se doivent de retourner un objet de type `HttpResponse`.

Voici le code de la fonction `render` pour les curieux:

```python
# https://github.com/django/django/blob/master/django/shortcuts.py

def render(request, template_name, context=None, content_type=None, status=None, using=None):
    """
    Return a HttpResponse whose content is filled with the result of calling
    django.template.loader.render_to_string() with the passed arguments.
    """
    content = loader.render_to_string(template_name, context, request, using=using)
    return HttpResponse(content, content_type, status)
```

Grosso modo, on peut voir qu'on charge dans un premier temps le contenu du template passé en second argument (dans notre cas, il s'agira du template `home.html`). Ce contenu sera retourné sous forme de chaîne de caractères. On utilise ensuite cette chaîne de caractères comme réponse après l'avoir bien évidemment enveloppée au niveau d'un objet de type `HttpResponse` étant donné que toutes les vues Django se doivent de retourner un objet de type `HttpResponse`.

Je vous recommande vivement de jeter un coup d'œil de temps en temps au code source de Django. Vous apprendrez énormément de choses rien qu'en faisant cela.

La fonction `render` reçoit toujours en premier argument la requête entrante et en second argument le nom du template. Les autres paramètres sont optionnels.

En l'état actuel, nous aurons droit à une belle erreur étant donné que le template `home.html` n'existe pas.

**((( Image manquante )))**

Pour corriger ce problème, nous allons créer un dossier `templates` à la racine de notre projet.

Dorénavant à chaque fois que je vais dire _racine du projet_, pensez au dossier dans lequel se trouve le fichier `manage.py`.

Après avoir donc créé le dossier `templates`, la structure de votre projet devrait ressembler à ceci:

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
└── templates # <--- Le dossier templates se trouve au même niveau que manage.py
```

Dans le dossier `templates` fraîchement créé, rajoutez un fichier `home.html` qui va représenter notre template.

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
└── templates
    └── home.html # <--- Le fichier template home.html
```

Dans le fichier `home.html`, nous pouvons à présent rajouter notre code HTML.

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hello City</title>
  </head>
  <body>
    <h1>Hello from Quebec!</h1>
  </body>
</html>
```

Si vous raffraîchez la page, vous allez remarquer que l'erreur précédente persiste. Django n'arrive pas à trouver notre template `home.html`.

Il nous faudra indiquer à Django que lorsqu'il cherche les templates, il devra également les rechercher dans le dossier `templates` présent à la racine de notre projet. Pour l'instant, Django ne sait pas que ce dossier contiendra nos templates. Pour ce faire, ouvrez le fichier de configuration `settings.py` et rajoutez le chemin `templates` à la liste `DIRS` présente au niveau de la constante `TEMPLATES` (ligne 57).

```python
TEMPLATES = [
    {
        'BACKEND': 'django.template.backends.django.DjangoTemplates',
        'DIRS': ['templates'], # <--- Ce qu'il faut rajouter
        'APP_DIRS': True,
        'OPTIONS': {
            'context_processors': [
                'django.template.context_processors.debug',
                'django.template.context_processors.request',
                'django.contrib.auth.context_processors.auth',
                'django.contrib.messages.context_processors.messages',
            ],
        },
    },
]
```

Django sera à présent en mesure de trouver notre template `home.html` dans le dossier `templates` et tout va marcher à la perfection.

**((( Image manquante )))**

En lieu et place de préciser un chemin relatif (ici `templates`), je préfère préciser un chemin absolu (dans mon cas `/Users/freedev/Code/PremiersPasAvecDjango/hello_city`) en me servant de la constante `BASE_DIR` définie au niveau du fichier `settings.py` à la ligne 16.

```python
# Build paths inside the project like this: BASE_DIR / 'subdir'.
BASE_DIR = Path(__file__).resolve().parent.parent
```

Faites un print de `BASE_DIR` dans le fichier `settings.py` afin de découvrir à quoi correspond cette constante.

```python
...

from pathlib import Path

# Build paths inside the project like this: BASE_DIR / 'subdir'.
BASE_DIR = Path(__file__).resolve().parent.parent

print(f'La constante BASE_DIR correspond à "{BASE_DIR}".')

...
```

Si vous jetez un coup d'oeil au niveau de la console, vous verrez votre message affiché:

**((( Image manquante )))**

`BASE_DIR` représente le chemin absolu menant à la racine de votre projet. C'est-à-dire le chemini absolu menant au dossier contenant le fichier `manage.py`. Dans mon cas, il s'agit donc de `/Users/freedev/Code/PremiersPasAvecDjango/hello_city`.

Étant donné que notre dossier `templates` se trouve à la racine de notre projet, nous pouvons utiliser l'instruction `BASE_DIR / 'templates'` afin de trouver le chemin absolu menant au dossier `templates`.

```python
`BASE_DIR / 'templates'`
```

Vous pouvez faire un print afin de voir ce qui sera affiché.

```python
...

from pathlib import Path

# Build paths inside the project like this: BASE_DIR / 'subdir'.
BASE_DIR = Path(__file__).resolve().parent.parent

print(f'La chemin absolu menant au dossier templates est {BASE_DIR / "templates"}.')

...
```

Dans mon cas, j'obtiendrai `/Users/freedev/Code/PremiersPasAvecDjango/templates` comme chemin complet.

Amusez-vous à faire des `print` de:

```
print(f'La chemin absolu menant au dossier templates est {BASE_DIR / "templates" / "home.html"}.')

print(f'La chemin absolu menant au dossier templates est {BASE_DIR / "templates/home.html"}.')
```

Comme on peut le voir, on ne fait que fusionner des chemins.

Retirez tous les `print` rajoutés et remplacez à la ligne 57 du fichier `settings.py`,

```python
'DIRS': ['templates'],
```

par

```python
'DIRS': [BASE_DIR / 'templates'],
```

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Les f-strings</strong><br>Si vous vous demandez c'est quoi la syntaxe avec le <code>f''</code>, c'est ce qu'on appelle des <em>f-strings</em>. Depuis Python 3.6, les f-strings permettent d'insérer des expressions dans des chaines de caractères en utilisant une syntaxe minimale.<br><code>favorite_web_framework = 'Django'</code><br><code>print(f'Mon framework web préféré est {favorite_web_framework}')</code><br>Ceci affichera <b>Mon framework web préféré est Django</b>.<br>Cela marche également avec les doubles quotes:<br><code>print(f"Mon framework web préféré est {favorite_web_framework}")</code>.</p>
    <p>Remarquez bien l'emplacement du <code>f''</code>. Certaines personnes débutantes écrivent parfois erronément <code>printf</code>.
</p>
</blockquote>

### 3.6.10. Une structure à votre aise

Vous êtes libres de créer des sous-dossiers dans le dossier `templates` afin de mieux structures vos templates. Par exemple, je vais déplacer mon template `home.html` dans un sous-dossier `templates/pages`.

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
└── templates
    └── pages
        └── home.html
```

Il faudra également modifier la vue afin d'indiquer que notre template se trouve maintenant dans le sous-dossier `pages` sans quoi nous aurions eu droit à une belle erreur.

```python
from django.shortcuts import render


def home(request):
    return render(request, 'pages/home.html')
```

**((( Image manquante )))**

### 3.6.11. Petit challenge

Comme petit challenge, je vous invite à rajouter une vue `about` qui se chargera de rendre un template `pages/about.html` se trouvant dans le dossier `templates`, lorsqu'un utilisera fera une requête vers le path `about-us/`.

Le fichier `about.html` devra contenir le contenu HTML suivant:

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hello City</title>
  </head>
  <body>
    <h1>Built with &hearts; by [VOTRE NOM].</h1>
  </body>
</html>
```

Bonne chance!

### 3.6.11. Solution au challenge

#### Étape 1: Configuration de l'url

Ouvrons premièrement le fichier `urls.py` et rajoutons-y la ligne suivante:

```python
from django.contrib import admin
from django.urls import path
from hello_city import views

urlpatterns = [
    path('', views.home),
    path('about-us/', views.about), # <--- Nouvelle ligne de code
    path('admin/', admin.site.urls),
]
```

Nous aurons actuellement l'erreur suivante au niveau de la console:

```bash
File "/Users/freedev/Code/PremiersPasAvecDjango/hello_city/hello_city/urls.py", line 22, in <module>
    path('about-us/', views.about),
AttributeError: module 'hello_city.views' has no attribute 'about'
```

<blockquote class="notice">
    <p><strong>Note:</strong> Pour l'instant, sachez que tous vos paths (excepté celui de la page d'accueil) doivent se terminer par un <code>/</code>. Il est donc préférable de mettre <code>'about-us/'</code> en lieu et place de <code>'about-us'</code>, <code>'/about-us'</code> ou encore <code>'/about-us/'</code>.</p>
</blockquote>

#### Étape 2: Ajout de la vue about

Précédemment nous avons indiqué que si l'utilisateur fait une requête vers `about-us/`, il faudra appeler la vue `about` se trouvant dans le module `views`.

Créons donc une vue `about` au niveau du module `views`:

```python
from django.shortcuts import render


def home(request):
    return render(request, 'pages/home.html')

def about(request):
    return render(request, 'pages/about.html')
```

Nous aurons actuellement l'erreur suivante si nous essayons de visiter [http://127.0.0.1:8000/about-us/](http://127.0.0.1:8000/about-us/):

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Note:</strong> Si vous entrez <a href="http://127.0.0.1:8000/about-us">http://127.0.0.1:8000/about-us</a> dans la barre d'adresse, Django va automatiquement rajouter le <code>`/`</code> de fin pour vous: <a href="http://127.0.0.1:8000/about-us/">http://127.0.0.1:8000/about-us/</a>.</p>
</blockquote>

#### Étape 3: Création du template pages/about.html

Créons à présent un fichier template `about.html` dans le sous-dossier `pages` se trouvant dans le dossier `templates` et rajoutons-y le code HTML suivant:

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hello City</title>
  </head>
  <body>
    <h1>Built with &hearts; by Honoré.</h1>
  </body>
</html>
```

On teste le tout et voilà!

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Note:</strong> Vous n'êtes pas obligé d'avoir un nom de vue identique à votre nom de template, par exemple <code>home</code> et <code>home.html</code>, <code>about</code> et <code>about.html</code>, etc. Ce sont juste de petites conventions que je suis.</p>
</blockquote>

Si vous avez aimé ce petit challenge, amusez-vous à rajouter une autre page `contact` qui affichera les informations pour vous contacter. Cette page sera affichée si un utilisateur fait une requête vers [http://127.0.0.1:8000/contact/](http://127.0.0.1:8000/contact/).

Rappelez-vous que c'est en forgeant qu'on devient forgeron.

## 3.7. Variables et filtres

Dans les deux prochaines sections, nous allons donner un peu d'amour à nos templates. Pour commencer, nous verrons dans cette section:

1. comment passer des variables créées au niveau d'une vue à un template;
2. comment par la suite afficher le contenu de ces variables une fois qu'elles auront été reçues du côté de nos templates;
3. comment manipuler le contenu de ces variables directement au niveau de nos templates au travers de filtres. Nous pourrons par exemple transformer du contenu en majuscules, en minuscules, etc.

C'est parti!

### 3.7.1. Passer une variable d'une vue à un template

Au niveau de la vue `home` présente dans le fichier `views.py`, créez une variable `name` ayant comme valeur votre nom comme suit:

```python
def home(request):
    name = 'Honoré Hounwanou' # <--- Nouvelle ligne de code
    return render(request, 'pages/home.html')
```

Comment accéder à cette variable au niveau de notre templae `pages/home.html`?

Si vous ouvrez le fichier `pages/home.html` et que vous rajoutez le code suivant:

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hello City</title>
  </head>
  <body>
    <h1>Hello from Quebec!</h1>

    <p>name</p>
  </body>
</html>
```

Vous verrez que le texte `name` sera affiché littéralement.

**((( Image manquante )))**

Pour afficher une variable au niveau d'un template Django, il vous faudra utiliser la syntaxe suivante: `{{ nom_de_ma_variable }}`.

Modifiez donc votre template `pages/home.html` comme suit:

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ name }}</p>
</body>
</html>
```

Nous n'avons aucune erreur mais malheureusement rien n'est affiché!

**((( Image manquante )))**

Le problème est tout simple. Si vous souhaitez passer des variables de votre vue à votre template, il vous faudra l'exprimer de manière explicite en disant: _Ma fonction `render`, j'aimerais que tu me rendes le template `pages/home.html`, mais n'oublies pas de lui passer également la variable `name` que j'ai eu à créer_.

Pour faire cela, vous devez passer un dictionnaire en troisième argument à la fonction `render`.

```python
def home(request):
    name = 'Honoré Hounwanou'
    return render(request, 'pages/home.html', {'name': name})
```

En mettant `{'name': name}`, cela permet de dire que j'aimerais passer une variable à mon template Django qui aura comme nom `name` et dont la valeur sera la valeur de la variable `name`.

Et voilà le travail!

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Note:</strong> Le dictionnaire passé en troisième argument à la fonction <code>render</code> est appelé <code>contexte</code>. En effet, il contiendra les variables disponibles dans le contexte de notre template.</p>
</blockquote>

Si je voulais accéder au contenu de la variable `name` avec comme nom de variable `toto` au niveau du template, il aurait fallu mettre:

```python
def home(request):
    name = 'Honoré Hounwanou'
    return render(request, 'pages/home.html', {'toto': name})
```

et modifiez mon template en conséquence:

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ toto }}</p>
</body>
</html>
```

Pour ma part, je vais revenir à `name` comme nom de variable car cela me paraît plus logique.

```python
def home(request):
    name = 'Honoré Hounwanou'
    return render(request, 'pages/home.html', {'name': name})
```

et modifiez mon template en conséquence:

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ name }}</p>
</body>
</html>
```

Si je décide de modifier mon nom, seule la vue `home` a besoin de changer. Pas besoin de changer quoi que ce soit au niveau du template `pages/home.html`.

```python
def home(request):
    name = 'Guido van Rossum' # <-- C'est le nom du créateur du langage Python
    return render(request, 'pages/home.html', {'name': name})
```

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Note:</strong> Comme nous avons pu le voir, si au niveau d'un template Django, vous essayez d'afficher le contenu d'une variable qui n'existe pas, vous n'aurez pas d'erreur mais rien ne sera affiché.</p>
</blockquote>

### 3.7.2. Passer plusieurs variables à un template

Notre objectif dans cette sous-section sera de passer l'heure courante à notre template `pages/home.html` qui se chargera gentiment de l'afficher.

Commençons par créer une variable `current_time` au niveau de notre vue `home` et donnons lui comme valeur `09:30`.

```python
def home(request):
    # On crée nos deux variables
    name = 'Guido van Rossum'
    current_time = '09:30'

    # On les passe ensuite à notre template
    return render(request, 'pages/home.html', {'name': name, 'current_time': current_time})
```

Pour afficher la variable `current_time` au niveau de notre templae `pages/home.html`, il suffira de mettre `{{ current_time }}`.

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ name }}</p>
    <p>{{ current_time }}</p>
</body>
</html>
```

Et tout fonctionne à la perfection!

**((( Image manquante )))**

### 3.7.3. Déterminer l'heure courante de manière dynamique

Afin de déterminer l'heure courante de manière dynamique, nous allons avoir besoin du module `datetime`.

```python
(hello-city-venv)$ python
Python 3.9.0 (v3.9.0:7b3ab5921f, Feb 24 2020, 17:52:18)
[Clang 6.0 (clang-600.0.57)] on darwin
Type "help", "copyright", "credits" or "license" for more information.
>>> import datetime # On importe le module datetime.
>>> now = datetime.datetime.now() # On récupère la date et heure actuelle.
>>> now # Cet affichage est adapté aux développeurs.
datetime.datetime(2020, 4, 24, 1, 58, 45, 768179)
>>> print(now) # La fonction print nous permet d'avoir un affichage plus familier.
2020-04-24 01:58:45.768179
>>>
>>> # On utilise la méthode strftime de sorte à formater notre objet
>>> # datetime afin d'afficher uniquement l'heure courante
>>> now.strftime('%H:%M')
'02:20'
>>> # On s'amuse à afficher la date et l'heure actuelle sous un autre format
>>> now.strftime('%m/%d/%Y, %H:%M:%S')
'04/24/2020, 02:20:57'
```

Modifions donc notre fichier `views.py` comme suit:

```python
# On utilise la seconde forme d'importation: from - import,
# histoire de vous prouver que tous les chemins mènent à Rome.
from datetime import datetime

from django.shortcuts import render

def home(request):
    name = 'Guido van Rossum'

    # On récupère l'heure courante
    current_time = datetime.now().strftime('%H:%M')

    # On la passe ensuite à notre template
    return render(request, 'pages/home.html', {'current_time': current_time})

...
```

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ name }}</p>
    <p>{{ current_time }}</p>
</body>
</html>
```

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Note:</strong> Par défaut, l'heure affichée est l'heure GMT. Vous pouvez modifier la valeur de la constante <code>TIME_ZONE</code> à la ligne 108 du fichier <code>settings.py</code> afin de préciser votre fuseau horaire. Pour ma part, je mettrai comme valeur <code>'America/Montreal'</code>. La liste des fuseaux horaires est disponible <a href="https://en.wikipedia.org/wiki/List_of_tz_database_time_zones">ici</a>.</p>
</blockquote>

### 3.7.6. Et si on gérait le formatage coté template?

Dans cette section, j'aimerais vous montrer qu'il est également possible de gérer le formatage de notre objet `datetime` côté template.

D'abord faisons quelques petites expérimentations au niveau de l'interpréteur:

```python
(hello-city-venv)$ python
Python 3.9.0 (v3.9.0:7b3ab5921f, Feb 24 2020, 17:52:18)
[Clang 6.0 (clang-600.0.57)] on darwin
Type "help", "copyright", "credits" or "license" for more information.
>>> from datetime import datetime # Depuis le module datetime on import la classe datetime.
>>> now = datetime.now() # On récupère la date et heure actuelle.
>>> now # Cet affichage est adapté aux développeurs.
datetime.datetime(2020, 4, 24, 1, 58, 45, 768179) # En coulisses, la méthode __repr__ est appelée.
>>> print(now) # La fonction print nous permet d'avoir un affichage plus familier.
2020-04-24 01:58:45.768179  # En coulisses, la méthode __str__ est appelée.
>>>
>>> # On peut le prouver
>>> # La méthode __repr__ donne une représentation sous forme de chaîne
>>> # de caractères adaptée aux développeurs.
>>> now.__repr__()
'datetime.datetime(2020, 4, 24, 1, 58, 45, 768179)'
>>> # La méthode __str__ donne une représentation sous forme de chaîne
>>> # de caractères adaptée aux utilisateurs finaux.
>>> now.__str__()
'2020-04-24 01:58:45.768179'
>>>
>>> # En coulisses, les fonctions repr et str font appel respectivement
>>> # aux méthodes __repr__ et __str__.
>>> repr(now)
'datetime.datetime(2020, 4, 24, 1, 58, 45, 768179)'
>>> str(now)
'2020-04-24 01:58:45.768179'
```

<blockquote class="notice">
    <p><strong>Note:</strong> Si vous envie d'en apprendre davantage sur les méthodes magiques, je vous inviterai à regarder <a href="https://youtube.com">ma vidéo sur les décorateurs et les méthodes magiques</a>.</p>
</blockquote>

Modifions à présent la vue `home` comme suit:

```python
from datetime import datetime

...

def home(request):
    name = 'Guido van Rossum'

    # On a ici accès à un objet de type datetime
    current_time = datetime.now()

    # On passe ensuite cet objet à notre template
    return render(request, 'pages/home.html', {'current_time': current_time})

...
```

Nous ne changerons rien à notre templae `pages/home.html`.

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ name }}</p>
    <p>{{ current_time }}</p>
</body>
</html>
```

**((( Image manquante )))**

Par défaut, Django utilise [le format 'N j, Y, P'](https://docs.djangoproject.com/fr/3.0/ref/settings/#std:setting-DATETIME_FORMAT) pour les objets de type `datetime`. C'est ce qui fait que nous avons _April 24, 2020, 6:12 a.m._ affiché.

Il est toutefois possible de choisir un format différent de celui utilisé par défaut. Les chaînes de format disponibles sont listées [ici](https://docs.djangoproject.com/fr/3.0/ref/templates/builtins/#std:templatefilter-date).

Le format que je souhaite utilisé est le suivant: `h:i A`. Remarquez que le format utilisé au niveau des templates Django est différent de celui utilisé par la méthode `strftime`. C'est la vie!

Le format `h:i A` nous permettra d'afficher uniquement l'heure courante en indiquant s'il s'agit du mation ou de l'après-midi (Ex: 09:30 AM pour 9h30 du matin ou 09:45 PM pour 9h45 du soir c'est-à-dire 21h45).

Comment utiliser ce format?

Avant de répondre à cette question, je dois vous parler de la notion de filtres.

### 3.7.7. Introduction aux filtres de templates

Il existe [une panoplie de filtres](https://docs.djangoproject.com/fr/3.0/ref/templates/builtins/#built-in-filter-reference) que vous pouvez utiliser au niveau de vos templates Django.

Il y a par exemple le filtre `lower` qui permet de convertir une chaîne de caractères en minuscules.

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ name|lower }}</p>
    <p>{{ current_time }}</p>
</body>
</html>
```

**((( Image manquante )))**

Comme vous pouvez le voir, pour utiliser un filtre, c'est assez simple. On utilise symbole pipe "`|`" suivi du nom du filtre.

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    {# Voici comment mettre un commentaire dans un template Django. #}
    {# Ces commentaires ne seront pas affichés au niveau du code HTML final. #}

    {# On transforme le contenu de la variable name en minuscules. #}
    <p>{{ name|lower }}</p>

    {# On transforme le contenu de la variable name en majuscules. #}
    <p>{{ name|upper }}</p>

    {# On additionne 2 et 4, ce qui donnera 6. #}
    <p>{{ 2|add:4 }}</p>

    {# On additionne (concatène/joint bout à bout) la chaîne #}
    {# de caractères 'hello ' au contenu de la variable name. #}
    <p>{{ 'hello '|add:name }}</p>

    {# Vu que la variable age n'existe pas, la valeur par défaut (ici Unknown) #}
    {# sera affichée. #}
    <p>{{ age|default:"Unknown" }}</p>

    <p>{{ current_time }}</p>
</body>
</html>
```

- Le filtre `upper` permet de convertir une chaîne de caractères en majuscules.
- Le filtre `add` permet d'additionner deux valeurs. Il marche aussi bien avec les entiers qu'avec les chaînes de caractères et les listes ([voir la documentation](https://docs.djangoproject.com/fr/3.0/ref/templates/builtins/#add)).
- Le filtre `default` permet d'afficher la valeur par défaut fournie (ici `"Unknown"`) si la valeur à gauche est évaluée à `False`. Sinon, c'est la valeur de gauche qui est affichée.

Les filtres `add` et `default` sont des exemples de filtres recevant des paramètres. Les paramètres sont les valeurs après les deux points `:`.

Pour passer des paramètres à un filtre, on utilise la syntaxe suivante:

```jinja
valeur|filtre:param1,param2,...
```

### 3.7.8. Chaînage de filtres

Ce que je trouve intéressant avec les filtres, c'est que vous pouvez les chaîner:

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    {# On transforme le contenu de la variable name en minuscules. #}
    {# On transforme ensuite le contenu en minuscules obtenu en majuscules. #}
    {# On lit ceci donc de la gauche vers la droite. #}
    {# On obtiendra GUIDO VAN ROSSUM au final. #}
    <p>{{ name|lower|upper }}</p>

    {# On additionne 2 et 4, ce qui donne 6. #}
    {# On additionne le résultat obtenu (c'est-à-dire 6) à 5, ce qui donne 11. #}
    {# On additionne le résultat obtenu (c'est-à-dire 11) à 4, ce qui donne 15. #}
    <p>{{ 2|add:4|add:5|add:4 }}</p>

    <p>{{ current_time }}</p>
</body>
</html>
```

**((( Image manquante )))**

### 3.7.9. Le filtre time

Nous allons à présent utiliser le filtre `time` afin de formater notre objet `datetime` au niveau de notre template `pages/home.html` .

```python
...


def home(request):
    current_time = datetime.now()
    return render(request, 'pages/home.html', {'current_time': current_time})

...
```

J'en ai profité pour retirer la variable `name`.

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>{{ current_time|time:'h:i A' }}</p>
</body>
</html>
```

Le filtre `time` reçoit en paramètre le format à utiliser afin de formater l'objet `datetime`.

Nous allons à présent faire une phrase complète et rajoutez le copyright.

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>It is currently {{ current_time|time:'h:i A' }} in Quebec.</p>

    <hr>

    <p>&copy; Copyright 2019 - {{ current_time|date:'Y' }}</p>
</body>
</html>
```

J'utilise cette fois-ci le filtre `date` afin de récupérer uniquement l'année courante. Le format `Y` permet de récupérer l'année courante. Encore une fois, tout ceci est présent au niveau de la [documentation](https://docs.djangoproject.com/fr/3.0/ref/templates/builtins/#std:templatefilter-date).

## 3.8. Introduction aux tags de templates

Chercher à déterminer la date et l'heure actuelle est chose courante au niveau d'un projet Django. Ainsi, afin de vous faciliter la tâche, Django met à votre disposition un ensemble de tags de templates (encore appelées balises) prêts à l'emploi.

Il existe par exemple le tag `now` permettant de formater la date et heure actuelle.

Dans un premier temps, nous allons retirer la déclaration de la variable `current_time` au niveau de la vue `home`, étant donné que nous n'en aurons plus besoin.

```python
...


def home(request):
    return render(request, 'pages/home.html')

...
```

Nous allons ensuite remplacer le contenu du template `pages/home.html` par celui-ci:

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>

    <hr>

    <p>&copy; Copyright 2019 - {% now 'Y' %}</p>
</body>
</html>
```

Comme vous pouvez le voir, la syntaxe pour utiliser un tag est différente de celle des filtres. On utilise les symboles `{%` et `%}`.

Le tag `now` reçoit en argument le format à utiliser.

Lors de la première utilisation:

```jinja
{% now 'h:i A' %}
```

On passe le format `"h:i A"` afin d'afficher l'heure courante.

Lors de la seconde utilisation:

```jinja
{% now 'Y' %}
```

On passe le format `"Y"` afin d'afficher l'année courante.

Rien de bien nouveau! Vous connaissez déjà ces deux formats.

Nous aurons l'occasion de revenir un peu plus en détails sur la notion de tags, mais pour ceux qui souhaiteraient prendre de l'avance, voici [la liste de tous les tags Django](https://docs.djangoproject.com/fr/3.0/ref/templates/builtins/#built-in-tag-reference).

## 3.9. Layouts

Dans cette section, nous allons tenter de faire un peu de refactoring et profiter également de l'occasion afin d'introduire le concept de layouts avec Django.

### 3.9.1. Structure actuelle

Pour l'instant, le code du template `pages/home.html` ressemble à ceci:

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>

    <hr>

    <p>&copy; Copyright 2019 - {% now 'Y' %}</p>
</body>
</html>
```

Et celui du template `pages/about.html` ressemble à ceci:

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hello City</title>
  </head>
  <body>
    <h1>Built with &hearts; by Honoré.</h1>
  </body>
</html>
```

Comme vous pouvez le remarquer, nous avons eu à dupliquer du code (le `DOCTYPE`, la balise `html`, la balise `head`, la balise `body`, etc). Généralement, au niveau d'un site web, vous aurez des parties qui seront présentes sur l'ensemble des pages. C'est le cas par exemple, de l'entête, du pied de page, du menu, etc. Avoir donc à dupliquer ces parties au niveau de chacune de vos pages rendra la maintenance de votre projet difficile. C'est pourquoi très souvent, on préfère utiliser ce qu'on appelle des **layouts**. Les _layouts_ vont nous permettre d'avoir des templates de base (qui contiendront les composants qu'on retrouve sur toutes les pages: l'entête, le pied de page, le menu, etc) dont pourront hériter les autres templates. Si cela à l'air un peu flou, tentons de voir cela en pratique.

Au niveau du dossier `templates`, créez un sous-dossier `layouts` dans lequel vous rajouterez un fichier `base.html` qui représentera notre layout de base.

```bash
hello_city
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
└── templates
    ├── layouts
    │   └── base.html # <-- Notre layout de base
    └── pages
        ├── about.html
        └── home.html
```

J'aime placer mes layouts dans un sous-dossier `layouts`, mais sentez-vous libre de les mettre directement dans le dossier `templates` par exemple.

Rajoutez ensuite le code suivant au niveau du fichier `layouts/base.html`:

```jinja
{# Fichier: "layouts/base.html" #}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello City</title>
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

Nous allons à présent modifier les templates `pages/home.html` et `pages/about.html` afin d'hériter de notre layout de base `layouts/base.html` et modifier la partie qui nous intéresse.

```jinja
{# Fichier: "pages/home.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>

    <hr>

    <p>&copy; Copyright 2019 - {% now 'Y' %}</p>
{% endblock %}
```

{caption: "pages/about.html"}

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <h1>Built with &hearts; by Honoré.</h1>
{% endblock %}
```

Et voilà!

**((( Image manquante )))**

### 3.9.2. Principe de fonctionnement des layouts

Le principe de fonctionnement des layouts est très simple. Vous définissez différents blocs au niveau de votre layout de base dont vous pourrez par la suite modifier le contenu au niveau de vos templates enfants.

Notre layout de base `layouts/base.html` contient un unique bloc `body` défini comme suit:

```jinja
{% block body %}{% endblock %}
```

Pour information, sachez qu'on aurait pu définir également notre bloc `body` de la manière suivante:

```jinja
{% block body %}{% endblock body %}
```

Lorsqu'on a des blocs imbriqués cela peut s'avérer très utile de rajouter le nom du bloc au niveau également de `endblock` afin de faciliter la lisibilité de notre code.

Si nous souhaitons utiliser notre layout de base `layouts/base.html` au niveau de l'un de nos templates enfants, il va falloir dans un premier temps spécifier que l'on souhaite hériter de notre template de base en utilisant le tag `extends`.

```jinja
{% extends 'layouts/base.html' %}
```

Ici, le chemin spécifié en paramètre à `extends` est relatif au dossier `templates`.

Maintenant que nous avons indiqué que nous souhaitons hériter du template `layouts/base.html`, nous pouvons rajoutons du contenu à n'importe lequel des blocs définis au niveau de `layouts/base.html`.

Pour ce faire, il suffit d'indiquer le bloc à modifier (de la même manière qu'on l'avait défini), mais cette fois-ci, on pourra rajouter le contenu comme suit:

```jinja
{% extends 'chemin/layout_de_base.html' %}

{% block nom_du_block %}
    On mettra ici le contenu à rajouter au bloc.
{% endblock %}
```

Ainsi, dans notre cas, on pourra modifier le contenu du bloc `body` au niveau du template `pages/home.html` assez simplement:

```jinja
{# Fichier: "pages/home.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>

    <hr>

    <p>&copy; Copyright 2019 - {% now 'Y' %}</p>
{% endblock %}
```

Assez simple n'est-ce pas?

On procède de même pour le template `pages/about.html`:

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <h1>Built with &hearts; by Honoré.</h1>
{% endblock %}
```

Faites très attention! Le code suivant n'aurait pas généré d'erreurs, mais n'aurait pas fonctionné également étant donné que Django n'aura aucune idée de où mettre le contenu `<h1>Built with &hearts; by Honoré.</h1>`:

```jinja
{% extends 'layouts/base.html' %}

<h1>Built with &hearts; by Honoré.</h1>
```

<blockquote class="notice">
    <p><strong>Note:</strong> Le template dont on hérite (ici <code>layouts/base.html</code>) est appelé template parent ou layout parent ou encore layout de base. Les templates qui hériteront de notre template de base (ici <code>pages/home.html</code> et <code>pages/about.html</code>) sont appelés templates enfants ou encore templates fils.</p>
</blockquote>

### 3.9.3. Ajout d'un bloc title

Nous allons à présent rajouter un bloc `title` au niveau de notre template de base `layouts/base.html`. Ce bloc nous permettra de changer le titre de la page au niveau de chaque template enfant. Par exemple au niveau du template `pages/home.html`, nous aurons comme titre `Hello City`, et au niveau du template `pages/about.html`, nous aurons comme titre `About Us | Hello City`.

Commençons donc par définir le bloc `title` au niveau de notre layout de base:

```jinja
{# Fichier: "layouts/base.html" #}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}{% endblock %}</title>
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

Ensuite, au niveau du template `pages/home.html`, nous pouvons changer le titre comme suit:

```jinja
{# Fichier: "pages/home.html" #}

{% extends 'layouts/base.html' %}

{% block title %}Hello City{% endblock %}

{% block body %}
    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>

    <hr>

    <p>&copy; Copyright 2019 - {% now 'Y' %}</p>
{% endblock %}
```

On procède de même pour le template `pages/about.html`:

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block title %}About Us | Hello City{% endblock %}

{% block body %}
    <h1>Built with &hearts; by Honoré.</h1>
{% endblock %}
```

**((( Image manquante )))**

**((( Image manquante )))**

Et voilà, tout marche à la perfection !

### 3.9.4. Contenu par défaut d'un bloc

Lors de la définition d'un bloc au niveau du layout de base, il est également possible de spécifier un contenu par défaut.

Par exemple, on pourra dire que le titre par défaut pour nos pages sera `Hello City` si aucun autre titre n'a été précisé au niveau du template enfant.

Cela se fait très simplement en précisant le contenu par défaut comme suit:

```jinja
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Contenu par défaut du bloc title{% endblock %}</title>
</head>
<body>
    {% block body %}Contenu par défaut du bloc body{% endblock %}
</body>
</html>
```

Dans notre cas, on souhaite donner un contenu par défaut uniquement au bloc `title`. Le bloc `body` quant à lui n'aura pas de contenu par défaut.

```jinja
{# Fichier: "layouts/base.html" #}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Hello City{% endblock %}</title>
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>
```

Ainsi, au niveau du template `pages/home.html`, nous n'avons plus besoin de modifier le contenu du bloc `title` étant donné que le contenu par défaut fera l'affaire:

```jinja
{# Fichier: "pages/home.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>

    <hr>

    <p>&copy; Copyright 2019 - {% now 'Y' %}</p>
{% endblock %}
```

Le contenu du template `pages/about.html` quant à lui reste le même car il va falloir modifier le contenu du bloc title.

{caption: "pages/about.html"}

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block title %}About Us | Hello City{% endblock %}

{% block body %}
    <h1>Built with &hearts; by Honoré.</h1>
{% endblock %}
```

### 3.9.5. Accéder au contenu par défaut d'un bloc parent au niveau d'un template enfant

Il est possible d'améliorer un tant soit peu le code présent au niveau du template `pages/about.html`. En effet `About Us | Hello City` peut être réécrit comme `About Us | Contenu par défaut du bloc title`.

Au niveau d'un template enfant, si l'on souhaite accéder au contenu par défaut du bloc parent, nous pouvons utiliser `block.super` comme suit:

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block title %}About Us | {{ block.super }}{% endblock %}

{% block body %}
    <h1>Built with &hearts; by Honoré.</h1>
{% endblock %}
```

Ici `{{ block.super }}` sera remplacé par _Hello City_.

**((( Image manquante )))**

Notre code continue de fonctionner. Je suis fier de vous, vous n'avez pas idée!

### 3.9.6. Un peu de pratique

Afin de vous faire pratiquer davantage la notion de layout, je vous propose de déplacer le copyright présent au niveau de `pages/home.html` au niveau du layout de base `layouts/base.html`.
Ainsi, aussi bien la page `pages/home.html` que la page `pages/about.html` afficheront le copyright étant donné que ces deux templates héritent du layout `layouts/base.html`.

```jinja
{# Fichier: "layouts/base.html" #}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Hello City{% endblock %}</title>
</head>
<body>
    {% block body %}{% endblock %}

    <footer>
        <p>
            &copy; Copyright 2019 - {% now 'Y' %}
            &middot; Honoré Hounwanou
        </p>
    </footer>
</body>
</html>
```

```jinja
{# Fichier: "pages/home.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>
{% endblock %}
```

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block title %}About Us | {{ block.super }}{% endblock %}

{% block body %}
    <h1>Built with &hearts; by Honoré.</h1>
{% endblock %}
```

**((( Image manquante )))**

**((( Image manquante )))**

## 3.10. Assets

Lorsqu'on parle d'assets, on fait généralement référence aux fichiers CSS, JavaScript et aux images.

Au niveau du chapitre suivant, je vous montrerai comment rajouter localement vos propres assets (c'est-à-dire vos fichiers images, CSS & JavaScript dans un dossier de votre projet), mais au niveau de cette section nous allons nous contenter de charger nos assets depuis un site web externe.

### 3.10.1. Affichage du drapeau du Québec

Nous allons premièrement afficher le drapeau du Québec au niveau du template `pages/home.html`.

**((( Image manquante )))**

Modifiez donc le template `pages/home.html` comme suit:

```jinja
{# Fichier: "pages/home.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <img src="https://django-book.s3.ca-central-1.amazonaws.com/quebec-flag.png" alt="Quebec Flag">

    <h1>Hello from Quebec!</h1>

    <p>It is currently {% now 'h:i A' %} in Quebec.</p>
{% endblock %}
```

Rien de bien compliqué! Nous utilisons la balise `img` afin de charger une image depuis [https://django-book.s3.ca-central-1.amazonaws.com/quebec-flag.png](https://django-book.s3.ca-central-1.amazonaws.com/quebec-flag.png).

### 3.10.2. Ajout d'une petite stylisation avec Tailwind CSS

Pour styliser notre application, nous utiliserons le framework CSS [Tailwind CSS](https://tailwindcss.com/). _Tailwind CSS_ vous permet en un temps record de styliser des pages web en vous servant d'un ensemble de classes utilitaires. Très souvent avec _Tailwind CSS_, vous verrez que nous n'avons généralement même pas besoin de rajouter une seule ligne de code CSS!

#### Chargement de Tailwind CSS depuis un CDN

Ouvrez-donc le fichier `layouts/base.html` et modifiez le comme suit afin de charger Tailwind:

```jinja
{# Fichier: "layouts/base.html" #}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Hello City{% endblock %}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    {% block body %}{% endblock %}

    <footer>
        <p>
            &copy; Copyright 2019 - {% now 'Y' %}
            &middot; Honoré Hounwanou
        </p>
    </footer>
</body>
</html>
```

Remarquez que j'ai eu à profiter de l'occasion pour rajouter:

1. l'attribut `lang` à la balise html afin de préciser la langue dans laquelle le contenu du document est écrit.
2. la balise `<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">` afin d'adapter le viewport. Cela aidera pour l'affichage sur les mobiles et tablettes.

#### Stylisation du layout de base

Nous allons rajouter un ensemble de classes utilitaires afin de styliser notre layout de base.

```jinja
{# Fichier: "layouts/base.html" #}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Hello City{% endblock %}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div
        class="flex flex-col items-center justify-between w-full min-h-screen"
    >
        <main
            role="main"
            class="my-6 flex flex-col items-center justify-center"
        >
            {% block body %}{% endblock %}
        </main>

        <footer class="my-6">
            <p class="text-gray-400">
                &copy; Copyright 2019 - {% now 'Y' %}
                &middot; Honoré Hounwanou
            </p>
        </footer>
    </div>
</body>
</html>
```

Ce livre n'a pas pour prétention de vous aider à apprendre à utiliser le framework CSS Tailwind.
Si par contre il s'agit de quelque chose qui vous intéresse, je vous inviterai à jeter un coup à la [documentation officielle de Tailwind CSS](https://tailwindcss.com/screencasts/).

<blockquote class="notice">
    <p><strong>Note:</strong> L'élément HTML <code>&lt;main&gt;</code> représente le contenu principal du <code>&lt;body&gt;</code> du document. Dans notre cas, ce sera à chaque fois le contenu du bloc <code>{% block body %}{% endblock %}</code> étant donné que c'est ce dernier qui est modifié de page en page.</p>
</blockquote>

#### Stylisation de la page home.html

Modifiez ensuite le template `pages/home.html` en remplaçant son contenu actuel par le suivant:

```jinja
{# Fichier: "pages/home.html" #}

{% extends 'layouts/base.html' %}

{% block body %}
    <img
        src="https://django-book.s3.ca-central-1.amazonaws.com/quebec-flag.png"
        alt="Quebec Flag"
        class="h-32 rounded shadow-md mx-auto mt-12"
    >

    <h1 class="mt-5 text-3xl sm:text-5xl font-semibold text-indigo-600">
        Hello from Quebec!
    </h1>

    <p class="text-lg text-gray-800">
        It is currently {% now 'h:i A' %} in Quebec.
    </p>
{% endblock %}
```

#### Stylisation de la page about.html

Faites-en de même pour le template `pages/about.html` en remplaçant son contenu actuel par le suivant:

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block title %}About Us | {{ block.super }}{% endblock %}

{% block body %}
    <img
        src="https://django-book.s3.ca-central-1.amazonaws.com/honore.jpeg"
        alt="Honoré Hounwanou"
        class="my-12 rounded-full shadow-md"
    >

    <h1 class="text-gray-700">
        Built with <span class="text-red-600">&hearts;</span> by Honoré.
    </h1>
{% endblock %}
```

Sentez-vous libre de modifier les différentes images. Je ne serai pas fâché.

## 3.11. Navigation entre nos deux pages

Pour l'instant, il est impossible de naviguer entre nos deux pages sans entrer l'URL manuellement au niveau de la barre d'adresse. Tentons de corriger cela!

```jinja
{# Fichier: "layouts/base.html" #}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Hello City{% endblock %}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div
        class="flex flex-col items-center justify-between w-full min-h-screen"
    >
        <main
            role="main"
            class="my-6 flex flex-col items-center justify-center"
        >
            {% block body %}{% endblock %}
        </main>

        <footer class="my-6">
            <p class="text-gray-400">
                &copy; Copyright 2019 - {% now 'Y' %} &middot;
                <a
                    href="/about-us"
                    class="text-indigo-500 hover:text-indigo-600 underline"
                >
                    About Us
                </a>
            </p>
        </footer>
    </div>
</body>
</html>
```

```jinja
{# Fichier: "pages/about.html" #}

{% extends 'layouts/base.html' %}

{% block title %}About Us | {{ block.super }}{% endblock %}

{% block body %}
    <img
        src="https://django-book.s3.ca-central-1.amazonaws.com/honore.jpeg"
        alt="Honoré Hounwanou"
        class="my-12 rounded-full shadow-md"
    >

    <h1 class="text-gray-700">
        Built with <span class="text-red-600">&hearts;</span> by Honoré.
    </h1>

    <p class="mt-5">
        <a
            href="/"
            class="text-indigo-500 hover:text-indigo-600 underline"
        >
            Revenir à la page d'accueil
        </a>
    </p>
{% endblock %}
```

## 3.12. Déploiement avec Heroku

Maintenant que nous avons créé notre superbe site web _Hello City_, il va falloir le mettre en ligne, on dit également le _déployer_ en production, afin que tout le monde puisse y accéder. En pratique, je vais vous recommander de mettre votre site en ligne le plus tôt possible et ne pas forcément attendre à la fin pour le faire. Il existe des techniques pour restreindre l'accès afin que seules les personnes autorisées puissent y accéder, étant donné que le site est encore en développement. Cela vous permettra de détecter les problèmes en production de manière graduelle.

Nous allons déployer notre première application _Hello City_ en utilisant la plateforme [Heroku](https://www.heroku.com/), qui dispose d'un plan gratuit que nous utiliserons tout au long de ce livre. Les solutions Paas (Plateforme en tant que service) comme Heroku transforme le processus douloureux et long de déploiement en quelque chose qui ne prend que quelques clics de souris et quelques commandes. Dans notre cas, ce sera encore plus simple vu que nous n'aurons pas de base de données à configurer.

Sachez toutefois qu'il est possible de déployer votre application Django en utilisant des services autre que Heroku. On peut citer entre autres:

- [PythonAnywhere](https://www.pythonanywhere.com/)
- [Digital Ocean](https://digitalocean.com/)
- [Linode](https://linode.com/)
- [Django Europe](https://djangoeurope.com/)

<blockquote class="notice">
    <p><strong>Note:</strong> En pratique, il est généralement recommandé d'avoir un environnement de développement local qui miroite l'environnement de production. Cela garantit que les incompatibilités et les bogues difficiles à trouver sont détectés avant le déploiement en production. Par exemple, si vous comptez utiliser PostgreSQL comme système de gestion de base de données (SGBD) en production, il est recommandé également en environnement de développement d'utiliser PostgreSQL comme SGBD. Cela permettra d'éviter toute suprise en production.</p>
</blockquote>

Comme vous l'avez probablement déjà remarqué, Django regorge d'un ensemble de fonctionnalités pour faciliter la vie des développeurs web, mais tous ces outils ne seront d'aucune utilité si vous ne pouvez pas facilement déployer vos sites web. Depuis la création de Django, la facilité de déploiement a été un objectif majeur. Il existe de nombreuses options pour déployer votre application Django, en fonction de votre architecture ou de vos besoins commerciaux particuliers, mais cette discussion dépasse le cadre de ce que ce livre peut vous donner à titre indicatif.

Django, étant un framework web, a besoin d'un serveur web pour fonctionner. Et comme la plupart des serveurs web ne parlent pas nativement Python, nous avons besoin d'une interface pour permettre cette communication.

Django prend actuellement en charge deux interfaces: **WSGI** et **ASGI**.

- _WSGI_ est le principal standard Python pour la communication entre les serveurs web et les applications, mais il ne prend en charge que le code synchrone.
- _ASGI_ est le nouveau standard convivial asynchrone qui permettra à votre site Django d'utiliser des fonctionnalités Python asynchrones (voir par exemple le module [asyncio](https://docs.python.org/3/library/asyncio.html)) et des fonctionnalités Django asynchrones au fur et à mesure de leur développement (voir [la documentation](https://docs.djangoproject.com/fr/3.0/topics/async/) pour plus de détails).

Dans ce livre, nos exemples traiteront principalement du standard WSGI, mais le principe de fonctionnement en ce qui concerne la communication d'un serveur web à un serveur WSGI ou d'un serveur web à un serveur ASGI reste le même. Vous n'aurez donc aucun problème à faire la transition de WSGI à ASGI.

### 3.12.1. Ne pas utiliser Django runserver en production!

La commande `python manage.py runserver` utilisée localement afin de tester notre application est une très bonne commande, conçue pour être commode en développement, mais elle n'est pas destinée à être utilisée dans le cadre d'un environnement de production.

La documentation Django est très catégorique à ce sujet:

**N'UTILISEZ PAS CE SERVEUR EN PRODUCTION. Il n'a pas subi d'audits de sécurité ni de tests de performances.**

Donc, le serveur démarré avec `runserver` n'est pas garanti d'être performant (il est très lent car il ne gère qu'une requête entrante à la fois), et il n'a pas été conçu en ayant comme priorité l'aspect sécurité. Pas donc un très bon candidat pour une utilisation en production.

Alors, quelle est la bonne façon de procéder?

### 3.12.2. La pile de composants en production

En production, vous devez utiliser uniquement des technologies, qui sont fiables, bien testées et qui existent depuis un certain temps.

Une configuration en production se compose généralement de plusieurs composants, chacun étant conçu pour répondre à un besoin bien spécifique. Ils sont rapides et fiables et sécurisés.

Pour un déploiement d'application web Python, il y a deux composants dont vous ne pouvez pas vous passer: un serveur web et un serveur WSGI.

Nginx (exemple de serveur web) et Gunicorn (exemple de serveur WSGI) sont des options solides et populaires -- mais quelles sont ces deux logiciels? Pourquoi les utiliser les deux, et pas seulement l'un d'entre eux?

#### Nginx et Gunicorn travaillent ensemble

**Nginx** est l'endroit où les requêtes de vos utilisateurs arrivent en premier. Il peut les gérer très rapidement, et ce, de manière simultanée.

**Gunicorn** traduit les requêtes qu'il reçoit de Nginx dans un format que votre application web peut gérer et s'assure que votre code est exécuté en cas de besoin.

Ils forment une super équipe! Chacun peut faire quelque chose, ce que l'autre ne peut pas faire. Examinons en détail leurs points forts et comment ils se complètent.

#### Nginx

Nginx est un serveur web et un proxy inverse. Il est hautement optimisé pour tout ce qu'un serveur web doit faire. Voici quelques avantages que vous avez à utiliser Nginx:

- Il prend soin du routage des noms de domaine (décide où les requêtes doivent aller, ou si une réponse d'erreur doit être retournée).
- Il sert des fichiers statiques.
- Il traite de nombreuses requêtes en même temps.
- Il gère les clients lents.
- Il transmet les requêtes qui doivent être dynamiques à Gunicorn.
- Il permet d'économiser les ressources informatiques (CPU et mémoire) par rapport à votre code Python.
- Et bien plus encore: l'équilibrage de charge (load balancing en anglais), la mise en cache, etc.

Les choses que Nginx ne peut pas faire:

- Exécuter des applications web Python.
- Traduire les requêtes pour être compatible WSGI.

#### Gunicorn

Une fois que Nginx décide qu'une requête particulière doit être transmise à Gunicorn (en raison des règles avec lesquelles vous l'avez configuré), il est temps pour Gunicorn de briller.

Gunicorn est vraiment génial dans ce qu'il fait! Il est hautement optimisé et possède de nombreuses fonctionnalités pratiques:

- Exécute un pool de processus de travail/threads (exécutant votre code).
- Traduit les requêtes provenant de Nginx pour être compatible WSGI.
- Traduit les réponses WSGI de votre application en réponses HTTP appropriées.
- Appelle votre code Python lorsqu'une requête arrive.
- Gunicorn peut parler à de nombreux serveurs web différents, pas seulement Nginx.

Ce que Gunicorn ne peut pas faire pour vous:

- Être le point d'entrée principal recevant les requêtes: facile à submerger et à attaquer via [DoS (Déni de Service)](https://fr.wikipedia.org/wiki/Attaque_par_d%C3%A9ni_de_service). Donc lorsque vous êtes en production, vous ne devez jamais mettre Gunicorn comme premier front. En lieu et place de cela, utilisez un serveur comme Nginx qui enverra les requêtes à un pool de travailleurs (pool de works) gunicorn et servira également les fichiers statiques.
- Gunicorn ne peut pas faire le travail d'un serveur web comme Nginx.

Gunicorn n'est que l'un des nombreux serveurs WSGI disponibles. Votre application ne se soucie pas de celui que vous utilisez, et Nginx ne s'en soucie pas non plus. Mais Gunicorn est un excellent choix!

#### Petit récapitulatif

Lorsqu'une requête arrive sur votre serveur, elle doit être transmise à un **serveur web**. [Nginx](https://nginx.com) est un exemple de serveur web.

Un serveur web est un logiciel ayant comme principale tâche de servir des fichiers statiques à partir du disque (vos fichiers css et js par exemple) et gérer plusieurs requêtes à la fois. Si la requête ne concerne pas un fichier statique, mais doit être traitée par votre application, le serveur web est configuré pour transmettre cette requête au prochain composant.

Le prochain composant est un **serveur d'applications (ou serveur WSGI)**. Il récupère ces requêtes et les utilise pour construire des objets Python qui sont utilisables par Django. [WSGI](https://en.wikipedia.org/wiki/web_Server_Gateway_Interface) est une spécification sur laquelle les gens se sont mis d'accord, qui décrit comment cela se produit. [Gunicorn](https://gunicorn.org/) est un exemple de serveur WSGI.

#### Comment Django s'intègre t-il à cette pile de composants?

Votre projet Django fournit un fichier `wsgi.py`, qui contient un objet application qui sera appelé par le serveur WSGI. Cet objet application reçoit un objet Python représentant la requête entrante.

L'objet application appelle ensuite votre code et produit un objet de réponse qui est transmis au serveur WSGI. Là, la réponse est traduite en réponse HTTP et renvoyée au serveur web, qui la remet finalement à l'utilisateur.

Si vous souhaitez exécuter Django en production, assurez-vous d'utiliser un serveur web prêt pour la production comme Nginx et laissez votre application être gérée par un serveur d'applications WSGI comme Gunicorn.

Si vous prévoyez d'utiliser Heroku, un serveur web est fourni implicitement. Vous n'avez pas à vous en occuper. Vous avez juste besoin de spécifier une commande pour exécuter votre serveur d'applications (encore une fois, Gunicorn fera l'affaire) dans un fichier `Procfile`. Nous verrons tout cela en détails dans les prochaines sections.

### 3.12.4. Création d'un compte Heroku

Heroku est un service Paas (Plateforme en tant que service). Grosso-modo, vous n'aurez pas à gérer vous-même l'administration de votre serveur. En local, nous avons utilisé un petit serveur web de développement qui vient avec Django, mais en production ce serveur ne fera pas l'affaire.

Si ce n'est pas encore fait, il va vous falloir dans un premier temps créer un compte utilisateur Heroku. Pour ce faire, utiliser le lien suivant: [https://signup.heroku.com/login](https://signup.heroku.com/login). C'est gratuit!

![Créer un compte sur Heroku](hello-city/heroku-signup.png)

### 3.12.5. Méthode 1: Création d'une application sur Heroku via l'interface web

Il est maintenant temps de créer une application Heroku qui sera associée à notre projet _Hello City_.

Bien qu'il soit possible de le faire via la console en utilisant le client Heroku, je préfère utiliser l'interface web. Ouvrez-donc votre navigateur si ce n'est pas encore fait, rendez-vous ensuite sur [https://heroku.com](https://heroku.com), puis connectez-vous.

![Création d'une application Heroku via l'interface web - Heroku Home](hello-city/create-heroku-app-via-web.png)

![Création d'une application Heroku via l'interface web - Heroku Login](hello-city/create-heroku-app-via-web.png)

![Création d'une application Heroku via l'interface web - Heroku Dashboard](hello-city/create-heroku-app-via-web.png)

Une fois au niveau de votre tableau de bord, cliquez sur [New -> Create new app](https://dashboard.heroku.com/new-app):

1. Donnez ensuite un nom à votre application (ou laissez le champ `App name` vide, Heroku se chargera de vous générer un nom d'application aléatoire). Si vous précisez un nom d'application et que ce dernier est déjà pris, il vous faudra en choisir un autre.
2. Choisissez ensuite la région la plus proche de votre emplacement. Dans mon cas, ce sera _United States_ vu que je réside au Canada.
3. Cliquer pour terminer sur `Create app`.

Dans mon cas, le nom qui a été donné à mon application est `young-brook-43267`.

### 3.12.6. Méthode 2: Création d'une application sur Heroku via la console

#### Étape 1: Installation du client Heroku

Il va nous falloir dans un premier temps installer le client Heroku.

Quelque soit votre système d'exploitation, il suffit de vous rendre sur [la page de téléchargement](https://devcenter.heroku.com/articles/heroku-cli) et suivre les instructions d'installation qui s'y trouvent.

<blockquote class="notice">
    <p><strong>Note:</strong> Une fois le client Heroku installé, à tout moment, vous pouvez utiliser la commande <code>heroku update</code> afin de mettre à jour votre client Heroku.</p>
</blockquote>

#### Étape 2: Connexion au compte utilisateur Heroku

Ouvrez à présent la console et exécutez la comme suivante afin de vous connecter à votre compte Heroku:

```bash
$ heroku login
heroku: Press any key to open up the browser to login or q to exit:
```

Appuyez ensuite sur n'importe quelle touche afin de continuer le processus de connexion au niveau du navigateur.

![Connexion du client Heroku à notre compte (1/2)](hello-city/heroku-login-1.png)

![Connexion du client Heroku à notre compte (2/2)](hello-city/heroku-login-2.png)

Une fois connecté, vous pouvez fermer la fenêtre ouverte au niveau du navigateur et revenir au niveau de la console où vous verrez un message comme le suivant:

```bash
Logging in... done
Logged in as parlonscode@gmail.com
```

<blockquote class="notice">
    <p><strong>Note:</strong> Il est possible d'utiliser l'option <code>-i</code> afin de ne pas avoir à ouvrir le navigateur pour terminer le processus de connexion. <code>heroku login -i</code>.</p>
</blockquote>

#### Étape 3: Création de l'application

Pour créer notre application Heroku, il suffira d'utiliser la commande `heroku create`. Assurez-vous premièrement d'être dans le dossier de votre projet `hello_city`.

```bash
$ heroku create
Creating app... done, young-brook-43267
https://young-brook-43267.herokuapp.com/ | https://git.heroku.com/young-brook-43267.git
```

Dans mon cas, le nom qui a été donné à mon application est **young-brook-43267**.

<blockquote class="notice">
    <p><strong>Note:</strong> Il est possible de préciser le nom de votre application Heroku de cette manière: <code>heroku create hello-city</code>. Si ce nom n'est pas déjà pris, il sera assigné à votre application. Sinon il vous faudra en choisir un autre. Il est également possible de préciser la région en utilisation l'option <code>--region</code>. Ce sera <code>eu</code> pour l'Europe et <code>us</code> pour les États-Unis. <code>heroku create ma-belle-app-django --region us</code>.</p>
</blockquote>

### 3.12.7. Ouverture de l'application au niveau du navigateur

Si vous ouvrez votre navigateur et vous vous rendez à l'adresse de votre application, dans mon cas [https://young-brook-43267.herokuapp.com](https://young-brook-43267.herokuapp.com), vous verrez à quoi ressemble actuellement votre application.

<blockquote class="notice">
    <p><strong>Note:</strong> Il est également possible d'utiliser la commande <code>heroku open -a young-brook-43267</code> afin d'ouvrir votre application au niveau du navigateur. Il faudra bien évidemment remplacer <code>young-brook-43267</code> par le nom de votre application.</p>
    <p>Si vous êtes dans le dossier de votre projet (dossier dans lequel vous avez exécuté la commande <code>heroku create</code>), vous pouvez simplement taper <code>heroku open</code>.</p> 
</blockquote>

![Page d'accueil par défaut d'une application Heroku](hello-city/default-heroku-welcome-page.png)

Pour l'instant, nous avons la page par défaut de Heroku vu que nous n'avons pas encore déployé notre projet Django.

Si vous vous rendez au niveau de votre tableau de bord Heroku, vous verrez votre application Heroku listée parmi les applications que vous avez eu à créer.

![Application Heroku créée avec succès](hello-city/heroku-app-listed-in-dashboard.png)

### 3.12.8. Création du fichier requirements.txt

Au niveau du [chapitre 2](#chapter-2-premiers-pas-avec-pip), on avait vu qu'il était possible d'utiliser la commande `pip list` afin de lister les dépendances actuelles de notre projet.

```bash
(hello-city-venv)$ pip list
Package    Version
---------- -------
asgiref    3.2.7
Django     3.0.5
pip        20.1
pytz       2019.3
setuptools 41.2.0
sqlparse   0.3.1
```

Il existe également la commande `pip freeze` qui permet de faire la même chose, simplement que la liste générée est dans un format différent.
En effet, la commande `pip freeze` permet de lister l'ensemble des dépendances dans un format adapté au fichier `requirements.txt`.

```bash
(hello-city-venv)$ pip freeze
asgiref==3.2.7
Django==3.0.5
pytz==2019.3
sqlparse==0.3.1
```

Le fichier `requirements.txt` est simplement un fichier qui aura comme contenu ce qui aura été généré par la commande `pip freeze`.

En pratique, on exécute donc la commande `pip freeze` et on fait ensuite un copier-coller de la liste affichée dans un fichier nommé `requirements.txt`. Le fichier doit avoir pour nom `requirements.txt`, c'est une convention. En suivant cette convention, lorsque vous déployerez votre projet sur Heroku, les dépendances qui auront été spécifiées dans votre fichier `requirements.txt` seront automatiquement installées avant le démarrage de votre application Heroku.

En effet, Heroku n'aura qu'à exécuter la commande `pip install -r requirements.txt` afin d'installer les dépendances listées au niveau du fichier `requirements.txt`. Cette commande peut s'avérer également intéressante si vous travaillez en équipe. Tout ce que votre coéquiper aura à faire, c'est créer un environnement virtuel, puis exécuter la commande `pip install -r requirements.txt` afin d'installer toutes les dépendances requises pour le projet. Pour ceux qui ont déjà eu à faire du PHP, c'est l'équivalent du fichier `composer.json`. Pour ceux qui ont déjà eu à faire du JavaScript, c'est l'équivalent du fichier `package.json`. Pour ceux qui ont déjà eu à faire du Ruby, c'est l'équivalent du fichier `Gemfile`.

Aussi, Heroku reconnaît automatiquement votre projet comme un projet Python si ce dernier inclut un fichier `requirements.txt`, `setup.py` ou `Pipfile` dans son répertoire racine. Ainsi, une fois le fichier `requirements.txt` rajouté à la racine de notre projet _Hello City_, Heroku pourra maintenant le reconnaître comme étant un projet `Python`. Wouhou!

Dans le prochain chapitre, je vous montrerai une alternative au fichier `requirements.txt` qui est le fichier `Pipfile`.

<blockquote class="notice">
    <p><strong>Note:</strong> Si vous êtes sous Linux ou macOS, vous pouvez utiliser la commande: <code>pip freeze > requirements.txt</code>. Ceci va permettre de mettre directement la liste générée par la commande <code>pip freeze</code> dans un fichier nommé <code>requirements.txt</code>.</p>
</blockquote>

Je vous laisse donc générer votre fichier `requirements.txt`.

#### Windows

1. Exécutez premièrement la commande `pip freeze`.
2. Créez ensuite manuellement le fichier `requirements.txt` à la racine de votre projet (c'est-à-dire dans le même dossier où se trouve le fichier `manage.py`).
3. Copier la liste générée par la commande `pip freeze` puis utilisez la comme contenu pour le fichier `requirements.txt` précédemment créé.

### Linux ou macOS

```bash
(hello-city-venv)$ pip freeze > requirements.txt
```

La structure de votre projet projet devrait à présent ressembler à cela:

```bash
.
├── db.sqlite3
├── hello_city
├── manage.py
├── requirements.txt # <--- Le fichier nouvellement rajouté
└── templates
```

### 3.12.9. Création du fichier runtime.txt

Par défaut, les nouvelles applications Django sur Heroku utilisent la version Python `3.6.12`. Pour obtenir plus de détails, vous pouvez visiter cette [page](https://devcenter.heroku.com/articles/python-support#specifying-a-python-version).

Pour spécifier une version de Python différente que celle utilisée par défaut, il vous suffira de rajouter un fichier `runtime.txt` au répertoire racine de votre projet qui déclare le numéro de version exact à utiliser.

Vu que nous avons eu à utiliser la version _3.9.0_ de Python pour notre projet _Hello City_, c'est donc cela que nous allons indiquer comme contenu pour le fichier `runtime.txt`.

Le format utilisé par le fichier `runtime.txt` est sensible à la casse et ne doit pas inclure d'espaces. Vous devez également spécifier les trois composants du numéro de version (majeur, mineur et correctif). Ex: `python-3.9.0`. Si vous ne respectez pas ce format, votre application ne se déploiera pas.

<blockquote class="notice">
    <p><strong>Note:</strong> Afin de vérifier quelle version de Python vous utilisez localement, activez votre environnement virtuel et utilisez la commande <code>python -V</code>.</p>
</blockquote>

<blockquote class="notice">
    <p><strong>Note:</strong> Le fichier <code>runtime.txt</code> est spécifique à Heroku.</p>
</blockquote>

#### Windows

1. Créez un fichier `runtime.txt` à la racine de votre projet (c'est-à-dire dans le même dossier où se trouve le fichier `manage.py`).
2. Rajoutez-y ensuite comme contenu `python-3.9.0`.

### Linux ou macOS

```bash
(hello-city-venv)$ echo 'python-3.9.0' > runtime.txt
```

Cette commande permet de créer un fichier `runtime.txt` avec comme contenu `python-3.9.0`.

La structure de votre projet projet devrait à présent ressembler à cela:

```bash
.
├── db.sqlite3
├── hello_city
├── manage.py
├── requirements.txt
├── runtime.txt # <--- Le fichier nouvellement rajouté
└── templates
```

### 3.12.10. Notion de dynos avec Heroku

Les développeurs d'applications s'appuient sur des abstractions logicielles pour simplifier le développement et améliorer la productivité. Lorsqu'il s'agit d'exécuter des applications, la conteneurisation élimine la charge de la gestion du matériel ou des machines virtuelles. Au lieu de la gestion du matériel, vous déployez une application sur Heroku, qui regroupe le code et les dépendances de l'application dans des conteneurs - des environnements légers et isolés qui fournissent du calcul, de la mémoire, un système d'exploitation et un système de fichiers éphémère. Les conteneurs sont généralement exécutés sur un hôte partagé, mais sont complètement isolés les uns des autres.

La [plateforme Heroku](https://www.heroku.com/platform) utilise le modèle de conteneur pour exécuter et "scaler" (faire évoluer à l'échelle) toutes les applications Heroku. Les conteneurs utilisés au niveau de Heroku sont appelés **«dynos»**. Les dynos sont des conteneurs Linux virtualisés isolés qui sont conçus pour exécuter du code basé sur une commande spécifiée par l'utilisateur. Votre application peut utiliser autant de dynos que vous le souhaitez en fonction de ses besoins en ressources. Les capacités de gestion des conteneurs de Heroku vous offrent un moyen simple de faire évoluer et de gérer le nombre, la taille et le type de dynos dont votre application peut avoir besoin à tout moment.

Dynos sont les blocs fondamentaux qui alimentent n'importe quelle application Heroku, de la plus simple à plus sophistiquée. Déployer sur des dynos et s'appuyer sur la gestion des dynos de Heroku, vous permet de créer et d'exécuter des applications flexibles et évolutives en toute simplicité, ce qui vous libère de la gestion de l'infrastructure, vous permettant ainsi de vous concentrer sur la création et l'exécution d'excellentes applications.

Si vous n'avez rien compris de tout ce qui a été dit plus haut, vous pouvez simplement retenir que plus vous allez avoir de dynos, plus vous allez avoir de puissance de calcul et de mémoire. Cela sous-entend également que vous allez payer [beaucoup plus cher](https://www.heroku.com/dynos).

Étant donné que dans notre cas, il s'agit d'une petite application demo, nous allons utiliser le dyno qui offert gratuitement par Heroku. Plus tard, si vous souhaitez mettre votre site en ligne et que vous voyez qu'il est lent à charger, il faudra bien évidemment rajouter des dynos supplémentaites.

<blockquote class="notice">
    <p><strong>Note:</strong> Les applications qui utilisent le type dyno gratuit se mettront en veille après 30 minutes d'inactivité. La mise à l'échelle vers plusieurs dynos web, ou un type de dyno différent, permet d'éviter cela.</p>
</blockquote>

### 3.12.11. WSGI (web Server Gateway Interface)

La **W**eb **S**erver **G**ateway **I**nterface (WSGI), prononcé "whiskey", est une spécification assez simple permettant aux serveurs web de transférer les requêtes reçues à des applications ou frameworks web écrits dans le langage de programmation Python. La version actuelle de WSGI, la version 1.0.1, est spécifiée dans la [Python Enhancement Proposal (PEP) 3333](https://www.python.org/dev/peps/pep-3333/).

En 2003, les frameworks web Python étaient généralement écrits pour fonctionner uniquement avec _CGI_, _FastCGI_, _mod_python_ ou d'autres APIs personnalisées d'un serveur web spécifique.

WSGI a ainsi été créée en tant qu'implémentation agnostique d'une interface entre les serveurs web et les applications ou frameworks web pour promouvoir un terrain d'entente pour le développement d'applications web portables.

De nombreux frameworks web prennent en charge WSGI:

- [Django](https://www.djangoproject.com/)
- [Flask](https://flask.palletsprojects.com/)
- [Bottle](https://bottlepy.org/)
- [CherryPy](https://cherrypy.org/)
- [Pyramid](https://trypyramid.com/)
- [Tornado](https://www.tornadoweb.org/)
- [TurboGears](https://turbogears.org/)

La spécification WSGI est composée de deux parties:

- Le côté serveur/passerelle: Il s'agit souvent d'un serveur web complet tel qu'[Apache](https://httpd.apache.org/) ou [Nginx](https://www.nginx.com/), ou d'un serveur d'applications léger qui peut communiquer avec un serveur web.
- Le côté application/framework. Il s'agit d'un appelable Python (_callable_ en anglais), fourni par le programme ou le framework Python.

Entre le serveur et l'application, il peut y avoir un ou plusieurs composants middleware WSGI, qui implémentent les deux côtés de l'API, généralement en code Python.

WSGI ne spécifie pas comment démarrer l'interpréteur Python, ni comment charger ou configurer l'objet d'application, et différents frameworks et serveurs web y parviennent de différentes manières.

### 3.12.12. Django et WSGI

La commande `django-admin startproject` de Django définit pour vous une configuration WSGI minimale par défaut, que vous pouvez modifier au besoin pour votre projet, et diriger tout serveur d'applications compatible WSGI à utiliser.

Le concept clé du déploiement avec WSGI est l'appelable d'application que le serveur d'applications utilise pour communiquer avec votre code. Il est généralement fourni sous la forme d'un objet nommé `application dans un module Python accessible au serveur.

La commande `django-admin startproject` crée un fichier `<nom_projet>/wsgi.py` (dans notre cas `hello_city/wsgi.py`) qui contient une telle application appelable.

Cet appelable est utilisé à la fois par le serveur de développement de Django et dans les déploiements WSGI de production.

Les serveurs WSGI obtiennent le chemin d'accès à l'application appelable à partir de leur configuration. Le serveur intégré de Django -- accesible au travers de la commande `runserver` -- le lit à partir du paramètre `WSGI_APPLICATION` présent au niveau du fichier `settings.py`. Par défaut, il est défini avec comme valeur `<nom_projet>.wsgi.application` (dans notre cas `hello_city.wsgi.application`), qui pointe vers l'application appelable dans `<nom_projet>/wsgi.py` (dans notre cas `hello_city/wsgi.py`).

### 3.12.13. Gunicorn

Les applications web qui traitent simultanément plusieurs requêtes HTTP entrantes font une utilisation beaucoup plus efficace des ressources dyno que les applications web qui ne traitent qu'une seule requête à la fois. Pour cette raison, il est recommandé en production d'utiliser des serveurs web qui prennent en charge le traitement parallèle de plusieurs requêtes HTTP.

Le framework web Django dispose d'un serveur web de développement pratique, mais ce serveur ne traite qu'une seule requête à la fois. Si vous déployez donc votre application avec ce serveur sur Heroku, vos ressources dyno seront sous-utilisées et votre application ne répondra pas.

Si vous vous rappelez, c'est l'une des raisons pour lesquelles j'avais mentionné que le serveur de développement intégré à Django n'était pas un serveur adapté pour la production.

Le serveur HTTP de production recommandé pour les projets Django au niveau de Heroku est [Gunicorn](https://gunicorn.org/). Il offre un équilibre parfait entre performances, flexibilité et simplicité de configuration.

Gunicorn («Green Unicorn») est un serveur HTTP WSGI écrit en Python. Il est préférable d'utiliser Gunicorn derrière un serveur proxy HTTP comme Nginx, et c'est ce que Heroku fait en coulisse.

Voici donc les étapes à suivre:

1. Installer _Gunicorn_
2. Indiquer par la suite à _Gunicorn_ que notre application appelable se trouve au niveau du fichier `hello_city/wsgi.py`, en d'autres termes dans le module `wsgi` présent au niveau du package `hello_city`.

### 3.12.14. Installation de Gunicorn

Gunicorn peut être installé via `pip` en exécutant la commande:
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ pip install gunicorn
Collecting gunicorn
  Downloading gunicorn-20.0.4-py2.py3-none-any.whl (77 kB)
     |████████████████████████████████| 77 kB 1.1 MB/s
Requirement already satisfied: setuptools>=3.0 in /Library/Frameworks/Python.framework/Versions/3.9/lib/python3.9/site-packages (from gunicorn) (41.2.0)
Installing collected packages: gunicorn
Successfully installed gunicorn-20.0.4
```

Il ne faudra pas oublier après de rajouter `gunicorn` à la liste de nos dépendances dans le fichier `requirements.txt`.
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ pip freeze
certifi==2019.11.28
gunicorn==20.0.4
mypy==0.740
mypy-extensions==0.4.3
text-unidecode==1.3
typed-ast==1.4.0
typing-extensions==3.7.4.1
```

#### Windows

1. Exécutez premièrement la commande `pip freeze`.
2. Modifiez ensuite le contenu du fichier `requirements.txt` avec la nouvelle liste générée par la commande `pip freeze`.

### Linux ou macOS

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ pip freeze > requirements.txt
```

### 3.12.15. Création du fichier Procfile

Les applications web Heroku nécessitent un fichier `Procfile`. Ce fichier permet de spécifier les commandes à exécuter au démarrage de votre application Heroku. Vous pouvez utiliser un `Procfile` pour déclarer une variété de types de processus, notamment: le serveur web à utiliser pour votre application, les tâches à exécuter avant le déploiement d'une nouvelle version, etc.

<blockquote class="notice">
    <p><strong>Note:</strong> Techniquement, un <code>Procfile</code> n'est pas requis pour déployer des applications simples écrites dans la plupart des langages pris en charge par Heroku - la plateforme détecte automatiquement le langage et crée un type de processus web par défaut pour démarrer le serveur d'applications. Cependant, la création d'un <code>Procfile</code> explicite est recommandée pour plus de contrôle et de flexibilité sur votre application.</p>
</blockquote>

#### Conventions de nommage et emplacement

Le fichier `Procfile` est un simple fichier texte nommé `Procfile` avec un **p** majuscule et sans extension de fichier. Par exemple, `Procfile.txt` n'est pas valide.

Le `Procfile` doit se trouver à la racine de votre projet. Cela ne fonctionnera pas s'il est placé ailleurs.

#### Format du fichier Procfile

Un fichier `Procfile` déclare ses types de processus sur des lignes individuelles, chacune au format suivant:

```bash
<type de processus>: <commande>
```

- `<type de processus>` est un nom alphanumérique pour votre type de processus, tel que `web`, `worker`, `urgentworker`, `clock`, etc.
- `<commande>` indique la commande que chaque dyno du type de processus doit exécuter au démarrage de votre application.

#### Le type de processus web

Les dynos qui exécutent des types de processus nommés `web` sont différents de tous les autres dynos -- ils recevront du trafic HTTP. Les routeurs HTTP de Heroku distribuent les requêtes entrantes pour votre application sur vos dynos `web` en cours d'exécution.

Si votre application comprend un serveur HTTP (dans notre cas _Gunicorn_), vous devez le déclarer comme processus `web` de votre application.

Ainsi, le `Procfile` pour notre projet Django _hello_city_ utilisant _Gunicorn_ comme serveur HTTP peut inclure le type de processus `web` avec la commande suivante:

```bash
web: gunicorn hello_city.wsgi
```

Le code ci-dessus nous permet d'indiquer le type de processus `web` et la commande nécessaire pour l'exécuter. Comme indiqué précédemment, le mot `web` est important ici. Il déclare que ce type de processus sera attaché à la pile de routage HTTP de Heroku et recevra du trafic web une fois déployé.

Nous indiquons par la suite à Gunicorn via la commande `gunicorn hello_city.wsgi` que l'application appelable se trouve au niveau du module `wsgi` présent au niveau du package `hello_city`.

En mettant `hello_city.wsgi`, nous faisons référence au module `wsgi` se trouvant au niveau du package `hello_city`, et si vous vous rappelez c'est ce module dans lequel est défini notre application appelable WSGI.

```bash
.
├── Procfile
├── db.sqlite3
├── hello_city
│   ├── __init__.py
│   ├── asgi.py
│   ├── settings.py
│   ├── urls.py
│   ├── views.py
│   └── wsgi.py # <--- Je fais référence à ce fichier wsgi.py
├── manage.py
├── requirements.txt
├── runtime.txt
└── templates
    ├── layouts
    └── pages
```

Créez donc un fichier `Procfile` à la racine de votre projet ayant comme contenu:

```bash
web: gunicorn hello_city.wsgi
```

La structure de votre projet projet devrait à présent ressembler à cela:

```bash
.
├── Procfile # <--- Le fichier nouvellement rajouté
├── db.sqlite3
├── hello_city
├── manage.py
├── requirements.txt
├── runtime.txt
└── templates
```

### 3.12.16. Déploiement avec Git

Ladies and Gentlemen, le moment est maintenant venu d'utiliser Git afin de nous faciliter le processus de déploiement de notre application.

Git est ce qu'on appelle un logiciel de gestion de versions. Il permet de tracker les différents changements apportés à votre code source. Comme indiqué précédemment, pour suivre ce livre, vous n'avez pas besoin d'être un expert Git, d'autant plus que je n'en suis pas un. Il vous faudra toutefois connaître quelques commandes de base. Si ce n'est pas encore fait, je vous inviterai à regarder [ma série de 12 vidéos sur Git](https://www.youtube.com/watch?v=zNxGgI6O5NE&list=PLlxQJeQRaKDRBd_FazeI7gLq5wyrt7f7J). Croyez-moi, en tant que développeur, cela vous facilitera grandement la vie!

#### Création du fichier .gitignore

Nous allons premièrement rajouter un fichier `.gitignore` à notre projet afin d'indiquer les fichiers et dossiers à ne pas tracker. Il faudra créer ce fichier `.gitignore` à la racine de notre projet.

J'aime utiliser le site [gitignore.io/](https://www.gitignore.io/) afin de très facilement générer un fichier `.gitignore` pour n'importe quel type de projet: des projets Django, Laravel, Symfony, etc.

**((( Image manquante )))**

**((( Image manquante )))**

{caption: "Fichier .gitignore"}

```bash
### Django ###
*.log
*.pot
*.pyc
__pycache__/
db.sqlite3

### Static Files ###
staticfiles

### Django.Python Stack ###
# Byte-compiled / optimized / DLL files
*.py[cod]
*$py.class

### Environment Variables ###
.env
```

Si votre environnement virtuel se trouve à la racine de votre projet `hello_city`, il faudra également le rajouter au niveau du fichier `.gitignore`. Par exemple, si mon environnement virtuel `hello-city-venv` se trouve à la racine de mon projet `hello_city`, c'est-à-dire dans le même dossier que le fichier `manage.py`, j'allais rajouté la ligne `hello-city-venv` à mon fichier `.gitignore` comme suit:

```bash
### Django ###
*.log
*.pot
*.pyc
__pycache__/
db.sqlite3

...

### Virtual Environments ###
hello-city-venv
```

Vu que mon environnement virtuel ne se trouve pas à la racine de mon projet `hello_city`, pas besoin donc de rajouter ceci à mon fichier `.gitignore`.

Mon fichier `.gitignore` ressembler donc à ceci:

{caption: "Fichier .gitignore"}

```bash
### Django ###
*.log
*.pot
*.pyc
__pycache__/
db.sqlite3

### Static Files ###
staticfiles

### Django.Python Stack ###
# Byte-compiled / optimized / DLL files
*.py[cod]
*$py.class

### Environment Variables ###
.env
```

#### Initialisation de notre projet comme un dépôt git

Nous allons ensuite initialiser notre projet Django comme un dépôt Git en utilisant la commande suivante:
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git init
Initialized empty Git repository in /Users/freedev/Code/PremiersPasAvecDjango/hello_city/.git/
```

Assurez-vous d'être à la racine de votre projet `hello_city`.

#### Premier commit

Nous allons à présent faire notre premier commit.
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git add -A
(hello-city-venv)$ git commit -m "Initial commit & Heroku Setup"
```

Nous ajoutons premièrement l'ensemble de nos fichiers (exceptés ceux listés au niveau du fichier `.gitignore`) à notre staging area. La command `add` permet de marquer les changements qui seront inclus dans le prochain commit.
Nous utilisons ensuite la commande `git commit` afin de créer notre commit avec le message _Initial commit & Heroku Setup_.

#### Configuration du dépôt distant Heroku

Afin de configurer le dépôt distant Heroku vers lequel nous allons copier notre code, il faudra exécuter la commande suivante:
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku git:remote -a young-brook-43267
```

Il vous faudra remplacer `young-brook-43267` par le nom de votre application Heroku précédemment créée.

Nous pouvons exécuter la commande `git remote -v` afin de confirmer que notre dépôt distant Heroku a bien été configuré.
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git remote -v
heroku  https://git.heroku.com/young-brook-43267.git (fetch)
heroku  https://git.heroku.com/young-brook-43267.git (push)
```

#### Déploiement de notre projet

Pour déployer notre projet, il faudra pour terminer exécuter la commande `git push heroku master`:
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git push heroku master
Enumerating objects: 20, done.
Counting objects: 100% (20/20), done.
Delta compression using up to 4 threads
Compressing objects: 100% (16/16), done.
Writing objects: 100% (20/20), 4.61 KiB | 786.00 KiB/s, done.
Total 20 (delta 1), reused 0 (delta 0)
remote: Compressing source files... done.
remote: Building source:
remote:
remote: -----> Python app detected # <--- Grâce au fichier requirements.txt
remote: -----> Installing python-3.9.0 # <--- Grâce au fichier runtime.txt
remote: -----> Installing pip
remote: -----> Installing SQLite3
remote: -----> Installing requirements with pip # <-- C'est ici qu'on fait le pip install -r requirements.txt
remote:        Collecting certifi==2019.11.28
remote:          Downloading certifi-2019.11.28-py2.py3-none-any.whl (156 kB)
...
remote:
remote:  !     Error while running '$ python manage.py collectstatic --noinput'.
remote:        See traceback above for details.
remote:
remote:        You may need to update application code to resolve this error.
remote:        Or, you can disable collectstatic for this application:
remote:
remote:           $ heroku config:set DISABLE_COLLECTSTATIC=1
remote:
remote:        https://devcenter.heroku.com/articles/django-assets
remote:  !     Push rejected, failed to compile Python app.
remote:
remote:  !     Push failed
remote: Verifying deploy...
remote:
remote: !   Push rejected to young-brook-43267.
remote:
To https://git.heroku.com/young-brook-43267.git
 ! [remote rejected] master -> master (pre-receive hook declined)
error: failed to push some refs to 'https://git.heroku.com/young-brook-43267.git'
```

Nous avons cette erreur parce que Heroku tente d'exécuter la commande `python manage.py collectstatic` afin de collecter nos assets (fichiers images, CSS et JavaScript), mais malheureusement nous n'avons pas eu à configurer les assets.

Pour cette application, nous allons désactiver la collecte de fichiers statiques en utilisant la commande:
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku config:set DISABLE_COLLECTSTATIC=1
Setting DISABLE_COLLECTSTATIC and restarting young-brook-43267... done, v6
DISABLE_COLLECTSTATIC: 1
```

La commande `heroku config:set DISABLE_COLLECTSTATIC=1` permet de configurer une variable d'environnement `DISABLE_COLLECTSTATIC` au niveau de Heroku ayant comme valeur `1`. Si cette variable d'environnement est configurée avec la valeur `1`, Heroku n'exécutera plus la commande `python manage.py collectstatic`. Ainsi, nous n'aurons plus d'erreurs en rapport avec la collecte de fichiers statiques.

Nous verrons dans le prochain chapitre comment gérer les assets au niveau d'un projet Django. Ne vous inquiétez donc pas!

Il est également possible de rajouter une variable d'environnement via l'interface web de Heroku.

**((( Image manquante )))**

**((( Image manquante )))**

**((( Image manquante )))**

Tentons à présent de refaire le déploiement:
{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git push heroku master
Enumerating objects: 5, done.
Counting objects: 100% (5/5), done.
Delta compression using up to 4 threads
Compressing objects: 100% (3/3), done.
Writing objects: 100% (3/3), 410 bytes | 410.00 KiB/s, done.
....
remote: -----> Discovering process types # <--- Grâce au fichier Procfile
remote:        Procfile declares types -> web
remote:
remote: -----> Compressing...
remote:        Done: 77M
remote: -----> Launching...
remote:        Released v7
remote:        https://young-brook-43267.herokuapp.com/ deployed to Heroku
remote:
remote: Verifying deploy... done.
To https://git.heroku.com/young-brook-43267.git
   69afd65..9888b20  master -> master
```

Cette fois-ci, il semblerait que tout se soit bien déroulé! Wouhou!

#### Admirons notre fabuleux travail

Vous pouvez à présent utiliser la commande `heroku open` ou ouvrir votre navigateur et taper dans la barre d'adresse [https://young-brook-43267.herokuapp.com/](https://young-brook-43267.herokuapp.com/).

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku open -a young-brook-43267
```

<blockquote class="notice">
    <p><strong>Astuce:</strong> Si vous êtes dans le dossier de votre projet, vous pouvez simplement taper la commande <code>heroku open</code> sans préciser l'option <code>-a</code>.</p>
</blockquote>

Il vous faudra remplacer `young-brook-43267` par le nom de votre application Heroku précédemment créée.

**((( Image manquante )))**

Encore des erreurs!

#### Configuration du paramètre ALLOWED_HOSTS

L'erreur est toute simple, on nous indique que nous devons modifier le paramètre `ALLOWED_HOSTS` présent au niveau du fichier `settings.py` et rajoutez la chaîne de caractères `'young-brook-43267.herokuapp.com'`.

{caption: "settings.py"}

```python
ALLOWED_HOSTS = ['young-brook-43267.herokuapp.com']
```

Ce paramètre est requis pour protéger votre site contre certaines attaques CSRF.

Commitons nos changements et faisons un autre push.

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git add -A
(hello-city-venv)$ git commit -m "Allow domain 'young-brook-43267.herokuapp.com'"
(hello-city-venv)$ git push heroku master
```

**((( Image manquante )))**

Ça marche! Yeah!

#### Ne célébrons pas trop vite!

Bien vrai que notre application _Hello City_ fonctionne en production, nous avons plein de petits problèmes à résoudre.

1. La première erreur est **TRÈS** grave, car elle rend notre applicable vulnérable à plusieurs failles de sécurité.

{caption: "settings.py"}

```python
# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = 'enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io'
```

En production, la valeur du paramètre `SECRET_KEY` présent au niveau du fichier `settings.py` ne doit **JAMAIS** être écrite en dur au niveau de votre code source. Elle est utilisée dans le contexte de la signature cryptographique, et doit avoir une valeur unique et non prédictible. Une projet Django avec une clé `SECRET_KEY` connue de tous réduit à néant de nombreuses protections de sécurité de Django et peut donner lieu à une escalade de privilèges et à des vulnérabilités d'exécution de code à distance. Il faudra régler ce problème au plus vite, car actuellement, toute personne ayant accès à notre code source aura également accès à notre clé secrète.

Django a tenté même de nous avertir via un commentaire: **SECURITY WARNING: keep the secret key used in production secret!** qui signifie **AVERTISSEMENT DE SÉCURITÉ: gardez secrète la clé secrète utilisée en production!**. Il va donc nous falloir trouver un moyen d'extraire la valeur de la clé secrète de notre code source.

2. Les erreurs et informations de débogage sont affichées en production. En local, cela s'avère utile pour nous aider à corriger nos différents bogues. En production par contre, c'est une **très** mauvaise idée d'afficher les informations de débogage car vous risquez de divulguer des informations sensibles sans le savoir (des extraits de votre code source, des variables locales, des paramètres, les bibliothèques utilisées, etc.). Il va donc nous falloir désactiver le débogage en production.

**((( Image manquante )))**

Pour corriger ce problème, il va falloir mettre le paramètre `DEBUG` présent au niveau du fichier `settings.py` à `False`.

3. Le second problème est que notre application ne fonctionne plus en local. Essayez de démarrer le serveur en local et vous verrez par vous même. Il faudra donc corriger ce problème également.

**((( Image manquante )))**

L'erreur est liée à la configuration du paramètre `ALLOWED_HOSTS` que nous avons rajoutée au niveau du fichier `settings.py`. Le seul hôte autorisé actuellement est `'young-brook-43267.herokuapp.com'`, alors qu'en développement l'hôte est `'127.0.0.1'`. Il va donc falloir rajouter `'127.0.0.1'` à notre liste d'hôtes autorisés.

Lorsque `DEBUG` vaut `True` et que `ALLOWED_HOSTS` est une liste vide, les hôtes autorisés sont `'localhost'`, `'127.0.0.1'` et `'[::1]'`. `'[::1]'` est l'équivalent IPv6 du `127.0.0.1` ou `localhost`.

### 3.12.17. Les variables d'environnements

Afin de corriger les deux problèmes énoncés plus haut, nous allons nous servir du concept de variables d'environnement. Les variables d'environnements sont des variables que vous pouvez définir au niveau de votre système d'exploitation et y accéder plus tard via le code. En d'autres termes, vous pourrez définir des variables d'environnement au niveau de votre machine (Windows, Linux ou macOS) et y accéder plus tard via du code Python, Java, Ruby, PHP, etc.

#### Manipulation des variables d'environnement sous macOS ou Linux

Pour créer une variable d'environnement sous macOS ou Linux, il vous suffira d'utiliser la commande `export` comme suit:

{caption: "Ligne de commande"}

```bash
$ export PYTHON_CREATOR='Guido van Rossum'
```

La commande ci-dessus permet de créer une variable d'environnement ayant comme nom `PYTHON_CREATOR` et comme valeur `Guido van Rossum`. Étant donné que la valeur `Guido van Rossum` contient des espaces, nous sommes obligés de l'entourer de quotes. On aurait pu utiliser les doubles quotes également comme suit:

{caption: "Ligne de commande"}

```bash
$ export PYTHON_CREATOR="Guido van Rossum"
```

Pour afficher ensuite la valeur d'une variable d'environnement, on pourra se servir de la commande `echo`:

{caption: "Ligne de commande"}

```bash
$ echo $PYTHON_CREATOR
Guido van Rossum
```

Comme on peut le voir, on met `echo`, suivi du symbole `$`, suivi ensuite du nom de la variable d'environnement. Il est important de préfixer le nom de la variable d'environnement d'un `$` sinon cela ne marchera pas.

{caption: "Ligne de commande"}

```bash
$ echo PYTHON_CREATOR
PYTHON_CREATOR
```

La commande `echo` permet d'afficher quelque chose au niveau de la console. Si vous oubliez de mettre le `$`, elle pensera que vous souhaitez afficher littéralement `PYTHON_CREATOR`. Il faudra mettre le `$` afin de lui indiquer que vous faites référence à une variable d'environnement.

Si je demande la valeur d'une variable d'environnement qui n'existe pas, vous aurez du vide comme résultat.

{caption: "Ligne de commande"}

```bash
$ echo $PREMIERS_PAS_AVEC_DJANGO_AUTHOR

```

Je pourrai donc créer ma variaable `PREMIERS_PAS_AVEC_DJANGO_AUTHOR`:

{caption: "Ligne de commande"}

```bash
$ export PREMIERS_PAS_AVEC_DJANGO_AUTHOR='Honoré Hounwanou'
```

Si on refait un `echo`:

{caption: "Ligne de commande"}

```bash
$ echo $PREMIERS_PAS_AVEC_DJANGO_AUTHOR
Honoré Hounwanou
```

On voit `Honoré Hounwanou` affiché.

<blockquote class="warning">
    <p><strong>Attention:</strong> Lors de la création de la variable d'environnement on ne met pas de symbole <code>$</code>. La commande suivante n'aurait donc pas fonctionné: <code>export $PREMIERS_PAS_AVEC_DJANGO_AUTHOR='Honoré Hounwanou'</code>.</p>
</blockquote>

Pour supprimer une variable d'environnement, il suffit d'utiliser la commande `unset` comme suit:

{caption: "Ligne de commande"}

```bash
$ unset NOM_DE_MA_VARIABLE_D_ENVIRONNEMENT
```

#### Manipulation des variables d'environnement sous Windows

Pour créer une variable d'environnement sous Windows, il vous suffira d'utiliser la commande `set` comme suit:

{caption: "Ligne de commande"}

```bash
$ set PYTHON_CREATOR='Guido van Rossum'
```

La commande ci-dessus permet de créer une variable d'environnement ayant comme nom `PYTHON_CREATOR` et comme valeur `Guido van Rossum`. Étant donné que la valeur `Guido van Rossum` contient des espaces, nous sommes obligés de l'entourer de quotes. On aurait pu utiliser les doubles quotes également comme suit:

{caption: "Ligne de commande"}

```bash
$ set PYTHON_CREATOR="Guido van Rossum"
```

Pour afficher ensuite la valeur d'une variable d'environnement, on pourra se servir de la commande `echo`:

{caption: "Ligne de commande"}

```bash
$ echo %PYTHON_CREATOR%
Guido van Rossum
```

Comme on peut le voir, on met `echo`, suivi du symbole `%`, suivi ensuite du nom de la variable d'environnement, suivi pour terminer du symbole `%`. Il est important d'entourer le nom de la variable d'environnement de `%%` sinon cela ne marchera pas.

{caption: "Ligne de commande"}

```bash
$ echo PYTHON_CREATOR
PYTHON_CREATOR
```

La commande `echo` permet d'afficher quelque chose au niveau de la console. Si vous oubliez d'entourer le nom de votre variable d'environnement de `%%`, elle pensera que vous souhaitez afficher littéralement `PYTHON_CREATOR`. Il faudra donc entourer le nom de votre variable d'environnement de `%%` afin de lui indiquer que vous faites référence à une variable d'environnement.

<blockquote class="notice">
    <p><strong>Astuce:</strong> Si vous utilisez la commande <code>set</code> sans préciser de valeur: <code>set PYTHON_CREATOR</code>. La valeur de la variable d'environnement <code>PYTHON_CREATOR</code> sera affichée.</p>
</blockquote>

Si je demande la valeur d'une variable d'environnement qui n'existe pas, vous aurez du vide comme résultat.

{caption: "Ligne de commande"}

```bash
$ echo %PREMIERS_PAS_AVEC_DJANGO_AUTHOR%

```

Je pourrai donc créer ma variaable `PREMIERS_PAS_AVEC_DJANGO_AUTHOR`:

{caption: "Ligne de commande"}

```bash
$ set PREMIERS_PAS_AVEC_DJANGO_AUTHOR='Honoré Hounwanou'
```

Si on refait un `echo`:

{caption: "Ligne de commande"}

```bash
$ echo %PREMIERS_PAS_AVEC_DJANGO_AUTHOR%
Honoré Hounwanou
```

On voit `Honoré Hounwanou` affiché.

<blockquote class="warning">
    <p><strong>Attention:</strong> Lors de la création de la variable d'environnement on ne met pas de symbole <code>$</code>. La commande suivante n'aurait donc pas fonctionné: <code>export $PREMIERS_PAS_AVEC_DJANGO_AUTHOR='Honoré Hounwanou'</code>.</p>
</blockquote>

Pour supprimer une variable d'environnement, il suffit d'utiliser la commande `set` comme suit:

{caption: "Ligne de commande"}

```bash
$ set NOM_DE_MA_VARIABLE_D_ENVIRONNEMENT=
```

#### Accéder à la valeur d'une variable d'environnement via du code Python

Comme je vous l'avais dit, les variables d'environnement sont des variables que vous pouvez définir au niveau de votre système d'exploitation et y accéder plus tard via le code. Dans cette section, nous verrons comment accéder à la valeur d'une variable d'environnement via du code Python, mais sachez qu'on aurait pu le faire via d'autres langages de programmation (PHP, Java, Ruby pour ne citer que ces derniers).

Démarrer le shell interactif:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ python
Python 3.9.0 (v3.9.0:7b3ab5921f, Feb 24 2020, 17:52:18)
[Clang 6.0 (clang-600.0.57)] on darwin
Type "help", "copyright", "credits" or "license" for more information.
>>> import os
>>> os.environ['PYTHON_CREATOR']
'Guido van Rossum'
>>> os.environ['PREMIERS_PAS_AVEC_DJANGO_AUTHOR']
'Honoré Hounwanou'
>>> os.environ['MUSHIBISHI']
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
  File "/Library/Frameworks/Python.framework/Versions/3.9/lib/python3.9/os.py", line 675, in __getitem__
    raise KeyError(key) from None
KeyError: 'MUSHIBISHI'
>>> print(os.environ.get('MUSHIBISHI'))
None
>>> print(os.environ.get('MUSHIBISHI', 'Valeur par défaut'))
Valeur par défaut
```

1. On importe le module `os`.
2. La liste des variables d'environnement définies au niveau de notre système se trouve au niveau de `os.environ`.
3. On peut accéder ensuite à une variable d'environnement en utilisant `os.environ` comme si c'était un dictionnaire. Ex: `os.environ['PYTHON_CREATOR']` et `os.environ['PREMIERS_PAS_AVEC_DJANGO_AUTHOR']`.
4. Si vous tentez d'accéder à une variable d'environnement qui n'existe pas, une exception de type `KeyError` sera levée.
5. Si vous utilisez par contre la méthode `get` et que vous tentez d'accéder à une variable d'environnement qui n'existe pas, `None` vous sera retournée comme valeur.
6. Avec la méthode `get`, il est possible de préciser en second argument une valeur par défaut qui sera retournée si la variable d'environnement n'a pas été trouvée.

<blockquote class="notice">
    <p><strong>Note:</strong> La méthode <code>get</code> n'a rien de spécifique au concept de variables d'environnement. Elle est disponible pour tous les objets de type <code>dict</code> au niveau de Python.<br><code>contacts = {'Honoré': 'mercuryseries@gmail.com', 'John': 'john@example.com'}</code><br><code>contacts.get('Honoré')` affichera `'mercuryseries@gmail.com'</code>.<br><code>contacts.get('Marie', 'Valeur par défaut')</code> affichera <code>'Valeur par défaut'</code>.</p>
</blockquote>

J'ai eu à vous cacher quelque chose. Il existe une fonction raccourcie `os.getenv` permettant d'alléger un peu notre code:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ python
Python 3.9.0 (v3.9.0:7b3ab5921f, Feb 24 2020, 17:52:18)
[Clang 6.0 (clang-600.0.57)] on darwin
Type "help", "copyright", "credits" or "license" for more information.
>>> import os
>>> os.getenv('PREMIERS_PAS_AVEC_DJANGO_AUTHOR')
'Honoré Hounwanou'
>>> print(os.getenv('MUSHIBISHI'))
None
>>> os.getenv('MUSHIBISHI', 'Valeur par défaut')
Valeur par défaut
```

En coulisse, tout ce que fait cette fonction `os.getenv`, c'est appeler `os.environ.get`.

### 3.12.18. Une configuration en développement différente de celle en production

Il va nous falloir une configuration en développement différente de celle en production.

- En développement, le paramètre `SECRET_KEY` pourra avoir une valeur écrite en dur au niveau du code source, mais en production il faudra générer une nouvelle valeur de clé secrète et la configurer comme une variable d'environnement.
- En développement, le paramètre `DEBUG` devra avoir comme valeur `True` afin que les informations de débogage puissent être affichées, mais en production il devra avoir comme valeur `False` afin qu'aucune information sensible ne soit divulguée par inadvertance.
- En développement, le paramètre `ALLOWED_HOSTS` devra avoir comme valeur `[]` ou `['127.0.0.1']` ou `['localhost']`, mais en production il devra avoir comme valeur `['young-brook-43267.herokuapp.com']`.

#### Étape 1: Rendre les trois paramètres configurables via des variables d'environnement

Dans un premier temps, nous allons rendre les trois paramètres `SECRET_KEY`, `DEBUG` et `ALLOWED_HOSTS` configurables via des variables d'environnement.

Modifiez donc le fichier `settings.py` comme suit:

{caption: "settings.py"}

```python
SECRET_KEY = os.getenv('APP_SECRET', 'enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io')

DEBUG = os.getenv('APP_DEBUG', True)

ALLOWED_HOSTS = [os.getenv('APP_DOMAIN', '127.0.0.1')]
```

Notez que le module `os` est importé par défaut au niveau du fichier `settings.py`.

1. La valeur du paramètre `SECRET_KEY` correspondra dorénavant à la valeur associée à la variable d'environnement `APP_SECRET`. Si cette variable d'environnement `APP_SECRET` n'est pas définie, la valeur par défaut sera `enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io`.
2. La valeur du paramètre `DEBUG` correspondra dorénavant à la valeur associée à la variable d'environnement `APP_DEBUG`. Si cette variable d'environnement `APP_DEBUG` n'est pas définie, la valeur par défaut sera `True`.
3. La valeur de la variable d'environnement `APP_DOMAIN` sera dorénavant rajoutée à la liste `ALLOWED_HOSTS`. Si cette variable d'environnement `APP_DOMAIN` n'est pas définie, la valeur par défaut sera `127.0.0.1`.

J'ai eu à mettre comme valeurs par défaut, les valeurs à utiliser en développement. Cela fera en sorte qu'on n'aura pas besoin de définir de variables d'environnement en développement. En production par contre, il faudra définir:

- la variable d'environnement `APP_SECRET` et lui donner comme valeur une chaîne de caractères aléatoire unique non prédictible;
- la variable d'environnement `APP_DEBUG` et lui donner comme valeur `False`;
- la variable d'environnement `APP_DOMAIN` et lui donner comme valeur `'young-brook-43267.herokuapp.com'`. Il vous faudra bien évidemment remplacer `'young-brook-43267.herokuapp.com'` par le nom de domaine de votre application Heroku.

<blockquote class="notice">
    <p><strong>Astuce:</strong> En pratique, j'allais créer des variables d'environnement nommées <code>DEBUG</code>, <code>SECRET_KEY</code> et <code>ALLOWED_HOSTS</code>. Ici, étant donné que nous sommes des débutants, j'ai décidé de choisir des noms différents afin d'éviter toute confusion dans votre esprit.</p>
</blockquote>

<blockquote class="notice">
    <p><strong>Note:</strong> Le paramètre <code>ALLOWED_HOSTS</code> accepte aussi bien les noms de domaine que les adresses IPs. On aurait pu mettre également <code>'.herokuapp.com'</code> afin d'accepter m'importe quel sous domaine <code>herokuapp.com</code> comme hôte.</p>
</blockquote>

#### Étape 2: Configuration des variables d'environnement sur la machine de production

Configurons nos trois variables d'environnement au niveau de notre machine sur Heroku.

##### Comment générer une clé secrète?

Il existe plusieurs moyens pour le faire, mais voici la méthode que j'utilise:

```bash
$ python -c "import random; print(''.join([random.choice('abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*(-_=+)') for i in range(50)]))"
```

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku config:set APP_SECRET='q@+-(p^sn1egkknijnx9=ljo$2o+zx3qlpxz%a)e!w5=2q%cp8'
Setting APP_SECRET and restarting young-brook-43267... done, v9
APP_SECRET: 'q@+-(p^sn1egkknijnx9=ljo$2o+zx3qlpxz%a)e!w5=2q%cp8'
(hello-city-venv)$ heroku config:set APP_DEBUG=False
Setting APP_DEBUG and restarting young-brook-43267... done, v11
APP_DEBUG: False
(hello-city-venv)$ heroku config:set APP_DOMAIN='young-brook-43267.herokuapp.com'
Setting APP_DOMAIN and restarting young-brook-43267... done, v12
APP_DOMAIN: young-brook-43267.herokuapp.com
```

La commande `heroku config:set` nous permet de configurer une variable d'environnement au niveau de notre machine Heroku. On aurait pu également utiliser l'interface web de Heroku afin de le faire.

Publions nos changements et déployons de nouveau notre application:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git add -A
(hello-city-venv)$ git commit -m "Make SECRET_KEY, DEBUG and ALLOWED_HOSTS configurable"
(hello-city-venv)$ git push heroku master
```

**((( Image manquante )))**

**((( Image manquante )))**

Et voilà! Plus de problème de sécurité en rapport avec le paramètre `SECRET_KEY` étant donné que sa valeur provient maintenant de la variable d'environnement `APP_SECRET`. Aussi, motre site web s'affiche sans problème, ce qui revient donc à dire l'hôte `'young-brook-43267.herokuapp.com'` fait maintenant partie des `ALLOWED_HOSTS` en production. Par contre les informations de débogage sont toujours affichées en production alors que notre variable d'environnement `APP_DEBUG` a bel et bien comme valeur `False`.

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku config:get APP_DEBUG
False
(hello-city-venv)$ heroku config:get APP_DOMAIN
young-brook-43267.herokuapp.com
```

<blockquote class="notice">
    <p><strong>Astuce:</strong> La commande <code>heroku config:get</code> permet d'avoir la valeur d'une variable d'environnement configurée au niveau de notre machine Heroku. Si vous souhaitez lister l'ensemble de vos variables d'environnement, il vous faudra dans ce cas utiliser la commande <code>heroku config</code>.</p>
</blockquote>

Le problème est tout simple, les variables d'environnement sont toujours interprétées comme des chaînes de caractères. Donc en réalité, en faisant `DEBUG = os.getenv('APP_DEBUG', True)` au niveau de notre machine Heroku, la variable d'environnement `DEBUG` aura comme valeur la chaîne de caractères `'False'`. Et toute chaîne de caractères non vide est évaluée comme `True` en Python.

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ python
Python 3.9.0 (v3.9.0:7b3ab5921f, Feb 24 2020, 17:52:18)
[Clang 6.0 (clang-600.0.57)] on darwin
Type "help", "copyright", "credits" or "license" for more information.
>>> bool('')
False
>>> bool('False')
True
```

C'est donc pour cette raison que le `DEBUG` est toujours activé en production.

Il va donc falloir modifier la configuration du paramètre `DEBUG` comme suit:

{caption: "settings.py"}

```python
DEBUG = os.getenv('APP_DEBUG') != 'False'
```

1. En développement, vu que la variable d'environnement `APP_DEBUG` n'est pas définie,
   `os.getenv('APP_DEBUG')` retournera `None`, et vu que `None` est différent de `'False'`, on aura `True` comme valeur finale. Donc le débogage sera activé en développement.
2. En production, la variable d'environnement `APP_DEBUG` sera définie avec comme valeur la chaîne de caractères `'False'`, `os.getenv('APP_DEBUG')` retournera donc `'False'`, et vu que `'False'` n'est pas différent de `'False'` (ces deux chaînes de caractères sont égales), on aura `False` comme valeur finale. Donc le débogage ne sera pas activé en production.

Publions nos changements et déployons de nouveau notre application:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git add -A
(hello-city-venv)$ git commit -m "Fix bug with DEBUG parameter"
(hello-city-venv)$ git push heroku master
```

**((( Image manquante )))**

**((( Image manquante )))**

Wouhou! Nous n'avons plus d'informations de débogage affichées en production! Vous ne pouvez pas savoir à quel point je suis fier vous!

<blockquote class="notice">
    <p><strong>Note:</strong> Il est possible de personnaliser les différentes pages d'erreur. Je vous montrerai comment le faire au niveau du chapitre 6.</p>
</blockquote>

### 3.12.19. Django Environ à la rescousse

Je ne sais pas pour vous, mais en écrivant `DEBUG = os.getenv('APP_DEBUG') != 'False'`, j'ai eu mal au coeur! A t-on réellement besoin de se soucier du fait que la comparaison doit être effectuée avec la chaîne de caractères `'False'` et non le booléen `False` ?

Cette ligne bien que simple à la surface cache beaucoup de choses, et j'aime mieux éviter d'avoir ce genre de code **"mi-implicite, mi-explicite"** au niveau de mes projets. Tentons donc de corriger cela!

En lieu et place de créer notre librairie maison, nous allons nous servir de l'excellente librairie `django-environ`.

#### Installation de django-environ

Ouvrez donc votre terminal et exécutez la commande suivante:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ pip install django-environ
```

`django-environ` est une librairie vous permettant d'utiliser [la méthodologie à douze facteurs](https://www.12factor.net/fr/) afin de configurer votre application Django via des variables d'environnement. Si vous n'avez jamais entendu parler de cette méthodologie, sachez simplement que c'est une très bonne méthodologie à suivre si vous souhaitez concevoir des applications Web de qualité. En effet, la méthodologie à 12 facteurs recommande de stocker la configuration d'une application susceptible de changer d'un environnement à un autre au niveau des variables d'environnement. Sans donc le savoir, nous allons suivi [le troisième facteur](https://www.12factor.net/fr/config) de cette méthodologie en sauvegardant les valeurs de `SECRET_KEY`, `DEBUG`, `ALLOWED_HOSTS` au niveau de différentes variables d'environnement.

`django-environ` se charge de récupérer la valeur sous forme de chaîne de caractères d'une variable d'environnement depuis `os.environ`, de l'analyser par la suite-la pour après la convertir dans des types Python communs. La valeur de notre variable d'environnement `DEBUG` pourra par exemple être automatiquement convertie en booléean (`bool`), ce qui nous évitera d'avoir à faire la comparaison avec la chaîne de caractères `'False'` comme c'était le cas précédemment.

#### Configuration des variables d'environnement avec django-environ

Nous allons à présent modifier notre fichier `hello_city/settings.py` afin de pouvoir utiliser la librairie `django-environ` nouvellement installée.

{caption: "hello_city/settings.py"}

```python
...

import os

import environ

env = environ.Env()

...

SECRET_KEY = env.str('APP_SECRET', default='enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io')

DEBUG = env.bool('APP_DEBUG', default=True)

ALLOWED_HOSTS = env.list('APP_DOMAIN', default=['127.0.0.1', 'localhost'])

...
```

1. Nous importons premièrement la librairie environ: `import environ`.
2. Ensuite, via cette librairie, nous créons un objet de la classe `Env` que nous sauvegardons au niveau de la variable `env`.
3. Une fois notre objet de type `Env` créé, nous pouvons l'utiliser afin de récupérer la valeur de nos différentes variables d'environnement tout en précisant le type Python à utiliser pour le casting et la valeur par défaut. La syntaxe est la suivante `env.type('NOM_VARIABLE', default=VALEUR_PAR_DEFAULT)`.
4. Grâce à `env.str('APP_SECRET', default='enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io')`, nous indiquons que nous souhaitons récupérer la valeur de la variable d'environnement `APP_SECRET`. Une fois cette valeur récupérée, nous souhaitons ensuite la convertir en chaîne de caractères (`str`). Si la variable d'environnement `APP_SECRET` n'existe pas, alors dans ce cas il faudra retourner la chaîne de caractères `'enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io'` comme valeur par défaut. Au final, la valeur retournée par `env.str` sera sauvegardée au niveau du paramètre `SECRET_KEY`.
5. Grâce à `DEBUG = env.bool('APP_DEBUG', default=True)`, nous indiquons que nous souhaitons récupérer la valeur de la variable d'environnement `APP_DEBUG`. Une fois cette valeur récupérée, nous souhaitons ensuite la convertir en booléen (`bool`). Si la variable d'environnement `DEBUG` n'existe pas, alors dans ce cas il faudra retourner le booléen `True` comme valeur par défaut. Au final, la valeur retournée par `env.bool` sera sauvegardée au niveau du paramètre `DEBUG`.
6. Grâce à `ALLOWED_HOSTS = env.list('APP_DOMAIN', default=['127.0.0.1', 'localhost'])`, nous indiquons que nous souhaitons récupérer la valeur de la variable d'environnement `APP_DOMAIN`. Une fois cette valeur récupérée, nous souhaitons ensuite la convertir en liste (`list`). Si la variable d'environnement `APP_DOMAIN` n'existe pas, alors dans ce cas il faudra retourner la liste `['127.0.0.1', 'localhost']` comme valeur par défaut. Au final, la valeur retournée par `env.list` sera sauvegardée au niveau du paramètre `ALLOWED_HOSTS`.

Pour information, tous les types supportés par `django-environ` sont listés au niveau de la [documentation](https://github.com/joke2k/django-environ).

Maintenant que tout est clair, je vais renommer mes différentes variables d'environnements. `APP_SECRET` deviendra `SECRET_KEY`, `APP_DEBUG` deviendra `DEBUG` et `APP_DOMAIN` deviendra `ALLOWED_HOSTS`. Je le fais parce que ce sont ces noms de variables d'environnement que j'aurais utilisé dans mes projets réels. Si on voulait garder `APP_DOMAIN` comme nom, il aurait fallu rajouter un **s** (`APP_DOMAINS`) étant donné que `APP_DOMAINS`est maintenant une liste et aussi parce que je n'aime pas avoir de problèmes avec [William Shakespeare](https://fr.wikipedia.org/wiki/William_Shakespeare).

On obtient donc

{caption: "hello_city/settings.py"}

```python
...

import os

import environ

env = environ.Env()

...

# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = env.str('SECRET_KEY', default='enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io')

# SECURITY WARNING: don't run with debug turned on in production!
DEBUG = env.bool('DEBUG', default=True)

ALLOWED_HOSTS = env.list('ALLOWED_HOSTS', default=['127.0.0.1', 'localhost'])

...
```

<blockquote class="warning">
    <p><strong>Attention:</strong> Comme j'ai eu à le mentionner, les valeurs des variables d'environnement sont toujours des chaînes de caractères. La librairie <code>django-environ</code> nous facilite un tant soit peu la tâche en nous permettant (a) de récupérer les valeurs des variables d'environnement sous forme de chaîne de caractères, (b) de les convertir par la suite dans des types Python auxquels nous sommes familiers et bien plus encore.</p>
</blockquote>

À ce stade, tout devrait normalement marcher en développement étant donné que seules valeurs par défaut précisées seront utilisées. En production par contre, il nous faudra supprimer les variables d'environnement `APP_SECRET`, `APP_DEBUG` et `APP_DOMAIN` précédemment configurées via le client Heroku (en utilisant la commande `heroku config:unset`) et les remplacer par de nouvelles variables d'environnement `SECRET_KEY`, `DEBUG` et `ALLOWED_HOSTS` (en utilisant la commande `heroku config:set`).

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku config:unset APP_SECRET
Unsetting APP_SECRET and restarting young-brook-43267... done, v25
(hello-city-venv)$ heroku config:unset APP_DEBUG
Unsetting APP_DEBUG and restarting young-brook-43267... done, v26
(hello-city-venv)$ heroku config:unset APP_DOMAIN
Unsetting APP_DOMAIN and restarting young-brook-43267... done, v27
```

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku config:set SECRET_KEY='q@+-(p^sn1egkknijnx9=ljo$2o+zx3qlpxz%a)e!w5=2q%cp8'
Setting SECRET_KEY and restarting young-brook-43267... done, v28
SECRET_KEY: 'q@+-(p^sn1egkknijnx9=ljo$2o+zx3qlpxz%a)e!w5=2q%cp8'
(hello-city-venv)$ heroku config:set DEBUG=False
Setting DEBUG and restarting young-brook-43267... done, v29
DEBUG: False
(hello-city-venv)$ heroku config:set ALLOWED_HOSTS='young-brook-43267.herokuapp.com'
Setting ALLOWED_HOSTS and restarting young-brook-43267... done, v30
ALLOWED_HOSTS: young-brook-43267.herokuapp.com
```

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku config
=== young-brook-43267 Config Vars
ALLOWED_HOSTS:         young-brook-43267.herokuapp.com
DATABASE_URL:          postgres://oxxkpbgkpkteac:c7a9dff8b7489e1ae19e20991748f14bb6b80ba89d0cbf54b2370c71348ec128@ec2-34-195-169-25.compute-1.amazonaws.com:5432/daqdiqilsvg4g3
DEBUG:                 False
DISABLE_COLLECTSTATIC: 1
SECRET_KEY:            q@+-(p^sn1egkknijnx9=ljo$2o+zx3qlpxz%a)e!w5=2q%cp8
```

<blockquote class="notice">
    <p><strong>Note:</strong> Si j'avais plusieurs hôtes, il aurait fallu les séparer par une virgule: <code>heroku config:set ALLOWED_HOSTS='hote1,hote2,hote3'</code>. <em>django-environ</em> se chargera de convertir ceci en la liste <code>['hote1', 'hote2', 'hote3']</code>.</p>
</blockquote>

#### Une fonctionnalité que j'aime avec django-environ

Comme nous l'avons vu, la fonction `os.getenv` retourne `None` si la variable d'environnement passée en argument n'existe pas et qu'aucune valeur par défaut n'a été définie. Les méthodes utilitaires de `django-environ` quant à elles (`env.str`, `env.bool`, `env.int`, `env.list`, etc) lèveront une exception de type `django.core.exceptions.ImproperlyConfigured`, si la variable d'environnement passée en argument n'existe pas et qu'aucune n'a pas de valeur par défaut définie. Cela nous permettra de manière aisée de savoir que nous avons omis de configurer une variable d'environnement requise pour le bon fonctionnement de notre application.

Retirez les valeurs par défaut d'une des variables d'environnement que nous avons eu à définir au niveau du fichier `hello_city/settings.py` et tentez de redémarrer le serveur, vous verrez une jolie petite erreur s'afficher:

```bash
File "/Users/freedev/Code/PremiersPasAvecDjango/hello_city/hello_city/settings.py", line 27, in <module>
    SECRET_KEY = env.str('SECRET_KEY')
  File "/Users/freedev/Code/PremiersPasAvecDjango/hello-city-venv/lib/python3.9/site-packages/environ/environ.py", line 134, in str
    value = self.get_value(var, default=default)
  File "/Users/freedev/Code/PremiersPasAvecDjango/hello-city-venv/lib/python3.9/site-packages/environ/environ.py", line 277, in get_value
    raise ImproperlyConfigured(error_msg)
django.core.exceptions.ImproperlyConfigured: Set the SECRET_KEY environment variable
```

#### Déploiement

Comitons nos changements et vérifions que tout marche en production!

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git add -A
(hello-city-venv)$ git commit -m "Rename env vars to SECRET_KEY, DEBUG and ALLOWED_HOSTS and make use of django-environ library"
(hello-city-venv)$ git push heroku master
```

**((( Image manquante )))**

Oups! Nous avons une petite erreur.

### 3.12.20. Logs Heroku

Utilisons la commande `heroku logs --tail` afin d'avoir plus d'informations sur l'erreur qu'on a en production:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku logs --tail
2020-05-07T06:03:09.629932+00:00 app[web.1]: File "/app/hello_city/settings.py", line 14, in <module>
2020-05-07T06:03:09.629932+00:00 app[web.1]: import environ
2020-05-07T06:03:09.629933+00:00 app[web.1]: ModuleNotFoundError: No module named 'environ'
```

Nous avons oublié de rajouter la librairie `django-environ` à notre fichier `requirements.txt`, ce qui fait que Heroku ne savait pas qu'il devait l'installer en production. Corrigeons ce petit problème:

#### Sous Windows

1. Exécutez premièrement la commande `pip freeze`.
2. Modifiez ensuite le contenu du fichier `requirements.txt` avec la nouvelle liste générée par la commande `pip freeze`.

#### Sous Linux ou macOS

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ pip freeze > requirements.txt
```

On fait notre commit:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git add -A
(hello-city-venv)$ git commit -m "Add django-environ to requirements.txt"
(hello-city-venv)$ git push heroku master
```

**((( Image manquante )))**

Et voilà le travail! Nous n'avons plus de code _"mi-implicite, mi-explicite"_ et tout marche à la perfection aussi bien en développement qu'en production.

### 3.12.21. Une autre manière de préciser les types de casting et les valeurs par défaut

Il est possible de réécrire notre comme précédent comme suit:

{caption: "hello_city/settings.py"}

```python
...

import os

import environ

env = environ.Env(
    SECRET_KEY=(str, 'enj+xkrq=ja14k&upv-i-y^jnw5bm#hcn)+y*^a2ait@uvb&io'),
    DEBUG=(bool, True),
    ALLOWED_HOSTS=(list, ['127.0.0.1', 'localhost'])
)

...

# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = env('SECRET_KEY')

# SECURITY WARNING: don't run with debug turned on in production!
DEBUG = env('DEBUG')

ALLOWED_HOSTS = env('ALLOWED_HOSTS')

...
```

1. On précise les types et les valeurs par défaut à utiliser pour chacune de nos variables d'environnement lors de la création de notre objet de type `environ.Env`.
2. Maintenant, en lieu et place d'utiliser `env.str`, `env.bool` et `env.list`, on peut simplement utiliser `env` vu que les types à utiliser pour le casting ont déjà été précisés.

Tout devrait normalement fonctionner de la même manière.

**((( Image manquante )))**

<blockquote class="notice">
    <p><strong>Astuce:</strong> Pour ceux qui sont curieux et qui se demandent comment est-ce qu'il est possible d'utiliser notre objet <code>env</code> comme si c'était une fonction, sachez que cela est lié à la notion <em>d'objet appelable</em> (<em>callable object</em> en anglais) en Python. Pour rendre un objet appelable en Python, il suffit de rajouter la méthode magique <code>__call__</code> lors de la définition de la classe associée à cet objet. Lorsque cette méthode magique est définie au niveau d'une classe, chaque objet de cette classe est dit <em>callable</em>, on peut donc l'appeler comme une fonction <code>env(arg1, arg2, ...)</code>.</p>
</blockquote>

### 3.12.22. Le fichier .env

Lors de l'exécution de votre application, vous utiliserez généralement un ensemble de variables d'environnement afin de gérer la configuration de votre application. C'était par exemple le cas avec les paramètres `SECRET_KEY`, `DEBUG` et `ALLOWED_HOSTS` dont les valeurs devaient être différentes en environnement de développement et en envionnement de production.

La librairie `django-env` vous permet de créer un fichier `.env` à la racine de votre projet qui contiendra l'ensemble des variables d'environnement dont vous aurez besoin pour exécuter votre application localement (c'est-à-dire en développement). Vous pourrez ensuite lui indiquer qu'il faudra lire le contenu du fichier `.env` et insérer chaque paire nom/valeur qui s'y trouve dans l'environnement afin d'imiter l'action de configuration des variables d'environnement.

Créez donc un fichier `.env` à la racine de votre projet ayant comme contenu:

{caption: ".env"}

```
SECRET_KEY="q+w4=@bmw#6s2mwgq*5-$(q%besn=-$#6^anv(lp^tnuwoie2-"
DEBUG=False
ALLOWED_HOSTS=127.0.0.1,localhost
```

Le format est le suivant: `NOM_DE_LA_VARIABLE=VALEUR`. Si la valeur de l'une de vos variables d'environnement contient des espaces ou des caractères non alphanumériques, je vous recommanderai de l'entourer de double quotes `""` comme j'ai eu à le faire pour `SECRET_KEY`.

```bash
.
├── .env # <--- Fichier nouvellement créé
├── .git
├── .gitignore
├── Procfile
├── Procfile.dev
├── db.sqlite3
├── hello_city
├── manage.py
├── requirements.txt
├── runtime.txt
└── templates
```

Rajoutez ensuite le code suivant à votre fichier `hello_city/settings.py`:

{caption: "hello_city/settings.py"}

```python
...

import environ

# On précise juste les types.
# Plus besoin de donner de valeurs par défaut.
env = environ.Env(
    SECRET_KEY=str,
    DEBUG=bool,
    ALLOWED_HOSTS=list
)

# Les valeurs sont lues depuis le fichier .env
# se trouvant à la racine de notre projet
env.read_env(os.path.join(BASE_DIR, '.env'))

...
```

La méthode `env.read_env` permet de lire le contenu d'un fichier `.env` et faire l'insertion de chaque paire nom/valeur qui s'y trouve dans l'environnement afin d'imiter l'action de configuration des variables d'environnement.

Coupez le serveur de développement avec le raccourci `CTRL + C` et redémarrez-le. Vous verrez qu'en développement, le débogage est maintenant désactivé (étant donné que dans le fichier `.env`, la variable `DEBUG` a été définie avec comme valeur `False`).

**((( Image manquante )))**

Réactivez le débogage en développement:

{caption: ".env"}

```bash
...
DEBUG=True
...
```

Coupez le serveur de développement avec le raccourci `CTRL + C` et redémarrez-le.

**((( Image manquante )))**

Et voilà!

#### Ne pas commiter le ficher .env

J'avais déjà eu à rajouter le fichier `.env` à notre fichier `.gitignore`. Il ne sera donc pas tracké par Git. Vous pouvez par contre créer un fichier `.env.example`, qui lui pourra être commité et qui représentera un fichier exemple. Cela peut s'avérer très utile si vous travaillez en équipe. Il est important de vous assurer que ce fichier `.env.example` ne contienne pas d'informations sensibles.

Voici un exemple de fichier `.env.example` pour notre projet `hello_city`:

{caption: "Exemple de fichier .env.example"}

```bash
SECRET_KEY=your-secret-key
DEBUG=False
ALLOWED_HOSTS=hote1,hote2,...
```

### 3.12.23. Pas besoin de charger le fichier .env en production

En production, nous n'aurons pas besoin de lire le contenu du fichier `.env` étant donné que les variables d'environnement réelles configurées via _heroku config:set_ seront utilisées.

Premièrement, je vais revenir à ce qu'on avait précédemment lorsqu'on utilisait les méthodes `env.bool`, `env.str`, `env.list`, etc. Je trouve cela plus explicite que ce qu'on a actuellement où nous passons en arguments les types de casting lors de la création de notre objet `environ.Env`.

Je vais donc modifier mon fichier `hello_city/settings.py` comme suit:

{caption: "hello_city/settings.py"}

```python
...

import environ

# On ne passe plus d'arguments
env = environ.Env()

env.read_env(os.path.join(BASE_DIR, '.env'))

# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = env.str('SECRET_KEY')

# SECURITY WARNING: don't run with debug turned on in production!
DEBUG = env.bool('DEBUG')

ALLOWED_HOSTS = env.list('ALLOWED_HOSTS')

...
```

Ensuite, nous allons rajouter un nouveau paramètre `READ_DOT_ENV_FILE` qui nous permettra de savoir si le fichier `.env` devra être lu ou pas. La valeur de ce paramètre `READ_DOT_ENV_FILE` proviendra d'une variable d'environnement nommée `READ_DOT_ENV_FILE`.

{caption: "hello_city/settings.py"}

```python
...

import os

import environ

env = environ.Env()

# Build paths inside the project like this: os.path.join(BASE_DIR, ...)
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

# Ajouter cette ligne
# Je donne ici comme valeur par défaut True afin que
# le contenu du fichier .env soit chargé par défaut.
# Cela fera l'affaire en développement.
# En production, il faudra configurer une variable
# d'environnement READ_DOT_ENV_FILE ayant comme
# valeur False.
READ_DOT_ENV_FILE = env.bool('READ_DOT_ENV_FILE', default=True)

# Ajouter également ce bloc de code
# Le contenu du fichier .env sera chargé uniquement
# si READ_DOT_ENV_FILE est évalué à True.
# Ce sera le cas uniquement en développement
# vu qu'on utilise la valeur par défaut qui est True.
if READ_DOT_ENV_FILE:
    # Les variables d'environnement du système d'exploitation ont priorité
    # sur les variables de .env
    env.read_env(os.path.join(BASE_DIR, '.env'))

# Le contenu plus bas reste inchangé

# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = env.str('SECRET_KEY')

# SECURITY WARNING: don't run with debug turned on in production!
DEBUG = env.bool('DEBUG')

ALLOWED_HOSTS = env.list('ALLOWED_HOSTS')

...
```

Configurons à présent cette variable d'environnement au niveau de Heroku et donnons lui comme valeur `False`:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ heroku config:set READ_DOT_ENV_FILE=False
Setting READ_DOT_ENV_FILE and restarting young-brook-43267... done, v41
READ_DOT_ENV_FILE: False
```

À présent, en production, la variable d'environnement `READ_DOT_ENV_FILE` aura comme valeur `False` étant donné qu'on ne souhaite pas lire le contenu du fichier `.env` et en local (c'est-à-dire en développement), on utilise la valeur par défaut qui est `True`. Le contenu du fichier `.env` sera donc lu en développement. Super!

Célébrons tout ceci en faisant un commit:

{caption: "Ligne de commande"}

```bash
(hello-city-venv)$ git add -A
(hello-city-venv)$ git commit -m "Do not load .env file in production"
(hello-city-venv)$ git push heroku master
```

Tout devrait normalement marcher sans problème aussi bien en développement qu'en production.

**((( Image manquante )))**

Wouhou!

## 3.13. Copie de notre projet sur GitHub

Afin de clore ce chapitre, nous allons téléverser une copie de notre code source sur [GitHub](https://github.com). À la fin de cette section, nous aurons une version backup dans le cloud.

Si vous n'avez pas encore de compte sur GitHub, c'est le moment d'en créer un.

![Créer un compte sur GitHub](hello-city/github-signup.png)

Une fois votre compte créé, vous pouvez à présent vous connecter.

![Se connecter à son compte GitHub](hello-city/github-login.png)

C'est maintenant le moment de créer un nouveau dépôt sur Github.

![Création d'un dépôt sur GitHub (1/2)](hello-city/github-new-repository-1.png)

Je vais donner comme nom à mon dépôt `hello-city` et rajoutez une petite description. Je vais créer un dépôt public afin que tout le monde puisse y accéder en lecture et m'ouvrir à la possibilité de recevoir des commits d'améliorations du projet. Sentez-vous libre de créer un dépôt privé si vous le souhaitez. C'est gratuit!

![Création d'un dépôt sur GitHub (2/2)](hello-city/github-new-repository-2.png)

Vu que nous avons déjà un dépôt Git local existant, je vais exécuter les commandes se trouvant au niveau de la seconde section.

![Push vers GitHub (2/2)](hello-city/github-push.png)

{caption: "Ligne de commande"}

```bash
$ git remote add origin https://github.com/parlonscode/hello-city.git
$ git push -u origin master
```

Et voilà le travail!

![Code déployé avec succès sur GitHub](hello-city/github-code-deployed.png)

## 3.14. Résumé

Dans ce troisième chapitre, nous avons appris que:

- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi odit iure tempore repellat autem nihil quas mollitia tenetur iste quos, dolorum, porro sit. Architecto eum officiis, esse dignissimos deleniti ducimus!
