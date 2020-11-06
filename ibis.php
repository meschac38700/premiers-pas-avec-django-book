<?php

return [
    /**
     * The book title.
     */
    'title' => 'Premiers pas avec Django',


    /**
     * The author name.
     */
    'author' => 'Honoré Hounwanou',

    /**
     * The list of fonts to be used in the different themes.
     */
    'fonts' => [
       'linux_libertine' => 'LinLibertine-Regular.ttf',
       // 'brandon_text' => 'BrandonText-Regular.ttf',
       'open_sans' => 'OpenSans-Regular.ttf',
       'anonymous_pro' => 'AnonymousPro-Regular.ttf',
    ],

    /**
     * Page ranges to be used with the sample command.
     */
    'sample' => [
        [1, 3],
        [80, 85],
        [100, 103]
    ],

    /**
     * A notice printed at the final page of a generated sample.
     */
    'sample_notice' => 'Ceci est un extrait du livre "Premiers pas avec Python" de Honoré Hounwanou. <br> 
                        Pour plus d\'informations, veuillez <a href="https://honore-h.com/">Cliquez ici</a>.',
];
