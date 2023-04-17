<link href="<?php echo base_url('assets/admin'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	 

<style href="css/print.css" type="text/css" media="print">

@media print {
 

#content, #page {
width: 100%; 
margin: 0; 
float: none;
}
      
@page { margin: 1cm; size: auto; }


h1 {
font-size: 24pt;
}

h2, h3, h4 {
font-size: 14pt;
margin-top: 10px;
}    
 
a {
    page-break-inside:avoid
}
blockquote {
    page-break-inside: avoid;
}
h1, h2, h3, h4, h5, h6 { page-break-after:avoid; 
     page-break-inside:avoid }
img { page-break-inside:avoid; 
     page-break-after:avoid; }
table, pre { page-break-inside:avoid }
ul, ol, dl  { page-break-before:avoid }
    

a:link, a:visited, a {
background: transparent;
color: #520;
font-weight: bold;
text-decoration: underline;
text-align: left;
}

a {
    page-break-inside:avoid
}

a[href^=http]:after {
      content:" <" attr(href) "> ";
}

$a:after > img {
   content: "";
}

article a[href^="#"]:after {
   content: "";
}

a:not(:local-link):after {
   content:" <" attr(href) "> ";
}
    
.entry iframe, ins {
    display: none;
    width: 0 !important;
    height: 0 !important;
    overflow: hidden !important;
    line-height: 0pt !important;
    white-space: nowrap;
}
.embed-youtube, .embed-responsive {
  position: absolute;
  height: 0;
  overflow: hidden;
}
    

#header-widgets, nav, aside.mashsb-container, 
.sidebar, .mashshare-top, .mashshare-bottom, 
.content-ads, .make-comment, .author-bio, 
.heading, .related-posts, #decomments-form-add-comment, 
#breadcrumbs, #footer, .post-byline, .meta-single, 
.site-title img, .post-tags, .readability 
{
display: none;
}
    
.entry:after {
color: #999 !important;
font-size: 1em;
padding-top: 0px;
}
#header:before {
color: #777 !important;
font-size: 1em;
padding-top: 0px;
text-align: center !important;    
}
 
p, address, li, dt, dd, blockquote {
font-size: 100%
}

code, pre { font-family: "Courier New", Courier, mono}

ul, ol {
list-style: square; margin-left: 18pt;
margin-bottom: 20pt;    
}

li {
line-height: 1.6em;
}    
   
}  
</style>
<body onload="window.print();">
   <div class="content-wrapper">
		<div class="content">
		<div class="col-md-12">
			<center class="mb-5">
					<h2><?php echo $judul; ?></h2>
			</center>

			 
			<?php echo $content; ?>
			<div class="card-footer">
					<div class="text-muted text-right mr-2"><i>* dipublikasikan  oleh <?php echo $instansi; ?></i></div>
					</div>
		</div>
		</div>
	</div>
    
</body>
</html>

