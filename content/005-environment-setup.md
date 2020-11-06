# 2. Installation des logiciels et outils de développement

Dans ce second chapitre, nous verrons comment configurer correctement votre ordinateur pour un développement Django propice. Nous commencerons par présenter la ligne de commande et comment installer les dernières versions de Python (3.9) et Django (3.1). Ensuite, nous discuterons des environnements virtuels, de Git et de l'installation de l'éditeur de texte Sublime Text. À la fin de ce chapitre, vous serez fins prêts à créer vos projets Django.

## 2.1. Premiers pas avec la ligne de commande

La ligne de commande est une puissante vue textuelle de votre ordinateur. En tant que développeurs, nous l'utiliserons largement tout au long de ce livre pour créer et configurer nos projets Django.

![Ligne de commande](assets/images/ch02/terminal_mac.png)

Nous avons l'habitude d'avoir des programmes pour tout ce que nous voulons faire sur notre ordinateur. Par exemple, notre explorateur de fichiers, où nous pouvons naviguer sur notre disque dur, créer de nouveaux fichiers et dossiers, supprimer des fichiers et dossiers, etc.

![Explorateur de fichiers sous Windows 10](assets/images/ch02/window_windows_10.png)

![Explorateur de fichiers sous Ubuntu 20.04](assets/images/ch02/window_ubuntu_20_04.png)

![Explorateur de fichiers (Fenêtre Finder) sous macOS](assets/images/ch02/finder_window_mac_os.png)

Il est possible de faire exactement la même chose avec la ligne de commande -- naviguer sur notre disque dur, créer de nouveaux fichiers et dossiers, supprimer des fichiers et dossiers -- nous n'aurons tout simplement pas d'interface graphique (en d'autres termes, nous n'aurons pas de jolis boutons et de listes déroulantes) et en lieu et place de cliquer, nous allons devoir saisir ce que nous voulons.

Sur un Mac, la ligne de commande est disponible au travers d'un programme nommé *"Terminal"* situé dans `/Applications/Utilities`. Pour le trouver, ouvrez une nouvelle fenêtre *Finder*, ouvrez ensuite le répertoire *Applications*, faites défiler vers le bas pour ouvrir le répertoire *Utilities* et double-cliquez sur l'application appelée `Terminal`.

