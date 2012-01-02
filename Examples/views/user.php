<h3><?php echo $user ?></h3>
<img src="<?php echo $user->getProfilePicture() ?>">

<dl>
	<dt>Name</dt>
	<dd><?php echo $user->getFullName() ?></dd>
	<dt>Website</dt>
	<dd><a href="<?php echo $user->getWebsite() ?>"><?php echo $user->getWebsite() ?></a></dd>
	<dt>Bio</dt>
	<dd><?php echo $user->getBio() ?></dd>
	<dt>Relationship</dt>
	<dd><?php if( $current_user->isFollowing( $user ) ): ?>Following<a href="?example=user.php&user=<?php echo $user->getId() ?>&action=unfollow">X</a><?php else: ?><a href="?example=user.php&user=<?php echo $user->getId() ?>&action=follow">Follow</a><?php endif; ?> <?php if( $current_user->isFollowedBy( $user ) ): ?>Followed by<?php endif; ?></dd>
</dl>

<a name="recent_media"></a>
<h4>Recent Media (<?php echo $user->getMediaCount() ?>) <?php if( $media->getNextMaxId() ): ?><a href="?example=user.php&user=<?php echo $user ?>&max_id=<?php echo $media->getNextMaxId() ?>#recent_media" class="next_page">Next page</a><?php endif; ?></h4>
<ul class="media_list">
<?php foreach( $media as $m ): ?>
<li><a href="?example=media.php&media=<?php echo $m->getId() ?>"><img src="<?php echo $m->getThumbnail()->url ?>"></a></li>
<?php endforeach; ?>
</ul>

<a name="follows"></a>
<h4>Follows (<?php echo $user->getFollowsCount() ?>) <?php if( $follows->getNextCursor() ): ?><a href="?example=user.php&user=<?php echo $user ?>&follows_cursor=<?php echo $follows->getNextCursor() ?>#follows" class="next_page">Next page</a><?php endif; ?></h4>
<ul class="media_list">
<?php foreach( $follows as $follow ): ?>
<li><a href="?example=user.php&user=<?php echo $follow ?>"><img src="<?php echo $follow->getProfilePicture() ?>" title="<?php echo $follow ?>"></a></li>
<?php endforeach; ?>
</ul>

<a name="followers"></a>
<h4>Followers (<?php echo $user->getFollowersCount() ?>) <?php if( $followers->getNextCursor() ): ?><a href="?example=user.php&user=<?php echo $user ?>&followers_cursor=<?php echo $followers->getNextCursor() ?>#followers" class="next_page">Next page</a><?php endif; ?></h4>
<ul class="media_list">
<?php foreach( $followers as $follower ): ?>
<li><a href="?example=user.php&user=<?php echo $follower ?>"><img src="<?php echo $follower->getProfilePicture() ?>" title="<?php echo $follower ?>"></a></li>
<?php endforeach; ?>
</ul>