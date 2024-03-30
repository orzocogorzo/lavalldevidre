/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************!*\
  !*** ./src/view.js ***!
  \*********************/
/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

/* eslint-disable no-console */
const block = document.querySelector(".wp-block-vdv-pdf-reader");
const doc = block.querySelector("object");
doc.style.visibility = "hidden";
doc.style.height = "0px";
doc.onload = () => {
  block.removeChild(spinner);
  doc.style.visibility = "visible";
  doc.style.height = "100vh";
};
const spinner = document.createElement("div");
spinner.classList.add("spinner");
spinner.style.minHeight = "100vh";
spinner.classList.add("wp-block-group", "has-main-contrast-background-color", "has-background", "is-content-justification-center", "is-nowrap", "is-layout-flex", "wp-container-core-group-layout-6", "wp-block-group-is-layout-flex");
spinner.innerHTML = `<p class="has-x-large-font-size"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-brand-color">Carregant el document PDF...</mark></p>`;
block.appendChild(spinner);
/* eslint-enable no-console */
/******/ })()
;
//# sourceMappingURL=view.js.map