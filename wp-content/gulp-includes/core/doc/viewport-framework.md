# Built-in JavaScript viewport informations (gulp_display)

Example in : */gulp-includes/js/example.js*

```js
console.log(gulp_display);
```

### Get current viewport informations.

```js
var height = gulp_display.getHeight();
var width = gulp_display.getWidth();
var scrollY = gulp_display.getScrollY();
var scrollX = gulp_display.getScrollX();
var breakpoint = gulp_display.getBreakpoint();
var orientation = gulp_display.getOrientation();
```

### Read current viewport informations.

`gulp_display.width`

Returns the current width of the viewport (in pixels).

`gulp_display.height`

Returns the current height of the viewport (in pixels).

`gulp_display.scrollY`

Returns vertical scroll position of the viewport. (Like window.scrollY, but cross-browser.)

`gulp_display.scrollX`

Returns horizontal scroll position of the viewport. (Like window.scrollX, but cross-browser.)

`gulp_display.orientation`

Returns the device orientation : 'portrait', 'landscape' or 'square'.

`gulp_display.breakpoint`

Returns the current horizontal breakpoint.

### Get previous viewport informations (after resize).

`gulp_display.widthOrigin`

Returns the previous width of the viewport (in pixels).

`gulp_display.heightOrigin`

Returns the previous height of the viewport (in pixels).

`gulp_display.orientationOrigin`

Returns the previous device orientation : 'portrait', 'landscape' or 'square'.

`gulp_display.breakpointOrigin`

Returns the previous horizontal breakpoint.

### Get previous viewport informations (after scroll).

`gulp_display.scrollYOrigin`

Returns the previous vertical scroll position of the viewport.

`gulp_display.scrollXOrigin`

Returns the previous horizontal scroll position of the viewport.

### Miscellaneous

`gulp_display.breakpoints`

Available horizontal breakpoints.