<?php 

$page_title = 'Search';

if(!isset($_GET['search_query'])){
	$query = '';
}else{
	$query = $_GET['search_query'];
}

require('includes/top.php');

$results = query('SELECT s.song_id, s.title, s.image, a.name from songs s join artists a on s.artist_id = a.artist_id where s.title like "%'.$query.'%" or a.name like "%'.$query.'%"');

?>

<link rel="stylesheet" type="text/css" href="Content/css/index.css">

<?php  include('includes/topbar.php'); ?>
<?php  include('includes/sidebar.php'); ?>

<div class="firstPageTitle">
	<h2>Search Results:&ensp;</h2>
</div>

<?php 

if ($results->num_rows > 0 && $query != '') {
  while($row = $results->fetch_assoc()) { ?>

	<div class="box" title="<?php echo $row['name'] . ' - ' . $row['title']; ?>">
		<img src="<?php echo SONGS_IMAGES.$row['image'] ?>" alt = "<?php echo $row['title'] ?>" width="150" height = "170"/>
	</div>
	
<?php 
 }
} 
else { ?>
<p>No result</p>
<?php
} 
?>

<?php require('includes/bottom.php'); ?>