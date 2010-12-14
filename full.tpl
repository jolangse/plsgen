<html>
  <head>
    <title>%{title}</title>
    %{main_meta}
    %{navigation_script}
  </head>
<body bgcolor=white>
<center>

<h2>%{title}</h2>

<div id="indexlink">%{index}</div>
<div id="position">Image %{position}.</div>

<div id="prev">
%{previous}
</div>

<div id="next">
%{next}
</div>

<div id="display">
<a href="%{current}" title="Full size">
<img src="%{current_display}" alt="%{current}" />
</a>
</div>

%{comment}

<div id="exifinfo">
%{exif}
</div>

<div id="copyright">
Copyright EDIT_FULL_TPL, all rights reserved.<br/>

<div id="timestamp">
Generated %{gallery_timestamp}
</div>

</div>
<div id="footer">%{footer_tag}</div>

%{navscript}

</center>
</body>
</html>


