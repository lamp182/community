/*! passport_17173_com-2.3.6 2014-04-22 17:40:08 */
!function(){function a(){}function b(a,b){this.path=a,"undefined"!=typeof b&&null!==b?(this.at_2x_path=b,this.perform_check=!1):(this.at_2x_path=a.replace(/\.\w+$/,function(a){return"@2x"+a}),this.perform_check=!0)}function c(a){this.el=a,this.path=new b(this.el.getAttribute("src"),this.el.getAttribute("data-at2x"));var c=this;this.path.check_2x_variant(function(a){a&&c.swap()})}var d="undefined"==typeof exports?window:exports,e={check_mime_type:!0};d.Retina=a,a.configure=function(a){null==a&&(a={});for(var b in a)e[b]=a[b]},a.init=function(a){null==a&&(a=d);var b=a.onload||new Function;a.onload=function(){var a,d,e=document.getElementsByTagName("img"),f=[];for(a=0;a<e.length;a++)d=e[a],f.push(new c(d));b()}},a.isRetina=function(){var a="(-webkit-min-device-pixel-ratio: 1.5),                      (min--moz-device-pixel-ratio: 1.5),                      (-o-min-device-pixel-ratio: 3/2),                      (min-resolution: 1.5dppx)";return d.devicePixelRatio>1?!0:d.matchMedia&&d.matchMedia(a).matches?!0:!1},d.RetinaImagePath=b,b.confirmed_paths=[],b.prototype.is_external=function(){return!(!this.path.match(/^https?\:/i)||this.path.match("//"+document.domain))},b.prototype.check_2x_variant=function(a){var c,d=this;return this.is_external()?a(!1):this.perform_check||"undefined"==typeof this.at_2x_path||null===this.at_2x_path?this.at_2x_path in b.confirmed_paths?a(!0):(c=new XMLHttpRequest,c.open("HEAD",this.at_2x_path),c.onreadystatechange=function(){if(4!=c.readyState)return a(!1);if(c.status>=200&&c.status<=399){if(e.check_mime_type){var f=c.getResponseHeader("Content-Type");if(null==f||!f.match(/^image/i))return a(!1)}return b.confirmed_paths.push(d.at_2x_path),a(!0)}return a(!1)},c.send(),void 0):a(!0)},d.RetinaImage=c,c.prototype.swap=function(a){function b(){c.el.complete?(c.el.setAttribute("width",c.el.offsetWidth),c.el.setAttribute("height",c.el.offsetHeight),c.el.setAttribute("src",a)):setTimeout(b,5)}"undefined"==typeof a&&(a=this.path.at_2x_path);var c=this;b()},a.isRetina()&&a.init(d)}();