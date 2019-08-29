 
 
	<!-- video -->
	<link rel='stylesheet' id='ms-main-css'  href='<?php echo $PATHSKIN; ?>/css/masterslider/masterslider.main.css?ver=3.1.1' type='text/css' media='all' />
	<link rel='stylesheet' id='ms-custom-css'  href='<?php echo $PATHSKIN; ?>/css/masterslider/custom.css?ver=2.7' type='text/css' media='all' />
	<!-- -->

	<?
	//$video = getBackgroundFeatures();
	//$video = $INI['features']['nomevideo'];
	$video = "video_home.webm"; 
	//$video = "video_home_menor.mp4"; 
	?>
		<section id="content-section-8">
			<div class="limoking-full-size-wrapper gdlr-show-all no-skin"  style="padding-bottom: 0px;  background-color: #ffffff; ">
				<div class="limoking-master-slider-item limoking-slider-item limoking-item" style="margin-bottom: 0px;">
					<div id="P_MS588628b593903" class="master-slider-parent ms-parent-id-2">
						<div id="MS588628b593903" class="master-slider ms-skin-default">
							<div  class="ms-slide" data-delay="7" data-fill-mode="fill">
							 
								<video data-autopause="false" data-mute="true" data-loop="true" data-fill-mode="fill" > 
									<source src="<?=$PATHSKIN?>/video/<?=$video?>" type="video/ogg"/>
								</video>
								<div style="text-align:center;" class="ms-layer  msp-cn-1-1" style="" data-ease="easeOutQuint"  data-offset-x="0" data-offset-y="-143" data-origin="mc" data-position="normal">
									 <H2><?php echo $INI['features']['texto1']; ?></H2>
								</div>
								<div  class="ms-layer  msp-cn-1-2" style="" data-ease="easeOutQuint" data-offset-x="0" data-offset-y="-58" data-origin="mc" data-position="normal">
									<?php echo $INI['features']['texto2']; ?>
								</div>
							 
								<div  class="ms-layer  msp-cn-1-3" style="" data-ease="easeOutQuint"  data-offset-x="0" data-offset-y="24" data-origin="mc" data-position="normal">
									<?php echo $INI['features']['texto3']; ?>
								</div> 
							</div>
						</div>
					</div>
					<script>
						( window.MSReady = window.MSReady || [] ).push( function( $ ) {
							"use strict";
							var masterslider_3903 = new MasterSlider();
							// slider controls
							// slider setup
							masterslider_3903.setup("MS588628b593903", {
								width : 1180,
								height: 660,
								minHeight  : 0,
								space : 0,
								start : 1,
								grabCursor : false,
								swipe : false,
								mouse : false,
								keyboard: false,
								layout: "fullwidth",
								wheel : false,
								autoplay: true,
								instantStartLayers:false,
								loop  : false,
								shuffle : false,
								preload : 0,
								heightLimit: true,
								autoHeight : false,
								smoothHeight : true,
								endPause: false,
								overPause  : true,
								fillMode: "fill",
								centerControls  : true,
								startOnAppear: false,
								layersMode : "center",
								autofillTarget  : "",
								hideLayers : false,
								fullscreenMargin: 0,
								speed : 20,
								dir: "h",
								parallaxMode : 'swipe',
								view  : "basic"
							});
							$("head").append( "<link rel='stylesheet' id='ms-fonts'  href='//fonts.googleapis.com/css?family=Montserrat:700,regular|Hind:regular,300|Merriweather:700' type='text/css' media='all' />" );
							window.masterslider_instances = window.masterslider_instances || [];
							window.masterslider_instances.push( masterslider_3903 );
						});
					</script>
				</div>
				<div class="clear"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</section>
