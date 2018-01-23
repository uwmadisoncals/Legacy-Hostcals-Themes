<?php get_header(); ?>

			<div id="content" class="wrap">

				<div id="inner-content" class="cf">

					<div class="sortingContainer">


						<div class="sortingOptions">
							<div class="optionsContainer">
								<a href="#" data-sorttype="responseTime">Response Time</a>
								<a href="#" data-sorttype="name" class="selected">Name</a>
								<a href="#" data-sorttype="server">Server</a>
							</div>
						</div>

						<div class="sortingOrder">
							<div class="optionsContainer">
								<a href="#" data-sortorder="asc" class="selected">ASC</a>
								<a href="#" data-sortorder="desc">DESC</a>
							</div>
						</div>

						<div class="responseFrequency">
							<div class="label">Check Sites Every</div>
							<div class="optionsContainer">
								<a href="#" data-frequency="15000">15 sec</a>
								<a href="#" data-frequency="180000" class="selected">3 min</a>
								<a href="#" data-frequency="600000">10 min</a>
							</div>
						</div>
					</div>



						<div id="main" class="primaryHome m-all cf isotope" role="main">

								<?php
	require_once(__DIR__ . '/client/GitHubClient.php'); ?>




	<?php $args = array( 'post_type' => 'projects', 'posts_per_page' => 100 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

		<div class="cardContainer" data-siteurl="<?php the_field('site_url') ?>">

			<?php
				if( function_exists('get_field') && get_field('screenshot') ):
					$attachment_id = get_field('screenshot'); $size = "medium";
					$image = wp_get_attachment_image_src($attachment_id, $size);


					echo "<div class='screenshotContainer'><div class='overlay'><div class='overlaytext'></div><div class='chart'></div></div><img class='screenshot' src='".$image[0]."' alt=' ' ></div>";
				else:
					echo "<div class='screenshotContainer'><div class='overlay'><div class='overlaytext'></div><div class='chart'></div></div><img class='screenshot' src='http://immediatenet.com/t/l3?Size=1280x1024&URL=http://".get_field('site_url')."' alt=' ' ></div>";
					//echo "<div class='screenshotContainer'><div class='overlay'><div class='overlaytext'></div></div><img class='screenshot' src='http://api.thumbalizr.com/?url=http://".get_field('site_url')."&width=350' alt=' ' ></div>";
				endif;


			?>





			<?php if(get_field('development_model') == "git") {

			if(get_field('git_repo_location') == "github") { ?>






				<?php

				$owner = get_field('github_organization');
				$repo = get_field('github_repository');
				//echo "Count: " . count($commits) . "\n";


				//$hash = $singlecommit->getSha();
				//$shadateurl = "http://github.com/".$owner."/".$repo."/commit/".$hash." .authorship local-time";
				$repourl = "http://github.com/".$owner."/".$repo."/";

				?>

					<a href="<?php echo $repourl; ?>" class="dateCircle" data-tooltip="View on Github">
							<svg version="1.1" id="Layer_1" class="github" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								viewBox="0 0 14 12" enable-background="new 0 0 14 12" xml:space="preserve">
							<g>
								<g>
									<path d="M9.4,7c0.3,0,0.5,0.1,0.7,0.4c0.2,0.3,0.3,0.6,0.3,1c0,0.4-0.1,0.7-0.3,1C9.9,9.6,9.7,9.8,9.4,9.8c-0.3,0-0.5-0.1-0.7-0.4
										c-0.2-0.3-0.3-0.6-0.3-1c0-0.4,0.1-0.7,0.3-1C8.9,7.2,9.2,7,9.4,7 M12.9,3.5c0.7,0.8,1.1,1.8,1.1,3c0,0.7-0.1,1.4-0.3,2
										c-0.2,0.6-0.4,1.1-0.7,1.5c-0.3,0.4-0.6,0.7-1,1c-0.4,0.3-0.7,0.5-1.1,0.6c-0.3,0.1-0.7,0.2-1.1,0.3C9.5,11.9,9.2,11.9,9,12
										c-0.2,0-0.4,0-0.7,0c-0.1,0-0.2,0-0.5,0c-0.3,0-0.6,0-0.8,0s-0.5,0-0.8,0c-0.3,0-0.5,0-0.5,0c-0.2,0-0.5,0-0.7,0
										c-0.2,0-0.5-0.1-0.9-0.1c-0.4-0.1-0.8-0.2-1.1-0.3c-0.3-0.1-0.7-0.3-1.1-0.6c-0.4-0.3-0.7-0.6-1-1C0.7,9.5,0.4,9.1,0.3,8.5
										C0.1,7.9,0,7.2,0,6.4c0-1.2,0.4-2.1,1.1-3C1,3.4,1,3,1.1,2.3c0.1-0.8,0.2-1.5,0.5-2.1c0.9,0.1,2.1,0.6,3.5,1.6
										C5.5,1.6,6.2,1.5,7,1.5c0.9,0,1.5,0.1,1.9,0.2c0.6-0.4,1.2-0.8,1.8-1c0.6-0.3,1-0.4,1.3-0.5l0.4-0.1c0.3,0.6,0.4,1.4,0.5,2.1
										C13,3,13,3.4,12.9,3.5 M7,11.3c1.7,0,3-0.2,3.8-0.6c0.9-0.4,1.3-1.2,1.3-2.5c0-0.7-0.3-1.3-0.8-1.8c-0.3-0.3-0.6-0.4-1-0.5
										c-0.4-0.1-0.9-0.1-1.7,0C7.8,5.9,7.3,6,7,6C6.6,6,6.2,6,5.7,5.9c-0.5,0-0.9-0.1-1.2-0.1c-0.3,0-0.6,0-1,0.1C3.2,6,2.9,6.2,2.7,6.4
										C2.2,6.8,1.9,7.4,1.9,8.2c0,1.3,0.4,2.1,1.3,2.5C4,11.1,5.3,11.3,7,11.3L7,11.3 M4.6,7c0.3,0,0.5,0.1,0.7,0.4
										c0.2,0.3,0.3,0.6,0.3,1c0,0.4-0.1,0.7-0.3,1C5.1,9.6,4.9,9.8,4.6,9.8c-0.3,0-0.5-0.1-0.7-0.4c-0.2-0.3-0.3-0.6-0.3-1
										c0-0.4,0.1-0.7,0.3-1C4.1,7.2,4.3,7,4.6,7"/>
								</g>
							</g>
							</svg>
				</a>


			<?php } else if(get_field('git_repo_location') == "bitbucket") { ?>
				<a href="#" class="dateCircle" data-tooltip="View on Bitbucket">
						<svg version="1.1" id="Layer_3" class="bitbucket" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 69 81" enable-background="new 0 0 69 81" xml:space="preserve">
						<g>
							<path fill="#105889" d="M8.3,57.2c0,0,9.7,7.4,26.2,7.4s25.1-7.4,25.1-7.4l-2.9,16.7c0,0-5.4,7.1-22.7,7.1s-23-7-23-7L8.3,57.2z"/>
							<g>
								<path fill="#105889" d="M34.1,0C3.6,0,0,10.1,0,10.1c2.7,25,5.6,37,5.6,37s8.5,10.6,29.9,10.6c21.4,0,26.9-9,26.9-9
									c4-19.4,6.5-38.6,6.5-38.6S64.6,0,34.1,0z M34.1,49.9c-6.4,0-11.5-5.2-11.5-11.5c0-6.4,5.2-11.5,11.5-11.5
									c6.4,0,11.5,5.2,11.5,11.5C45.6,44.7,40.5,49.9,34.1,49.9z M34.1,15C21.9,15,12,12.9,12,10.3c0-2.6,9.9-4.7,22.2-4.7
									c12.2,0,22.2,2.1,22.2,4.7C56.3,12.9,46.4,15,34.1,15z"/>
								<path fill="#105889" d="M34.1,32.8c-3.1,0-5.5,2.5-5.5,5.5s2.5,5.5,5.5,5.5s5.5-2.5,5.5-5.5S37.2,32.8,34.1,32.8z"/>
							</g>
						</g>
						</svg>
			</a>



<?php } else if(get_field('git_repo_location') == "stash") { ?>

<a href="#" class="dateCircle" data-tooltip="View on Stash">
		<svg version="1.1" id="Layer_2" class="stash" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			viewBox="0 0 35.9 35.8" enable-background="new 0 0 35.9 35.8" xml:space="preserve">
		<g>
			<g>
				<path fill="#004F72" d="M19.7,4c6.9,0.9,12.2,6.7,12.2,13.8c0,2-0.4,3.9-1.2,5.6l3.5,2c1.1-2.3,1.7-4.9,1.7-7.6
					c0-9.3-7.1-17-16.2-17.9V4z"/>
				<path fill="#004F72" d="M28.7,26.7c-2.6,3.1-6.4,5.1-10.8,5.1c-4.3,0-8.1-1.9-10.6-4.9l-3,2.6c3.3,3.9,8.2,6.3,13.7,6.3
					c5.8,0,11-2.8,14.2-7.1L28.7,26.7z"/>
				<path fill="#004F72" d="M5.2,23.5C4.4,21.8,4,19.9,4,17.9c0-7,5.1-12.7,11.8-13.8V0C6.9,1.1,0,8.7,0,17.9c0,3,0.8,5.9,2.1,8.4
					L5.2,23.5z"/>
			</g>
			<g>
				<path fill="#004F72" d="M16.8,25.7c-3.9-0.5-7-3.9-7-7.9c0-1.1,0.2-2.2,0.7-3.2l-2-1.1c-0.6,1.3-1,2.8-1,4.3
					c0,5.3,4.1,9.7,9.3,10.2V25.7z"/>
				<path fill="#004F72" d="M11.6,12.7c1.5-1.8,3.7-2.9,6.2-2.9c2.4,0,4.6,1.1,6.1,2.8l1.7-1.5c-1.9-2.2-4.7-3.6-7.8-3.6
					c-3.3,0-6.3,1.6-8.2,4.1L11.6,12.7z"/>
				<path fill="#004F72" d="M25.1,14.6c0.4,1,0.7,2.1,0.7,3.3c0,4-2.9,7.3-6.8,7.9V28c5.1-0.6,9.1-4.9,9.1-10.2c0-1.7-0.4-3.4-1.2-4.8
					L25.1,14.6z"/>
			</g>
			<circle fill="#004F72" cx="17.6" cy="17.8" r="4"/>
		</g>
		</svg>
	</a>
	<?php } ?>

<?php	} else {
		//If the site uses just FTP...
		?>
		<a href="#" class="dateCircle" data-tooltip="View FTP Path">
		<svg version="1.1" class="ftp" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			viewBox="0 0 33.4 45.6" enable-background="new 0 0 33.4 45.6" xml:space="preserve">
		<g id="g14">
			<g id="g20">
				<g>
					<path fill="#FFFFFF" d="M18.9,0.2H2.2c-1.1,0-1.9,0.9-1.9,1.9v41.2c0,1.1,0.9,1.9,1.9,1.9h29.1c1.1,0,1.9-0.9,1.9-1.9V14.5
						L18.9,0.2z M11.2,34.1H7.2V36h3.4v1.4H7.2v3.4H5.5v-8.1h5.7V34.1z M18.2,34.1h-2.4v6.6H14v-6.6h-2.4v-1.5h6.6V34.1z M25.4,36.1
						c-0.1,0.3-0.3,0.6-0.5,0.8c-0.2,0.2-0.5,0.4-0.9,0.6c-0.4,0.1-0.8,0.2-1.3,0.2h-1.9v2.9h-1.8v-8.1h3.7c0.5,0,0.9,0.1,1.3,0.2
						c0.4,0.1,0.6,0.3,0.9,0.6c0.2,0.2,0.4,0.5,0.5,0.8c0.1,0.3,0.2,0.6,0.2,1C25.6,35.5,25.5,35.8,25.4,36.1z"/>
					<path fill="#FFFFFF" d="M23.4,34.2c-0.1-0.1-0.3-0.1-0.5-0.2c-0.2,0-0.4,0-0.6,0h-1.4v2.4h1.4c0.2,0,0.4,0,0.6,0
						c0.2,0,0.4-0.1,0.5-0.2c0.1-0.1,0.3-0.2,0.3-0.4c0.1-0.2,0.1-0.4,0.1-0.6c0-0.3,0-0.5-0.1-0.6S23.5,34.3,23.4,34.2z"/>
				</g>
				<g id="g28">
					<g id="g30">
						<path id="path32" fill="#BBD8E5" d="M18.9,0.2l14.3,14.3H20.8c-1.1,0-1.9-0.9-1.9-1.9V0.2z"/>
					</g>
				</g>
			</g>
		</g>
		</svg>
	</a>

	<?php } ?>

			<div class="entry-content">

			<h2><a href="<?php the_permalink(); ?>" data-tooltip="View Details" class="name details"><?php the_title(); ?></a></h2>
			<div class="server"><?php the_field('server') ?></div>


			<?php if(get_field('development_model') == "git") {

			if(get_field('git_repo_location') == "github") { ?>




					<?php
					$owner = get_field('github_organization');
					$repo = get_field('github_repository');
					$username = 'calsitacs';
					$password = 'CALS_acs2014!';

					$client = new GitHubClient();

					$client->setCredentials($username, $password);
					$client->setPage();
					$client->setPageSize(10);

					$commits = $client->repos->commits->listCommitsOnRepository($owner, $repo);
if($commits) {
					echo "<div class='listedIssues'>";
					$issues = $client->issues->listIssues($owner, $repo);

foreach($issues as $issue)
{
    /* @var $issue GitHubIssue */
    echo "<a href='http://github.com/".$owner."/".$repo."/issues/".$issue->getNumber()."'>".$issue->getTitle() . "</a>";
}
					echo "</div>";


					//echo "Count: " . count($commits) . "\n";
					$hash = $commits[0]->getSha();

					//$hash = $singlecommit->getSha();
					//$shadateurl = "http://github.com/".$owner."/".$repo."/commit/".$hash." .authorship local-time";
					echo "<div class='hashLabel'>Latest Commit</div><a href='http://github.com/".$owner."/".$repo."/commit/".$hash."' data-hash='".$hash."' data-tooltip='View Latest Commit' class='hashLink'>".$hash."<div class='hashFade'></div></a><div class='hashArrow'><svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 109.6 115.1' enable-background='new 0 0 109.6 115.1' xml:space='preserve'><polygon fill='#AE3424' points='0,0 0,115.1 109.6,0 '/></svg></div>";


					}

					?>




			<?php } else if(get_field('git_repo_location') == "bitbucket") { ?>


			<!--	<script>
					var bitinstance = bitbucket.repository(<?php get_field('bitbucket_user'); ?>, <?php get_field('bitbucket_repo'); ?>)
					bitinstance.details(function (repo) {
					  console.log(repo)
					})
				</script>-->

<?php } else if(get_field('git_repo_location') == "stash") {


			}


	} else {
		//If the site uses just FTP...


	} ?>



			<div class="description">
					<?php the_content(); ?>
			</div>


		</div>

		<?php if(get_field('site_url_assigned') == true) { ?>
			<a href="#" class="responseContainer"><span class="responseContainerData"></span> <span class="responseContainerStatus"></span></a>
			<div class='responseArrow'><svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 109.6 115.1' enable-background='new 0 0 109.6 115.1' xml:space='preserve'><polygon fill='#AE3424' points='0,0 0,115.1 109.6,0 '/></svg></div>
		<?php } ?>

	</div>
	<?php endwhile; wp_reset_query(); ?>



						</div>



				</div>

			</div>



<?php get_footer(); ?>
