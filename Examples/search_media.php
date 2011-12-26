<?php

require( '_common.php' );

if ( isset( $_GET['lat'], $_GET['lng'] ) ) {
	$search = true;
	$lat = $_GET['lat'];
	$lng = $_GET['lng'];
}
else {
	$lat = 48.8582749;
	$lng = 2.2945474;
}

$media = $instagram->searchMedia( $lat, $lng, isset( $_GET['max_timestamp'] ) ? array( 'max_timestamp' => $_GET['max_timestamp'] ) : null );


require( '_header.php' );
?>

<h1>Search media near <?php if( isset( $search ) ): ?><?php echo $lat ?>, <?php echo $lng ?><?php else: ?>the Eiffel Tower<?php endif; ?> (<?php echo count( $media ) ?> results)</h1>

<?php foreach( $media as $n => $m ): ?>
<a href="?example=media.php&media=<?php echo $m->getId() ?>"><img src="<?php echo $m->getThumbnail()->url ?>"></a>
<?php endforeach ?>

<?php if( $media->getNextMaxTimeStamp() ): ?><br><br><a href="?example=search_media.php&lat=<?php echo $lat ?>&lng=<?php echo $lng ?>&max_timestamp=<?php echo $media->getNextMaxTimestamp() ?>">Next page</a><?php endif; ?>