![Trouver l'application Terminal via Finder](assets/images/ch02/find_terminal_app_via_finder.png)

Il est également possible d'ouvrir le terminal en utilisant la recherche *Spotlight*. Utilisez le raccourci clavier `CMD + Espace` et entrez *Terminal* au niveau du champ de recherche. Vous pouvez à présent cliquer sur l'application s'affichant en première position dans les résultats de recherche.

![Trouver l'application Terminal via Spotlight](assets/images/ch02/find_terminal_app_via_spotlight.png)

Sur les machines Windows, il existe par défaut deux programmes vous permettant d'accéder à la ligne de commande: **CMD (Invite de commandes)** et **PowerShell**, *PowerShell* étant le plus puissant des deux. 
Pour ce livre, j'ai fais le choix d'utiliser *PowerShell* mais *CMD* aurait également fait l'affaire.

![L'invite de commandes sous Windows](assets/images/ch02/cmd_windows.png)

![PowerShell](assets/images/ch02/powershell_windows.png)

Sous Linux, la ligne de commande est généralement disponible au travers d'un programme nommé *"Terminal"*, mais bien évidemment cela peut changer d'une distribution Linux à une autre. Je vous inviterai donc à faire une petite recherche Google afin de trouver le programme à exécuter en fonction de votre distribution Linux.

![L'application Terminal sous Ubuntu 20.04](assets/images/ch02/terminal_ubuntu.png)

À l'avenir, lorsque le livre fera référence à la « ligne de commande », vous n'aurez qu'à lancer le programme **Terminal** ou **PowerShell** en fonction de votre système d'exploitation.

<blockquote class="notice">
    <p><strong>Note:</strong> En pratique, la ligne de commande est également appelée <em>Terminal</em> ou <em>Console</em>. Vous pouvez donc voir ces termes comme des synonymes.</p>
</blockquote>

Bien qu'il existe de nombreuses commandes disponibles, vous n'avez pas besoin de toutes les mémoriser! Ce livre vous apprendra les commandes les plus fréquemment utilisées et vous pourrez après à votre rythme, apprendre d'autres commandes selon vos besoins.

### 2.1.1. Qu'est-ce que Unix?

Windows, macOS et Linux sont ce qu'on appelle des systèmes d'exploitation. En informatique, un système d'exploitation (souvent abrégé **OS** -- de l'anglais *Operating System*) est un ensemble de programmes gérant l'utilisation des ressources d'un ordinateur par le biais de logiciels applicatifs. En d'autres termes, le système d'exploitation est un peu comme le chef d'orchestre. C'est lui qui doit gérer la mémoire de votre ordinateur, la répartir entre tous les programmes. Il fait en quelque sorte le lien entre votre matériel (carte graphique, mémoire, etc) et vos logiciels.

Unix est précisement, une famille de systèmes d'exploitation, dont macOS et Linux font partie. Pour faire simple, vous pouvez voir Unix comme l'ancêtre de Linux et macOS. De nombreux tutoriels en ligne appellent la ligne de commande, « *la ligne de commande Unix* », car macOS, Linux et d'autres systèmes d'exploitation partagent le même ensemble de commandes pour parler à leur ordinateur. Si vous avez donc Linux ou macOS, la grande majorité des commandes de base à taper seront identiques.

L'exception est Windows, qui a décidé de faire les choses de manière légèrement différente. Ainsi, certaines commandes à taper seront différentes dépendamment du fait que vous soyez sous Windows ou Linux/macOS. Je vous les indiquerai au fur et à mesure, ne vous inquiétez donc pas.

### 2.1.2. Accéder à un terminal Linux sur Windows

Cette étape est optionnelle, mais si cela vous intéresse, sachez qu'aujourd'hui, grâce au *sous-système Windows pour Linux* (en anglais *WSL* pour *Windows Subsystem for Linux*), il est possible d'accéder à un terminal Linux directement sous Windows. Les développeurs Windows peuvent donc développer des applications multiplateformes et gérer leur infrastructure informatique sans quitter Windows. **À noter que le WSL n'est disponible qu'à partir de Windows 10**.

Le WSL, également appelé *Bash sous Windows*, vous donne accès à une distribution Linux en mode ligne de commande fonctionnant comme une application Windows standard. Ainsi, vous serez donc capables d'exécuter des commandes Linux (en d'autres termes des commandes Unix) sans aucune difficulté.

![Accès à la ligne de commande Ubuntu 20.04 grâce au WSL](assets/images/ch02/ubuntu_20_04_wsl.png)

<blockquote class="notice">
    <p><strong>C'est quoi une distribution Linux?</strong><br>Linux est un système d'exploitation très riche. On peut y trouver de nombreux logiciels différents et il existe des centaines de façons distinctes de l'installer. Pour simplifier la vie des utilisateurs et leur permettre de faire un choix, différentes distributions de Linux ont été créées. C'est un concept qui n'existe pas vraiment sous Windows. C'est un peu comme la différence entre <em>Windows 10 Professionnel</em> et <em>Windows 10 Education</em>, mais cela va bien plus loin que ça.</p>
</blockquote>

Sur Windows 10, vous trouverez des distributions Linux populaires comme Ubuntu, Kali Linux, openSUSE, etc, dans le Windows Store. Il vous suffit de les télécharger et de les installer comme n'importe quelle autre application Windows. Une fois installée(s), vous pouvez exécuter toutes les commandes Linux que vous souhaitez.

Vous pouvez visiter [cette page](https://ubuntu.com/wsl) montrant comment installer par exemple Ubuntu au niveau du WSL.

### 2.1.3. Le prompt ou invite de commandes

Je pense qu'il est maintenant temps de découvrir la puissance cachée de la ligne de commande.

![Exemple de prompt](assets/images/ch02/prompt_example.png)

Dans l'exemple ci-dessus, vous pouvez remarquer que mon nom d'utilisateur est `freedev` et que mon nom d'ordinateur est `DESKTOP-R6JUUT1`. La syntaxe est la suivante `nom_utilisateur@nom_ordinateur`. Vous verrez donc quelque chose de différent en fonction de vos informations personnelles.

Le signe dollar `$` à la fin est ce qu'on appelle *l'invite de commandes* ou encore le *prompt*. Sa présence indique que vous pouvez entrer la commande que vous souhaitez. Dans ce livre, tout comme dans de nombreux tutoriels de programmation en ligne, vous verrez afficher les commandes que vous devez taper dans votre ligne de commande comme suit:

{caption: "Ligne de commande"}
```bash
$ la_commande_à_taper
```

Le signe dollar `$` est utilisé afin de faire fi de vos informations personnelles et vous indiquer que vous êtes dans la ligne de commande et c'est l'endroit au niveau duquel vous allez taper vos différentes commandes.

Après les deux points `:`, nous avons le répertoire courant. En d'autres termes, le dossier dans lequel nous nous trouvons actuellement. Le tilda `~` ici fait référence à notre répertoire utilisateur ou répertoire personnel. Sous Windows, c'est un peu comme l'équivalent de `C:\Users\votre_nom_d_utilisateur` ou encore `C:\Utilisateurs\votre_nom_d_utilisateur`.

![Le prompt sur PowerShell](assets/images/ch02/powershell_windows.png)

Au niveau de PowerShell, le prompt est un peu différent. Il est symbolisé par le signe supérieur `>` et on ne voit pas afficher le nom d'utilisateur et le nom d'ordinateur, juste le chemin du dossier dans lequel nous nous trouvons actuellement. Dans mon cas, il s'agit de `C:\Users\freedev`.

Vous devrez entrer les commandes présentées dans les sections suivantes au niveau de *PowerShell* si vous avez Windows ou au niveau de l'application *Terminal* si vous avez Linux/macOS. Pour raison de concision, je montrai uniquement les résultats d'exécution des commandes au niveau de *PowerShell*, mais vous devez avoir des résultats quasi similaires si vous avez Linux ou macOS.

### 2.1.4. La commande ls

La première commande que nous allons apprendre est la commande `ls`, qui est l'abréviation de "*list*". Cette commande permet de lister les fichiers et dossiers présents dans notre répertoire courant.

Vous remarquerez que les commandes sont raccourcies pour être aussi courtes que possible, ce qui sera utile lorsque vous serez à l'aise avec ces commandes et que vous les taperez à plusieurs reprises. Cela fera moins de caractères à taper!

Tapez `ls` et appuyez sur entrée, et voyez ce qui se passe:

![Exécution de la commande `ls`](assets/images/ch02/ls_output_powershell.png)

Wouhou! Les fichiers et dossiers listés vous semblent familiers n'est-ce pas? Ouvrez l'explorateur de fichiers (ou Finder pour ceux qui ont macOS) et déplacez vous dans le dossier affiché au niveau de votre prompt. Ce sont exactement les mêmes fichiers/dossiers que ceux listés au niveau de la ligne de commande!

![Affichage du contenu du dossier via l'explorateur de fichiers](assets/images/ch02/ls_in_files_explorer_home.png)

La ligne de commande démarre généralement dans notre répertoire utilisateur. Toutefois, vous pouvez à tout moment utiliser la commande `pwd` afin d'afficher le chemin du répertoire dans lequel vous vous trouvez actuellement.

![Exécution de la commande pwd](assets/images/ch02/pwd_output.png)

### 2.1.5. La commande cd

De la même manière que grâce à l'explorateur de fichiers, vous pouvez double-cliquer par exemple sur « *Pictures* » afin d'ouvrir ce dossier (on parle également de "*répertoire*"), au niveau de la ligne de commande, vous pouvez utiliser la commande `cd` (« *change directory* -- changer de répertoire en anglais ») afin "*d'ouvrir*" un répertoire.

![Déplacement dans le répertoire *Pictures*](assets/images/ch02/cd_output.png)

Dans la capture d'écran de la ligne de commande, j'ai fait un `cd` dans le dossier *Pictures*. Utilisez à présent votre imagination -- vous venez d'entrer dans le répertoire *Pictures*. La ligne de commande a été mise à jour pour indiquer que vous êtes actuellement *dans* le répertoire *Pictures*. Une fois dans le répertoire *Pictures*, vous pouvez utiliser la commande `ls` pour voir le contenu de ce répertoire, comme nous l'avons fait précédemment avec l'explorateur de fichiers. Mon dossier *Pictures* contient deux sous-dossiers *Camera Roll* et *Saved Pictures*.

Dans l'explorateur de fichiers, vous pouvez double-cliquer n'importe où et voir le contenu des différents dossiers. L'explorateur de fichiers est, essentiellement, un `cd` et `ls` dans les coulisses, qui affiche les résultats dans une représentation graphique beaucoup plus jolie, plutôt que d'utiliser simplement du texte.

Nous pouvons à nouveau utiliser `cd` et `ls` pour consulter le contenu du sous-dossier *Camera Roll* présent dans le répertoire *Pictures*:

![Déplacement dans le sous-répertoire *Camera Roll*](assets/images/ch02/cd_output_2.png)

Le dossier *Camera Roll* est présentement vide, raison pour laquelle rien n'a été affiché après exécution de la commande `ls`.

Si vous avez un nom de répertoire qui contient des espaces, il faudra l'indiquer entre les guillemets `""` comme nous l'avons fait pour *Camera Roll*: `cd "Camera Roll"`.

Attendez, nous ne faisons qu'avancer? Comment pouvons-nous retourner là où nous étions avant?

### 2.1.6. Changer de répertoire pour revenir là où nous étions

Au niveau de la ligne de commande, contrairement à l'explorateur de fichiers, nous ne pouvons pas simplement cliquer et aller n'importe où. Il faudra donc utiliser un autre moyen afin de revenir à notre répertoire personnel. Pour cela, nous allons utiliser la commande `cd ..` afin de faire un pas en arrière:

![Retour au répertoire parent](assets/images/ch02/cd_dot_dot.png)

Nous pouvons même enchaîner les points et les séparer d'une barre oblique afin de faire plusieurs pas en arrière:

![Remonter de deux niveaux dans l'arborescence](assets/images/ch02/cd_dot_dot_2.png)

![Déplacement dans notre répertoire personnel](assets/images/ch02/cd_dot_dot_3.png)

Wouhou! Nous sommes de retour dans notre répertoire personnel. J'aime utiliser la commande `pwd` pour m'assurer que je suis au bon endroit.

Vous êtes allez un peu trop en arrière? Utilisez la commande `pwd` afin de voir le répertoire dans lequel vous vous trouvez, puis utilisez la commande `cd` pour revenir à l'endroit où vous souhaitez vous rendre.

Fait amusant! À partir de l'explorateur de fichiers, vous pouvez faire un `cd` dans n'importe quel dossier, en faisant un glisser-déposer du dossier dans la ligne de commande. Pour ce faire, il suffit de taper dans un premier temps `cd` dans votre ligne de commande (n'oubliez pas un espace après `cd`), puis cliquez et maintenez sur un dossier dans votre explorateur de fichiers, et faites-le glisser vers la ligne de commande. Votre ordinateur mettra le chemin menant à ce dossier dans votre ligne de commande afin de vous faciliter la tâche! Génial n'est-ce pas?

![Déplacement dans un répertoire via un glisser-déposer](assets/images/ch02/cd_drag_drop.png)

Il ne vous reste plus qu'à appuyer sur la touch `Entrée` :).

Dans les sections suivantes, les choses commenceront à devenir passionnantes. Nous utiliserons la ligne de commande afin de créer, déplacer et supprimer des fichiers sur notre disque dur!

### 2.1.7. Création de fichiers

Les commandes `touch` et `ni` permettent respectivement de créer des fichiers sous Linux/macOS et Windows. Ajoutez simplement le nom du fichier que vous souhaitez créer après la commande `touch` ou `ni`.

Nous allons créer un nouveau fichier nommé `bonjour.txt`. Une fois dans le répertoire de votre choix (par exemple dans votre répertoire personnel ou au niveau de votre bureau), tapez la commande `touch bonjour.txt` si vous êtes sous Linux/macOS ou `ni bonjour.txt` si vous utilisez PowerShell sous Windows.

Si vous êtes sous Linux/macOS, il n'y aura aucun message de réussite ou quoi que ce soit après exécution de la commande `touch`, tapez donc ensuite la commande `ls` pour voir le contenu du répertoire dans lequel vous vous trouvez pour confirmer que le fichier a été créé. Tada!

![Création d'un fichier sous PowerShell avec la commande `ni`](assets/images/ch02/windows_new_file.png)

![Création d'un fichier sous Linux avec la commande `touch`](assets/images/ch02/linux_new_file.png)

![Création d'un fichier sous macOS avec la commande `touch`](assets/images/ch02/macos_new_file.png)

Et vous pouvez également voir le fichier dans l'explorateur de fichiers également:

![Fichier `bonjour.txt` créé sous PowerShell](assets/images/ch02/file_bonjour_txt.png)

Et si nous souhaitons déplacer notre fichier `bonjour.txt` dans un autre répertoire?

En lieu et place de le faire via l'explorateur de fichiers, déplaçons-le dans un autre répertoire en utilisant la ligne de commande.

### 2.1.8. Déplacement des fichiers

Pour déplacer un fichier, on utilise la commande `mv`. 

`mv` est le diminutif de **m**o**v**e qui veut dire déplacer en anglais. Il y a d'autres choses que nous devons ajouter à la commande `mv` pour que l'ordinateur sache quel fichier nous souhaitons déplacer et où nous souhaitons le déplacer. La syntaxe est la suivante: `mv NOM_DU_FICHER_À_DÉPLACER OÙ_DÉPLACER_LE_FICHIER`.

Supposons que je souhaite déplacer le fichier `bonjour.txt` dans le dossier `Music` présent au niveau de mon répertoire personnel, il me suffira de taper la commande `mv bonjour.txt Music` (en supposant bien évidemment que je me trouve présentement dans mon répertoire personnel).

![Déplacement du fichier `bonjour.txt` dans le dossier `Music`](assets/images/ch02/move_file_1.png)

Notez qu'encore une fois, vous n'obtiendrez pas de message de réussite ou quoi que ce soit de rassurant, vous pouvez donc utiliser la commande `ls` au niveau du répertoire dans lequel vous vous trouvez pour confirmer que votre fichier a disparu, puis faire un `cd` dans le répertoire dans lequel vous avez déplacé votre fichier et exécuter la commande `ls` à nouveau pour confirmer que le fichier apparaît maintenant dans ce nouveau répertoire.

![Le fichier `bonjour.txt` n'est plus présent dans le répertoire personnel](assets/images/ch02/move_file_2.png)

![Confirmation du déplacement du fichier `bonjour.txt` dans le dossier `Music`](assets/images/ch02/move_file_3.png)

L'astuce avec le `..` que nous avons apprise dans la section sur le retour en arrière dans un dossier parent, fonctionne également avec la commande `mv`:

![Déplacement du fichier `bonjour.txt` dans le répertoire personnel](assets/images/ch02/move_file_4.png)

![Déplacement du fichier `bonjour.txt` dans le répertoire personnel](assets/images/ch02/move_file_5.png)

Notre fichier `bonjour.txt` est de retour dans notre répertoire personnel :).

Apprenons à présent à faire des copies à partir de la ligne de commande.

### 2.1.9. Copie de fichiers

Pour copier un fichier, vous devez utiliser la commande `cp` comme suit: `cp NOM_DU_FICHIER_À_COPIER NOM_DU_FICHIER_COPIE`. Donc, pour copier notre fichier `bonjour.txt` et nommer la copie `hello.txt`, nous allons exécuter la commande suivante: `cp bonjour.txt hello.txt`.

N'oubliez pas, aucune réponse signifie généralement un succès! Faites un `ls` des fichiers se trouvant dans votre répertoire courant afin de confirmer que le nouveau fichier copie est bel et bien présent.

![Création d'une copie du fichier `bonjour.txt` nommée `hello.txt`](assets/images/ch02/copy_file.png)

Si vous êtes intéressés à découvrir comment copier des dossiers et non des fichiers, prenez votre mal en patience, nous y reviendrons dans un instant :).

Pour l'instant, avouez que c'est idiot d'avoir deux fichiers vides. Apprenons donc à supprimer des fichiers.

### 2.1.10. Suppression de fichiers

Cette partie est assez effrayante. Lorsque vous supprimez des fichiers à l'aide de la ligne de commande, il ne sont pas mis dans une corbeille ou un bac de recyclage. **Ils sont juste supprimés!** Il n'est donc pas possible d'annuler une suppression accidentelle. C'est là qu'un système de contrôle de versions comme *Git* serait utile. Je vous recommande fortement de l'utiliser avec tous vos projets informatiques afin que vous puissiez enregistrer vos différentes modifications et faire des restaurations à partir d'une sauvegarde si le besoin se fait ressentir. Nous verrons de manière pratique comment utiliser *Git*, ne vous inquiétez donc pas.

Nous savons que notre fichier `hello.txt` est inutile, car il s'agit d'une copie de notre fichier d'origine `bonjour.txt`. Supprimons-le en utilisant la commande `rm`. La commande `rm` permet de supprimer un fichier et s'utilise comme suit: `rm NOM_DU_FICHIER_À_SUPPRIMER` (donc dans notre cas: `rm hello.txt`):

![Suppression du fichier `hello.txt`](assets/images/ch02/delete_file.png)

Désolé! Pendant tout ce temps, je vous ai demandé de tout taper. Il existe quelques petites astuces de saisie semi-automatique (on parle également *d'autocomplétion*) et d'autres outils que vous pouvez utiliser pour gagner du temps lors de la saisie de commandes ou éviter des fautes de frappe.

### 2.1.11. Tabulation pour avoir de l'autocomplétion

Lorsque vous tapez une commande qui implique un fichier/dossier (comme par exemple déplacer un fichier d'un répertoire X à un répertoire Y), la ligne de commande peut compléter automatiquement votre nom de fichier/dossier.

Essayons de nouveau de déplacer un fichier avec `mv`. Rappelez-vous, la commande complète est `mv NOM_DU_FICHER_À_DÉPLACER OÙ_DÉPLACER_LE_FICHIER`. Les deux morceaux après `mv` peuvent être autocomplétés. Si vous souhaitez par exemple déplacer le fichier `bonjour.txt`, tapez juste les premières lettres du nom du fichier, par exemple `mv bon` et appuyez ensuite sur la touche tabulation, vous verrez que `bonjour.txt` sera automatiquement complété.

![Autocomplétion du nom de fichier `bonjour.txt`](assets/images/ch02/autocompletion.png)

Au niveau de Windows, vous remarquerez qu'un (`.\`) est ajouté comme préfixe lors de l'autocomplétion. Le point fait référence au répertoire dans lequel nous nous trouvons présentement, on parle également de répertoire courant. Ainsi, mettre `.\bonjour.txt` revient à dire que le fichier `bonjour.txt` se trouve dans le répertoire courant (dans mon cas `C:\Users\freedev`). Donc si l'on résume, (`.`) permet de faire référence au répertoire courant et (`..`) permet de faire référence au répertoire parent.  

<blockquote class="notice">
    <p><strong>Note:</strong> Si l'autocomplétion ne fonctionne pas et que vous entendez ce triste son "<em>doot</em>" si vous avez vos haut-parleurs allumés, cela signifie que la saisie semi-automatique ne voit aucun nom de fichier/dossier commençant par les lettres que vous avez tapées jusqu'à présent, donc il ne pouvait pas trouvé le fichier ou l'emplacement spécifié. Cela pourrait également signifier qu'il existe plusieurs fichiers/dossiers dont les noms commencent par ce que vous avez saisi. Vous devez donc entrer plus de caractères jusqu'à ce qu'il n'y ait plus d'ambiguïté pour que la saisie semi-automatique puisse trouver le fichier/dossier exact que vous recherchez.</p>
</blockquote>

L'autocomplétion s'avère très pratique lorsque vous travaillez avec des fichiers/dossiers avec des noms longs! Après avoir travaillé un peu avec, utiliser la tabulation pour terminer automatiquement vos commandes en ligne de commande deviendra une seconde nature.

### 2.1.12. Appuyer la touche directionnelle haut pour accéder aux commandes précédentes

Si vous vous retrouvez à taper la même commande dans la ligne de commande encore et encore (par exemple, vous exécutez à plusieurs reprises un script que vous avez écrit), vous pouvez appuyer sur la touche directionnelle *"haut"* dans la ligne de commande pour accéder aux commandes précédemment saisies! Appuyez sur *"Entrée"* après avoir trouvé la commande que vous souhaitez réexécuter et elle s'exécutera. Gain de temps assez pratique!

### 2.1.13. Création, déplacement et suppression de répertoires

Jusqu'à présent, nous avons travaillé avec des fichiers individuels, mais pas avec des répertoires (dossiers). Le moment est maintenant venu de découvrir comment créer, déplacer et supprimer des répertoires.

#### Création de répertoires avec la commande mkdir

Les commandes `touch` ou `ni` que nous avons apprises jusqu'à présent ne fonctionnent pas pour les répertoires. 

mkdir ("**m**a**k**e **dir**ectory") est la commande que vous utiliserez pour créer un nouveau répertoire. Essayez de créer un répertoire vide nommé `test` dans notre répertoire personnel avec la commande `mkdir test`:

![Création d'un répertoire nommé `test`](assets/images/ch02/create_dir_1.png)

Exécutez la commande `ls` après avoir créé votre répertoire pour confirmer qu'il a été créé.

![Création d'un répertoire nommé `test`](assets/images/ch02/create_dir_2.png)

Déplacez vous ensuite dans votre nouveau répertoire `test` avec la commande `cd` et, après avoir exécuté la commande `ls`, vous pouvez constater qu'il est vide.

![Création d'un répertoire nommé `test`](assets/images/ch02/create_dir_3.png)

#### Déplacer des répertoires avec mv

L'utilisation de cette commande est la même que précédemment. Déplaçons notre nouveau répertoire `test` dans le répertoire `Music` avec la commande `mv NOM_DU_REPERTOIRE_À_DEPLACER OÙ_DÉPLACER_LE_RÉPERTOIRE` (exactement la même commande qu'avant):

![Déplacement du répertoire `test` dans le répertoire `Music`](assets/images/ch02/move_dir_1.png)

![Confirmation du déplacement du répertoire `test` dans le répertoire `Music`](assets/images/ch02/move_dir_2.png)

Wouhou! Rien de nouveau à retenir ici.

Remettons notre répertoire `test` dans notre répertoire personnel avec la commande `mv test ..`. Assurez-vous premièrement que vous êtes dans le répertoire dans lequel vous avez déplacé votre dossier `test`.

![Déplacement du répertoire `test` dans notre répertoire personnel](assets/images/ch02/move_dir_3.png)

![Confirmation du déplacement du répertoire `test` dans notre répertoire personnel](assets/images/ch02/move_dir_4.png)

Notez que nous avons utilisé la même notation (`..`) que nous avons apprise plus haut afin de déplacer notre répertoire `test` dans le répertoire parent.

Déplaçons à présent notre fichier `bonjour.txt` dans notre nouveau répertoire `test` afin que ce dernier ne soit plus vide. À noter que le fichier `bonjour.txt` se trouve actuellement dans le répertoire `Music`.

![Déplacement du fichier `bonjour.txt` dans le répertoire `test`](assets/images/ch02/move_dir_5.png)

Nous indiquons que nous souhaitons déplacer le fichier `bonjour.txt` se trouvant présentement dans le répertoire `Music` (symbolisé par `Music/bonjour.txt`) au niveau du répertoire `test`.

![Confirmation du déplacement du fichier `bonjour.txt` dans le répertoire `test`](assets/images/ch02/move_dir_6.png)

Cool n'est-ce pas? Nous pouvons utiliser la commande `ls` pour lister le contenu des répertoires `test` et `Music`, sans avoir à nous déplacer au préalable dans ces dossiers.

Génial! Nous avons maintenant notre répertoire `test` contenant notre fichier `bonjour.txt`! Essayons à présent de supprimer le dossier `test` au complet.

#### Suppression de répertoires avec rm -r

Chaque commande que nous avons apprise jusqu'à présent dispose d'une série d'options que nous pouvons ajouter à la commande. Nous allons explorer l'utilisation d'une option pour la première fois en supprimant notre répertoire `test`.

Tout d'abord, essayons d'utiliser la commande de suppression `rm` telle quelle en lui passant notre répertoire `test`: `rm test`. Qu'est-ce qui se produit?

![Échec de suppression du répertoire `test` sous Windows](assets/images/ch02/rm_dir_windows.png)

![Échec de suppression du répertoire `test` sous Linux](assets/images/ch02/rm_dir_linux.png) 

![Échec de suppression du répertoire `test` sous macOS](assets/images/ch02/rm_dir_macos.png) 

**Impossible de supprimer le répertoire car c'est un répertoire! Que faire?**

J'avoue que PowerShell donne un meilleur message d'explication que celui obtenu sous Linux et macOS.

Si vous êtes sous Windows, répondez à la question précédente en mettant `N` pour dire non.

![Annulation de la suppression du répertoire `test`](assets/images/ch02/rm_dir_windows_warning.png)

Nous allons rajouter l'option `-r` à notre commande. Cela permettra d'indiquer que nous souhaitons supprimer notre dossier `test` et son contenu de manière récursive -- c'est-à-dire, supprimer non seulement le répertoire `test` mais aussi tout ce qu'il contient. Sans l'option `-r`, la suppression échoue car la ligne de commande ne sait pas si vous souhaitez tout supprimer dans le dossier ou pas. Avec `-r`, vous dites essentiellement, "Tu peux **TOUT** supprimer" dans le répertoire.

![Suppression d'un répertoire non vide sous Windows](assets/images/ch02/rm_dir_good_windows.png)

![Suppression d'un répertoire non vide sous Linux](assets/images/ch02/rm_dir_good_linux.png) 

![Suppression d'un répertoire non vide sous macOS](assets/images/ch02/rm_dir_good_macos.png) 

### 2.1.14. Résumé

Bien qu'il existe de nombreuses commandes disponibles, en pratique, six d'entre elles sont utilisées le plus fréquemment dans le développement Django:

- `cd` (changer de répertoire)
- `cd ..` (retourner dans le répertoire parent)
- `ls` (lister les fichiers et dossiers présents dans le répertoire courant)
- `pwd` (afficher le chemin du répertoire courant)
- `mkdir` (créer un nouveau dossier)
- `touch` ou `ni` (créer un nouveau fichier)

Ce qui est génial, c'est que vous savez maintenant comment utiliser chacune de ces commandes. Avec de la pratique, vous vous rendrez compte que cette approche s'avère beaucoup plus efficiente que l'utilisation d'une souris.

Dans ce livre, je vous donnerai les commandes exactes à exécuter -- vous n'avez donc pas besoin d'être un expert en ligne de commande -- mais au fil du temps, c'est une bonne compétence pour tout développeur professionnel à développer.

## 2.2. Installation de Python 3

Enfin, les choses sérieuses peuvent démarrer!

Comme nous allons le voir dans les lignes qui suivent, installer Python est la chose la plus facile qui puisse exister au monde! Je ne le dis pas uniquement pour ceux qui sont sous Windows, mais également pour les linuxiens et les fanatiques macOS.

Quelque soit votre système d'exploitation, la première étape consiste à vous rendre sur le site officiel de Python: [https://www.python.org/](https://www.python.org/)

### 2.2.1. Installation de Python sous Windows

1. Cliquez sur le lien [*Downloads*](https://www.python.org/downloads/) au niveau du menu principal de la page d'accueil.
2. Sélectionnez la version de Python que vous souhaitez installer. (Je vous conseille d'opter pour la dernière version en date. Au moment où j'écris ces lignes, il s'agit de la version **3.9**).
3. Sans grande surprise, le téléchargement du fichier d'installation de Python va alors débuter.
4. Une fois le téléchargement terminé, exécutez ensuite le fichier d'installation et suivez les différentes étapes. Pensez à cocher la case **Add Python 3.x to PATH** lors de l'installation afin que Python soit accessible en ligne de commande. Cela s'avéra utile plus tard lorsque nous allons commencer à créer nos projets [Django](https://www.djangoproject.com/).
5. À présent, votre installation est normalement terminée.
6. Histoire d'avoir confirmation, fermez PowerShell s'il est présentement ouvert, puis réouvrez-le afin que les changements apportés lors de l'installation soient pris en compte. Dans la nouvelle ligne de commande, exécutez la commande `python -V` afin de voir la version de Python installée au niveau de votre ordinateur. Cela devrait afficher quelque chose comme `Python 3.9.0`. Attention, c'est un "V" majuscule et non un "v" minuscule.

![Ajout de l'exécutable de Python au PATH](assets/images/ch02/python_path_windows.png)

![Confirmation d'installation de Python sous Windows](assets/images/ch02/python_installed_windows.png)

Si vous avez à faire un choix entre plusieurs liens d'installation, sélectionnez celui qui correspondra à votre type de processeur. Au cas où, vous ne connaissez pas le type de votre système (32 bits ou 64 bits), choisissez tout simplement la version `x86`. Si vous aimez également les vidéos, [celle-ci](https://www.youtube.com/video-installation-python-windows) fera l'affaire!

### 2.2.2. Installation de Python sous Linux

Sur la plupart des distributions Linux, Python est généralement pré-installé. Cependant, il est possible que vous n'ayez pas la dernière version en date.

<blockquote class="notice">
    <p><strong>Comment afficher la version de Python installée?</strong><br>Afin de connaitre la version de Python installée, tapez dans un terminal la commande: <code>python3 -V</code>. Attention, c'est un "V" majuscule et non un "v" minuscule.</p>
</blockquote>

Il est très probable que ce soit une version comme 3.7 ou 3.8. Dans tous les cas, je vous conseille d'installer la dernière version en date de la branche **3.x**. Au moment où j'écris ces lignes, il s'agit de la version `3.9`.

Si vous avez une distribution Debian, exécutez les commandes suivantes:

{caption: "Ligne de commande"}
```bash
$ sudo apt update
$ sudo apt install -y build-essential zlib1g-dev libffi-dev libreadline-gplv2-dev libncursesw5-dev libssl-dev libsqlite3-dev tk-dev libgdbm-dev libc6-dev libbz2-dev
```

Cliquez ensuite sur [Downloads](https://www.python.org/downloads/) et téléchargez la dernière version de Python. 

Ouvrez un terminal, puis rendez-vous dans le dossier où se trouve l'archive:

1. Décompressez l'archive en tapant: `tar xf Python-3.9.0.tar.xz` (cette commande est bien entendu à adapter suivant la version et le type de compression).
2. Une fois la décompression terminée, vous devez vous rendre dans le dossier qui vient d'être créé dans le répertoire courant (`Python-3.9.0` dans mon cas): `cd Python-3.9.0`.
3. Il faudra lancer le script de configuration en tapant `./configure --enable-optimizations` dans la console. Une fois que la configuration terminée, il n'y a plus qu'à compiler en exécutant la commande `make` puis la commande `sudo make altinstall` (en tant que root, super-utilisateur) pour installer Python à proprement dit.

Histoire d'avoir confirmation, redémarrez votre terminal (fermez et réouvrez-le) afin que les changements apportés lors de l'installation soient pris en compte. Dans le nouveau terminal, exécutez la commande `python3.9 -V` afin de voir la version de Python installée au niveau de votre ordinateur. Cela devrait afficher quelque chose comme `Python 3.9.0`.

![Confirmation d'installation de Python sous Linux](assets/images/ch02/python_installed_linux.png)

<blockquote class="notice">
    <p><strong>Besoin d'aide?</strong><br>Si vous rencontrez des difficultés, <a href="https://www.youtube.com/video-installation-python-linux">cette vidéo</a> pourra vous guider dans votre installation de Python.</p>
</blockquote>

### 2.2.3. Installation de Python sous macOS

Sur le site officiel de Python, vous trouverez des paquetages pour macOS similaires à ceux proposés sous Windows.

Téléchargez la dernière version en date.

Faites ensuite un double-clic sur le fichier `.pkg` téléchargé `python-3.9.0-macosx10.9.pkg`.

Suivez les différentes étapes de l'assistant d'installation et vous aurez Python installé sur votre précieux Mac :).

Histoire d'avoir confirmation, redémarrez votre terminal (fermez et réouvrez-le) afin que les changements apportés lors de l'installation soient pris en compte. Dans le nouveau terminal, exécutez la commande `python3 -V` afin de voir la version de Python installée au niveau de votre ordinateur. Cela devrait afficher quelque chose comme `Python 3.9.0`. Attention, c'est un "V" majuscule et non un "v" minuscule.

![Confirmation d'installation de Python sous macOS](assets/images/ch02/python_installed_mac.png)

<blockquote class="notice">
    <p><strong>Note:</strong> Je vais dans le reste du livre utiliser la commande <code>python3</code> pour faire référence à <em>python</em> (vu que j'utilise un macOS), mais il vous faudra remplacer <code>python3</code> par l'exécutable approprié en fonction de votre système d'exploitation (<code>python</code> sous Windows, <code>python3</code> sous macOS et <code>python3.9</code> sous Linux).</p>
</blockquote>

## 2.3. Installation de Sublime Text 3

L'installation de Sublime Text est super simple.

Quelque soit votre système d'exploitation, la première étape consiste à vous rendre sur le site officiel de Sublime Text: [https://www.sublimetext.com/3](https://www.sublimetext.com/3)

Téléchargez ensuite la version appropriée en fonction de votre système d'exploitation.

Suivez ensuite les différentes étapes de l'assistant d'installation et vous aurez *Sublime Text 3* installé sur votre ordinateur.

![Sublime Text 3](assets/images/ch02/sublime_text_3.png)

## 2.4. Premiers pas avec Pip

Python dispose d'un éventail de modules et packages au travers de la [Python Standard Library ou PSL](https://docs.python.org/3/library/) (*Librairie Standard Python* pour les allergiques à la langue de Shakespeare).

C'est le cas par exemple des modules:
- `math` qui comporte comme son nom l'indique des fonctions et constantes en rapport avec les mathématiques;
- et `random` qui contient un tas de fonctions ayant attraits à tout ce qui est aléatoire (le monde du hasard si vous le souhaitez).

Toutefois, des fois on a envie d'utiliser certains modules/packages qui ne se trouvent malheureusement pas au niveau de la PSL (c'est le cas par exemple de Django, Flask, etc). Comment procéder alors dans ce genre de situation?

### 2.4.1. Méthode préhistorique: Installation manuelle

Auparavant, l'installation de librairies Python se faisait de façon manuelle. Si je voulais par exemple installer une librairie Python *X*, il allait me falloir:

1. Me rendre sur le site officiel de la librairie *X* (s'il existe bien évidemment).
2. Télécharger le code Python de cette librairie *X*.
3. Étant donné que les librairies étaient pour la grande majorité distribuées sous forme de fichiers compressés, il fallait après téléchargement, décompresser le fichier téléchargé.
4. Placer ensuite le dossier obtenu à un emplacement dédié au niveau de mon ordinateur.
5. Tenter de le charger au niveau de mon projet.
6. Régler les problèmes éventuels d'importation, etc...

Le problème avec cette façon de fonctionner, c'est qu'il fallait refaire la même chose à chaque fois qu'une nouvelle version de la librairie était rendue disponible. Pénible n'est-ce pas ?

### 2.4.2. Pip, un gestion de dépendances

Aujourd'hui, on utilise ce qu'on appelle un gestionnaire de dépendances. Et la plupart des langages de programmation en ont au moins un.

- Le gestionnaire de dépendances le plus utilisé au niveau de *Ruby* est *bundler*.
- Le gestionnaire de dépendances le plus utilisé au niveau de *PHP* est *composer*.
- Les gestionnaires de dépendances les plus utilisés au niveau de *JavaScript* sont *npm* et *yarn*.
- Le gestionnaire de dépendances le plus utilisé au niveau de *Python* est *pip*.

Donc si nous voulons installer une librairie Python, nous allons le faire aujourd'hui comme des pros en utilisant *pip*. Voici la liste des librairies qu'il vous est possible d'installer via *pip*: [https://pypi.org/](https://pypi.org/).

Ces outils *bundler*, *composer*, *npm*, *yarn*, *pip* sont appelés gestionnaires de dépendances car ils vont nous permettre de gérer les dépendances de nos projets.

Les projets Django que nous allons créer dès le prochain chapitre vont dépendre de Django. Django sera donc **une dépendance** de chacun de ces projets. Si nous avons besoin de faire du traitement d'images, il existe une librairie Python très populaire nommée *Pillow* que nous pouvons utiliser. Si nous installons la librairie *Pillow*, elle deviendra également une dépendance de notre projet et ainsi de suite.

L'un des avantages qu'on a à utiliser un gestionnaire de dépendances est le fait que l'installation de nouvelles versions de nos dépendances se fera de manière ultra simple. On change la version et bang tout marche!

Ready? Installons donc sans plus tarder *pip*.

### 2.4.3. Installation de pip

Euh, désolé de vous décevoir mais *pip* est déjà installé au niveau de votre ordinateur.

Avant, il fallait installer *pip* manuellement mais depuis les versions récentes de Python, il est directement embarqué avec Python. Donc nous n'aurons rien à faire!

On peut le prouver en ouvrant un terminal et en tapant la commande:

![Confirmation d'installation de pip sous Windows](assets/images/ch02/pip_windows.png)

![Confirmation d'installation de pip sous Linux](assets/images/ch02/pip_linux.png)

![Confirmation d'installation de pip sous macOS](assets/images/ch02/pip_macos.png)

Comme vous pouvez le voir:
- pour accéder à pip sous Windows, il vous faudra taper tout simple `pip`;
- pour accéder à pip sous macOS, il vous faudra taper tout simple `pip3`.
- pour accéder à pip sous Linux, il vous faudra taper tout simple `pip3.9`.

<blockquote class="notice">
    <p><strong>Note:</strong> Je vais dans le reste du livre utiliser la commande <code>pip3</code> pour faire référence à <em>pip</em> (vu que j'utilise un macOS), mais il vous faudra remplacer cette commande <code>pip3</code> par l'exécutable approprié en fonction de votre système d'exploitation (<code>pip</code> sous Windows, <code>pip3</code> sous macOS et <code>pip3.9</code> sous Linux).</p>
</blockquote>

### 2.4.4. Python Package Index (PyPI)

L'index de packages Python (PyPI) est un dépôt de packages pour le langage de programmation Python.

PyPI vous aide à trouver et installer des packages développés et partagés par la communauté Python.

Le site officiel de PyPI est [https://pypi.org/](https://pypi.org/).

Au moment où j'écris ces lignes, il y a plus de **268 557** projets publiés.

![Site officiel de PyPI](assets/images/ch02/pypi_website.png)

### 2.4.5. Installation du module python-slugify

Nous allons installé le module `python-slugify` afin de voir de manière pratique comment installer une librairie avec `pip`.

Le module `python-slugify` est un module assez simple permettant de créer un slug à partir d'une chaîne de caractères. Par exemple, la chaîne de caractères `"Django eSt cOol"` deviendra `"django-est-cool"`.

<blockquote class="notice">
    <p><strong>Qu'est-ce qu'un slug?</strong><br>Un slug est une courte étiquette identifiant un objet, contenant uniquement des lettres, des chiffres, des underscores ou des tirets. Ils sont généralement utilisés dans les URLs. Par exemple, dans l'URL d'une formation typique sur Parlons Code: <a href="https://parlonscode.com/courses/authentification-autorisation-avec-symfony-5">https://parlonscode.com/courses/authentification-autorisation-avec-symfony-5</a>, le dernier élément <code>authentification-autorisation-avec-symfony-5</code> est le slug.</p>
</blockquote>

![Module python-slugify sur PyPI](assets/images/ch02/python-slugify.png)

Pour installer le module *python-slugify*, il nous suffit d'exécuter la commande suivante:

{caption: "Ligne de commande"}
```bash
$ pip3 install python-slugify
Collecting python-slugify
  Downloading python-slugify-4.0.1.tar.gz (8.8 kB)
Collecting text-unidecode>=1.3
  Downloading text_unidecode-1.3-py2.py3-none-any.whl (78 kB)
     |████████████████████████████████| 78 kB 1.4 MB/s
Installing collected packages: text-unidecode, python-slugify
    Running setup.py install for python-slugify ... done
Successfully installed python-slugify-4.0.1 text-unidecode-1.3
```

Exécutez la commande indiquée pour mettre à jour `pip` si vous avez ce message de warning: **WARNING: You are using pip version x.y.z, however version a.b.c is available. You should consider upgrading via the 'pip install --upgrade pip' command**.

Vous pouvez également utiliser les commandes `pip3 freeze` ou `pip3 list` afin de lister toutes les dépendances installées sur votre système avec leurs versions respectives. La librairie `python-slugify` devrait se trouver dans cette liste après installation.

{caption: "Ligne de commande"}
```bash
$ pip3 list
Package           Version
----------------- ----------
certifi           2019.11.28
mypy              0.740
mypy-extensions   0.4.3
pip               20.0.2
python-slugify    4.0.0
setuptools        41.2.0
text-unidecode    1.3
typed-ast         1.4.0
typing-extensions 3.7.4.1
```

Vous pouvez obtenir plus de détails sur une dépendance spécifique en utilisant la commande `pip3 show`.

{caption: "Ligne de commande"}
```bash
$ pip3 show python-slugify
Name: python-slugify
Version: 4.0.0
Summary: A Python Slugify application that handles Unicode
Home-page: https://github.com/un33k/python-slugify
Author: Val Neekman
Author-email: info@neekware.com
License: MIT
Location: /Library/Frameworks/Python.framework/Versions/3.9/lib/python3.9/site-packages
Requires: text-unidecode
Required-by:
```

Essayons à présent d'utiliser notre module `python-slugify`. Pour ce faire, nous allons démarrer le shell interactif de Python:

![Utilisation du module python-slugify sous Windows](assets/images/ch02/slugify_windows.png)

![Utilisation du module python-slugify sous Linux](assets/images/ch02/slugify_linux.png)

![Utilisation du module python-slugify sous macOS](assets/images/ch02/slugify_macos.png)

Pour quitter le shell interactif, il suffit de taper `exit()` ou encore `quit()`.

<blockquote class="notice">
    <p><strong>Note:</strong> Si vous souhaitez désinstaller le module <code>python-slugify</code>, il vous suffira d'exécuter la commande <code>pip3 uninstall python-slugify</code>.</p>
</blockquote>

Et voilà! Assez simple n'est-ce pas?
Même si cela fonctionne, je n'aime pas cette manière d'installer les librairies. En effet, tel que nous avons procédé, la librairie `python-slugify` a été installée de manière globale sur mon système. En pratique, on préfère installer nos librairies dans ce qu'on appelle des environnements virtuels (environnements isolés). Nous verrons en détails le principe de fonctionnement des environnements virtuels dès le prochain chapitre. Mais si vous devez retenir quelque chose de cette section, c'est que même s'il est possible d'installer nos dépendances de manière globale au niveau de notre système, il est généralement recommandé de les installer dans des environnements virtuels, ce qui nous simplifiera grandement la tâche lorsque nous serons rendus à travailler sur différents projets nécessitant chacun une version spécifique de cette dépendance.

## 2.5. Félicitations!

Est-ce vrai ce qu'on dit ? Python est installé sur votre machine ? Sublime Text ou PyCharm ou VS Code ou ... aussi :) ? Vous savez également comment installer une librairie en utilisant pip?

Qu'est-ce qu'on attend donc pour créer notre premier projet Django ?

## 2.6. Résumé

Dans ce second chapitre, nous avons appris que:

- La ligne de commande est une puissante vue textuelle de votre ordinateur.
- En général, les développeurs préfèrent utiliser leur clavier et leur ligne de commande pour naviguer facilement sur leur ordinateur. Avec de la pratique, cette approche est beaucoup plus rapide que l'utilisation d'une souris.
- En tant que développeurs, nous utiliserons largement la console pour créer et configurer nos projets Django.
- Quelque soit le système d'exploitation utilisé, installer Python est chose facile!
- Quelque soit le système d'exploitation utilisé, installer Sublime Text est un jeu d'enfant!
- Python dispose d'un éventail de modules et packages au travers de la Librairie Standard Python.
- On peut utiliser le gestionnaire de dépendances *pip* si nous souhaitons utiliser des librairies qui ne se trouvent pas au niveau de la Librairie Standard Python.
- La plupart des langages de programmation disposent d'un gestionnaire de dépendances.
- Le gestionnaire de dépendances le plus utilisé au niveau de *Ruby* est *bundler*.
- Le gestionnaire de dépendances le plus utilisé au niveau de *PHP* est *composer*.
- Les gestionnaires de dépendances les plus utilisés au niveau de *JavaScript* sont *npm* et *yarn*.
- Le gestionnaire de dépendances le plus utilisé au niveau de Python est *pip*.
- On appelle *dépendances* les librairies dont dépendent nos projets.
- L'un des avantages qu'on a à utiliser un gestionnaire de dépendances est le fait que l'installation de mises à jour de nos dépendances se fera aisément.
- Pour installer un module avec pip, on utilise la commande `pip install`.
- Pour lister l'ensemble des modules installés, on utilise la commande `pip freeze` ou `pip list`.
- Pour avoir des informations sur un module spécifique, on utilise la commande `pip show`.
- Même s'il est possible d'installer nos dépendances de manière globale au niveau de notre système, il est généralement recommandé de les installer dans des environnements virtuels, ce qui nous simplifiera grandement la tâche lorsque nous serons rendus à travailler sur différents projets nécessitant chacun une version différente de cette dépendance.

