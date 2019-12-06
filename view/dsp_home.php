<!-- 
Bicycle Ride Journal
Home page display
act = home
 -->

	<div class="jumbotron"  style="text-align:center;">
		<h3 >Welcome to the Bicycle Ride Journal</h3>
		
		<p class="lead">What would you like to do?</p>
		<hr class="my-4">
		<dl>
			<dt class="mb-1"><a href="<?php echo ROOT_URL;?>index.php?act=new">Enter details for a new ride</a></dt>
			<dt class="mb-1"><a href="<?php echo ROOT_URL;?>index.php?act=search">Edit a previously entered ride</a></dt>
			<dt class="mb-1"><a href="<?php echo ROOT_URL;?>index.php?act=rpt">View the ride summary report</a></dt>
		</dl>
	</div>