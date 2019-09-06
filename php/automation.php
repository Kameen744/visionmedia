
<?php
$ddte = date("d/m/Y");
	$tabname = 'Playlist & Events History';
	$cardnav = '
	<nav class="nav justify-content-center">
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="VirtualPlaylistHistory">Virtual Dj</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="PlaylistHistory">Radio Dj</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="SoundTrackHist">Soundtrack</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="RadioEvents">Events</a>
		<a class="nav-link btn btn-danger btn-sm mx-1 py-1 m-1" href="#" id="SearPlayedBy">Search By</a>
	</nav>
	<input type="hidden" name="" value="$ddte" id="todaysadd">
	<script type="text/javascript">
	$(".logDatpick").datepicker({dateFormat: "yy-mm-dd"});
</script>
	';
	include_once 'layouts/main-card.php';
?>
