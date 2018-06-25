# Modernizr features detection

*/gulp-includes/gulp-configuration.js*

```js
/* Modernizr will be included in the bundle if feature-detects is filled. */
modernizr: {

    /* https://modernizr.com/download?video-videoloop */
    'feature-detects': [
        "test/video",
        "test/video/loop"
    ],

    /* Add classes in <html> tag ? */
    'add-classes-in-html-tag': true
}
```

*/gulp-includes/js/example.js*

```js
if (Modernizr.video.h264) {
    // Browser supports mp4 <video>
}
if (Modernizr.videoloop) {
    // Browser supports videoloop
}
```

*/gulp-includes/scss/example.scss*

```scss
html.video {
  .video {
    display: block;
  }
  img.fallback {
    display: none;
  }
}
html.no-video {
  .video {
    display: none;
  }
  img.fallback {
    display: block;
  }
}
```