!function(a,b,c){"use strict";var d=function(){c(".summernote-edit").summernote({focus:!0})},e=function(){c(".summernote-edit").summernote("code");c(".summernote-edit").summernote("destroy")};b.getElementById("edit").onclick=function(){d()},b.getElementById("save").onclick=function(){e()},c(".summernote").summernote(),c(".summernote-air").summernote({airMode:!0}),c(".summernote-code").summernote({height:350,codemirror:{theme:"monokai"}})}(window,document,jQuery);