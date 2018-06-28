# Plugin: Responsive image

Generates an \<img\> element whose src attribute changes according to the current value of : `gulp_display.breakpoint`.

This can be useful to load a smaller image file on mobile. 

### Installation

Set the enable option to `true` in */gulp-includes/gulp-configuration.js* :

```js
 /*
###################################
###### PLUGINS CONFIGURATION ######
###################################
*/

plugins: {
    responsiveImage: {
        enable: false
    }
}
```

### Usage

Use and adapt in any of your Twig files.

```twig
{% set options = {
    'src': img_url ~ 'default.png',
    'alt': 'This is mandatory',
    'class': 'this is optional',
    'id': 'this-is-optional',
    'title': 'This is optional',
    'src_2560': img_url ~ 'optional-2560.png',
    'src_1920': img_url ~ 'optional-1920.png',
    'src_1440': img_url ~ 'optional-1440.png',
    'src_1366': img_url ~ 'optional-1366.png',
    'src_1280': img_url ~ 'optional-1280.png',
    'src_1024': img_url ~ 'optional-1024.png',
    'src_768': img_url ~ 'optional-768.png',
    'src_480': img_url ~ 'optional-480.png',
    'src_320': img_url ~ 'optional-320.png'
} %}
{{ responsiveImage(options) }}
```

### CMS/Framework implementation

#### Twig

You need to set `img_url`'s value first.

```twig
{% set options = {
    'src': img_url ~ 'default.png',
    'alt': 'This is mandatory',
    'class': 'this is optional',
    'id': 'this-is-optional',
    'title': 'This is optional',
    'src_2560': img_url ~ 'optional-2560.png',
    'src_1920': img_url ~ 'optional-1920.png',
    'src_1440': img_url ~ 'optional-1440.png',
    'src_1366': img_url ~ 'optional-1366.png',
    'src_1280': img_url ~ 'optional-1280.png',
    'src_1024': img_url ~ 'optional-1024.png',
    'src_768': img_url ~ 'optional-768.png',
    'src_480': img_url ~ 'optional-480.png',
    'src_320': img_url ~ 'optional-320.png'
} %}

<noscript class="gulp-responsiveimage"
    data-src="{{ options.src }}"
    data-alt="{{ options.alt }}"
    data-class="{{ options.class }}"
    data-id="{{ options.id }}"
    data-title="{{ options.title }}"
    data-src-2560="{{ options.src_2560 }}"
    data-src-1920="{{ options.src_1920 }}"
    data-src-1440="{{ options.src_1440 }}"
    data-src-1366="{{ options.src_1366 }}"
    data-src-1280="{{ options.src_1280 }}"
    data-src-1024="{{ options.src_1024 }}"
    data-src-768="{{ options.src_768 }}"
    data-src-480="{{ options.src_480 }}"
    data-src-320="{{ options.src_320 }}"
>
    <img src="{{ options.src }}" alt="{{ options.alt }}" class="{{ options.class }}" id="{{ options.id }}" title="{{ options.title }}" />
</noscript>
```

#### PHP

You need to set `$img_url`'s value first.

```php
<?php
    function responsiveImage($options) {
        return '<noscript class="gulp-responsiveimage"
            data-src="' . $options['src'] . '"
            data-alt="' . $options['alt'] . '"
            data-class="' . $options['class'] . '"
            data-id="' . $options['id'] . '"
            data-title="' . $options['title'] . '"
            data-src-2560="' . $options['src_2560'] . '"
            data-src-1920="' . $options['src_1920'] . '"
            data-src-1440="' . $options['src_1440'] . '"
            data-src-1366="' . $options['src_1366'] . '"
            data-src-1280="' . $options['src_1280'] . '"
            data-src-1024="' . $options['src_1024'] . '"
            data-src-768="' . $options['src_768'] . '"
            data-src-480="' . $options['src_480'] . '"
            data-src-320="' . $options['src_320'] . '"
        >
            <img src="' . $options['src'] . '" alt="' . $options['alt'] . '" class="' . $options['class'] . '" id="' . $options['id'] . '" title="' . $options['title'] . '" />
        </noscript>';
    }
    
    $options = array(
        'src' => $img_url . 'default.png',
        'alt' => 'This is mandatory',
        'class' => 'this is optional',
        'id' => 'this-is-optional',
        'title' => 'This is optional',
        'src_2560' => $img_url . 'optional-2560.png',
        'src_1920' => $img_url . 'optional-1920.png',
        'src_1440' => $img_url . 'optional-1440.png',
        'src_1366' => $img_url . 'optional-1366.png',
        'src_1280' => $img_url . 'optional-1280.png',
        'src_1024' => $img_url . 'optional-1024.png',
        'src_768' => $img_url . 'optional-768.png',
        'src_480' => $img_url . 'optional-480.png',
        'src_320' => $img_url . 'optional-320.png'
    );
    
    echo responsiveImage($options);
?>


```