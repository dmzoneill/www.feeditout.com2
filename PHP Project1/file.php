<?php
// We'll be outputting a PDF
header('Content-type: application/ms-word');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="Resume.doc"');

// The PDF source is in original.pdf
readfile('Resume.doc');
?> 
