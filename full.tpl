<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head>
    <title>%{title}</title>
    %{main_meta}
    %{navigation_script}
    <meta http-equiv="Content-type" content="text/html;charset=UTF-9" /> 

  </head>
<body>

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

</body>
</html>


