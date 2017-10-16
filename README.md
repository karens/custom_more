# Custom More

Out of the box, the "Read more" links on node teasers and the "More" links on Views blocks are simple anchor links. This module adds several features to them:

- Optionally display the links as buttons instead of text links.
- Float the links right.
- Insert an icon into the link, either before or after the text.

The first two can be done with css, but the last is impossible to do without custom code. It literally took me three days to figure out a way to do this. The easiest, most obvious options, like appending the icon in hook_preprocess() append the icon after the anchor rather than as a part of the text on the anchor. When doing that, the icon is not clickable and it can get separated from the text it relates to, especially if floated right. This code will rewrite the text in the link to append or prepend the text with the icon, then re-insert the updated text into the render array.

This solution assumes that the Bootstrap theme is used, or a sub-theme of that theme, by taking advantage of the built-in glyphicons in that theme. You could adapt this to use fonts from Font Awesome or some other source, by extending CustomMoreManager and altering the icon markup, classes, and libraries.