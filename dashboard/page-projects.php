<?php get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap cf">

            <div id="main" class="m-all cf" role="main">

              <?php
require_once(__DIR__ . '/client/GitHubClient.php'); ?>




<?php $args = array( 'post_type' => 'projects', 'posts_per_page' => 100 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

  <div class="cardContainer">

    <?php

  $image = get_field('image');

  if( !empty($image) ): ?>

  	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>


  <h2><?php the_title(); ?></h2>
  <div class="entry-content">

    <?php $owner = get_field('github_organization');
    $repo = get_field('github_repository');


    $client = new GitHubClient();

    $client->setPage();
    $client->setPageSize(10);
    $commits = $client->repos->commits->listCommitsOnRepository($owner, $repo); ?>



    <?php

    //echo "Count: " . count($commits) . "\n";
    $hash = $commits[0]->getSha();
    //$hash = $singlecommit->getSha();
    echo "<a href='http://github.com/".$owner."/".$repo."/commit/".$hash."'>Latest Commit: ".$hash."</a>";

    ?>

  <?php the_content(); ?>
  </div>
</div>
<?php endwhile; wp_reset_query(); ?>



            </div>

            <?php //get_sidebar(); ?>

        </div>

      </div>

<?php get_footer(); ?>
