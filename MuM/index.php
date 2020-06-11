<?php 

$page_title = 'Homepage';

require('includes/top.php');

$trending_now = query('SELECT s.song_id, s.title, s.image, a.name from songs s join artists a on s.artist_id = a.artist_id');

?>

<link rel="stylesheet" type="text/css" href="Content/css/index.css">

<?php  include('includes/topbar.php'); ?>
<?php  include('includes/sidebar.php'); ?>

<div class="firstPageTitle">
	<h2>Trending Now&ensp;</h2>
</div>

<?php 

if ($trending_now->num_rows > 0) {
  while($row = $trending_now->fetch_assoc()) { ?>

	<div class="box" title="<?php echo $row['name'] . ' - ' . $row['title']; ?>">
		<img src="<?php echo SONGS_IMAGES.$row['image'] ?>" alt = "<?php echo $row['title'] ?>" width="150" height = "170"/>
	</div>
	
<?php 
 }
} 
else { ?>
 <!-- no result -->
<?php
} 
?>

<div class="firstPageTitle">
	<h2>Trending Artists&ensp;</h2>
</div>

<?php

$trending_artists = query('SELECT a.artist_id, a.name, a.image, a.rank from artists a WHERE rank > 0 ORDER BY rank ASC');

if ($trending_artists && $trending_artists->num_rows)
{
  while($row = $trending_artists->fetch_assoc())
  { ?>

	<div class="box" title="<?php echo $row['name'] . ' - ' . $row['title']; ?>">
		<img src="<?php echo ARTISTS_IMAGES.$row['image'] ?>" alt = "<?php echo $row['name'] ?>" width="150" height = "170"/>
	</div>

<?php 
 }
} 

else
{ ?>
 <!-- no result -->
<?php
}

?>

<div class="firstPageTitle">
	<h2>New Releases&ensp;</h2>
</div>

<?php

$new_releases = query('SELECT s.song_id, s.title, s.image from songs s ORDER BY release_date DESC');

if ($new_releases && $new_releases->num_rows)
{
	while($row = $new_releases->fetch_assoc())
	{
		?>

		<div class="box" title="<?php echo $row['name'] . ' - ' . $row['title']; ?>">
			<img src="<?php echo SONGS_IMAGES.$row['image'] ?>" alt = "<?php echo $row['title'] ?>" width="150" height = "170"/>
		</div>

		<?php

	}
}

else
{
	?>

	<?php
}

?>

<?php require('includes/bottom.php'); ?>