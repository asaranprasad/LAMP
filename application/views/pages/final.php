<!-- This view does the slide show for the images whose details are present in the DB -->
 

<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$('.img-wrap a:gt(0)').hide();

$('.next').click(function() {
    $('.img-wrap a:first-child').fadeOut().next().fadeIn().end().appendTo('.img-wrap');
});

$('.previous').click(function() {
    $('.img-wrap a:first-child').fadeOut();
    $('.img-wrap a:last-child').prependTo('.img-wrap').fadeOut();
    $('.img-wrap a:first-child').fadeIn();
});
});//]]>  

</script>


</head>
<body>
  <div id="img-grp-wrap">
    <div class="img-wrap">
	<?php foreach ($images as $images_item): ?>
	<?php echo '<a href="'.$images_item['img_url'].'"><img src="'.$images_item['img_addr'].''.$images_item['img_name'].'" /></a>'; ?>

       	<?php endforeach ?>
    </div>   
    
    <a href="#" class="previous">Previous</a>
    <a href="#" class="next">Next</a>
    
</div>

